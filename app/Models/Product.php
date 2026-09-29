<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'category', 'brand', 'price', 'currency', 'stock', 'rating',
    'reviews', 'is_featured', 'image', 'description'];

    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
    ];
}
