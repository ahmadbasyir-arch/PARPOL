<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PARPOL - Partai Politik Republik Indonesia') | Suara Rakyat, Masa Depan Bangsa</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --parpol-primary: #b91c1c; /* Merah Marun Tegas */
            --parpol-primary-hover: #991b1b;
            --parpol-secondary: #0f172a; /* Slate / Navy Elegan */
            --parpol-accent: #f59e0b; /* Emas / Amber Kehormatan */
            --parpol-light: #f8fafc;
            --parpol-gray: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1e293b;
            background-color: #f8fafc;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--parpol-secondary);
            color: #94a3b8;
            font-size: 0.85rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .top-bar a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s;
        }

        .top-bar a:hover {
            color: var(--parpol-accent);
        }

        /* Navbar */
        .navbar-parpol {
            background: #ffffff;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.07);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand .logo-symbol {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--parpol-primary), #dc2626);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.4rem;
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.35);
        }

        .navbar-brand .brand-title {
            font-weight: 800;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
            color: var(--parpol-secondary);
            line-height: 1.1;
        }

        .navbar-brand .brand-sub {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--parpol-primary);
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .nav-link {
            font-weight: 600;
            color: #334155 !important;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            color: var(--parpol-primary) !important;
            background-color: #fef2f2;
        }

        .btn-parpol {
            background-color: var(--parpol-primary);
            color: #ffffff;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 14px rgba(185, 28, 28, 0.3);
            transition: all 0.25s ease;
        }

        .btn-parpol:hover {
            background-color: var(--parpol-primary-hover);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(185, 28, 28, 0.4);
        }

        .btn-parpol-outline {
            background: transparent;
            color: #ffffff;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.85);
            transition: all 0.25s ease;
        }

        .btn-parpol-outline:hover {
            background: #ffffff;
            color: var(--parpol-secondary);
            transform: translateY(-2px);
        }

        /* Section Titles */
        .section-badge {
            display: inline-block;
            background: #fee2e2;
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
            font-size: 2.3rem;
            color: var(--parpol-secondary);
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--parpol-gray);
            font-size: 1.05rem;
            max-width: 680px;
            margin: 0 auto;
        }

        /* Cards */
        .custom-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px -4px rgba(15, 23, 42, 0.12);
            border-color: #cbd5e1;
        }

        /* Footer */
        .footer-parpol {
            background-color: #0b1120;
            color: #94a3b8;
            padding-top: 70px;
            padding-bottom: 30px;
            border-top: 4px solid var(--parpol-primary);
        }

        .footer-parpol h5 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.2s;
        }

        .footer-links a:hover {
            color: var(--parpol-accent);
            padding-left: 6px;
        }

        .social-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #1e293b;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e1;
            margin-right: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .social-circle:hover {
            background: var(--parpol-primary);
            color: #ffffff;
            transform: translateY(-3px);
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Bar Informasi DPP -->
    <div class="top-bar d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> Kantor DPP: Jl. Kebangsaan Raya No. 45, Jakarta Pusat</span>
                    <span class="mx-3 text-muted">|</span>
                    <span><i class="bi bi-envelope-fill text-danger me-1"></i> sekretariat@parpol.or.id</span>
                </div>
                <div class="col-md-5 text-end">
                    <span><i class="bi bi-telephone-fill text-danger me-1"></i> Hotline: (021) 555-PARPOL</span>
                    <span class="mx-2 text-muted">|</span>
                    <a href="#aspirasi" class="fw-semibold">Layanan Aspirasi Publik</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-lg navbar-parpol">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('parpol.home') }}">
                <img src="{{ asset('images/logo-parpol.svg') }}" alt="Logo PARPOL" width="46" height="46" class="rounded-circle shadow-sm">
                <div>
                    <div class="brand-title d-flex align-items-center gap-2">
                        <span>PARPOL</span>
                        <span class="badge bg-danger text-warning border border-warning-subtle small py-1 px-2" style="font-size: 0.7rem; letter-spacing: 0;">NO. 24</span>
                    </div>
                    <div class="brand-sub">Partai Pelopor Reformasi & Kedaulatan Rakyat</div>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarParpolMenu" aria-controls="navbarParpolMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarParpolMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#legalitas"><i class="bi bi-file-earmark-check me-1"></i> Legalitas & Lambang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang"><i class="bi bi-info-circle me-1"></i> Visi & Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pimpinan"><i class="bi bi-people me-1"></i> Pimpinan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#program"><i class="bi bi-award me-1"></i> Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita"><i class="bi bi-newspaper me-1"></i> Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aspirasi"><i class="bi bi-chat-quote me-1"></i> Aspirasi</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-parpol text-decoration-none" href="#daftar-kader">
                            <i class="bi bi-person-plus-fill me-1"></i> Gabung Kader
                        </a>
                    </li>
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
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="logo-symbol">
                            <i class="bi bi-flag-fill"></i>
                        </div>
                        <div>
                            <h4 class="text-white fw-bold m-0">PARPOL</h4>
                            <span class="text-danger fw-semibold small text-uppercase">Partai Politik Rakyat</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-4">
                        Wadah persatuan, perjuangan demokrasi, dan kedaulatan rakyat Indonesia untuk mewujudkan keadilan sosial, kemandirian ekonomi, dan kemajuan peradaban bangsa.
                    </p>
                    <div class="d-flex">
                        <a href="#" class="social-circle" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-circle" title="Twitter / X"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-circle" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-circle" title="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-circle" title="TikTok"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5>Navigasi</h5>
                    <ul class="footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang PARPOL</a></li>
                        <li><a href="#pimpinan">Struktur Pengurus</a></li>
                        <li><a href="#program">Program Aksi</a></li>
                        <li><a href="#berita">Kabar & Publikasi</a></li>
                        <li><a href="#aspirasi">Suara Konstituen</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Informasi & Dokumen</h5>
                    <ul class="footer-links">
                        <li><a href="#!"><i class="bi bi-file-earmark-pdf me-1"></i> Anggaran Dasar (AD/ART)</a></li>
                        <li><a href="#!"><i class="bi bi-shield-check me-1"></i> Pakta Integritas Kader</a></li>
                        <li><a href="#!"><i class="bi bi-journal-check me-1"></i> Maklumat Keterbukaan Publik</a></li>
                        <li><a href="#!"><i class="bi bi-card-checklist me-1"></i> Verifikasi e-KTA Online</a></li>
                        <li><a href="#!"><i class="bi bi-buildings me-1"></i> Kantor Wilayah & DPD</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Sekretariat Jenderal</h5>
                    <p class="small text-secondary mb-2">
                        <strong class="text-white">Dewan Pimpinan Pusat (DPP) PARPOL</strong><br>
                        Gedung Graha Persatuan Indonesia Lantai 1-5<br>
                        Jl. Kebangsaan Raya No. 45, Gambir, Jakarta Pusat 10110
                    </p>
                    <p class="small text-secondary mb-1">
                        <i class="bi bi-telephone text-danger me-2"></i> +62 (21) 555-PARPOL
                    </p>
                    <p class="small text-secondary">
                        <i class="bi bi-envelope text-danger me-2"></i> dpp@parpol.or.id
                    </p>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="row align-items-center small text-secondary">
                <div class="col-md-6 text-center text-md-start">
                    &copy; 2026 <strong>PARPOL</strong> (Partai Politik). Seluruh Hak Cipta Dilindungi Undang-Undang.
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <span class="me-3">Laravel Framework {{ app()->version() }}</span>
                    <span>Indonesia Maju & Berdaulat</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
