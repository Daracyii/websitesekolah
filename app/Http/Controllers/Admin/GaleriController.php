<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // READ — daftar foto
    public function index()
    {
        return view('admin.galeri.index', [
            'galeris' => Galeri::orderBy('id', 'desc')->get(),
        ]);
    }

    // CREATE — form tambah
    public function create()
    {
        return view('admin.galeri.form');
    }

    // CREATE — simpan
    public function store(Request $request)
    {
        $data = $this->validasi($request, true);

        $data['gambar'] = $request->file('gambar')->store('galeri', 'public');

        Galeri::create($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('sukses', 'Foto berhasil ditambahkan!');
    }

    // UPDATE — form edit
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.form', [
            'galeri' => $galeri,
        ]);
    }

    // UPDATE — simpan perubahan
    public function update(Request $request, Galeri $galeri)
    {
        $data = $this->validasi($request, false);

        // Kalau upload gambar baru, timpa yang lama
        if ($request->hasFile('gambar')) {
            if (str_starts_with($galeri->gambar, 'galeri/')) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('sukses', 'Foto berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Galeri $galeri)
    {
        // Hapus juga file fisiknya (kalau hasil upload)
        if (str_starts_with($galeri->gambar, 'galeri/')) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('sukses', 'Foto berhasil dihapus!');
    }


    /* ============ Helper ============ */

    // $wajibGambar = true saat tambah (foto wajib),
    // false saat edit (boleh nggak ganti foto)
    private function validasi(Request $request, bool $wajibGambar): array
    {
        return $request->validate([
            'judul'  => 'required|max:255',
            'gambar' => $wajibGambar
                ? 'required|image|max:2048'
                : 'nullable|image|max:2048',
        ]);
    }
}