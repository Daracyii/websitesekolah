@extends('admin.layout')

@section('judul', isset($jurusan) ? 'Edit Jurusan' : 'Tambah Jurusan')

@section('content')

    <div style="max-width: 720px;">

        <div class="admin-card">

            <div class="admin-card-header">
                <h5>
                    <i class="bi {{ isset($Jurusan) ? 'bi-pencil' : 'bi-plus-circle' }}"></i>
                    {{ isset($Jurusan) ? 'Edit' : 'Tambah' }} Jurusan
                </h5>
            </div>

            <div class="admin-card-body">

                @if ($errors->any())
                    <div class="alert alert-danger admin-alert">
                        <strong>Ada yang belum benar:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form
                    action="{{ isset($jurusan) ? route('admin.jurusan.update', $jurusan) : route('admin.jurusan.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if (isset($jurusan))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Singkatan</label>
                            <input
                                type="text"
                                name="singkatan"
                                value="{{ old('singkatan', $jurusan->singkatan ?? '') }}"
                                class="form-control"
                                placeholder="PPLG"
                                required
                            >
                            <div class="form-text">Dipakai juga sebagai URL: /jurusan/pplg</div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap Jurusan</label>
                            <input
                                type="text"
                                name="nama"
                                value="{{ old('nama', $jurusan->nama ?? '') }}"
                                class="form-control"
                                placeholder="Pengembangan Perangkat Lunak dan Gim"
                                required
                            >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Singkat</label>
                        <textarea
                            name="deskripsi"
                            rows="2"
                            class="form-control"
                            placeholder="Tampil di card beranda. Contoh: Belajar membuat aplikasi, website, dan gim."
                        >{{ old('deskripsi', $jurusan->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kepala Jurusan</label>
                        <input
                            type="text"
                            name="kepala_jurusan"
                            value="{{ old('kepala_jurusan', $jurusan->kepala_jurusan ?? '') }}"
                            class="form-control"
                            placeholder="Contoh: Budi Santoso, S.Kom."
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kompetensi yang Dipelajari</label>
                        <textarea
                            name="kompetensi"
                            rows="5"
                            class="form-control"
                            placeholder="Satu kompetensi per baris. Contoh:&#10;Pemrograman Web&#10;Basis Data"
                        >{{ old('kompetensi', $jurusan->kompetensi ?? '') }}</textarea>
                        <div class="form-text">Tampil di halaman detail jurusan (satu item per baris).</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Peluang Karier & Studi Lanjut</label>
                        <textarea
                            name="peluang_kerja"
                            rows="5"
                            class="form-control"
                            placeholder="Satu peluang per baris. Contoh:&#10;Web Developer&#10;Game Developer"
                        >{{ old('peluang_kerja', $jurusan->peluang_kerja ?? '') }}</textarea>
                        <div class="form-text">Dua item pertama juga tampil di card beranda.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Logo/Gambar {{ isset($jurusan) ? '(kosongkan jika tidak ingin diganti)' : '' }}
                        </label>

                        @if (isset($jurusan) && $jurusan->url_gambar)
                            <img
                                src="{{ $jurusan->url_gambar }}"
                                alt="Gambar saat ini"
                                class="admin-table-img"
                                style="display: block; margin-bottom: 10px;"
                            >
                        @endif

                        <input
                            type="file"
                            name="gambar"
                            accept="image/*"
                            class="form-control"
                        >
                        <div class="form-text">Format jpg/png/webp, maksimal 2MB.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-teal px-4">
                            {{ isset($jurusan) ? 'Simpan Perubahan' : 'Tambahkan' }}
                        </button>
                        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline-teal">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection