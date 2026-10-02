<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $fillable = [
        'slug',
        'singkatan',
        'nama',
        'deskripsi',
        'gambar',
        'kepala_jurusan',
        'kompetensi',
        'peluang_kerja',
    ];

    /*
     | Accessor url_gambar:
     | - upload admin -> storage/...
     | - kosong       -> tampilkan singkatan (ditangani di view)
     */
    public function getUrlGambarAttribute(): ?string
    {
        if (! $this->gambar) {
            return null;
        }

        if (str_starts_with($this->gambar, 'images/')) {
            return asset($this->gambar);
        }

        return asset('storage/' . $this->gambar);
    }
}