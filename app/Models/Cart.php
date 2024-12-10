<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'base_total_price',
        'total_price',
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function items() {
        return $this->hasMany(CartItem::class);
    }
}
