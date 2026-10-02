<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Jurusan;
use App\Models\Komentar;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KomentarController;

// ================= HALAMAN PUBLIK =================

// Beranda
Route::get('/', function () {
    return view('home', [
        'jurusans' => Jurusan::all(),
        'beritas'  => Berita::orderBy('tanggal', 'desc')->get(),
    ]);
})->name('home');

// Profil
Route::view('/profil', 'profil')->name('profil');

// Daftar berita
Route::get('/berita', function () {
    return view('berita', [
        'beritas' => Berita::orderBy('tanggal', 'desc')->get(),
    ]);
})->name('berita');

// Detail berita (slug)
Route::get('/berita/{slug}', function (string $slug) {
    $berita = Berita::where('slug', $slug)->firstOrFail();

    return view('detail-berita', [
        'berita'        => $berita,
        'slug'          => $berita->slug,
        'beritaLainnya' => Berita::where('slug', '!=', $slug)
            ->orderBy('tanggal', 'desc')
            ->take(2)
            ->get(),
    ]);
})->name('berita.detail');

// Galeri
Route::get('/galeri', function () {
    return view('galeri', [
        'galeris' => Galeri::orderBy('id', 'desc')->get(),
    ]);
})->name('galeri');

// Detail jurusan (slug)
Route::get('/jurusan/{slug}', function (string $slug) {
    $jurusan = Jurusan::where('slug', $slug)->firstOrFail();

    return view('detail-jurusan', [
        'jurusan' => $jurusan,
    ]);
})->name('jurusan.detail');

// Kirim komentar dari footer
Route::post('/komentar', function (Request $request) {
    $data = $request->validate([
        'nama'   => 'required|max:100',
        'pesan'  => 'required|max:1000',
        'rating' => 'required|integer|between:1,5',
    ], [
        'nama.required'   => 'Nama wajib diisi.',
        'pesan.required'  => 'Komentar wajib diisi.',
        'rating.required' => 'Pilih rating bintang dulu ya.',
    ]);

    Komentar::create($data);

    return back()->with('sukses_komentar', 'Terima kasih! Komentar kamu sudah terkirim.');
})->name('komentar.store');


// ================= LOGIN / LOGOUT =================

Route::get('/admin/login', [AuthController::class, 'formLogin'])
    ->name('admin.login.form');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.proses');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');


// ================= ADMIN (HARUS LOGIN!) =================

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        // Dashboard admin
        Route::get('/', function () {
            return view('admin.dashboard', [
                'jumlahJurusan' => Jurusan::count(),
                'jumlahBerita'  => Berita::count(),
                'jumlahGaleri'  => Galeri::count(),
                'beritaTerbaru' => Berita::orderBy('tanggal', 'desc')->take(5)->get(),
            ]);
        })->name('dashboard');

        // CRUD Jurusan
        Route::resource('jurusan', JurusanController::class)->except(['show']);

        // CRUD Berita
        Route::resource('berita', BeritaController::class)
            ->except(['show'])
            ->parameters(['berita' => 'berita']);

        // CRUD Galeri
        Route::resource('galeri', GaleriController::class)
            ->except(['show'])
            ->parameters(['galeri' => 'galeri']);

        // Moderasi komentar (lihat + hapus)
        Route::get('komentar', [KomentarController::class, 'index'])->name('komentar.index');
        Route::delete('komentar/{komentar}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
    });