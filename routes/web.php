<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
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
});
