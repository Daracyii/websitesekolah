<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('judul', 'Admin') - SMKN 4 Bogor</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ADMIN ================= -->
    <nav class="admin-navbar">

        <div class="admin-nav-container">

            <!-- BRAND -->
            <div class="admin-brand">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo SMKN 4 Bogor"
                    class="admin-logo"
                >

                <div>
                    <div class="admin-brand-name">SMKN 4 BOGOR</div>
                    <div class="admin-brand-sub">Dashboard Admin · {{ auth()->user()->name }}</div>
                </div>
            </div>


            <!-- MENU -->
            <div class="admin-menu">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="admin-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                >
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>

                <a
                    href="{{ route('admin.jurusan.index') }}"
                    class="admin-menu-item {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-mortarboard"></i>
                    Jurusan
                </a>

                <a
                    href="{{ route('admin.berita.index') }}"
                    class="admin-menu-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-newspaper"></i>
                    Berita
                </a>

                                <a
                    href="{{ route('admin.galeri.index') }}"
                    class="admin-menu-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-images"></i>
                    Galeri
                </a>

                <a
                    href="{{ route('admin.komentar.index') }}"
                    class="admin-menu-item {{ request()->routeIs('admin.komentar.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-chat-dots"></i>
                    Komentar
                </a>

            </div>


            <!-- AKSI KANAN: WEBSITE + LOGOUT -->
            <div class="admin-nav-actions">

                <a href="{{ route('home') }}" class="admin-visit">
                    <i class="bi bi-box-arrow-up-left"></i>
                    Lihat Website
                </a>

                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    onsubmit="return confirm('Yakin ingin logout?')"
                >
                    @csrf
                    <button type="submit" class="admin-logout">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </nav>


    <!-- ================= ISI HALAMAN ================= -->
    <div class="admin-content">
        @yield('content')
    </div>

</body>

</html>