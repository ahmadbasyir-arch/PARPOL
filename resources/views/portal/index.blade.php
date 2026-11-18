<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Bakesbangpol Kabupaten Tanah Laut</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tanahlaut.png') }}">
    
    <!-- Google Fonts & Bootstrap 5 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --portal-navy: #0f172a;
            --portal-blue: #1e3a8a;
            --portal-gold: #f59e0b;
        }

        html, body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0b1120;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden !important;
            max-width: 100vw !important;
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        /* Top Bar */
        .portal-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 10px 0;
            z-index: 20;
        }

        /* Hero Wrapper with Official Backdrop */
        .portal-hero {
            position: relative;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 0 52px 0;
            background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.94) 100%), url('{{ asset('images/bakesbangpol-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            overflow-x: hidden;
        }

        /* Gold Badge */
        .badge-instansi {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(245, 158, 11, 0.15);
            border: 1px solid rgba(245, 158, 11, 0.4);
            color: #fbbf24;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            padding: 5px 14px;
            border-radius: 30px;
            text-transform: uppercase;
        }

        /* Card Selector Bidang */
        .portal-card-container {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 22px 18px;
            margin-top: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            overflow: hidden;
        }

        @media (min-width: 768px) {
            .portal-card-container {
                border-radius: 24px;
                padding: 36px;
                margin-top: 25px;
            }
        }

        .service-card {
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px 20px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            height: 100%;
        }

        .service-card:hover {
            border-color: #3b82f6;
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -6px rgba(59, 130, 246, 0.2);
        }

        .service-card.wasbang:hover {
            border-color: #ef4444;
            box-shadow: 0 12px 24px -6px rgba(239, 68, 68, 0.2);
        }

        .service-card.disabled {
            opacity: 0.65;
            background-color: #f8fafc;
            border-color: #e2e8f0;
            cursor: not-allowed;
            pointer-events: none;
        }

        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .icon-parpol {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .icon-wasbang {
            background: #fef2f2;
            color: #dc2626;
        }

        .icon-disabled {
            background: #f1f5f9;
            color: #64748b;
        }

        /* Footer */
        .portal-footer {
            background: #090d16;
            color: #94a3b8;
            padding: 20px 0;
            font-size: 0.84rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body>

    <!-- Header Portal -->
    <header class="portal-topbar">
        <div class="container-fluid px-2 px-sm-3 px-lg-5">
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center gap-2 gap-sm-3 min-w-0">
                    <img src="{{ asset('images/tanahlaut.png') }}" alt="Logo Kab. Tanah Laut" style="width: 32px; height: auto; object-fit: contain;" class="flex-shrink-0">
                    <div>
                        <h6 class="fw-bold mb-0 text-dark text-nowrap" style="font-size: clamp(0.85rem, 3.8vw, 1.05rem);">Portal Bakesbangpol</h6>
                        <small class="text-muted d-none d-sm-block" style="font-size: 0.72rem;">Kabupaten Tanah Laut</small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-semibold d-none d-md-inline-flex" style="font-size: 0.8rem;">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i> Kab. Tanah Laut
                    </span>
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-success btn-sm rounded-pill px-2.5 px-sm-3 py-1.5 fw-semibold dropdown-toggle d-flex align-items-center gap-1.5 shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.82rem; white-space: nowrap;">
                                <i class="bi bi-person-check-fill text-success"></i>
                                <span class="d-none d-sm-inline">{{ Str::limit(auth()->user()->name, 16) }}</span>
                                <span class="d-inline d-sm-none">Akun</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-1" style="min-width: 240px; max-width: 90vw;">
                                <li class="px-3 py-2 border-bottom bg-light">
                                    <small class="text-muted d-block" style="font-size: 0.72rem;">{{ auth()->user()->role_label }}</small>
                                    <strong class="text-dark small d-block text-truncate">{{ auth()->user()->name }}</strong>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ auth()->user()->isKabidWasbang() || auth()->user()->isStafWasbang() ? route('wasbang.index') : route('dashboard') }}">
                                        <i class="bi bi-speedometer2 text-primary"></i>
                                        <span>Buka Dashboard</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form action="{{ auth()->user()->isKabidWasbang() || auth()->user()->isStafWasbang() ? route('wasbang.logout') : route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 small text-danger d-flex align-items-center gap-2 w-100 border-0 bg-transparent text-start">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Keluar (Logout)</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-outline-primary btn-sm rounded-pill px-2.5 px-sm-3 py-1.5 fw-semibold dropdown-toggle d-flex align-items-center gap-1 shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.82rem; white-space: nowrap;">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span class="d-none d-sm-inline">Login Petugas</span>
                                <span class="d-inline d-sm-none">Login</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-1" style="min-width: 250px; max-width: 90vw;">
                                <li>
                                    <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('wasbang.login') }}">
                                        <i class="bi bi-flag-fill text-danger fs-5"></i>
                                        <div>
                                            <div class="fw-bold text-dark">Login Petugas WASBANG</div>
                                            <small class="text-muted" style="font-size: 0.72rem;">Pengarsipan Dokumentasi Lapangan</small>
                                        </div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('login') }}">
                                        <i class="bi bi-bank2 text-primary fs-5"></i>
                                        <div>
                                            <div class="fw-bold text-dark">Login SIPARPOL</div>
                                            <small class="text-muted" style="font-size: 0.72rem;">Poldagri &amp; Partai Politik</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Portal Bakesbangpol -->
    <main class="portal-hero">
        <div class="container px-4" style="max-width: 1020px;">
            
            <!-- Judul & Logo Tengah -->
            <div class="text-center text-white mb-4">
                
                <!-- Logo Resmi Kabupaten Tanah Laut -->
                <div class="mb-3 text-center">
                    <img src="{{ asset('images/tanahlaut.png') }}" alt="Lambang Kabupaten Tanah Laut" style="width: clamp(64px, 14vw, 88px); height: auto; filter: drop-shadow(0 6px 16px rgba(0,0,0,0.6));">
                </div>

                <!-- Badge Resmi -->
                <div class="mb-3">
                    <span class="badge-instansi">
                        <i class="bi bi-shield-shaded"></i> BADAN KESATUAN BANGSA DAN POLITIK
                    </span>
                </div>

                <h1 class="fw-extrabold mb-2 text-white" style="font-weight: 800; font-size: clamp(1.65rem, 5.2vw, 2.75rem); letter-spacing: -0.5px; line-height: 1.2;">
                    KABUPATEN TANAH LAUT
                </h1>
                
                <p class="text-white-50 mx-auto mb-0" style="max-width: 680px; font-size: clamp(0.85rem, 2.6vw, 0.95rem); line-height: 1.6;">
                    Portal Resmi Layanan Terpadu &bull; Ideologi, Wawasan Kebangsaan, Ketahanan Bangsa &amp; Politik Dalam Negeri
                </p>
            </div>

            <!-- Wadah Pilihan Layanan Bidang -->
            <div class="portal-card-container w-100 mx-auto">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between text-center text-md-start mb-4 pb-3 border-bottom gap-2 gap-md-3">
                    <div class="order-2 order-md-1 text-center text-md-start">
                        <h5 class="fw-bold text-dark mb-1 d-flex align-items-center justify-content-center justify-content-md-start gap-2 fs-5">
                            <i class="bi bi-grid-fill text-primary"></i>
                            <span>Pilih Layanan Bidang</span>
                        </h5>
                        <p class="text-muted small mb-0 text-center text-md-start">Silakan pilih bidang yang ingin Anda akses atau kelola datanya:</p>
                    </div>
                    <div class="order-1 order-md-2 mb-2 mb-md-0 text-center text-md-end">
                        <span class="badge bg-light text-secondary border px-3 py-1.5 rounded-pill small fw-semibold d-inline-flex align-items-center gap-1">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>T.A. 2026 Terintegrasi</span>
                        </span>
                    </div>
                </div>

                <div class="row g-3">
                    
                    <!-- Kartu 1: SIPARPOL -->
                    <div class="col-12 col-md-4">
                        <a href="{{ route('parpol.home') }}" class="service-card shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box icon-parpol shadow-sm">
                                    <i class="bi bi-bank2"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">SIPARPOL</h6>
                                    <p class="text-muted small mb-0" style="font-size: 0.78rem;">
                                        Partai Politik &bull; Data 20 Parpol &bull; Dikpol
                                    </p>
                                </div>
                            </div>
                            <div class="text-primary fs-5 ms-2">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    <!-- Kartu 2: WASBANG -->
                    <div class="col-12 col-md-4">
                        <a href="{{ route('wasbang.index') }}" class="service-card wasbang shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box icon-wasbang shadow-sm">
                                    <i class="bi bi-archive-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">WASBANG</h6>
                                    <p class="text-muted small mb-0" style="font-size: 0.78rem;">
                                        Pengarsipan Dokumentasi Kegiatan Lapangan
                                    </p>
                                </div>
                            </div>
                            <div class="text-danger fs-5 ms-2">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    <!-- Kartu 3: KETAHANAN EKOSOSBUD & ORMAS (Integrasi Berikutnya) -->
                    <div class="col-12 col-md-4">
                        <div class="service-card disabled">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box icon-disabled">
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-secondary mb-1">Modul 3 (Ormas)</h6>
                                    <p class="text-muted small mb-0" style="font-size: 0.78rem;">
                                        Tahap Integrasi Sistem
                                    </p>
                                </div>
                            </div>
                            <span class="badge bg-secondary-subtle text-secondary border small">Segera</span>
                        </div>
                    </div>

                </div>

                <!-- Ringkasan Statistik Cepat (Kompak & Rapi di Ponsel) -->
                <div class="mt-4 pt-3 border-top">
                    <div class="row g-2 text-center text-muted small">
                        <div class="col-4 border-end">
                            <strong class="text-dark d-block fs-6 fs-sm-5">{{ $totalParpol }}</strong>
                            <span class="d-block" style="font-size: clamp(0.7rem, 2.2vw, 0.82rem); line-height: 1.25;">Parpol Terdata</span>
                        </div>
                        <div class="col-4 border-end">
                            <strong class="text-dark d-block fs-6 fs-sm-5">{{ $totalDikpol }}</strong>
                            <span class="d-block" style="font-size: clamp(0.7rem, 2.2vw, 0.82rem); line-height: 1.25;"><span class="d-none d-sm-inline">Kegiatan </span>Dikpol Banpol</span>
                        </div>
                        <div class="col-4">
                            <strong class="text-dark d-block fs-6 fs-sm-5">{{ $totalWasbang }}</strong>
                            <span class="d-block" style="font-size: clamp(0.7rem, 2.2vw, 0.82rem); line-height: 1.25;"><span class="d-none d-sm-inline">Kegiatan </span>Arsip Wasbang</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Footer Portal -->
    <footer class="portal-footer text-center">
        <div class="container">
            <p class="mb-1">&copy; 2026 Badan Kesatuan Bangsa dan Politik &bull; Pemerintah Kabupaten Tanah Laut</p>
            <p class="mb-0 text-white-50" style="font-size: 0.75rem;">Sistem Informasi &amp; Dokumentasi Pelayanan Publik Terpadu</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
