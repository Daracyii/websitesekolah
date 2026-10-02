<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // READ — daftar berita
    public function index()
    {
        return view('admin.berita.index', [
            'beritas' => Berita::orderBy('tanggal', 'desc')->get(),
        ]);
    }

    // CREATE — form tambah
    public function create()
    {
        return view('admin.berita.form');
    }

    // CREATE — simpan
    public function store(Request $request)
    {
        $data = $this->validasi($request);

        $data['slug']   = $this->buatSlug($data['judul']);
        $data['gambar'] = $this->simpanGambar($request);

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('sukses', 'Berita berhasil ditambahkan!');
    }

    // UPDATE — form edit
    public function edit(Berita $berita)
    {
        return view('admin.berita.form', [
            'berita' => $berita,
        ]);
    }

    // UPDATE — simpan perubahan
    public function update(Request $request, Berita $berita)
    {
        $data = $this->validasi($request);
        $data['slug'] = $this->buatSlug($data['judul'], $berita->id);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->simpanGambar($request);
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('sukses', 'Berita berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('sukses', 'Berita berhasil dihapus!');
    }


    /* ============ Helper biar nggak nulis 2x ============ */

    private function validasi(Request $request): array
    {
        return $request->validate([
            'judul'     => 'required|max:255',
            'kategori'  => 'required|max:50',
            'tanggal'   => 'required|date',
            'ringkasan' => 'required',
            'isi'       => 'required',
            'gambar'    => 'nullable|image|max:2048',
        ]);
    }

    // Bikin URL dari judul: "Lomba SAGA!" -> lomba-saga
    private function buatSlug(string $judul, ?int $kecualiId = null): string
    {
        $slug = Str::slug($judul);
        $asli = $slug;
        $i    = 2;

        while (
            Berita::where('slug', $slug)
                ->when($kecualiId, fn ($q) => $q->where('id', '!=', $kecualiId))
                ->exists()
        ) {
            $slug = $asli . '-' . $i++;
        }

        return $slug;
    }

    private function simpanGambar(Request $request): ?string
    {
        if ($request->hasFile('gambar')) {
            return $request->file('gambar')->store('berita', 'public');
        }

        return null;
    }
}