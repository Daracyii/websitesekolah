<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    // READ — halaman daftar jurusan
    public function index()
    {
        return view('admin.jurusan.index', [
            'jurusans' => Jurusan::all(),
        ]);
    }

    // CREATE — tampilkan form tambah
    public function create()
    {
        return view('admin.jurusan.form');
    }

    // CREATE — simpan data baru
    public function store(Request $request)
    {
        $data = $this->validasi($request);

        $data['slug'] = $this->buatSlug($data['singkatan']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        Jurusan::create($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('sukses', 'Jurusan berhasil ditambahkan!');
    }

    // UPDATE — tampilkan form edit
    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.form', [
            'jurusan' => $jurusan,
        ]);
    }

    // UPDATE — simpan perubahan
    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $this->validasi($request);

        $data['slug'] = $this->buatSlug($data['singkatan'], $jurusan->id);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('sukses', 'Jurusan berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('sukses', 'Jurusan berhasil dihapus!');
    }


    /* ============ Helper ============ */

    private function validasi(Request $request): array
    {
        return $request->validate([
            'singkatan'      => 'required|max:20',
            'nama'           => 'required|max:255',
            'deskripsi'      => 'nullable|string',
            'kepala_jurusan' => 'nullable|max:255',
            'kompetensi'     => 'nullable|string',
            'peluang_kerja'  => 'nullable|string',
            'gambar'         => 'nullable|image|max:2048',
        ]);
    }

    private function buatSlug(string $singkatan, ?int $kecualiId = null): string
    {
        $slug = Str::slug($singkatan);
        $asli = $slug;
        $i    = 2;

        while (
            Jurusan::where('slug', $slug)
                ->when($kecualiId, fn ($q) => $q->where('id', '!=', $kecualiId))
                ->exists()
        ) {
            $slug = $asli . '-' . $i++;
        }

        return $slug;
    }
}