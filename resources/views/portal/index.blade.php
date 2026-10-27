<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Bakesbangpol Kabupaten Tanah Laut</title>
    
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

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0b1120;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Top Bar */
        .portal-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 0;
            z-index: 20;
        }

        /* Hero Wrapper with Official Backdrop */
        .portal-hero {
            position: relative;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 15px 60px 15px;
            background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.94) 100%), url('{{ asset('images/bakesbangpol-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Gold Badge */
        .badge-instansi {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(245, 158, 11, 0.15);
            border: 1px solid rgba(245, 158, 11, 0.4);
            color: #fbbf24;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 6px 16px;
            border-radius: 30px;
            text-transform: uppercase;
        }

        /* Card Selector Bidang */
        .portal-card-container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 36px;
            margin-top: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
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
        <div class="container-fluid px-lg-5 px-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 40px; height: 40px; background: #1e3a8a; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.25rem;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Portal Bakesbangpol</h6>
                        <small class="text-muted" style="font-size: 0.75rem;">Kabupaten Tanah Laut</small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-semibold" style="font-size: 0.8rem;">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i> Kab. Tanah Laut
                    </span>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login Petugas
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Portal Bakesbangpol -->
    <main class="portal-hero">
        <div class="container" style="max-width: 1020px;">
            
            <!-- Judul & Logo Tengah -->
            <div class="text-center text-white mb-4">
                
                <!-- Badge Resmi -->
                <div class="mb-3">
                    <span class="badge-instansi">
                        <i class="bi bi-shield-shaded"></i> BADAN KESATUAN BANGSA DAN POLITIK
                    </span>
                </div>

                <h1 class="display-5 fw-extrabold mb-2" style="font-weight: 800; letter-spacing: -0.5px;">
                    KABUPATEN TANAH LAUT
                </h1>
                
                <p class="text-white-50 mx-auto mb-0" style="max-width: 680px; font-size: 0.95rem;">
                    Portal Resmi Layanan Terpadu &bull; Ideologi, Wawasan Kebangsaan, Ketahanan Bangsa &amp; Politik Dalam Negeri
                </p>
            </div>

            <!-- Wadah Pilihan Layanan Bidang -->
            <div class="portal-card-container">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 pb-2 border-bottom">
                    <div>
                        <h5 class="fw-bold text-dark mb-1">
                            <i class="bi bi-grid-fill text-primary me-2"></i>Pilih Layanan Bidang
                        </h5>
                        <p class="text-muted small mb-0">Silakan pilih bidang yang ingin Anda akses atau kelola datanya:</p>
                    </div>
                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill small">
                        T.A. 2026 Terintegrasi
                    </span>
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
                                    <i class="bi bi-flag-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">WASBANG</h6>
                                    <p class="text-muted small mb-0" style="font-size: 0.78rem;">
                                        Dokumentasi Kegiatan Luar &bull; Pengarsipan
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

                <!-- Ringkasan Statistik Cepat -->
                <div class="mt-4 pt-3 border-top">
                    <div class="row g-2 text-center text-muted small">
                        <div class="col-4 border-end">
                            <strong class="text-dark d-block fs-6">{{ $totalParpol }}</strong>
                            <span>Parpol Terdata</span>
                        </div>
                        <div class="col-4 border-end">
                            <strong class="text-dark d-block fs-6">{{ $totalDikpol }}</strong>
                            <span>Kegiatan Dikpol Banpol</span>
                        </div>
                        <div class="col-4">
                            <strong class="text-dark d-block fs-6">{{ $totalWasbang }}</strong>
                            <span>Arsip Kegiatan Wasbang</span>
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
