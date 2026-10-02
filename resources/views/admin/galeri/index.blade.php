@extends('admin.layout')

@section('judul', 'Kelola Galeri')

@section('content')

    @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show admin-alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="admin-card">

        <div class="admin-card-header">
            <h5>Kelola Galeri</h5>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-teal btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Foto
            </a>
        </div>

        <div class="admin-card-body">

            <table class="table table-hover align-middle admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 110px;">Gambar</th>
                        <th>Judul Kegiatan</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($galeris as $galeri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <img
                                    src="{{ $galeri->url_gambar }}"
                                    alt="{{ $galeri->judul }}"
                                    class="admin-table-img"
                                >
                            </td>

                            <td class="fw-semibold">{{ $galeri->judul }}</td>

                            <td>
                                <a
                                    href="{{ route('admin.galeri.edit', $galeri) }}"
                                    class="btn btn-outline-teal btn-sm"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.galeri.destroy', $galeri) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus foto {{ $galeri->judul }}?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada foto. Klik "Tambah Foto" untuk mulai.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection