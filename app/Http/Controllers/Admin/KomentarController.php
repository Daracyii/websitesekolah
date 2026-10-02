<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;

class KomentarController extends Controller
{
    // READ — daftar komentar pengunjung
    public function index()
    {
        return view('admin.komentar.index', [
            'komentars' => Komentar::orderBy('id', 'desc')->get(),
        ]);
    }

    // DELETE
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();

        return redirect()
            ->route('admin.komentar.index')
            ->with('sukses', 'Komentar berhasil dihapus!');
    }
}