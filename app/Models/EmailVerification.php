<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'code',
        'expires_at',
        'is_used',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'is_used' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Cek apakah kode sudah kadaluarsa.
     */
    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    /**
     * Cek apakah kode masih valid (belum digunakan dan belum kadaluarsa).
     */
    public function isValid(): bool
    {
        return !$this->is_used && !$this->isExpired();
    }
}
