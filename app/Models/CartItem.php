<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cart_id',
        'product_id',
        'qty'
    ];

    function cart() {
        return $this->belongsTo(Cart::class);
    }

    function product() {
        return $this->belongsTo(Product::class);
    }
}
