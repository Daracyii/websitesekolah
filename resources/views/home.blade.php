<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMKN 4 Bogor</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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


    <!-- ================= HERO ================= -->
    <section class="hero">

        <img
            src="{{ asset('images/beranda.jpeg') }}"
            alt="SMKN 4 Bogor"
            class="hero-image"
        >

        <div class="hero-overlay"></div>

        <div class="hero-content">

            <h1>Selamat Datang</h1>

            <p>
                Mewujudkan generasi unggul, berkarakter, dan kompeten
                <br>
                di bidang teknologi dan kejuruan.
            </p>

            <a href="{{ route('profil') }}" class="hero-button">
                Selengkapnya
                <span>→</span>
            </a>

        </div>

    </section>


    <!-- ================= INFO SEKOLAH ================= -->
    <section class="school-info">

                <div class="info-card">

            <div class="info-icon">
                <i class="bi bi-mortarboard"></i>
            </div>

            <div>
                <span>JENJANG</span>
                <strong>
                    Sekolah Menengah<br>
                    Kejuruan (SMK)
                </strong>
            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                <i class="bi bi-calendar-event"></i>
            </div>

            <div>
                <span>BERDIRI</span>
                <strong>2009</strong>
            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                <i class="bi bi-award"></i>
            </div>

            <div>
                <span>AKREDITASI</span>
                <strong>A</strong>
            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                <i class="bi bi-upc-scan"></i>
            </div>

            <div>
                <span>NPSN</span>
                <strong>20258095</strong>
            </div>

        </div>

    </section>


    <!-- ================= KEPEMIMPINAN ================= -->
    <section class="leadership">

        <div class="leader-image">

            <img
                src="{{ asset('images/bapake.png') }}"
                alt="Kepala Sekolah"
            >

        </div>


        <div class="leader-content">

            <span class="section-label">
                KEPEMIMPINAN
            </span>

            <h2>
                Drs. Mulya Murprihartono, M.Si
            </h2>

            <p class="period">
                Periode 2022 - sekarang
            </p>

            <p class="quote">
                "Jadilah pelajar yang tidak hanya cerdas dalam berpikir,
                tetapi juga terampil dalam berkarya dan berakhlak mulia.
                Masa depan adalah milik mereka yang terus belajar,
                berusaha, dan pantang menyerah."
            </p>

        </div>

    </section>

    <!-- ================= JURUSAN ================= -->
<section class="jurusan-section">

    <span class="section-label">
        · KOMPETENSI KEAHLIAN
    </span>

    <h2>Jurusan di SMKN 4 Bogor</h2>

    <p class="jurusan-description">
        Pilih jurusan yang sesuai dengan minat dan bakatmu.
    </p>


    <div class="jurusan-grid">

        @foreach ($jurusans as $jurusan)

            <a
                href="{{ route('jurusan.detail', $jurusan->slug) }}"
                class="jurusan-card"
            >

                <div class="jurusan-image">

                    @if ($jurusan->url_gambar)
                        <img
                            src="{{ $jurusan->url_gambar }}"
                            alt="{{ $jurusan->nama }}"
                        >
                    @else
                        <span class="jurusan-initial">
                            {{ $jurusan->singkatan }}
                        </span>
                    @endif

                </div>

                <div class="jurusan-content">

                    <span class="jurusan-badge">
                        {{ $jurusan->singkatan }}
                    </span>

                    <h3>
                        {{ $jurusan->nama }}
                    </h3>

                    <p>
                        {{ $jurusan->deskripsi }}
                    </p>

                    @if ($jurusan->peluang_kerja)
                        <div class="jurusan-karier">

                            @foreach (array_slice(preg_split('/\r\n|\r|\n/', $jurusan->peluang_kerja), 0, 2) as $karier)
                                @if (trim($karier) !== '')
                                    <span>{{ trim($karier) }}</span>
                                @endif
                            @endforeach

                        </div>
                    @endif

                    <span class="jurusan-selengkapnya">
                        Selengkapnya →
                    </span>

                </div>

            </a>

        @endforeach

    </div>

</section>

<!-- ================= BERITA TERBARU ================= -->
<section class="news-section">

    <div class="section-heading">

        <div>
            <span class="section-label">
                · INFORMASI
            </span>

            <h2>Berita Terbaru</h2>

            <p>
                Pengumuman, kegiatan, dan informasi terkini dari sekolah.
            </p>
        </div>

    </div>


    <!-- FRAME BERITA -->
    <div class="news-frame">

        <div class="news-grid">

            @foreach ($beritas as $berita)

                <!-- CARD BERITA -->
                <a href="{{ route('berita.detail', $berita->slug) }}" class="news-card">

                    <div class="news-image">
                        <img
                            src="{{ $berita->url_gambar }}"
                            alt="{{ $berita->judul }}"
                        >
                    </div>

                    <div class="news-content">

                        <div class="news-meta">

                            <span class="news-category">
                                {{ $berita->kategori }}
                            </span>

                            <span class="news-date">
                                <i class="bi bi-calendar3"></i>
                                {{ $berita->tanggal->translatedFormat('d F Y') }}
                            </span>

                        </div>

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

    </div>

</section>

<!-- ================= GALERI ================= -->
<section class="gallery-section">

    <span class="section-label">
        · GALERI
    </span>

    <h2>Galeri Kegiatan</h2>

    <p class="gallery-description">
        Lihat dokumentasi kegiatan, acara, dan aktivitas siswa di sekolah.
    </p>


    <div class="gallery-grid">

        <!-- GALERI 1 -->
        <div class="gallery-item">
            <img
                src="{{ asset('images/silat.jpeg') }}"
                alt="Kegiatan siswa"
            >
        </div>


        <!-- GALERI 2 -->
        <div class="gallery-item">
            <img
                src="{{ asset('images/bola.jpeg') }}"
                alt="Kegiatan olahraga siswa"
            >
        </div>


        <!-- GALERI 3 -->
        <div class="gallery-item">
            <img
                src="{{ asset('images/basket.jpeg') }}"
                alt="Kegiatan siswa"
            >
        </div>


        <!-- GALERI 4 -->
        <div class="gallery-item">
            <img
                src="{{ asset('images/jalan sehat.jpeg') }}"
                alt="Kegiatan sekolah"
            >
        </div>


        <!-- GALERI 5 -->
        <div class="gallery-item">
            <img
                src="{{ asset('images/onta.jpeg') }}"
                alt="Kegiatan sekolah"
            >
        </div>


<!-- GALERI 6 -->
<a
    href="{{ route('galeri') }}"
    class="gallery-item gallery-more"
>

    <img
        src="{{ asset('images/pramuka.jpeg') }}"
        alt="Kegiatan lainnya"
    >

    <div class="gallery-overlay"></div>

    <span class="gallery-button">
        Kegiatan Lainnya
    </span>

</a>

</section>


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