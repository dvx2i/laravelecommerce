<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
        'total_price'
    ];

    function order() {
        return $this->belongsTo(Order::class);
    }

    function product() {
        return $this->belongsTo(Product::class);
    }
}
