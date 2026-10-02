@extends('admin.layout')

@section('judul', 'Dashboard')

@section('content')

    <h1 class="admin-heading">
        Selamat Datang, Admin 👋
    </h1>

    <p class="admin-subheading">
        Kelola konten website SMKN 4 Bogor dari sini.
    </p>


    <!-- ================= RINGKASAN ================= -->
    <div class="row g-3">

        <!-- JURUSAN -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.jurusan.index') }}" class="admin-stat-card">
                <span class="admin-stat-icon"><i class="bi bi-mortarboard"></i></span>
                <span class="admin-stat-value">{{ $jumlahJurusan }}</span>
                <span class="admin-stat-label">JURUSAN</span>
                <span class="admin-stat-action">Kelola →</span>
            </a>
        </div>

        <!-- BERITA -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.berita.index') }}" class="admin-stat-card">
                <span class="admin-stat-icon"><i class="bi bi-newspaper"></i></span>
                <span class="admin-stat-value">{{ $jumlahBerita }}</span>
                <span class="admin-stat-label">BERITA</span>
                <span class="admin-stat-action">Kelola →</span>
            </a>
        </div>

        <!-- GALERI -->
        <div class="col-6 col-md-3">
            <a href="{{ route('admin.galeri.index') }}" class="admin-stat-card">
                <span class="admin-stat-icon"><i class="bi bi-images"></i></span>
                <span class="admin-stat-value">{{ $jumlahGaleri }}</span>
                <span class="admin-stat-label">GALERI</span>
                <span class="admin-stat-action">Kelola →</span>
            </a>
        </div>

        <!-- WEBSITE -->
        <div class="col-6 col-md-3">
            <a href="{{ route('home') }}" class="admin-stat-card">
                <span class="admin-stat-icon"><i class="bi bi-globe"></i></span>
                <span class="admin-stat-value"><i class="bi bi-arrow-up-right"></i></span>
                <span class="admin-stat-label">LIHAT WEBSITE</span>
                <span class="admin-stat-action">Buka beranda →</span>
            </a>
        </div>

    </div>


    <!-- ================= BERITA TERBARU ================= -->
    <div class="admin-card" style="margin-top: 24px;">

        <div class="admin-card-header">
            <h5><i class="bi bi-clock-history"></i> Berita Terbaru</h5>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-teal btn-sm">
                <i class="bi bi-plus-lg"></i> Tambah Berita
            </a>
        </div>

        <div class="admin-card-body p-0">

            <table class="table table-hover align-middle admin-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px;">Tanggal</th>
                        <th>Judul</th>
                        <th style="width: 110px;">Kategori</th>
                        <th style="width: 90px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($beritaTerbaru as $berita)
                        <tr>
                            <td class="small text-muted">
                                {{ $berita->tanggal->translatedFormat('d M Y') }}
                            </td>

                            <td class="fw-semibold">
                                {{ Str::limit($berita->judul, 55) }}
                            </td>

                            <td>
                                <span class="admin-badge">{{ $berita->kategori }}</span>
                            </td>

                            <td>
                                <a
                                    href="{{ route('admin.berita.edit', $berita) }}"
                                    class="btn btn-outline-teal btn-sm"
                                >
                                    Edit
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada berita. Klik "Tambah Berita" untuk mulai.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection