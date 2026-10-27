@extends('layouts.app')

@section('title', 'Pengarsipan Dokumentasi Laporan Kegiatan Luar | Bidang Wasbang Bakesbangpol Kab. Tanah Laut')

@push('styles')
<style>
    /* Hero Wasbang */
    .hero-wasbang {
        background: radial-gradient(circle at 85% 15%, rgba(185, 28, 28, 0.35), transparent 50%),
                    linear-gradient(135deg, #0f172a 0%, #1e1b4b 45%, #450a0a 100%);
        color: #ffffff;
        padding: 65px 0 85px;
        position: relative;
        border-bottom: 4px solid #b91c1c;
    }

    .wasbang-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(185, 28, 28, 0.3);
        border: 1px solid rgba(248, 113, 113, 0.4);
        color: #fca5a5;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.8px;
        margin-bottom: 18px;
        text-transform: uppercase;
    }

    .hero-title-wasbang {
        font-size: 2.7rem;
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -0.8px;
        margin-bottom: 16px;
    }

    .hero-title-wasbang .highlight {
        background: linear-gradient(120deg, #f87171, #fbbf24, #fef08a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-lead-wasbang {
        font-size: 1.08rem;
        color: #e2e8f0;
        line-height: 1.7;
        margin-bottom: 26px;
        max-width: 720px;
    }

    /* Stats Bar */
    .stats-bar-wasbang {
        background: #ffffff;
        border-radius: 18px;
        margin-top: -45px;
        box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.08);
        padding: 24px 20px;
        position: relative;
        z-index: 20;
        border: 1px solid #e2e8f0;
    }

    .stat-number-wasbang {
        font-size: 2.1rem;
        font-weight: 800;
        color: #b91c1c;
        line-height: 1;
        margin-bottom: 5px;
    }

    .stat-label-wasbang {
        font-size: 0.78rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Activity Card */
    .card-kegiatan {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 18px -2px rgba(15, 23, 42, 0.05);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-kegiatan:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 36px -4px rgba(185, 28, 28, 0.12);
        border-color: #fca5a5;
    }

    .media-thumb-container {
        position: relative;
        width: 100%;
        height: 220px;
        background: #0f172a;
        overflow: hidden;
    }

    .media-thumb-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .card-kegiatan:hover .media-thumb-img {
        transform: scale(1.05);
    }

    .media-badge-top {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 10;
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .media-badge-bottom {
        position: absolute;
        bottom: 12px;
        right: 12px;
        z-index: 10;
        display: flex;
        gap: 6px;
    }

    .kategori-pill {
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(4px);
        color: #fef08a;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 30px;
        border: 1px solid rgba(254, 240, 138, 0.3);
    }

    .status-pill-selesai {
        background: #166534;
        color: #dcfce7;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .status-pill-berlangsung {
        background: #854d0e;
        color: #fef9c3;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .card-body-wasbang {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .date-badge-box {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #fef2f2;
        border: 1px solid #fee2e2;
        color: #991b1b;
        font-size: 0.82rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    .kegiatan-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .meta-item {
        font-size: 0.85rem;
        color: #475569;
        margin-bottom: 6px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    .meta-item i {
        margin-top: 3px;
        font-size: 0.95rem;
    }

    .rincian-preview {
        font-size: 0.88rem;
        color: #64748b;
        line-height: 1.6;
        margin-top: 10px;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-footer-wasbang {
        padding: 14px 20px;
        background: #f8fafc;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    /* Filter Panel */
    .filter-panel {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 22px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }

    /* Modal Styling */
    .modal-hero-header {
        background: linear-gradient(135deg, #0f172a, #450a0a);
        color: #ffffff;
        border-bottom: 3px solid #b91c1c;
        padding: 20px 24px;
    }
</style>
@endpush

@section('content')

<!-- Hero Section Wasbang -->
<section class="hero-wasbang" id="beranda-wasbang">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="wasbang-badge">
                    <i class="bi bi-shield-fill-check text-warning"></i>
                    WASBANG TANAH LAUT &bull; Bidang Bina Ideologi, Wawasan Kebangsaan &amp; Karakter Bangsa
                </div>
                <h1 class="hero-title-wasbang">
                    Pengarsipan Dokumentasi <br>
                    <span class="highlight">Laporan Kegiatan Luar Lapangan</span>
                </h1>
                <p class="hero-lead-wasbang">
                    Sistem informasi pengarsipan resmi kegiatan lapangan Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Kabupaten Tanah Laut — lengkap dengan dokumentasi foto, rekaman video, hari/tanggal/bulan, lokasi, sasaran, rincian pelaksanaan, serta fitur unduh berkas dan cetak berita acara.
                </p>
                <div class="d-flex flex-wrap gap-2 pt-2">
                    <a href="#arsip-kegiatan" class="btn btn-danger px-4 py-2 fw-semibold rounded-3 shadow-sm">
                        <i class="bi bi-journal-album me-1"></i> Lihat Arsip Kegiatan
                    </a>
                    <a href="#tambah-kegiatan" class="btn btn-outline-light px-4 py-2 fw-semibold rounded-3">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Dokumentasi Baru
                    </a>
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-warning px-4 py-2 fw-semibold rounded-3 text-dark">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Rekapitulasi Berkas
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <div class="p-4 bg-white bg-opacity-10 rounded-4 border border-white border-opacity-10 backdrop-blur">
                    <div class="logo-emblem-wasbang mx-auto mb-3" style="width: 72px; height: 72px; font-size: 2.2rem; border-radius: 20px;">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-1">BAKESBANGPOL TALA</h5>
                    <p class="small text-white-50 mb-3">Bidang Ideologi &amp; Wawasan Kebangsaan</p>
                    <div class="badge bg-danger px-3 py-2 text-uppercase letter-spacing-1">
                        Dokumentasi Lapangan Terverifikasi
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Pengarsipan -->
<section class="container" id="statistik-wasbang">
    <div class="stats-bar-wasbang">
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6 border-end-md">
                <div class="stat-number-wasbang">{{ $totalKegiatan }}</div>
                <div class="stat-label-wasbang">Total Kegiatan Lapangan</div>
            </div>
            <div class="col-md-3 col-6 border-end-md">
                <div class="stat-number-wasbang text-success">{{ $totalFoto }}</div>
                <div class="stat-label-wasbang">Dokumentasi Foto Tersimpan</div>
            </div>
            <div class="col-md-3 col-6 border-end-md">
                <div class="stat-number-wasbang text-info">{{ $totalVideo }}</div>
                <div class="stat-label-wasbang">Dokumentasi Video Lapangan</div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number-wasbang text-warning">{{ $totalSelesai }}</div>
                <div class="stat-label-wasbang">Kegiatan Terlaksana</div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Utama: Arsip Dokumentasi Kegiatan Luar -->
<section class="py-5" id="arsip-kegiatan">
    <div class="container">

        <!-- Flash Message Alerts -->
        @if(session('wasbang_success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div class="flex-grow-1">
                    <strong>Berhasil!</strong> {{ session('wasbang_success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('wasbang_error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3 text-danger"></i>
                <div class="flex-grow-1">
                    <strong>Peringatan!</strong> {{ session('wasbang_error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header Seksi -->
        <div class="row align-items-end mb-4">
            <div class="col-md-8">
                <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-2 rounded-pill text-uppercase mb-2">
                    <i class="bi bi-archive-fill me-1"></i> Direktori Pengarsipan
                </span>
                <h2 class="fw-extrabold text-dark m-0" style="font-size: 2rem;">
                    Daftar Dokumentasi Kegiatan Luar Lapangan
                </h2>
                <p class="text-muted mt-1 mb-0">
                    Rekam jejak otentik pelaksanaan sosialisasi, diklat paskibraka, monitoring ideologi, dan kemah bela negara di wilayah Kabupaten Tanah Laut.
                </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="#tambah-kegiatan" class="btn btn-danger rounded-3 px-3 py-2 fw-semibold shadow-sm">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Dokumentasi Baru
                </a>
            </div>
        </div>

        <!-- Filter & Pencarian Bar -->
        <div class="filter-panel">
            <form action="{{ route('wasbang.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small fw-bold text-muted mb-1">
                        <i class="bi bi-search me-1"></i> Cari Nama Kegiatan / Lokasi
                    </label>
                    <input type="text" name="q" class="form-control rounded-3" placeholder="Contoh: Sosialisasi, SMKN 1, Diklat..." value="{{ request('q') }}">
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="form-label small fw-bold text-muted mb-1">
                        <i class="bi bi-tags me-1"></i> Kategori Bidang
                    </label>
                    <select name="kategori" class="form-select rounded-3">
                        <option value="">-- Semua Kategori --</option>
                        @foreach($kategoriList as $kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-md-4">
                    <label class="form-label small fw-bold text-muted mb-1">
                        <i class="bi bi-calendar-month me-1"></i> Bulan
                    </label>
                    <select name="bulan" class="form-select rounded-3">
                        <option value="">-- Semua --</option>
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                {{ \App\Models\WasbangKegiatan::getBulanIndonesia($m) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="col-lg-2 col-md-4">
                    <label class="form-label small fw-bold text-muted mb-1">
                        <i class="bi bi-flag me-1"></i> Status
                    </label>
                    <select name="status" class="form-select rounded-3">
                        <option value="">-- Semua Status --</option>
                        <option value="Selesai Dilaksanakan" {{ request('status') == 'Selesai Dilaksanakan' ? 'selected' : '' }}>Selesai</option>
                        <option value="Sedang Dilaksanakan" {{ request('status') == 'Sedang Dilaksanakan' ? 'selected' : '' }}>Berlangsung</option>
                    </select>
                </div>

                <div class="col-lg-1 col-md-4 d-flex gap-1">
                    <button type="submit" class="btn btn-danger w-100 rounded-3" title="Terapkan Filter">
                        <i class="bi bi-filter"></i>
                    </button>
                    @if(request()->hasAny(['q', 'kategori', 'bulan', 'status']))
                        <a href="{{ route('wasbang.index') }}" class="btn btn-outline-secondary rounded-3" title="Reset Filter">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Grid Kartu Kegiatan -->
        @if($kegiatans->isEmpty())
            <div class="text-center py-5 custom-card p-5">
                <div class="text-danger mb-3" style="font-size: 3.5rem;">
                    <i class="bi bi-folder2-open"></i>
                </div>
                <h4 class="fw-bold text-dark">Tidak Ada Arsip Dokumentasi yang Ditemukan</h4>
                <p class="text-muted max-w-md mx-auto">
                    Kriteria pencarian Anda tidak cocok dengan kegiatan yang tersimpan. Silakan reset filter pencarian atau unggah laporan dokumentasi baru.
                </p>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <a href="{{ route('wasbang.index') }}" class="btn btn-outline-danger rounded-3 px-3">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                    </a>
                    <a href="#tambah-kegiatan" class="btn btn-danger rounded-3 px-3">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Dokumentasi Baru
                    </a>
                </div>
            </div>
        @else
            <div class="row g-4">
                @foreach($kegiatans as $kegiatan)
                    <div class="col-lg-4 col-md-6">
                        <div class="card-kegiatan">
                            
                            <!-- Thumbnail / Media Preview -->
                            <div class="media-thumb-container">
                                @if($kegiatan->foto)
                                    <img src="{{ $kegiatan->foto_url }}" alt="{{ $kegiatan->nama_kegiatan }}" class="media-thumb-img">
                                @else
                                    <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center bg-dark text-white p-3 text-center">
                                        <i class="bi bi-image fs-1 text-secondary mb-2"></i>
                                        <span class="small text-muted">Dokumentasi Foto Belum Diunggah</span>
                                    </div>
                                @endif

                                <!-- Top Badges -->
                                <div class="media-badge-top">
                                    <span class="kategori-pill">
                                        <i class="bi bi-bookmark-fill me-1"></i> {{ $kegiatan->kategori }}
                                    </span>
                                </div>

                                <!-- Bottom Status & Media Badges -->
                                <div class="media-badge-bottom">
                                    @if($kegiatan->status === 'Sedang Dilaksanakan')
                                        <span class="status-pill-berlangsung">
                                            <i class="bi bi-hourglass-split me-1"></i> Sedang Berlangsung
                                        </span>
                                    @else
                                        <span class="status-pill-selesai">
                                            <i class="bi bi-check2-circle me-1"></i> Selesai
                                        </span>
                                    @endif

                                    @if($kegiatan->foto)
                                        <span class="badge bg-dark bg-opacity-75 text-white" title="Dokumentasi Foto Tersedia">
                                            <i class="bi bi-camera-fill"></i>
                                        </span>
                                    @endif
                                    @if($kegiatan->video || $kegiatan->video_url)
                                        <span class="badge bg-danger text-white" title="Dokumentasi Video Tersedia">
                                            <i class="bi bi-play-circle-fill"></i> Video
                                        </span>
                                    @endif
                                    @if($kegiatan->dokumen_laporan)
                                        <span class="badge bg-primary text-white" title="Berkas Laporan PDF Tersedia">
                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body-wasbang">
                                <!-- Hari, Tanggal, Bulan, Tahun & Jam -->
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-2">
                                    <div class="date-badge-box">
                                        <i class="bi bi-calendar-event-fill"></i>
                                        <span>{{ $kegiatan->hari_tanggal_formatted }}</span>
                                    </div>
                                    @if($kegiatan->waktu)
                                        <span class="small text-muted fw-semibold">
                                            <i class="bi bi-clock me-1 text-danger"></i> {{ $kegiatan->waktu }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Nama Kegiatan -->
                                <h3 class="kegiatan-title">
                                    {{ $kegiatan->nama_kegiatan }}
                                </h3>

                                <!-- Meta: Lokasi Luar Lapangan -->
                                <div class="meta-item">
                                    <i class="bi bi-geo-alt-fill text-danger flex-shrink-0"></i>
                                    <div>
                                        <strong class="text-dark">Lokasi Lapangan:</strong>
                                        <span>{{ $kegiatan->lokasi }}</span>
                                    </div>
                                </div>

                                <!-- Meta: Sasaran / Peserta -->
                                @if($kegiatan->sasaran_peserta)
                                    <div class="meta-item">
                                        <i class="bi bi-people-fill text-primary flex-shrink-0"></i>
                                        <div>
                                            <strong class="text-dark">Sasaran / Peserta:</strong>
                                            <span>{{ $kegiatan->sasaran_peserta }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Meta: Pelaksana -->
                                <div class="meta-item">
                                    <i class="bi bi-shield-check text-success flex-shrink-0"></i>
                                    <div>
                                        <strong class="text-dark">Pelaksana:</strong>
                                        <span class="text-muted small">{{ $kegiatan->pelaksana }}</span>
                                    </div>
                                </div>

                                <!-- Rincian Preview -->
                                <p class="rincian-preview">
                                    {{ $kegiatan->rincian }}
                                </p>

                                <div class="mt-auto pt-2">
                                    <button type="button" class="btn btn-outline-danger btn-sm w-100 rounded-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $kegiatan->id }}">
                                        <i class="bi bi-eye-fill me-1"></i> Baca Rincian Lengkap &amp; Media
                                    </button>
                                </div>
                            </div>

                            <!-- Card Footer: Unduh Berkas & Cetak -->
                            <div class="card-footer-wasbang">
                                <!-- Dropdown Unduh Media -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle fw-semibold text-dark rounded-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-download text-danger me-1"></i> Unduh File
                                    </button>
                                    <ul class="dropdown-menu shadow-sm border-0 py-2">
                                        @if($kegiatan->foto)
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'foto']) }}">
                                                    <i class="bi bi-camera text-primary me-2"></i> Unduh Foto Dokumentasi (.{{ pathinfo($kegiatan->foto, PATHINFO_EXTENSION) }})
                                                </a>
                                            </li>
                                        @endif

                                        @if($kegiatan->video)
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'video']) }}">
                                                    <i class="bi bi-film text-danger me-2"></i> Unduh Video Dokumentasi (.{{ pathinfo($kegiatan->video, PATHINFO_EXTENSION) }})
                                                </a>
                                            </li>
                                        @elseif($kegiatan->video_url)
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ $kegiatan->video_url }}" target="_blank">
                                                    <i class="bi bi-box-arrow-up-right text-danger me-2"></i> Buka Video Eksternal (Streaming)
                                                </a>
                                            </li>
                                        @endif

                                        @if($kegiatan->dokumen_laporan)
                                            <li>
                                                <a class="dropdown-item py-2" href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'dokumen']) }}">
                                                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i> Unduh Berkas Laporan (.{{ pathinfo($kegiatan->dokumen_laporan, PATHINFO_EXTENSION) }})
                                                </a>
                                            </li>
                                        @endif

                                        <li><hr class="dropdown-divider my-1"></li>
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank">
                                                <i class="bi bi-printer text-warning me-2"></i> Cetak / Simpan PDF Berita Acara
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="d-flex align-items-center gap-1">
                                    <!-- Tombol Cetak Langsung -->
                                    <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-2" title="Cetak Lembar Laporan Berita Acara">
                                        <i class="bi bi-printer"></i>
                                    </a>

                                    <!-- Tombol Hapus Arsip -->
                                    <button type="button" class="btn btn-sm btn-outline-danger rounded-2" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $kegiatan->id }}" title="Hapus Arsip">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Detail Kegiatan -->
                    <div class="modal fade" id="modalDetail{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $kegiatan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                                <div class="modal-header modal-hero-header">
                                    <div>
                                        <span class="badge bg-warning text-dark fw-bold px-2 py-1 mb-1">
                                            {{ $kegiatan->kategori }}
                                        </span>
                                        <h5 class="modal-title fw-bold text-white" id="modalDetailLabel{{ $kegiatan->id }}">
                                            {{ $kegiatan->nama_kegiatan }}
                                        </h5>
                                        <small class="text-white-50">
                                            <i class="bi bi-calendar3 me-1"></i> {{ $kegiatan->hari_tanggal_formatted }} &bull; <i class="bi bi-clock me-1"></i> {{ $kegiatan->waktu ?? '-' }}
                                        </small>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body p-4">
                                    <!-- Foto Utama / Media Preview -->
                                    @if($kegiatan->foto)
                                        <div class="mb-4 text-center bg-light rounded-3 p-2 border">
                                            <img src="{{ $kegiatan->foto_url }}" alt="{{ $kegiatan->nama_kegiatan }}" class="img-fluid rounded-3 shadow-sm" style="max-height: 400px; width: 100%; object-fit: contain;">
                                            <div class="d-flex justify-content-between align-items-center mt-2 px-2 small text-muted">
                                                <span><i class="bi bi-camera me-1"></i> Dokumentasi Foto Lapangan</span>
                                                <a href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'foto']) }}" class="btn btn-sm btn-outline-primary py-1 px-3 rounded-pill">
                                                    <i class="bi bi-download me-1"></i> Unduh Resolusi Asli
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Video Embed / Player jika ada -->
                                    @if($kegiatan->video)
                                        <div class="mb-4 p-3 bg-dark text-white rounded-3">
                                            <h6 class="fw-bold mb-2"><i class="bi bi-camera-reels-fill text-danger me-2"></i>Rekaman Video Lapangan</h6>
                                            <video controls class="w-100 rounded-2" style="max-height: 360px;">
                                                <source src="{{ asset($kegiatan->video) }}" type="video/mp4">
                                                Browser Anda tidak mendukung tag video.
                                            </video>
                                            <div class="text-end mt-2">
                                                <a href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'video']) }}" class="btn btn-sm btn-light">
                                                    <i class="bi bi-download me-1"></i> Unduh File Video
                                                </a>
                                            </div>
                                        </div>
                                    @elseif($kegiatan->video_url)
                                        <div class="mb-4 p-3 bg-light border rounded-3">
                                            <h6 class="fw-bold mb-2 text-danger"><i class="bi bi-play-btn-fill me-2"></i>Tautan Video Dokumentasi</h6>
                                            <p class="small text-muted mb-2">Video kegiatan luar ini dapat disaksikan secara daring:</p>
                                            <a href="{{ $kegiatan->video_url }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                                <i class="bi bi-box-arrow-up-right me-1"></i> Tonton Rekaman Video di Platform Eksternal
                                            </a>
                                        </div>
                                    @endif

                                    <!-- Ringkasan Informasi -->
                                    <div class="table-responsive mb-4">
                                        <table class="table table-bordered table-striped align-middle mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="bg-light text-dark" style="width: 25%;">Hari &amp; Tanggal</th>
                                                    <td class="fw-bold text-danger">{{ $kegiatan->hari_tanggal_formatted }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light text-dark">Waktu Pelaksanaan</th>
                                                    <td>{{ $kegiatan->waktu ?? 'Sesuai Jadwal Lapangan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light text-dark">Lokasi Luar Lapangan</th>
                                                    <td class="fw-semibold">{{ $kegiatan->lokasi }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light text-dark">Sasaran / Peserta</th>
                                                    <td>{{ $kegiatan->sasaran_peserta ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light text-dark">Unit Pelaksana</th>
                                                    <td>{{ $kegiatan->pelaksana }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light text-dark">Status Pelaksanaan</th>
                                                    <td>
                                                        <span class="badge {{ $kegiatan->status === 'Sedang Dilaksanakan' ? 'bg-warning text-dark' : 'bg-success' }}">
                                                            {{ $kegiatan->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Rincian Kronologis Kegiatan -->
                                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                        <i class="bi bi-file-text-fill text-danger me-2"></i>Rincian Lengkap &amp; Berita Acara Pelaksanaan
                                    </h6>
                                    <div class="p-3 bg-light rounded-3 border text-secondary" style="line-height: 1.8; white-space: pre-line;">
                                        {{ $kegiatan->rincian }}
                                    </div>
                                </div>

                                <div class="modal-footer bg-light p-3 d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning fw-semibold">
                                            <i class="bi bi-printer-fill me-1"></i> Cetak Berita Acara Resmi (A4)
                                        </a>
                                    </div>
                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="modalHapus{{ $kegiatan->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 rounded-4 shadow">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title fw-bold">Konfirmasi Penghapusan Arsip</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-circle text-danger mb-3" style="font-size: 3rem;"></i>
                                    <h6 class="fw-bold text-dark mb-2">Hapus dokumentasi kegiatan ini?</h6>
                                    <p class="text-muted small mb-0">
                                        "{{ $kegiatan->nama_kegiatan }}" beserta berkas foto/video terkait akan dihapus permanen dari server. Tindakan ini tidak dapat dibatalkan.
                                    </p>
                                </div>
                                <div class="modal-footer bg-light justify-content-center p-3">
                                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">Batalkan</button>
                                    <form action="{{ route('wasbang.destroy', $kegiatan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-4">
                                            <i class="bi bi-trash-fill me-1"></i> Ya, Hapus Arsip
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif

    </div>
</section>

<!-- Formulir Tambah Arsip Dokumentasi Baru -->
<section class="py-5 bg-white border-top" id="tambah-kegiatan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="p-4 text-white" style="background: linear-gradient(135deg, #0f172a, #881337);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="logo-emblem-wasbang" style="width: 48px; height: 48px; font-size: 1.5rem;">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold m-0 text-white">Formulir Pengarsipan Dokumentasi Kegiatan Luar</h4>
                                <small class="text-white-50">Silakan input data pelaksanaan kegiatan di luar beserta foto dokumentasi, video, dan rinciannya.</small>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 p-md-5 bg-light bg-opacity-50">
                        <form action="{{ route('wasbang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <!-- Nama Kegiatan -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-dark">
                                        Nama Kegiatan Lapangan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nama_kegiatan" class="form-control form-control-lg rounded-3 @error('nama_kegiatan') is-invalid @enderror" placeholder="Contoh: Sosialisasi Wawasan Kebangsaan di SMAN 1 Pelaihari" value="{{ old('nama_kegiatan') }}" required>
                                    @error('nama_kegiatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kategori & Status -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">
                                        Kategori Bidang Wasbang <span class="text-danger">*</span>
                                    </label>
                                    <select name="kategori" class="form-select form-select-lg rounded-3 @error('kategori') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($kategoriList as $kat)
                                            <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>
                                                {{ $kat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">
                                        Status Pelaksanaan <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" class="form-select form-select-lg rounded-3" required>
                                        <option value="Selesai Dilaksanakan" {{ old('status') == 'Selesai Dilaksanakan' ? 'selected' : '' }}>
                                            Selesai Dilaksanakan
                                        </option>
                                        <option value="Sedang Dilaksanakan" {{ old('status') == 'Sedang Dilaksanakan' ? 'selected' : '' }}>
                                            Sedang Berlangsung / Dilaksanakan
                                        </option>
                                    </select>
                                </div>

                                <!-- Tanggal Pelaksanaan & Waktu -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">
                                        Tanggal Pelaksanaan (Hari/Bulan/Tahun) <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" name="tanggal" id="inputTanggal" class="form-control form-control-lg rounded-3 @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                    <small class="text-muted d-block mt-1" id="previewHariText">
                                        <i class="bi bi-info-circle me-1"></i> Nama hari akan dihitung secara otomatis dari tanggal yang dipilih.
                                    </small>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">
                                        Waktu / Jam Pelaksanaan
                                    </label>
                                    <input type="text" name="waktu" class="form-control form-control-lg rounded-3" placeholder="Contoh: 08:30 - 12:30 WITA" value="{{ old('waktu') }}">
                                </div>

                                <!-- Lokasi Lapangan & Sasaran Peserta -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">
                                        Lokasi Luar Lapangan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="lokasi" class="form-control form-control-lg rounded-3 @error('lokasi') is-invalid @enderror" placeholder="Contoh: Lapangan Terbuka Pertasi Kencana, Desa Sumber Makmur..." value="{{ old('lokasi') }}" required>
                                    @error('lokasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark">
                                        Sasaran / Peserta Kegiatan
                                    </label>
                                    <input type="text" name="sasaran_peserta" class="form-control form-control-lg rounded-3" placeholder="Contoh: 120 Siswa SMA/SMK dan Guru Pendamping" value="{{ old('sasaran_peserta') }}">
                                </div>

                                <!-- Tim Pelaksana -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-dark">
                                        Unit / Tim Pelaksana Kegiatan
                                    </label>
                                    <input type="text" name="pelaksana" class="form-control rounded-3" placeholder="Contoh: Subbidang Bina Ideologi & Wawasan Kebangsaan Bakesbangpol" value="{{ old('pelaksana', 'Bidang Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa') }}">
                                </div>

                                <!-- Rincian Kegiatan -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-dark">
                                        Rincian Lengkap / Laporan Berita Acara Pelaksanaan Luar <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="rincian" rows="6" class="form-control rounded-3 @error('rincian') is-invalid @enderror" placeholder="Tuliskan deskripsi kronologi kegiatan lapangan, materi wawasan kebangsaan yang disampaikan, narasumber yang hadir, dinamika jalannya acara, kesimpulan/output, serta tindak lanjut pelaksanaan..." required>{{ old('rincian') }}</textarea>
                                    @error('rincian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12"><hr class="my-2"></div>

                                <!-- Bagian Upload Media -->
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark">
                                        <i class="bi bi-camera-fill text-danger me-1"></i> Upload Foto Dokumentasi
                                    </label>
                                    <input type="file" name="foto" class="form-control rounded-3 @error('foto') is-invalid @enderror" accept="image/*">
                                    <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP, SVG (Maks. 12 MB).</small>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark">
                                        <i class="bi bi-film text-danger me-1"></i> Upload File Video
                                    </label>
                                    <input type="file" name="video" class="form-control rounded-3 @error('video') is-invalid @enderror" accept="video/mp4,video/webm,video/quicktime">
                                    <small class="text-muted d-block mt-1">Format: MP4, MOV, WEBM (Maks. 50 MB).</small>
                                    @error('video')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark">
                                        <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i> Upload Berkas Laporan Resmi
                                    </label>
                                    <input type="file" name="dokumen_laporan" class="form-control rounded-3 @error('dokumen_laporan') is-invalid @enderror" accept=".pdf,.doc,.docx">
                                    <small class="text-muted d-block mt-1">Format: PDF, DOC, DOCX (Maks. 20 MB).</small>
                                    @error('dokumen_laporan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tautan Video Eksternal (Opsional) -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-muted small">
                                        <i class="bi bi-link-45deg me-1"></i> Atau Masukkan Tautan Video Eksternal (Opsional jika video berukuran sangat besar)
                                    </label>
                                    <input type="url" name="video_url" class="form-control rounded-3" placeholder="https://youtube.com/watch?v=... atau link Google Drive" value="{{ old('video_url') }}">
                                </div>

                                <!-- Tombol Aksi Simpan -->
                                <div class="col-md-12 text-end pt-3">
                                    <a href="#arsip-kegiatan" class="btn btn-outline-secondary px-4 py-2 rounded-3 me-2">Batal</a>
                                    <button type="submit" class="btn btn-danger btn-lg px-5 py-2 rounded-3 shadow fw-bold">
                                        <i class="bi bi-cloud-arrow-up-fill me-2"></i> Arsipkan Dokumentasi Kegiatan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputTanggal = document.getElementById('inputTanggal');
        const previewHariText = document.getElementById('previewHariText');

        const hariNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        function updateHariPreview() {
            if (inputTanggal && inputTanggal.value) {
                const d = new Date(inputTanggal.value + 'T00:00:00');
                const dayIndex = d.getDay();
                if (!isNaN(dayIndex)) {
                    previewHariText.innerHTML = '<i class="bi bi-check-circle-fill text-success me-1"></i> Hari Pelaksanaan: <strong class="text-danger">' + hariNames[dayIndex] + '</strong>';
                }
            }
        }

        if (inputTanggal) {
            inputTanggal.addEventListener('change', updateHariPreview);
            updateHariPreview();
        }
    });
</script>
@endpush
