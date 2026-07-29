<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'status',
        'avatar',
        'google_id',
        'facebook_id',
        'auth_type',
        'company_name',
        'company_address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string',
            'status' => 'string',
            'auth_type' => 'string',
        ];
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPartner(): bool
    {
        return $this->role === 'partner';
    }

    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }
}
