@extends('admin.layout')

@section('judul', isset($galeri) ? 'Edit Foto' : 'Tambah Foto')

@section('content')

    <div style="max-width: 720px;">

        <div class="admin-card">

            <div class="admin-card-header">
                <h5>
                    <i class="bi {{ isset($Foto) ? 'bi-pencil' : 'bi-plus-circle' }}"></i>
                    {{ isset($Foto) ? 'Edit' : 'Tambah' }} Foto
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
                    action="{{ isset($galeri) ? route('admin.galeri.update', $galeri) : route('admin.galeri.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if (isset($galeri))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Kegiatan</label>
                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul', $galeri->judul ?? '') }}"
                            class="form-control"
                            placeholder="Contoh: Ekstrakurikuler Pramuka"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Gambar {{ isset($galeri) ? '(kosongkan jika tidak ingin diganti)' : '' }}
                        </label>

                        @if (isset($galeri))
                            <img
                                src="{{ $galeri->url_gambar }}"
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
                            {{ isset($galeri) ? '' : 'required' }}
                        >
                        <div class="form-text">Format jpg/png/webp, maksimal 2MB.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-teal px-4">
                            {{ isset($galeri) ? 'Simpan Perubahan' : 'Tambahkan' }}
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-teal">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection