<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - SMKN 4 Bogor</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="navbar">

        <div class="nav-container">

            <!-- LOGO -->
            <div class="brand">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo SMKN 4 Bogor"
                    class="logo"
                >

                <div class="brand-text">
                    <h2>SMKN 4 BOGOR</h2>
                    <p>Siap Kerja, Santun, Mandiri, dan Kreatif</p>
                </div>

            </div>


                        <!-- MENU -->
            <nav class="nav-menu">

                <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door nav-icon"></i>
                    Beranda
                </a>

                <a href="{{ route('profil') }}" class="nav-item {{ request()->routeIs('profil') ? 'active' : '' }}">
                    <i class="bi bi-person nav-icon"></i>
                    Profil
                </a>

                <a href="{{ route('berita') }}" class="nav-item {{ request()->routeIs('berita*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper nav-icon"></i>
                    Berita
                </a>

                <a href="{{ route('galeri') }}" class="nav-item {{ request()->routeIs('galeri') ? 'active' : '' }}">
                    <i class="bi bi-images nav-icon"></i>
                    Galeri
                </a>

                <a href="{{ route('admin.dashboard') }}" class="nav-item">
                    <i class="bi bi-box-arrow-in-right nav-icon"></i>
                    Portal
                </a>

            </nav>

        </div>

    </header>


    <!-- ================= GALERI ================= -->
    <main class="gallery-section">

        <span class="section-label">
            · GALERI
        </span>

        <h1 class="gallery-title">
            Galeri Kegiatan
        </h1>

        <p class="gallery-description">
            Lihat dokumentasi kegiatan, acara, dan aktivitas siswa di sekolah.
            Klik foto untuk memperbesar.
        </p>


        <!-- GRID FOTO (grid Bootstrap: row + col) -->
        <div class="row g-3">

            @forelse ($galeris as $galeri)

                <div class="col-6 col-md-4">
                    <div
                        class="gallery-item"
                        data-bs-toggle="modal"
                        data-bs-target="#galleryModal"
                        data-image="{{ $galeri->url_gambar }}"
                        data-title="{{ $galeri->judul }}"
                    >
                        <img
                            src="{{ $galeri->url_gambar }}"
                            alt="{{ $galeri->judul }}"
                        >
                        <span class="gallery-caption">{{ $galeri->judul }}</span>
                    </div>
                </div>

            @empty

                <div class="col-12">
                    <p style="color: #64748b; font-size: 13px;">
                        Belum ada foto galeri.
                    </p>
                </div>

            @endforelse

        </div>

    </main>


    <!-- ================= MODAL LIGHTBOX (komponen Bootstrap) ================= -->
    <div
        class="modal fade gallery-modal"
        id="galleryModal"
        tabindex="-1"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="galleryModalTitle">
                        Judul Kegiatan
                    </h5>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Tutup"
                    ></button>

                </div>

                <div class="modal-body p-0">
                    <img
                        id="galleryModalImage"
                        src=""
                        alt="Foto kegiatan"
                        class="w-100 d-block"
                    >
                </div>

            </div>

        </div>
    </div>


        @include('partials.footer')


        <!-- ================= TOMBOL KE ATAS ================= -->
    <button
        class="back-top"
        onclick="const c = document.querySelector('.profile-content'); c ? c.scrollTo({top: 0, behavior: 'smooth'}) : window.scrollTo({top: 0, behavior: 'smooth'});"
    >
        <i class="bi bi-arrow-up"></i>
    </button>


    <!-- ================= SCRIPT GALERI ================= -->
    <script>
        const modalImage = document.getElementById('galleryModalImage');
        const modalTitle = document.getElementById('galleryModalTitle');

        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', () => {
                modalImage.src = item.dataset.image;
                modalTitle.textContent = item.dataset.title;
            });
        });
    </script>


</body>

</html>