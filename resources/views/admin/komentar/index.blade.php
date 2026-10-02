@extends('admin.layout')

@section('judul', 'Komentar')

@section('content')

    @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show admin-alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="admin-card">

        <div class="admin-card-header">
            <h5><i class="bi bi-chat-dots"></i> Komentar & Rating Pengunjung</h5>
        </div>

        <div class="admin-card-body">

            <table class="table table-hover align-middle admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 160px;">Nama</th>
                        <th style="width: 150px;">Rating</th>
                        <th>Komentar</th>
                        <th style="width: 150px;">Waktu</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($komentars as $komentar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">{{ $komentar->nama }}</td>

                            <td>
                                @if ($komentar->rating)
                                    <span class="admin-mini-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bi {{ $i <= $komentar->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                        @endfor
                                    </span>
                                @else
                                    <span class="text-muted small">Tanpa rating</span>
                                @endif
                            </td>

                            <td class="small">{{ $komentar->pesan }}</td>

                            <td class="small text-muted">
                                {{ $komentar->created_at->translatedFormat('d M Y, H:i') }}
                            </td>

                            <td>
                                <form
                                    action="{{ route('admin.komentar.destroy', $komentar) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus komentar ini?')"
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
                                Belum ada komentar dari pengunjung.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection