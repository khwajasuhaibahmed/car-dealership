<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Inquiry extends Model
{
    /** @use HasFactory<\Database\Factories\InquiryFactory> */
    use HasFactory;

    protected $fillable = [
        'car_id', 'user_id', 'name', 'email', 'phone', 'message', 'status'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
