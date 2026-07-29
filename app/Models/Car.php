<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'category_id',
        'partner_id',
        'name',
        'slug',
        'brand',
        'model',
        'year',
        'transmission',
        'capacity',
        'fuel_type',
        'price_per_day',
        'price_per_week',
        'price_per_month',
        'discount_percent',
        'is_featured',
        'is_available',
        'is_popular',
        'description',
        'specifications',
        'features',
        'terms',
        'main_image',
        'gallery',
        'seat_count',
        'door_count',
        'luggage',
        'minimum_rent_days',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'specifications' => 'array',
            'features' => 'array',
            'gallery' => 'array',
            'is_featured' => 'boolean',
            'is_available' => 'boolean',
            'is_popular' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function partner()
    {
        return $this->belongsTo(User::class, 'partner_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getDiscountedPriceAttribute()
    {
        if ($this->discount_percent) {
            return $this->price_per_day - ($this->price_per_day * $this->discount_percent / 100);
        }

        return $this->price_per_day;
    }

    public function getFinalPriceAttribute()
    {
        return $this->discounted_price;
    }

    // ── View convenience accessors (aliases for DB columns) ──

    public function getPriceAttribute(): mixed
    {
        return $this->price_per_day;
    }

    public function getDiscountAttribute(): mixed
    {
        return $this->discount_percent;
    }

    public function getFuelAttribute(): mixed
    {
        return $this->fuel_type;
    }

    public function getModelYearAttribute(): mixed
    {
        return $this->year;
    }

    public function getDoorsAttribute(): mixed
    {
        return $this->door_count;
    }

    public function getImagesAttribute(): array
    {
        return $this->gallery ?? [];
    }

    public function getImageAttribute(): mixed
    {
        return $this->main_image;
    }

    public function getTypeAttribute(): ?string
    {
        return $this->category?->name;
    }
}
