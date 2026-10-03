<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - SMKN 4 Bogor</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="bg-light">

    <div class="login-page">

        <!-- DEKORASI LATAR (bulat-bulat mengambang) -->
        <div class="login-shape login-shape-1"></div>
        <div class="login-shape login-shape-2"></div>
        <div class="login-shape login-shape-3"></div>


        <div class="login-panel">

            <!-- ================= SISI KIRI: BRANDING ================= -->
            <div class="login-hero">

                <div class="login-hero-badge">
                    <i class="bi bi-globe2"></i>
                    WEBSITE SMKN 4 BOGOR
                </div>

                <h2>
                    Selamat Datang<br>
                    Kembali, Admin! 👋
                </h2>

                <p>
                    Masuk untuk mengelola berita, jurusan,
                    dan galeri kegiatan sekolah —
                    semua dalam satu dashboard.
                </p>


                <!-- ILUSTRASI: kartu-kartu mengambang -->
                <div class="login-illustration">

                    <div class="login-float-card login-float-1">
                        <span class="login-float-icon"><i class="bi bi-newspaper"></i></span>
                        <div>
                            <strong>Berita</strong>
                            <small>Terkelola rapi</small>
                        </div>
                    </div>

                    <div class="login-float-card login-float-2">
                        <span class="login-float-icon"><i class="bi bi-mortarboard"></i></span>
                        <div>
                            <strong>Jurusan</strong>
                            <small>4 kompetensi keahlian</small>
                        </div>
                    </div>

                    <div class="login-float-card login-float-3">
                        <span class="login-float-icon"><i class="bi bi-images"></i></span>
                        <div>
                            <strong>Galeri</strong>
                            <small>Dokumentasi lengkap</small>
                        </div>
                    </div>

                </div>

            </div>


            <!-- ================= SISI KANAN: FORM ================= -->
            <div class="login-form-side">

                <div class="login-form-inner">

                    <!-- LOGO -->
                    <div class="login-brand">

                        <div class="login-logo-ring">
                            <img
                                src="{{ asset('images/logo.png') }}"
                                alt="Logo SMKN 4 Bogor"
                            >
                        </div>

                        <h1>SMKN 4 BOGOR</h1>
                        <p>Masuk ke Dashboard Admin</p>

                    </div>


                    <!-- PESAN -->
                    @if (session('sukses'))
                        <div class="alert alert-success admin-alert">
                            {{ session('sukses') }}
                        </div>
                    @endif

                    @if ($errors->has('login'))
                        <div class="alert alert-danger admin-alert">
                            {{ $errors->first('login') }}
                        </div>
                    @endif


                    <!-- FORM -->
                    <form method="POST" action="https://websitesekolah-production.up.railway.app/admin/login">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username</label>
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                class="form-control form-control-lg login-input"
                                placeholder="Masukkan username"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg login-input"
                                placeholder="Masukkan password"
                                required
                            >
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ingat" id="ingat">
                                <label class="form-check-label small" for="ingat">Ingat saya</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-teal w-100 py-2 fw-bold login-btn">
                            Masuk ke Dashboard →
                        </button>

                    </form>

                    <div class="login-footer">
                        <a href="{{ route('home') }}">
                            <i class="bi bi-arrow-left"></i> Kembali ke Website
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>