<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Eksplisit, biar nggak ketebak-tebak 😄
    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'gambar',
    ];

    /*
     | Accessor url_gambar:
     | - foto bawaan (folder public/images) -> asset('images/...')
     | - foto upload admin (storage/galeri) -> asset('storage/...')
     */
    public function getUrlGambarAttribute(): string
    {
        if (! $this->gambar) {
            return asset('images/tes.webp');
        }

        if (str_starts_with($this->gambar, 'images/')) {
            return asset($this->gambar);
        }

        return asset('storage/' . $this->gambar);
    }
}