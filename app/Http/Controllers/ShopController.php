<?php

namespace App\Http\Controllers;

use App\Helpers\MidtransHelper;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Midtrans\Snap;

class ShopController extends Controller
{
    public function product() {
        $products = Product::where(['product_status' => 'active'])->orderBy('id', 'DESC')->paginate(9);
        $categories = Category::select('id','name')->orderBy('name', 'ASC')->get();
        $brands = Brand::select('id','name')->orderBy('name', 'ASC')->get();
        return view('shop.product', compact('products','categories','brands'));
    }

    public function product_show($product_slug) {
        $product = Product::where('slug', $product_slug)->first();
        return view('shop.product_details', compact('product'));
    }

    public function cart() {
        $userId =Auth::user()->id;
        $cart = Cart::where(['user_id' => $userId, 'deleted' => 0])->first();
        if($cart){
            $cartItems = CartItem::where('cart_id', $cart->id)->get();
        }else{
            $cartItems = array();
        }
        
        return view('shop.cart', compact('cart', 'cartItems'));
    }

    public function cart_store(Request $request) {
        $userId =Auth::user()->id;
        $product = Product::find($request->product_id);
        if($product->product_status == 'inactive'){
            return response()->json([
                'status' => 'error',
                'message' => 'Product is inactive',
            ]);
        }
        if($product->stocks == 0){
            return response()->json([
                'status' => 'error',
                'message' => 'Product is out of stocks',
            ]);
        }
        
        $cart = Cart::where(['user_id' => $userId, 'deleted' => 0])->first(); // check if cart user is exist

        if($cart){
            // check if item with product id exisits
            $existItems = CartItem::where([
                'cart_id' => $cart->id,
                'product_id' => $product->id
            ])->first();

            if(!$existItems){
                $existItems = CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'qty' => 1 // when click add to chart automatic add 1 qty
                ]);
                
                // update cart
                $cart->base_total_price = $cart->base_total_price + $product->price;
                $cart->total_price = $cart->total_price + $product->sale_price;
                $cart->save();

            }else{
                // update cart item qty
                $existItems->qty = $existItems->qty+1;
                $existItems->save();
                
                // update cart
                $cart->base_total_price = $cart->base_total_price + $product->price;
                $cart->total_price = $cart->total_price + $product->sale_price;
                $cart->save();
            }
        }else{
            $newCart = Cart::create([
                'user_id' => $userId,
                'base_total_price' => $product->price,
                'total_price' => $product->sale_price
            ]);
            
            $existItems = CartItem::create([
                'cart_id' => $newCart->id,
                'product_id' => $product->id,
                'qty' => 1 // when click add to chart automatic add 1 qty
            ]);
        }
        
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalQty = $cart ? $cart->items()->sum('qty') : 0;
        Session::put('cart_total_quantity', $totalQty);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart',
            'qty' => $existItems->qty
        ]);
    }
    
    public function order_store(Request $request) {
        MidtransHelper::init();
        $userId =Auth::user()->id;
        $address=Auth::user()->address;
        $productIds = $request->input('product_id'); 
        $qtys = $request->input('qty'); 
        $order = Order::where(['user_id' => $userId, 'order_status' => 'pending'])->first(); // check if cart user is exist

        DB::beginTransaction();
        
        $order = Order::create([
            'user_id' => $userId,
            'order_status' => 'pending',
            'shipping_address' => $address,
            'payment_status' => 'pending',
            'total_price' => 0
        ]);
        
        $totalPrice = 0;
        
        for($i=0; $i<count($productIds); $i++){
            $product = Product::find($productIds[$i]);
            if($product->stocks >= $qtys[$i]){ // jika stock > = yang akan dibeli
                $existItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $qtys[$i],
                    'price' => $product->sale_price,
                    'total_price' => $product->sale_price*$qtys[$i]
                ]);
                $totalPrice += $product->sale_price*$qtys[$i];
            }else{
                return redirect()->route('shop.cart')->with('error', 'Product Out of Stocks');
            }
        }
        
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER' .  Carbon::now()->timestamp . '-' . $order->id,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'last_name' => '',
                'email' => $order->user->email,
                'phone' => $order->user->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        // update order
        $order->snapToken = $snapToken;
        $order->total_price = $totalPrice;
        $order->save();
        
        
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->deleted = 1;
        $cart->save();

        DB::commit();
        Session::forget('cart_total_quantity');
        
        return redirect()->route('shop.order.show', ['order' => $order->id]);
    }

    public function order() {
        $userId =Auth::user()->id;
        $orders = Order::where(['user_id' => $userId])->get();   
        
        return view('shop.order', compact('orders'));
    }

    public function order_show($order_id) {
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->get();
        return view('shop.order_details', compact('orderItems','order'));
    }

    public function order_success($snapToken) {
        $order = Order::where('snapToken', $snapToken)->first();
        $order->payment_status = 'paid';
        $order->order_status = 'shipped';
        $order->save(); // update status order dan payment

        $orderItems = OrderItem::where('order_id', $order->id)->get();
        foreach ($orderItems as $item){
            $product = Product::find($item->product_id);
            $product->stocks = $product->stocks - $item->qty;
            $product->save(); // update stock
        }
        return view('shop.order_success', compact('orderItems','order'));
    }
}
