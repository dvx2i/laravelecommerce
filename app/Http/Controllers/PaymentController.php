<?php

namespace App\Http\Controllers;

use App\Helpers\MidtransHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function create_transaction(Request $request){
        MidtransHelper::init();
        
        $order = Order::find($request->orderId);
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $request->orderId,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'last_name' => '',
                'email' => $order->user->email,
                'phone' => $order->user->phone,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
