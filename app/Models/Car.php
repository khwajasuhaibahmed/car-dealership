<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'brand', 'model', 'year', 'price', 'mileage',
        'fuel_type', 'transmission', 'body_type', 'color',
        'description', 'images', 'status', 'is_featured'
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
    ];
}
