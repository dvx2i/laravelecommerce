<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Default Laravel behavior
    
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    function products() {
        return $this->hasMany(Product::class);
    }
}
