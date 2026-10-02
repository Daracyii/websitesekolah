<?php

namespace App\Models;

// Kalau ada baris "use Laravel ... HasApiTokens" dll di file lama,
// tidak masalah dihapus, versi di bawah ini sudah lengkap.
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}