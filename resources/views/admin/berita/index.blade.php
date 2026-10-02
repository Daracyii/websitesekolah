@extends('admin.layout')

@section('judul', 'Kelola Berita')

@section('content')

    @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show admin-alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="admin-card">

        <div class="admin-card-header">
            <h5>Kelola Berita</h5>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-teal btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Berita
            </a>
        </div>

        <div class="admin-card-body">

            <table class="table table-hover align-middle admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 90px;">Gambar</th>
                        <th style="width: 130px;">Tanggal</th>
                        <th>Judul</th>
                        <th style="width: 110px;">Kategori</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($beritas as $berita)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <img
                                    src="{{ $berita->url_gambar }}"
                                    alt="{{ $berita->judul }}"
                                    class="admin-table-img"
                                >
                            </td>

                            <td class="small text-muted">
                                {{ $berita->tanggal->translatedFormat('d M Y') }}
                            </td>

                            <td class="fw-semibold">
                                {{ Str::limit($berita->judul, 45) }}

                                <div class="small text-muted" style="font-size: 10px;">
                                    /berita/{{ $berita->slug }}
                                </div>
                            </td>

                            <td><span class="admin-badge">{{ $berita->kategori }}</span></td>

                            <td>
                                <a
                                    href="{{ route('admin.berita.edit', $berita) }}"
                                    class="btn btn-outline-teal btn-sm"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.berita.destroy', $berita) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada berita. Klik "Tambah Berita" untuk mulai.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection