@extends('admin.layout')

@section('judul', 'Kelola Jurusan')

@section('content')

    @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show admin-alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="admin-card">

        <div class="admin-card-header">
            <h5>Kelola Jurusan</h5>
            <a href="{{ route('admin.jurusan.create') }}" class="btn btn-teal btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Jurusan
            </a>
        </div>

        <div class="admin-card-body">

            <table class="table table-hover align-middle admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 80px;">Gambar</th>
                        <th style="width: 110px;">Singkatan</th>
                        <th>Nama Jurusan</th>
                        <th>Deskripsi</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($jurusans as $jurusan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
    @if ($jurusan->gambar)
        <img
            src="{{ $jurusan->url_gambar }}"
            alt="{{ $jurusan->nama }}"
            class="admin-table-img"
        >
    @else
        <span class="text-muted">—</span>
    @endif
</td>

                            <td>
                                <span class="admin-badge">{{ $jurusan->singkatan }}</span>
                            </td>

                            <td class="fw-semibold">{{ $jurusan->nama }}</td>

                            <td class="small text-muted">
                                {{ Str::limit($jurusan->deskripsi, 60) }}
                            </td>

                            <td>
                                <a
                                    href="{{ route('admin.jurusan.edit', $jurusan) }}"
                                    class="btn btn-outline-teal btn-sm"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.jurusan.destroy', $jurusan) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus jurusan {{ $jurusan->singkatan }}?')"
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
                                Belum ada jurusan. Klik "Tambah Jurusan" untuk mulai.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection