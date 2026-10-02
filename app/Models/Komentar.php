<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = [
        'nama',
        'pesan',
        'rating',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}