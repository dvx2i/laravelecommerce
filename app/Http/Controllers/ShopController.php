<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function product() {
        $products = Product::orderBy('id', 'DESC')->paginate(9);
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
        $userId =Auth::user()->id;
        $address=Auth::user()->address;
        $productIds = $request->input('product_id'); 
        $qtys = $request->input('qty'); 
        $order = Order::where(['user_id' => $userId, 'order_status' => 'pending'])->first(); // check if cart user is exist

        if($order){
            $existItems = OrderItem::where(['order_id' => $order->id])->first(); // check if cart user is exist
            $existItems->delete();
            $totalPrice = 0;

            for($i=0; $i<count($productIds); $i++){
                $product = Product::find($productIds[$i]);
                $existItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $qtys[$i],
                    'price' => $product->sale_price,
                    'total_price' => $product->sale_price*$qtys[$i]
                ]);
                $totalPrice += $product->sale_price*$qtys[$i];
            }
                
            // update order
            $order->total_price = $totalPrice;
            $order->save();

        }else{
            $newOrder = Order::create([
                'user_id' => $userId,
                'order_status' => 'pending',
                'shipping_address' => $address,
                'payment_status' => 'pending',
                'total_price' => 0
            ]);
            
            $totalPrice = 0;
            
            for($i=0; $i<count($productIds); $i++){
                $product = Product::find($productIds[$i]);
                $existItems = OrderItem::create([
                    'order_id' => $newOrder->id,
                    'product_id' => $product->id,
                    'qty' => $qtys[$i],
                    'price' => $product->sale_price,
                    'total_price' => $product->sale_price*$qtys[$i]
                ]);
                $totalPrice += $product->sale_price*$qtys[$i];
            }
            // update order
            $newOrder->total_price = $totalPrice;
            $newOrder->save();
        }
        
        Session::forget('cart_total_quantity');
        
        return redirect()->route('shop.cart');
    }

    public function order() {
        $userId =Auth::user()->id;
        $orders = Order::where(['user_id' => $userId])->get();        
        return view('shop.order', compact('orders'));
    }

    public function order_show($order_id) {
        $orderItems = OrderItem::where('order_id', $order_id)->get();
        return view('shop.order_details', compact('orderItems'));
    }
}
