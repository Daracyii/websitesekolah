<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Berita - SMKN 4 Bogor</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
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


    <!-- ================= BERITA ================= -->
    <main class="news-main">

        <section class="news-section">

            <span class="section-label">
                · INFORMASI
            </span>

            <h1>
                Berita Terbaru
            </h1>

            <p class="news-description">
                Pengumuman, kegiatan, dan informasi terkini dari sekolah.
            </p>


            @php
                // Berita paling baru jadi berita utama (featured)
                $featured = $beritas->first();
            @endphp


            <!-- ================= BERITA UTAMA ================= -->
            <article class="featured-news">

                <a
                    href="{{ route('berita.detail', $featured->slug) }}"
                    class="featured-image-link"
                >
                    <div class="featured-image">
                        <img
                            src="{{ $featured->url_gambar }}"
                            alt="{{ $featured->judul }}"
                        >
                    </div>
                </a>

                <div class="featured-content">

                    <span class="news-category">
                        {{ strtoupper($featured->kategori) }}
                    </span>

                    <span class="news-date">
                        <i class="bi bi-calendar3"></i>
                        {{ $featured->tanggal->translatedFormat('d F Y') }}
                    </span>

                    <h2>
                        {{ $featured->judul }}
                    </h2>

                    <p>
                        {{ $featured->ringkasan }}
                    </p>

                    <a
                        href="{{ route('berita.detail', $featured->slug) }}"
                        class="read-more"
                    >
                        Baca Selengkapnya →
                    </a>

                </div>

            </article>


            <!-- ================= BERITA LAINNYA ================= -->
            <section class="latest-news">

                <div class="latest-heading">

                    <span class="section-label">
                        · INFORMASI
                    </span>

                    <h2>
                        Berita Lainnya
                    </h2>

                    <p class="news-description">
                        Kegiatan, informasi, dan prestasi terbaru dari SMKN 4 Bogor.
                    </p>

                </div>


                <div class="news-grid">

                    @foreach ($beritas->skip(1) as $berita)

                        <!-- CARD BERITA -->
                        <a href="{{ route('berita.detail', $berita->slug) }}" class="news-card">

                            <div class="news-card-image">
                                <img
                                    src="{{ $berita->url_gambar }}"
                                    alt="{{ $berita->judul }}"
                                >
                            </div>

                            <div class="news-card-content">

                                <span class="news-category">
                                    {{ strtoupper($berita->kategori) }}
                                </span>

                                <span class="news-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $berita->tanggal->translatedFormat('d F Y') }}
                                </span>

                                <h3>
                                    {{ $berita->judul }}
                                </h3>

                                <p>
                                    {{ $berita->ringkasan }}
                                </p>

                            </div>

                        </a>

                    @endforeach

                </div>

            </section>

        </section>

    </main>


        @include('partials.footer')


    <!-- ================= TOMBOL KE ATAS ================= -->
    <button
        class="back-top"
        onclick="const c = document.querySelector('.profile-content'); c ? c.scrollTo({top: 0, behavior: 'smooth'}) : window.scrollTo({top: 0, behavior: 'smooth'});"
    >
        <i class="bi bi-arrow-up"></i>
    </button>


</body>

</html>