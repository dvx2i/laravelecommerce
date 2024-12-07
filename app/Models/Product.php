<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}