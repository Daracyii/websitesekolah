<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - SMKN 4 Bogor</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail-berita.css') }}">
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


    <!-- ================= DETAIL BERITA ================= -->
    <main class="article-main">

        <a href="{{ route('berita') }}" class="article-back">
            ← Kembali ke Berita
        </a>


        <article class="article">

            <!-- META -->
            <div class="article-meta">

                <span class="article-category">
                    {{ $berita->kategori }}
                </span>

                <span class="article-date">
                    <i class="bi bi-calendar3"></i>
                    {{ $berita->tanggal->translatedFormat('d F Y') }}
                </span>

            </div>


            <!-- JUDUL -->
            <h1>
                {{ $berita->judul }}
            </h1>


            <!-- GAMBAR -->
            <div class="article-image">
                <img
                    src="{{ $berita->url_gambar }}"
                    alt="{{ $berita->judul }}"
                >
            </div>


            <!-- ISI
                 Kolom "isi" berupa satu string dengan paragraf
                 dipisah baris kosong, jadi dipecah dulu pakai preg_split -->
            <div class="article-body">

                @foreach (preg_split('/\r\n|\r|\n/', $berita->isi) as $paragraf)
                    @if (trim($paragraf) !== '')
                        <p>{{ trim($paragraf) }}</p>
                    @endif
                @endforeach

            </div>

        </article>


        <!-- ================= BERITA LAINNYA ================= -->
        <section class="related-section">

            <h2>Berita Lainnya</h2>

            <div class="news-grid">

                @foreach ($beritaLainnya as $lainnya)

                    <a href="{{ route('berita.detail', $lainnya->slug) }}" class="news-card">

                        <div class="news-image">
                            <img
                                src="{{ $lainnya->url_gambar }}"
                                alt="{{ $lainnya->judul }}"
                            >
                        </div>

                        <div class="news-content">

                            <div class="news-meta">

                                <span class="news-category">
                                    {{ $lainnya->kategori }}
                                </span>

                                <span class="news-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $lainnya->tanggal->translatedFormat('d F Y') }}
                                </span>

                            </div>

                            <h3>
                                {{ $lainnya->judul }}
                            </h3>

                            <p>
                                {{ $lainnya->ringkasan }}
                            </p>

                        </div>

                    </a>

                @endforeach

            </div>

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