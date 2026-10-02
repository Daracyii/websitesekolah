<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('jurusans', function (Blueprint $table) {
        $table->id();
        $table->string('singkatan', 20);      // PPLG, TJKT, TO, TP
        $table->string('nama');               // nama lengkap jurusan
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable(); // foto jurusan (opsional)
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
