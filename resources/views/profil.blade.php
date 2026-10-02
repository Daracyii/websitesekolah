<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - SMKN 4 Bogor</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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


    <!-- ================= PROFILE LAYOUT ================= -->
    <main class="profile-layout">

        <!-- ================= SIDEBAR ================= -->
        <aside class="profile-sidebar">

            <div class="profile-menu-card">

                <!-- SIDEBAR HEADER -->
                <div class="profile-menu-header">

                    <div class="profile-menu-icon">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>

                    <div>
                        <h3>Profil</h3>
                        <p>Jelajahi Informasi Sekolah</p>
                    </div>

                </div>


                <!-- MENU (2 item di kotak kiri ini) -->
                <div class="profile-menu-list">

                    <a href="#dapodik" class="profile-menu-item active">
                        <i class="bi bi-database profile-item-icon"></i>
                        <span>Data Dapodik</span>
                    </a>

                    <a href="#tentang" class="profile-menu-item">
                        <i class="bi bi-building profile-item-icon"></i>
                        <span>Tentang Sekolah</span>
                    </a>

                </div>

            </div>

        </aside>


        <!-- ================= RIGHT CONTENT ================= -->
        <section class="profile-content">

            <div class="profile-content-inner">

                <!-- ================= REFERENSI DAPODIK ================= -->
                <section class="dapodik-card" id="dapodik">

                    <div class="dapodik-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        REFERENSI RESMI KEMENDIKDASMEN
                    </div>

                    <h1>SMK NEGERI 4 BOGOR</h1>

                    <p class="dapodik-description">
                        Data satuan pendidikan sesuai portal
                        <strong>referensi.data.kemendikdasmen.go.id</strong>
                        untuk NPSN
                    </p>

                    <div class="npsn-number">
                        20258095
                    </div>

                    <a
                        href="https://referensi.data.kemendikdasmen.go.id/pendidikan/npsn/20258095"
                        target="_blank"
                        rel="noopener"
                        class="npsn-link"
                    >
                        Buka sumber NPSN
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>

                </section>


                <!-- ================= LEGALITAS ================= -->
                <section class="legalitas-section">

                    <div class="profile-section-title">
                        <i class="bi bi-briefcase-fill title-icon"></i>
                        <h2>Legalitas dan Akreditasi</h2>
                    </div>

                    <div class="legalitas-table">

                        <div class="table-row">
                            <div class="table-label">Nama Satuan Pendidikan</div>
                            <div class="table-value">SMKN 4 Bogor</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">NPSN</div>
                            <div class="table-value">20258095</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Bentuk Pendidikan</div>
                            <div class="table-value">SMK - Sekolah Menengah Kejuruan</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Status Sekolah</div>
                            <div class="table-value">Negeri</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Naungan</div>
                            <div class="table-value">Pemerintah Daerah</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Kementerian Pembina</div>
                            <div class="table-value">Kementerian Pendidikan Dasar dan Menengah</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">NSM</div>
                            <div class="table-value">-</div>
                        </div>

                    </div>

                </section>


                <!-- ================= IDENTITAS SATUAN PENDIDIKAN ================= -->
                <section class="profile-section" id="tentang">

                    <h2 class="profile-title">
                        <i class="bi bi-person-vcard profile-title-icon"></i>
                        Identitas Satuan Pendidikan
                    </h2>

                    <div class="profile-table">

                        <div class="table-row">
                            <div class="table-label">SK Pendirian</div>
                            <div class="table-value">421-45-177 TAHUN 2009</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Tanggal SK Pendirian</div>
                            <div class="table-value">15-06-2009</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">SK Operasional</div>
                            <div class="table-value">421-45-177 TAHUN 2009</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Tanggal SK Operasional</div>
                            <div class="table-value">15-06-2009</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Tahun Berdiri</div>
                            <div class="table-value">2009</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Akreditasi</div>
                            <div class="table-value">A</div>
                        </div>

                    </div>

                </section>


                <!-- ================= WILAYAH & ALAMAT ================= -->
                <section class="profile-section">

                    <h2 class="profile-title">
                        <i class="bi bi-geo-alt profile-title-icon"></i>
                        Wilayah &amp; Alamat
                    </h2>

                    <div class="profile-table">

                        <div class="table-row">
                            <div class="table-label">Alamat</div>
                            <div class="table-value">KP. BUNTAR KELURAHAN MUARASARI</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Desa/Kelurahan</div>
                            <div class="table-value">MUARASARI</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Kecamatan</div>
                            <div class="table-value">KEC. KOTA BOGOR SELATAN</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Kabupaten/Kota</div>
                            <div class="table-value">KOTA BOGOR</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Provinsi</div>
                            <div class="table-value">JAWA BARAT</div>
                        </div>

                        <div class="table-row">
                            <div class="table-label">Koordinat (Lintang, Bujur)</div>
                            <div class="table-value">-6.6410733000000 , 106.8248083000000</div>
                        </div>

                    </div>

                </section>

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


    <!-- ================= SCRIPT MENU SIDEBAR ================= -->
    <script>
        document.querySelectorAll('.profile-menu-item').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelectorAll('.profile-menu-item').forEach(x => x.classList.remove('active'));
                item.classList.add('active');
            });
        });
    </script>


</body>

</html>