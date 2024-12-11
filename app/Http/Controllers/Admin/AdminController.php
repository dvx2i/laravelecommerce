<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalOrder = Order::all()->count();
        $totalProduct = Product::all()->count();
        $totalUser = User::all()->count();
        $totalBrand = Brand::all()->count();
        return view('admin.index', compact('totalOrder', 'totalProduct', 'totalUser', 'totalBrand'));
    }
}
