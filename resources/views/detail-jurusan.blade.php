<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $jurusan->nama }} - SMKN 4 Bogor</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail-jurusan.css') }}">
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


    <!-- ================= DETAIL JURUSAN ================= -->
    <main class="jdetail-main">

        <a href="{{ route('home') }}" class="article-back">
            ← Kembali ke Beranda
        </a>


        <!-- HEADER JURUSAN -->
        <article class="jdetail-hero">

            <div class="jdetail-image">

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

            <div class="jdetail-head">

                <span class="jurusan-badge">
                    {{ $jurusan->singkatan }}
                </span>

                <h1>
                    {{ $jurusan->nama }}
                </h1>

                <p>
                    {{ $jurusan->deskripsi }}
                </p>

                @if ($jurusan->kepala_jurusan)
                    <div class="jdetail-kajur">
                        <span class="jdetail-kajur-icon">
                            <i class="bi bi-person-badge"></i>
                        </span>
                        <div>
                            <span>Kepala Jurusan</span>
                            <strong>{{ $jurusan->kepala_jurusan }}</strong>
                        </div>
                    </div>
                @endif

            </div>

        </article>


        <!-- KOMPETENSI -->
        @if ($jurusan->kompetensi)
            <section class="jdetail-section">

                <h2>
                    <i class="bi bi-list-check"></i>
                    Kompetensi yang Dipelajari
                </h2>

                <ul class="jdetail-list">

                    @foreach (preg_split('/\r\n|\r|\n/', $jurusan->kompetensi) as $item)
                        @if (trim($item) !== '')
                            <li>{{ trim($item) }}</li>
                        @endif
                    @endforeach

                </ul>

            </section>
        @endif


        <!-- PELUANG KARIER -->
        @if ($jurusan->peluang_kerja)
            <section class="jdetail-section">

                <h2>
                    <i class="bi bi-briefcase"></i>
                    Peluang Karier &amp; Studi Lanjut
                </h2>

                <div class="jdetail-karier-grid">

                    @foreach (preg_split('/\r\n|\r|\n/', $jurusan->peluang_kerja) as $item)
                        @if (trim($item) !== '')
                            <span class="jdetail-karier-item">
                                {{ trim($item) }}
                            </span>
                        @endif
                    @endforeach

                </div>

            </section>
        @endif

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