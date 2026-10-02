<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'tanggal',
        'gambar',
        'ringkasan',
        'isi',
    ];

    /*
     | Kasih tahu Laravel: kolom "tanggal" itu DATE,
     | jadi otomatis diubah jadi objek Carbon.
     | (Biar translatedFormat() bisa jalan)
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /*
     | Accessor: bikin "properti" url_gambar otomatis.
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