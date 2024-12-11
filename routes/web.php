<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop/products', [ShopController::class, 'product'])->name('shop.product');
Route::get('/shop/product/{product_slug}', [ShopController::class, 'product_show'])->name('shop.product.show');

Route::middleware(['auth'])->group(function(){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/shop/cart', [ShopController::class, 'cart'])->name('shop.cart');
    Route::post('/shop/cart', [ShopController::class, 'cart_store'])->name('shop.cart.store');
    Route::get('/shop/orders', [ShopController::class, 'order'])->name('shop.order');
    Route::post('/shop/order', [ShopController::class, 'order_store'])->name('shop.order.store');
    Route::get('/shop/order/{order}', [ShopController::class, 'order_show'])->name('shop.order.show');
    Route::get('/shop/order_success/{order}', [ShopController::class, 'order_success'])->name('shop.order.success');
    
    Route::post('/payment/create_transaction', [PaymentController::class, 'create_transaction'])->name('payment.create_transaction');
});

Route::middleware(['auth', AuthAdmin::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/admin/brand', BrandController::class)
    ->name('index', 'admin.brand')
    ->name('create', 'admin.brand.create')
    ->name('store', 'admin.brand.store')
    ->name('edit', 'admin.brand.edit')
    ->name('update', 'admin.brand.update')
    ->name('destroy', 'admin.brand.destroy');
    
    Route::resource('/admin/category', CategoryController::class)
    ->name('index', 'admin.category')
    ->name('create', 'admin.category.create')
    ->name('store', 'admin.category.store')
    ->name('edit', 'admin.category.edit')
    ->name('update', 'admin.category.update')
    ->name('destroy', 'admin.category.destroy');
    
    Route::resource('/admin/product', ProductController::class)
    ->name('index', 'admin.product')
    ->name('create', 'admin.product.create')
    ->name('store', 'admin.product.store')
    ->name('edit', 'admin.product.edit')
    ->name('update', 'admin.product.update')
    ->name('destroy', 'admin.product.destroy');
    Route::post('/admin/product/update_status', [ProductController::class, 'update_status'])->name('admin.product.update_status');
    Route::post('/admin/product/update_stock', [ProductController::class, 'update_stock'])->name('admin.product.update_stock');
    
    Route::resource('/admin/order', OrderController::class)
    ->name('index', 'admin.order')
    ->name('show', 'admin.order.show')
    ->name('destroy', 'admin.order.destroy');
    Route::post('/admin/order/update', [OrderController::class, 'update'])->name('admin.order.update');
    
    Route::resource('/admin/user', AdminUserController::class)
    ->name('index', 'admin.user')
    ->name('create', 'admin.user.create')
    ->name('store', 'admin.user.store')
    ->name('edit', 'admin.user.edit')
    ->name('update', 'admin.user.update')
    ->name('destroy', 'admin.user.destroy');
});
