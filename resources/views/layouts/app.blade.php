<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Data Partai Politik Kab. Tanah Laut Tahun 2026 | Portal Resmi')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --parpol-primary: #1e3a8a; /* Biru Pemerintahan Elegan */
            --parpol-primary-hover: #172554;
            --parpol-secondary: #0f172a; /* Slate / Navy */
            --parpol-accent: #dc2626; /* Merah Tegas */
            --parpol-gold: #f59e0b; /* Kuning Emas */
            --parpol-light: #f8fafc;
            --parpol-gray: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1e293b;
            background-color: #f1f5f9;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--parpol-secondary);
            color: #94a3b8;
            font-size: 0.82rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .top-bar a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s;
        }

        .top-bar a:hover {
            color: var(--parpol-gold);
        }

        /* Navbar */
        .navbar-parpol {
            background: #ffffff;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.07);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand .logo-emblem {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #1e3a8a, #0284c7);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.4rem;
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);
        }

        .navbar-brand .brand-title {
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--parpol-secondary);
            line-height: 1.15;
            letter-spacing: -0.3px;
        }

        .navbar-brand .brand-sub {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--parpol-accent);
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .nav-link {
            font-weight: 600;
            color: #334155 !important;
            padding: 8px 12px !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.88rem;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
        }

        .nav-link:hover {
            color: var(--parpol-primary) !important;
            background-color: #eff6ff;
        }

        .btn-parpol {
            background-color: var(--parpol-primary);
            color: #ffffff;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid var(--parpol-primary);
            box-shadow: 0 2px 8px rgba(30, 58, 138, 0.2);
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.86rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-parpol:hover {
            background-color: var(--parpol-primary-hover);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
        }

        .btn-login-portal {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #0f172a !important;
            font-weight: 700;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid #d97706;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.25);
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.86rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-login-portal:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            color: #ffffff !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(217, 119, 6, 0.35);
        }

        .btn-user-portal {
            background-color: #ffffff;
            color: #1e293b !important;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 8px;
            border: 1.5px solid #0f766e;
            box-shadow: 0 2px 6px rgba(15, 118, 110, 0.15);
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.86rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-user-portal:hover {
            background-color: #f0fdfa;
            border-color: #0d9488;
        }

        /* Section Titles */
        .section-badge {
            display: inline-block;
            background: #dbeafe;
            color: var(--parpol-primary);
            font-weight: 700;
            font-size: 0.8rem;
            padding: 6px 16px;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .section-title {
            font-weight: 800;
            font-size: 2.2rem;
            color: var(--parpol-secondary);
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--parpol-gray);
            font-size: 1.02rem;
            max-width: 720px;
            margin: 0 auto;
        }

        /* Custom Cards */
        .custom-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -4px rgba(15, 23, 42, 0.1);
            border-color: #cbd5e1;
        }

        /* Footer */
        .footer-parpol {
            background-color: #0b1120;
            color: #94a3b8;
            padding-top: 60px;
            padding-bottom: 30px;
            border-top: 4px solid var(--parpol-primary);
        }

        .footer-parpol h5 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: var(--parpol-gold);
            padding-left: 5px;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Bar Informasi Wilayah -->
    <div class="top-bar d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> Kabupaten Tanah Laut, Provinsi Kalimantan Selatan</span>
                    <span class="mx-3 text-muted">|</span>
                    <span><i class="bi bi-calendar-event me-1 text-warning"></i> Data Resmi Pemilu & Kepengurusan Tahun 2026</span>
                </div>
                <div class="col-md-5 text-end">
                    <span><i class="bi bi-building me-1 text-info"></i> Sekretariat Wilayah: Kec. Pelaihari & Batu Ampar</span>
                    <span class="mx-2 text-muted">|</span>
                    <a href="{{ route('parpol.cetak') }}" target="_blank" class="fw-semibold text-warning">
                        <i class="bi bi-printer me-1"></i> Cetak Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-xl navbar-parpol shadow-sm sticky-top">
        <div class="container-fluid px-xl-5 px-3">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('parpol.home') }}">
                <div class="logo-emblem">
                    <i class="bi bi-bank2"></i>
                </div>
                <div>
                    <div class="brand-title">SIPARPOL TANAH LAUT</div>
                    <div class="brand-sub">Kab. Tanah Laut Tahun 2026</div>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-xl-0 align-items-xl-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parpol.home') }}#beranda"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parpol.home') }}#tabel-data"><i class="bi bi-table me-1"></i> Tabel Resmi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parpol.home') }}#galeri-partai"><i class="bi bi-grid-3x3-gap me-1"></i> Direktori Parpol</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parpol.home') }}#dikpol"><i class="bi bi-mortarboard-fill me-1"></i> Pendidikan Politik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parpol.home') }}#sebaran"><i class="bi bi-geo me-1"></i> Sebaran Kantor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parpol.home') }}#lapor"><i class="bi bi-pencil-square me-1"></i> Update Data LO</a>
                    </li>
                </ul>

                <!-- Tombol Aksi di Pojok Kanan Atas -->
                <div class="d-flex align-items-center gap-2 ms-xl-3 mt-3 mt-xl-0">
                    <a class="btn-parpol text-decoration-none" href="{{ route('parpol.cetak') }}" target="_blank">
                        <i class="bi bi-printer-fill"></i> Cetak Dokumen
                    </a>
                    
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-user-portal dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle text-primary fs-6"></i>
                                <span>{{ auth()->user()->isParpol() ? (auth()->user()->parpol->akronim ?? 'Partai') : 'Admin Bakesbangpol' }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2" style="min-width: 230px;">
                                <li class="px-3 py-2 border-bottom bg-light">
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">{{ auth()->user()->isAdmin() ? 'Superadmin Bakesbangpol' : 'Operator / Pengurus Partai' }}</small>
                                    <strong class="text-dark small">{{ auth()->user()->name }}</strong>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 small" href="{{ route('dashboard') }}">
                                        <i class="bi bi-speedometer2 text-primary me-2"></i> Dashboard Pelaporan
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 small text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> Keluar (Logout)
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="btn-login-portal text-decoration-none" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login Portal
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-parpol">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="logo-emblem">
                            <i class="bi bi-bank2"></i>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold m-0">SIPARPOL KABUPATEN TANAH LAUT</h5>
                            <span class="text-danger fw-semibold small text-uppercase">Portal Transparansi Partai Politik 2026</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3" style="line-height: 1.7;">
                        Sistem informasi publik yang menyajikan data otentik legalitas surat keputusan kepengurusan, jajaran pengurus (Ketua, Sekretaris, Bendahara), alamat sekretariat, kontak Liaison Officer (LO), serta status kelengkapan dokumen (SK3P3) 20 partai politik di Kabupaten Tanah Laut, Kalimantan Selatan.
                    </p>
                    <div class="small text-muted">
                        <i class="bi bi-shield-check text-success me-1"></i> Data Terdaftar Resmi Sesuai Rekapitulasi Parpol Tanah Laut 2026.
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Navigasi Direktori</h5>
                    <ul class="footer-links">
                        <li><a href="#tabel-data">Tabel Dokumen Resmi (20 Parpol)</a></li>
                        <li><a href="#galeri-partai">Galeri Logo & Profil DPC/DPD</a></li>
                        <li><a href="#dikpol">Matriks Pendidikan Politik (Banpol)</a></li>
                        <li><a href="#sebaran">Sebaran Kantor Kecamatan Pelaihari & Batu Ampar</a></li>
                        <li><a href="{{ route('parpol.cetak') }}" target="_blank">Unduh / Cetak Dokumen Lengkap (A4)</a></li>
                        <li><a href="#lapor">Layanan Pengkinian Data Pengurus Parpol</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5>Wilayah Administrasi</h5>
                    <p class="small text-secondary mb-2">
                        <strong class="text-white">Kabupaten Tanah Laut, Kalimantan Selatan</strong><br>
                        Pusat Pemerintahan: Kota Pelaihari 70814<br>
                        Cakupan Sekretariat: Kel. Angsau, Sarang Halang, Karang Taruna, Pabahanan, Pelaihari, Desa Atu Atu, Desa Panggung & Kec. Batu Ampar.
                    </p>
                    <p class="small text-secondary mb-1">
                        <i class="bi bi-info-circle text-primary me-2"></i> Sumber Data: Lembar Rekapitulasi Partai Politik Kab. Tanah Laut 2026
                    </p>
                    <p class="small text-secondary">
                        <i class="bi bi-check2-all text-success me-2"></i> Rekapitulasi Lengkap 20 Partai Politik
                    </p>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="row align-items-center small text-secondary">
                <div class="col-md-7 text-center text-md-start">
                    &copy; 2026 <strong>SIPARPOL Kabupaten Tanah Laut</strong>. Sistem Informasi Data Partai Politik.
                </div>
                <div class="col-md-5 text-center text-md-end mt-2 mt-md-0">
                    <span class="badge bg-secondary me-2">20 Partai Politik</span>
                    <span>Pelaihari &bull; Tanah Laut &bull; Kalsel</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
