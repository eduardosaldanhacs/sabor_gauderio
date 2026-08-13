<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    // public $image = null;
    // public $name = null;
    // public $description = null;
    // public $price = null;
    // public $size = null;

    use HasFactory;

    protected $fillable = [
        'name', 'category', 'flavor', 'history', 'image', 'available', 'featured',
        'prep_time', 'small_price', 'medium_price', 'large_price',
    ];

    protected $casts = [
        'available' => 'boolean',
        'featured' => 'boolean',
    ];
}
