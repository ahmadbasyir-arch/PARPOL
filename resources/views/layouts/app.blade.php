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
            padding: 8px 14px !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.92rem;
        }

        .nav-link:hover {
            color: var(--parpol-primary) !important;
            background-color: #eff6ff;
        }

        .btn-parpol {
            background-color: var(--parpol-primary);
            color: #ffffff;
            font-weight: 600;
            padding: 9px 20px;
            border-radius: 9px;
            border: none;
            box-shadow: 0 4px 14px rgba(30, 58, 138, 0.25);
            transition: all 0.25s ease;
        }

        .btn-parpol:hover {
            background-color: var(--parpol-primary-hover);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(30, 58, 138, 0.35);
        }

        /* Portal Switcher Dropdown */
        .portal-dropdown-btn {
            background: #ffffff;
            border: 1.5px solid #e2e8f0;
            color: #1e293b !important;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 7px 14px !important;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        }

        .portal-dropdown-btn:hover, .portal-dropdown-btn:focus {
            background: #f8fafc;
            border-color: #94a3b8;
            transform: translateY(-1px);
        }

        .dropdown-menu-portal {
            min-width: 310px;
            padding: 8px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.18);
        }

        .portal-option-item {
            padding: 10px 12px;
            border-radius: 10px;
            transition: all 0.2s;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #1e293b;
        }

        .portal-option-item:hover {
            background: #f1f5f9;
        }

        .portal-option-item.active-portal {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }

        .portal-option-item.active-wasbang {
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .logo-emblem-wasbang {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #b91c1c, #dc2626);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.4rem;
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.25);
        }

        .btn-wasbang {
            background-color: #b91c1c;
            color: #ffffff;
            font-weight: 600;
            padding: 9px 20px;
            border-radius: 9px;
            border: none;
            box-shadow: 0 4px 14px rgba(185, 28, 28, 0.25);
            transition: all 0.25s ease;
        }

        .btn-wasbang:hover {
            background-color: #991b1b;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(185, 28, 28, 0.35);
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
                <div class="col-md-6">
                    @if(request()->routeIs('wasbang.*'))
                        <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> Bakesbangpol Kab. Tanah Laut &bull; Bidang Bina Ideologi &amp; Wasbang</span>
                        <span class="mx-2 text-muted">|</span>
                        <span><i class="bi bi-shield-fill-check text-warning me-1"></i> Pengarsipan Kegiatan Lapangan 2026</span>
                    @else
                        <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> Kabupaten Tanah Laut, Provinsi Kalimantan Selatan</span>
                        <span class="mx-3 text-muted">|</span>
                        <span><i class="bi bi-calendar-event me-1 text-warning"></i> Data Resmi Pemilu & Kepengurusan Tahun 2026</span>
                    @endif
                </div>
                <div class="col-md-6 text-end d-flex align-items-center justify-content-end gap-2">
                    <a href="{{ route('portal.home') }}" class="badge bg-secondary text-white text-decoration-none py-1 px-2 me-1">
                        <i class="bi bi-grid-fill me-1"></i> Daftar Modul
                    </a>
                    <span class="small text-muted me-1"><i class="bi bi-arrow-left-right me-1"></i> Pindah Halaman:</span>
                    <a href="{{ route('parpol.home') }}" class="badge {{ !request()->routeIs('wasbang.*') ? 'bg-primary text-white' : 'bg-dark text-white-50 border border-secondary' }} text-decoration-none py-1 px-2">
                        <i class="bi bi-bank2 me-1"></i> SIPARPOL
                    </a>
                    <a href="{{ route('wasbang.index') }}" class="badge {{ request()->routeIs('wasbang.*') ? 'bg-danger text-white' : 'bg-dark text-white-50 border border-secondary' }} text-decoration-none py-1 px-2">
                        <i class="bi bi-flag-fill me-1"></i> WASBANG
                    </a>
                    <span class="mx-2 text-muted">|</span>
                    @if(request()->routeIs('wasbang.*'))
                        <a href="{{ route('wasbang.cetak') }}" target="_blank" class="fw-semibold text-warning">
                            <i class="bi bi-printer me-1"></i> Cetak Rekap Wasbang
                        </a>
                    @else
                        <a href="{{ route('parpol.cetak') }}" target="_blank" class="fw-semibold text-warning">
                            <i class="bi bi-printer me-1"></i> Cetak Dokumen
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-lg navbar-parpol">
        <div class="container">
            @if(request()->routeIs('wasbang.*'))
                <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('wasbang.index') }}">
                    <div class="logo-emblem-wasbang">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <div>
                        <div class="brand-title text-danger">WASBANG TANAH LAUT</div>
                        <div class="brand-sub text-dark">Bina Ideologi, Wawasan Kebangsaan &amp; Karakter Bangsa</div>
                    </div>
                </a>
            @else
                <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('parpol.home') }}">
                    <div class="logo-emblem">
                        <i class="bi bi-bank2"></i>
                    </div>
                    <div>
                        <div class="brand-title">SIPARPOL TANAH LAUT</div>
                        <div class="brand-sub">Data Partai Politik Kab. Tanah Laut Tahun 2026</div>
                    </div>
                </a>
            @endif
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                    @if(request()->routeIs('wasbang.*'))
                        <li class="nav-item">
                            <a class="nav-link" href="#beranda-wasbang"><i class="bi bi-house-door me-1"></i> Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#statistik-wasbang"><i class="bi bi-pie-chart me-1"></i> Statistik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#arsip-kegiatan"><i class="bi bi-journal-album me-1"></i> Arsip Dokumentasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tambah-kegiatan"><i class="bi bi-plus-circle me-1"></i> + Arsip Baru</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#beranda"><i class="bi bi-house-door me-1"></i> Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabel-data"><i class="bi bi-table me-1"></i> Tabel Resmi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#galeri-partai"><i class="bi bi-grid-3x3-gap me-1"></i> Direktori Parpol (20)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sebaran"><i class="bi bi-geo me-1"></i> Sebaran Kantor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#lapor"><i class="bi bi-pencil-square me-1"></i> Update Data LO</a>
                        </li>
                    @endif

                    <!-- Dropdown Berpindah Halaman (SIPARPOL <-> WASBANG) -->
                    <li class="nav-item dropdown ms-lg-2 my-2 my-lg-0">
                        <button class="btn portal-dropdown-btn dropdown-toggle" type="button" id="portalDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(request()->routeIs('wasbang.*'))
                                <span class="badge bg-danger text-white px-2 py-1"><i class="bi bi-flag-fill me-1"></i> WASBANG</span>
                            @else
                                <span class="badge bg-primary text-white px-2 py-1"><i class="bi bi-bank2 me-1"></i> SIPARPOL</span>
                            @endif
                            <span class="d-none d-sm-inline">Pindah Bidang</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-portal dropdown-menu-end" aria-labelledby="portalDropdown">
                            <li>
                                <a class="portal-option-item" href="{{ route('portal.home') }}">
                                    <div class="logo-emblem" style="width: 38px; height: 38px; font-size: 1.1rem; border-radius: 9px; background: #0f172a;">
                                        <i class="bi bi-grid-fill"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold text-dark" style="font-size: 0.9rem;">Daftar Modul Utama</div>
                                        <div class="text-muted small" style="font-size: 0.76rem;">Kembali ke Beranda Smart Portal</div>
                                    </div>
                                    <i class="bi bi-arrow-right-short text-muted fs-5"></i>
                                </a>
                            </li>
                            <li class="my-1"><hr class="dropdown-divider my-1"></li>
                            <li class="px-2 py-1 mb-1">
                                <span class="text-muted fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.8px;">Pilih Modul Aktif</span>
                            </li>
                            <li>
                                <a class="portal-option-item {{ !request()->routeIs('wasbang.*') ? 'active-portal' : '' }}" href="{{ route('parpol.home') }}">
                                    <div class="logo-emblem" style="width: 38px; height: 38px; font-size: 1.1rem; border-radius: 9px;">
                                        <i class="bi bi-bank2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold text-dark" style="font-size: 0.9rem;">SIPARPOL TANAH LAUT</div>
                                        <div class="text-muted small" style="font-size: 0.76rem;">Portal Data 20 Partai Politik 2026</div>
                                    </div>
                                    @if(!request()->routeIs('wasbang.*'))
                                        <span class="badge bg-primary rounded-pill"><i class="bi bi-check2"></i> Aktif</span>
                                    @endif
                                </a>
                            </li>
                            <li class="my-1"><hr class="dropdown-divider my-1"></li>
                            <li>
                                <a class="portal-option-item {{ request()->routeIs('wasbang.*') ? 'active-wasbang' : '' }}" href="{{ route('wasbang.index') }}">
                                    <div class="logo-emblem-wasbang" style="width: 38px; height: 38px; font-size: 1.1rem; border-radius: 9px;">
                                        <i class="bi bi-flag-fill"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-bold text-danger" style="font-size: 0.9rem;">WASBANG TANAH LAUT</div>
                                        <div class="text-muted small" style="font-size: 0.76rem;">Pengarsipan Dokumentasi Lapangan</div>
                                    </div>
                                    @if(request()->routeIs('wasbang.*'))
                                        <span class="badge bg-danger rounded-pill"><i class="bi bi-check2"></i> Aktif</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </li>

                    @if(request()->routeIs('wasbang.*'))
                        <li class="nav-item ms-lg-1 mt-2 mt-lg-0">
                            <a class="btn btn-wasbang text-decoration-none" href="{{ route('wasbang.cetak') }}" target="_blank">
                                <i class="bi bi-printer-fill me-1"></i> Cetak Rekap Wasbang
                            </a>
                        </li>
                    @else
                        <li class="nav-item ms-lg-1 mt-2 mt-lg-0">
                            <a class="btn btn-parpol text-decoration-none" href="{{ route('parpol.cetak') }}" target="_blank">
                                <i class="bi bi-printer-fill me-1"></i> Cetak Laporan Resmi
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-parpol">
        <div class="container">
            @if(request()->routeIs('wasbang.*'))
                <div class="row g-4 mb-4">
                    <div class="col-lg-5 col-md-6">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="logo-emblem-wasbang">
                                <i class="bi bi-flag-fill"></i>
                            </div>
                            <div>
                                <h5 class="text-white fw-bold m-0">BIDANG BINA IDEOLOGI &amp; WASBANG</h5>
                                <span class="text-danger fw-semibold small text-uppercase">Bakesbangpol Kabupaten Tanah Laut</span>
                            </div>
                        </div>
                        <p class="text-secondary small mb-3" style="line-height: 1.7;">
                            Sistem Pengarsipan Dokumentasi Laporan Kegiatan Luar Lapangan resmi Bidang Bina Ideologi, Wawasan Kebangsaan, dan Karakter Bangsa. Menyajikan rekaman otentik foto, video, berita acara pelaksanaan di lapangan, serta berkas pelaporan yang dapat diunduh langsung.
                        </p>
                        <div class="small text-muted">
                            <i class="bi bi-shield-fill-check text-success me-1"></i> Sistem Dokumentasi Kegiatan Luar Bakesbangpol Kab. Tanah Laut.
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5>Navigasi Arsip Wasbang</h5>
                        <ul class="footer-links">
                            <li><a href="#arsip-kegiatan">Semua Dokumentasi Kegiatan Luar</a></li>
                            <li><a href="#tambah-kegiatan">Formulir Tambah Dokumentasi Baru</a></li>
                            <li><a href="#statistik-wasbang">Statistik &amp; Capaian Lapangan</a></li>
                            <li><a href="{{ route('wasbang.cetak') }}" target="_blank">Unduh / Cetak Rekapitulasi Berkas (A4)</a></li>
                            <li><a href="{{ route('parpol.home') }}">Beralih ke Portal SIPARPOL</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h5>Wilayah &amp; Subbidang</h5>
                        <p class="small text-secondary mb-2">
                            <strong class="text-white">Badan Kesatuan Bangsa dan Politik Kab. Tanah Laut</strong><br>
                            Subbidang Bina Ideologi &amp; Wawasan Kebangsaan<br>
                            Subbidang Bina Karakter Bangsa &amp; Pembauran
                        </p>
                        <p class="small text-secondary mb-1">
                            <i class="bi bi-geo-alt-fill text-danger me-2"></i> Jl. A. Yani, Kompleks Perkantoran Gagas, Pelaihari 70814
                        </p>
                        <p class="small text-secondary">
                            <i class="bi bi-check2-all text-success me-2"></i> Pengarsipan Foto, Video &amp; Unduhan Resmi
                        </p>
                    </div>
                </div>

                <hr class="border-secondary my-4">

                <div class="row align-items-center small text-secondary">
                    <div class="col-md-7 text-center text-md-start">
                        &copy; 2026 <strong>Bidang Bina Ideologi, Wawasan Kebangsaan &amp; Karakter Bangsa</strong>. Bakesbangpol Kab. Tanah Laut.
                    </div>
                    <div class="col-md-5 text-center text-md-end mt-2 mt-md-0">
                        <span class="badge bg-danger me-2">Dokumentasi Luar Lapangan</span>
                        <span>Pelaihari &bull; Tanah Laut &bull; Kalsel</span>
                    </div>
                </div>
            @else
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
                            <li><a href="#galeri-partai">Galeri Logo &amp; Profil DPC/DPD</a></li>
                            <li><a href="#sebaran">Sebaran Kantor Kecamatan Pelaihari &amp; Batu Ampar</a></li>
                            <li><a href="{{ route('parpol.cetak') }}" target="_blank">Unduh / Cetak Dokumen Lengkap (A4)</a></li>
                            <li><a href="{{ route('wasbang.index') }}">Beralih ke Portal WASBANG (Kegiatan Luar)</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h5>Wilayah Administrasi</h5>
                        <p class="small text-secondary mb-2">
                            <strong class="text-white">Kabupaten Tanah Laut, Kalimantan Selatan</strong><br>
                            Pusat Pemerintahan: Kota Pelaihari 70814<br>
                            Cakupan Sekretariat: Kel. Angsau, Sarang Halang, Karang Taruna, Pabahanan, Pelaihari, Desa Atu Atu, Desa Panggung &amp; Kec. Batu Ampar.
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
            @endif
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
