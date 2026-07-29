<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'session_id',
        'chat_type',
        'user_id',
        'name',
        'email',
        'message',
        'is_from_admin',
        'is_read',
    ];

    protected function casts(): array
    {
        return [
            'is_from_admin' => 'boolean',
            'is_read' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
