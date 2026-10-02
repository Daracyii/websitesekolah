@extends('admin.layout')

@section('judul', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')

    <div style="max-width: 720px;">

        <div class="admin-card">

            <div class="admin-card-header">
                <h5>
                    <i class="bi {{ isset($berita) ? 'bi-pencil' : 'bi-plus-circle' }}"></i>
                    {{ isset($berita) ? 'Edit' : 'Tambah' }} Berita
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
                    action="{{ isset($berita) ? route('admin.berita.update', $berita) : route('admin.berita.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if (isset($berita))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Berita</label>
                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul', $berita->judul ?? '') }}"
                            class="form-control"
                            placeholder="Contoh: Peresmian Jembatan Garuda"
                            required
                        >
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="kategori" class="form-select">
                                @foreach (['Kegiatan', 'Informasi', 'Prestasi', 'Pengumuman'] as $kategori)
                                    <option
                                        value="{{ $kategori }}"
                                        {{ old('kategori', $berita->kategori ?? '') === $kategori ? 'selected' : '' }}
                                    >
                                        {{ $kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                value="{{ old('tanggal', isset($berita) ? $berita->tanggal->format('Y-m-d') : '') }}"
                                class="form-control"
                                required
                            >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ringkasan</label>
                        <textarea
                            name="ringkasan"
                            rows="2"
                            class="form-control"
                            placeholder="Ringkasan singkat yang tampil di card beranda..."
                            required
                        >{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Berita</label>
                        <textarea
                            name="isi"
                            rows="8"
                            class="form-control"
                            placeholder="Tulis isi berita di sini. Pisahkan tiap paragraf dengan satu baris kosong."
                            required
                        >{{ old('isi', $berita->isi ?? '') }}</textarea>
                        <div class="form-text">Setiap paragraf dipisahkan dengan baris kosong.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Gambar (opsional)</label>
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
                            {{ isset($berita) ? 'Simpan Perubahan' : 'Tambahkan' }}
                        </button>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-teal">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection