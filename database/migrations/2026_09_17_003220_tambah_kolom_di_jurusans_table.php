<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Tambah kolom (dilewati kalau kolomnya
        //    sudah kebentuk dari percobaan migrate kemarin)
        if (! Schema::hasColumn('jurusans', 'slug')) {
            Schema::table('jurusans', function (Blueprint $table) {
                $table->string('slug')->after('id');
                $table->string('kepala_jurusan')->nullable()->after('gambar');
                $table->text('kompetensi')->nullable()->after('deskripsi');
                $table->text('peluang_kerja')->nullable();
            });
        }

        // 2) ISI slug untuk data lama
        //    (inti masalah kemarin: 4 baris lama slug-nya kosong '',
        //    semua sama -> dianggap duplikat -> unique ditolak)
        foreach (DB::table('jurusans')->get() as $j) {
            if ($j->slug === '' || $j->slug === null) {
                DB::table('jurusans')
                    ->where('id', $j->id)
                    ->update(['slug' => Str::slug($j->singkatan)]);
            }
        }

        // 3) Sekarang aman buat pasang unique
        //    (dilewati kalau index-nya sudah ada)
        $namaIndex = collect(Schema::getIndexes('jurusans'))->pluck('name');

        if (! $namaIndex->contains('jurusans_slug_unique')) {
            Schema::table('jurusans', function (Blueprint $table) {
                $table->unique('slug');
            });
        }
    }

    public function down(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->dropUnique('jurusans_slug_unique');
        });

        Schema::table('jurusans', function (Blueprint $table) {
            $table->dropColumn(['slug', 'kepala_jurusan', 'kompetensi', 'peluang_kerja']);
        });
    }
};