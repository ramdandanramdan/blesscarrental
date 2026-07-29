<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'car_id',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'pickup_date',
        'return_date',
        'pickup_location',
        'return_location',
        'rental_type',
        'with_driver',
        'driver_price',
        'total_price',
        'status',
        'payment_status',
        'payment_method',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'pickup_date' => 'datetime',
            'return_date' => 'datetime',
            'with_driver' => 'boolean',
        ];
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
