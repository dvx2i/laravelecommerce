<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // set session chart
        $userId =Auth::id();
        $cart = Cart::where(['user_id' => $userId, 'deleted' => 0])->first();
        $totalQty = $cart ? $cart->items()->sum('qty') : 0;
        Session::put('cart_total_quantity', $totalQty);

        return view('index');
    }
}
