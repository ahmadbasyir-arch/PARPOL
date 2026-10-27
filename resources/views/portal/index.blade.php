<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Layanan Bidang | Portal Bakesbangpol Kabupaten Tanah Laut</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{ asset('images/portal/logo-tanah-laut.svg') }}" type="image/svg+xml">
    
    <style>
        :root {
            --portal-bg-img: url('{{ asset('images/portal/bg-sasirangan.jpg') }}');
            --portal-card-bg: rgba(255, 255, 255, 0.96);
            --portal-border: rgba(226, 232, 240, 0.85);
            --portal-text-dark: #1e293b;
            --portal-primary: #1e3a8a;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #070e1e;
            background-image: 
                radial-gradient(circle at 50% 18%, rgba(30, 58, 138, 0.32) 0%, rgba(7, 14, 30, 0.72) 60%, rgba(4, 8, 18, 0.92) 100%),
                var(--portal-bg-img);
            background-attachment: fixed;
            background-position: center top;
            background-repeat: no-repeat;
            background-size: cover;
            color: var(--portal-text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            transition: background-image 0.4s ease;
        }

        /* Top Navbar (Bersih & Resmi Glassmorphic) */
        .portal-navbar {
            background: rgba(255, 255, 255, 0.93);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.85);
            padding: 12px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .portal-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: inherit;
        }

        .portal-logo-emblem {
            width: 48px;
            height: 52px;
            background: #ffffff;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 6px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(226, 232, 240, 0.9);
            transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s ease;
            overflow: hidden;
            flex-shrink: 0;
        }

        .portal-brand:hover .portal-logo-emblem {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.14);
            border-color: #cbd5e1;
        }

        .portal-logo-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.08));
        }

        .portal-brand-text {
            font-weight: 800;
            font-size: 1.25rem;
            color: #0f172a;
            letter-spacing: -0.4px;
            line-height: 1.18;
        }

        .portal-brand-sub {
            font-size: 0.78rem;
            color: #475569;
            font-weight: 600;
            letter-spacing: 0.3px;
            margin-top: 2px;
        }

        .portal-header-info {
            font-size: 0.82rem;
            font-weight: 600;
            color: #1e3a8a;
            background: rgba(238, 242, 255, 0.95);
            padding: 7px 16px;
            border-radius: 20px;
            border: 1px solid rgba(199, 210, 254, 0.9);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 1px 3px rgba(30, 58, 138, 0.08);
        }

        /* Hero Showcase Section */
        .portal-hero {
            padding: 34px 0 26px;
            text-align: center;
        }

        .hero-emblem-wrapper {
            display: inline-block;
            position: relative;
            margin-bottom: 16px;
        }

        .hero-emblem-glow {
            width: 118px;
            height: auto;
            max-height: 125px;
            object-fit: contain;
            border-radius: 12px;
            filter: drop-shadow(0 12px 28px rgba(0, 0, 0, 0.55)) drop-shadow(0 0 24px rgba(250, 204, 21, 0.35));
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .hero-emblem-wrapper:hover .hero-emblem-glow {
            transform: translateY(-5px) scale(1.05);
        }

        .badge-official {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: #facc15;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(250, 204, 21, 0.45);
            padding: 6px 16px;
            border-radius: 30px;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.25);
        }

        .hero-heading {
            font-weight: 900;
            font-size: 2.15rem;
            color: #ffffff;
            letter-spacing: -0.5px;
            margin: 12px 0 6px;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.7);
        }

        .hero-desc {
            font-size: 0.94rem;
            color: #e2e8f0;
            font-weight: 500;
            max-width: 660px;
            margin: 0 auto;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
            opacity: 0.95;
        }

        /* Main Content */
        .portal-content {
            flex: 1;
            padding: 0 0 60px;
        }

        /* Container Card Glassmorphism */
        .card-portal-container {
            background-color: var(--portal-card-bg);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.85);
            border-radius: 18px;
            box-shadow: 0 20px 45px -10px rgba(0, 10, 30, 0.45), 0 0 1px 1px rgba(255, 255, 255, 0.6);
            padding: 28px 32px 34px;
            max-width: 1140px;
            margin: 0 auto;
        }

        .section-header {
            padding-bottom: 18px;
            margin-bottom: 24px;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .section-title {
            font-weight: 800;
            font-size: 1.25rem;
            color: #1e293b;
            margin: 0;
            letter-spacing: -0.3px;
        }

        /* Grid Pas 3 Kolom Memanjang Lebar */
        .module-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            width: 100%;
        }

        @media (max-width: 991px) {
            .module-grid-3 {
                grid-template-columns: 1fr;
            }
            .card-portal-container {
                padding: 22px 20px 26px;
            }
            .hero-heading {
                font-size: 1.7rem;
            }
        }

        /* Kartu Modul Memanjang Lebar (Landscape / Horizontal Card) */
        .module-card-wide {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
            color: inherit;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            min-height: 108px;
            width: 100%;
        }

        .module-card-wide:hover {
            background-color: #ffffff;
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: 0 10px 22px -4px rgba(15, 23, 42, 0.08);
            color: inherit;
        }

        .module-card-parpol:hover {
            border-color: #93c5fd;
            box-shadow: 0 12px 24px -4px rgba(30, 58, 138, 0.12);
        }

        .module-card-wasbang:hover {
            border-color: #fca5a5;
            box-shadow: 0 12px 24px -4px rgba(185, 28, 28, 0.12);
        }

        /* Slot Modul 3 (Placeholder / Persiapan) */
        .module-card-placeholder {
            background-color: #fafafa;
            border: 1.5px dashed #cbd5e1;
            opacity: 0.85;
            cursor: pointer;
        }

        .module-card-placeholder:hover {
            background-color: #ffffff;
            border-color: #94a3b8;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px -2px rgba(0, 0, 0, 0.05);
        }

        /* Icon Container Box */
        .module-icon-box {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: transform 0.25s ease;
        }

        .module-card-wide:hover .module-icon-box {
            transform: scale(1.08);
        }

        .module-icon-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Detail Teks */
        .module-info {
            flex-grow: 1;
            overflow: hidden;
        }

        .module-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.25;
            margin: 0 0 3px 0;
            letter-spacing: -0.2px;
            transition: color 0.2s;
        }

        .module-card-parpol:hover .module-title {
            color: #1e3a8a;
        }

        .module-card-wasbang:hover .module-title {
            color: #b91c1c;
        }

        .module-sub {
            font-size: 0.78rem;
            color: #64748b;
            margin: 0;
            font-weight: 500;
            line-height: 1.35;
        }

        /* Panah Aksi */
        .module-arrow {
            color: #cbd5e1;
            font-size: 1.15rem;
            transition: transform 0.2s ease, color 0.2s ease;
            flex-shrink: 0;
        }

        .module-card-wide:hover .module-arrow {
            color: #0f172a;
            transform: translateX(3px);
        }

        .module-card-parpol:hover .module-arrow {
            color: #1e3a8a;
        }

        .module-card-wasbang:hover .module-arrow {
            color: #b91c1c;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar (Resmi, Bersih, Glassmorphic) -->
    <header class="portal-navbar">
        <div class="container-xl px-4">
            <div class="d-flex align-items-center justify-content-between">
                
                <!-- Brand / Logo Instansi -->
                <a href="{{ route('portal.home') }}" class="portal-brand">
                    <div class="portal-logo-emblem">
                        <img src="{{ asset('images/portal/logo-tanah-laut.svg') }}" alt="Lambang Kabupaten Tanah Laut" class="portal-logo-img">
                    </div>
                    <div>
                        <div class="portal-brand-text">Portal Bakesbangpol</div>
                        <div class="portal-brand-sub d-none d-sm-block">Kabupaten Tanah Laut</div>
                    </div>
                </a>

                <!-- Keterangan Wilayah -->
                <div>
                    <span class="portal-header-info">
                        <i class="bi bi-geo-alt-fill text-danger"></i>
                        <span>Kab. Tanah Laut</span>
                    </span>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="portal-content">
        
        <!-- Hero Showcase Section -->
        <div class="portal-hero">
            <div class="container-xl px-4">
                <div class="hero-emblem-wrapper">
                    <img src="{{ asset('images/portal/logo-tanah-laut.svg') }}" alt="Lambang Resmi Kabupaten Tanah Laut" class="hero-emblem-glow">
                </div>
                <div>
                    <span class="badge-official">
                        <i class="bi bi-shield-check me-1"></i> BADAN KESATUAN BANGSA DAN POLITIK
                    </span>
                </div>
                <h1 class="hero-heading">KABUPATEN TANAH LAUT</h1>
                <p class="hero-desc">Portal Resmi Layanan Terpadu &bull; Ideologi, Wawasan Kebangsaan, Ketahanan Bangsa &amp; Politik</p>
            </div>
        </div>

        <div class="container-xl px-4">

            <!-- Card Utama Layanan Bidang -->
            <div class="card-portal-container">
                
                <!-- Header (Bukan "Daftar Modul") -->
                <div class="section-header">
                    <h2 class="section-title">Pilih Layanan Bidang</h2>
                </div>

                <!-- Grid Pas 3 Kolom Memanjang Lebar (Full Width, Gada Space Kosong) -->
                <div class="module-grid-3">
                    
                    <!-- Modul 1: SIPARPOL -->
                    <a href="{{ route('parpol.home') }}" class="module-card-wide module-card-parpol" title="Buka Modul SIPARPOL">
                        <div class="module-icon-box">
                            <img src="{{ asset('images/portal/smart-parpol.svg') }}" alt="SIPARPOL" class="module-icon-img">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">SIPARPOL</h3>
                            <p class="module-sub">Partai Politik &bull; Data 20 Parpol 2026</p>
                        </div>
                        <div class="module-arrow">
                            <i class="bi bi-arrow-right-short fs-4"></i>
                        </div>
                    </a>

                    <!-- Modul 2: WASBANG -->
                    <a href="{{ route('wasbang.index') }}" class="module-card-wide module-card-wasbang" title="Buka Modul WASBANG">
                        <div class="module-icon-box">
                            <img src="{{ asset('images/portal/smart-wasbang.svg') }}" alt="WASBANG" class="module-icon-img">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">WASBANG</h3>
                            <p class="module-sub">Dokumentasi Kegiatan Luar</p>
                        </div>
                        <div class="module-arrow">
                            <i class="bi bi-arrow-right-short fs-4"></i>
                        </div>
                    </a>

                    <!-- Modul 3: Persiapan Modul ke-3 (Pas 3 Kolom Penuh Gada Space) -->
                    <div class="module-card-wide module-card-placeholder" onclick="alert('Modul ke-3 saat ini sedang dalam tahap persiapan dan integrasi sistem.')" title="Modul ke-3 (Segera Hadir)">
                        <div class="module-icon-box" style="background: #f1f5f9;">
                            <i class="bi bi-plus-circle text-muted fs-4"></i>
                        </div>
                        <div class="module-info">
                            <h3 class="module-title text-muted">Modul 3</h3>
                            <p class="module-sub">Tahap Integrasi Sistem</p>
                        </div>
                        <div class="module-arrow">
                            <span class="badge bg-light text-muted border py-1 px-2" style="font-size: 0.68rem;">Segera</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="portal-footer text-center pb-4 pt-2">
        <div class="container">
            <p class="mb-1 text-white text-opacity-75" style="font-size: 0.82rem;">
                &copy; {{ date('Y') }} Badan Kesatuan Bangsa dan Politik &bull; Pemerintah Kabupaten Tanah Laut
            </p>
            <p class="mb-0 text-white text-opacity-50" style="font-size: 0.74rem;">
                Sistem Informasi &amp; Dokumentasi Pelayanan Publik Terpadu
            </p>
        </div>
    </footer>

    <!-- Floating Background Selector -->
    <div class="bg-selector-widget position-fixed bottom-0 end-0 m-3" style="z-index: 1050;">
        <div class="dropdown dropup">
            <button class="btn btn-sm btn-dark bg-opacity-75 border-secondary rounded-pill shadow-lg px-3 py-2 text-white dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="backdrop-filter: blur(8px); font-size: 0.8rem;">
                <i class="bi bi-image text-warning"></i>
                <span class="d-none d-sm-inline">Pilihan Background</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 p-2 mb-2" style="font-size: 0.82rem; min-width: 240px; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(16px);">
                <li class="dropdown-header text-uppercase fw-bold text-muted" style="font-size: 0.68rem; letter-spacing: 0.5px;">Pilihan Latar Belakang</li>
                <li><button class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2 active" id="btn-bg-sasirangan" onclick="changeBackground('sasirangan', this)"><i class="bi bi-stars text-primary"></i> Motif Sasirangan (Default)</button></li>
                <li><button class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2" id="btn-bg-hd" onclick="changeBackground('hd', this)"><i class="bi bi-shield-shaded text-warning"></i> HD Garuda &amp; Sasirangan</button></li>
                <li><button class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2" id="btn-bg-original" onclick="changeBackground('original', this)"><i class="bi bi-camera text-info"></i> Foto Asli Plakat</button></li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Pengganti Background Interaktif -->
    <script>
        const bgPresets = {
            'sasirangan': "{{ asset('images/portal/bg-sasirangan.jpg') }}",
            'hd': "{{ asset('images/portal/bg-bakesbangpol-hd.jpg') }}",
            'original': "{{ asset('images/portal/bg-bakesbangpol-original.jpg') }}"
        };

        function changeBackground(type, btnElement) {
            if (bgPresets[type]) {
                document.documentElement.style.setProperty('--portal-bg-img', `url('${bgPresets[type]}')`);
                localStorage.setItem('portal_bg_choice', type);
                
                document.querySelectorAll('.bg-selector-widget .dropdown-item').forEach(el => el.classList.remove('active'));
                if (btnElement) {
                    btnElement.classList.add('active');
                } else {
                    const matchedBtn = document.getElementById(`btn-bg-${type}`);
                    if (matchedBtn) matchedBtn.classList.add('active');
                }
            }
        }

        // Auto restore previous choice if exists
        document.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('portal_bg_choice');
            if (saved && bgPresets[saved]) {
                changeBackground(saved, null);
            }
        });
    </script>
</body>
</html>
