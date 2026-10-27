<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WASBANG - Dokumentasi Kegiatan Luar Bidang Bina Ideologi & Karakter Bangsa</title>
    
    <!-- Google Fonts & Bootstrap 5 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --wasbang-red: #dc2626;
            --wasbang-dark: #0f172a;
            --wasbang-gold: #f59e0b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Bar */
        .wasbang-topbar {
            background: #1e293b;
            color: #cbd5e1;
            font-size: 0.78rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Navbar */
        .wasbang-navbar {
            background: #ffffff;
            border-bottom: 2px solid #e2e8f0;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .badge-switcher {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .badge-switcher:hover {
            background-color: #dbeafe;
            color: #1e40af;
        }

        /* Hero Banner */
        .wasbang-hero {
            background: linear-gradient(135deg, #991b1b 0%, #b91c1c 50%, #450a0a 100%);
            color: #ffffff;
            padding: 48px 0 54px 0;
            position: relative;
            overflow: hidden;
        }

        .wasbang-hero::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.4;
            pointer-events: none;
        }

        /* Cards */
        .card-arsip {
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-arsip:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.12);
            border-color: #cbd5e1;
        }

        .img-arsip-thumb {
            width: 100%;
            height: 200px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .img-arsip-thumb:hover {
            transform: scale(1.03);
        }

        .badge-hari-tgl {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            font-weight: 700;
            font-size: 0.78rem;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
    </style>
</head>
<body>

    <!-- Top Bar Informasi Wilayah -->
    <div class="wasbang-topbar">
        <div class="container-fluid px-lg-5 px-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> Kabupaten Tanah Laut, Kalimantan Selatan</span>
                    <span class="mx-2 text-white-50">|</span>
                    <span><i class="bi bi-flag me-1 text-warning"></i> Bidang Bina Ideologi, Wawasan Kebangsaan, &amp; Karakter Bangsa</span>
                </div>
                <div>
                    <a href="{{ route('portal.home') }}" class="text-white-50 text-decoration-none small">
                        <i class="bi bi-arrow-left me-1"></i> Portal Utama Bakesbangpol
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi WASBANG & Switcher Bidang -->
    <nav class="wasbang-navbar shadow-sm">
        <div class="container-fluid px-lg-5 px-3">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                
                <!-- Brand WASBANG -->
                <a href="{{ route('wasbang.index') }}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                    <div style="width: 40px; height: 40px; background: #dc2626; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.3rem;">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold" style="font-size: 1.1rem; line-height: 1.2;">WASBANG TANAH LAUT</div>
                        <div class="text-danger fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.5px;">DOKUMENTASI &amp; PENGARSIPAN KEGIATAN LUAR</div>
                    </div>
                </a>

                <!-- Switcher Cepat Antar Layanan (Bisa Pindah ke SIPARPOL Langsung) -->
                <div class="d-flex align-items-center gap-2">
                    <div class="dropdown">
                        <button class="badge-switcher dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-grid-fill text-primary"></i>
                            <span>Pindah Layanan Bidang</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2" style="min-width: 260px;">
                            <li class="px-3 py-2 border-bottom bg-light">
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Navigasi Sistem Bakesbangpol</small>
                                <strong class="text-dark small">Pilih Bidang Terkait:</strong>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('portal.home') }}">
                                    <i class="bi bi-house-door-fill text-secondary"></i>
                                    <span>Halaman Utama Portal</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('parpol.home') }}">
                                    <i class="bi bi-bank2 text-primary"></i>
                                    <div>
                                        <div class="fw-bold">SIPARPOL (Poldagri)</div>
                                        <small class="text-muted" style="font-size: 0.7rem;">Data 20 Parpol &amp; Realisasi Dikpol</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 small d-flex align-items-center gap-2 active bg-danger" href="{{ route('wasbang.index') }}">
                                    <i class="bi bi-flag-fill text-white"></i>
                                    <div>
                                        <div class="fw-bold">WASBANG (Ideologi)</div>
                                        <small class="text-white-50" style="font-size: 0.7rem;">Pengarsipan Kegiatan Luar Lapangan</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tombol Tambah Arsip Baru -->
                    <button class="btn btn-danger btn-sm rounded-3 fw-semibold px-3 d-flex align-items-center gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahArsip">
                        <i class="bi bi-plus-circle"></i> Tambah Arsip
                    </button>

                    <!-- Tombol Cetak Rekapitulasi -->
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-3 fw-semibold px-3">
                        <i class="bi bi-printer"></i> Cetak Rekap
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Banner Hero WASBANG -->
    <section class="wasbang-hero">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge bg-white bg-opacity-25 border border-white border-opacity-25 text-white px-3 py-1 rounded-pill small mb-2 fw-semibold">
                        <i class="bi bi-shield-fill-check me-1"></i> Bakesbangpol Kabupaten Tanah Laut
                    </span>
                    <h2 class="fw-extrabold mb-2" style="font-weight: 800;">
                        Pengarsipan Laporan &amp; Dokumentasi Kegiatan Lapangan
                    </h2>
                    <p class="text-white-50 mb-0" style="max-width: 720px; font-size: 0.95rem;">
                        Pusat arsip terpadu dokumentasi foto, video, waktu pelaksanaan (hari/tanggal/bulan), serta rincian kegiatan luar ruangan Bidang Bina Ideologi, Wawasan Kebangsaan, dan Karakter Bangsa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama: Filter & Daftar Arsip -->
    <main class="py-5 flex-grow-1">
        <div class="container-fluid px-lg-5 px-3">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- 4 Stat Cards Ringkas -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                        <span class="text-muted small d-block">Total Kegiatan Terarsip</span>
                        <h4 class="fw-bold mb-0 text-dark">{{ $totalKegiatan }} Kegiatan</h4>
                        <span class="small text-muted">Luar Lapangan 2026</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                        <span class="text-muted small d-block">Kegiatan Paskibraka</span>
                        <h4 class="fw-bold mb-0 text-danger">{{ $totalPaskibraka }} Agenda</h4>
                        <span class="small text-muted">Seleksi &amp; Pelatihan PBB</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                        <span class="text-muted small d-block">Kegiatan Bela Negara</span>
                        <h4 class="fw-bold mb-0 text-primary">{{ $totalBelaNegara }} Agenda</h4>
                        <span class="small text-muted">Kemah &amp; Outbound Pemuda</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                        <span class="text-muted small d-block">Ideologi &amp; Karakter Bangsa</span>
                        <h4 class="fw-bold mb-0 text-warning">{{ $totalIdeologi }} Agenda</h4>
                        <span class="small text-muted">Pancasila &amp; Lintas Etnis</span>
                    </div>
                </div>
            </div>

            <!-- Formulir Filter & Pencarian -->
            <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
                <form action="{{ route('wasbang.index') }}" method="GET" class="row g-2 align-items-center">
                    
                    <!-- Search Input -->
                    <div class="col-12 col-md-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control border-start-0" placeholder="Cari nama kegiatan / tempat / rincian...">
                        </div>
                    </div>

                    <!-- Filter Kategori -->
                    <div class="col-6 col-md-3">
                        <select name="kategori" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">-- Semua Kategori Kegiatan --</option>
                            @foreach ($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Bulan -->
                    <div class="col-6 col-md-3">
                        <select name="bulan" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">-- Semua Bulan --</option>
                            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bln)
                                <option value="{{ $bln }}" {{ request('bulan') == $bln ? 'selected' : '' }}>{{ $bln }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Cari & Reset -->
                    <div class="col-12 col-md-2 d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-sm rounded-3 w-100 fw-semibold">
                            Filter
                        </button>
                        <a href="{{ route('wasbang.index') }}" class="btn btn-outline-secondary btn-sm rounded-3">
                            Reset
                        </a>
                    </div>

                </form>
            </div>

            <!-- Galeri Kartu Arsip Dokumentasi -->
            <div class="row g-4">
                @forelse ($kegiatans as $keg)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-arsip">
                            
                            <!-- Foto Dokumentasi Utama -->
                            <div class="position-relative overflow-hidden bg-dark text-center" style="height: 200px;">
                                @if ($keg->foto)
                                    <img src="{{ asset($keg->foto) }}" alt="{{ $keg->nama_kegiatan }}" class="img-arsip-thumb" data-bs-toggle="modal" data-bs-target="#modalFotoWasbang{{ $keg->id }}" title="Klik untuk memperbesar foto">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 text-white-50">
                                        <i class="bi bi-image fs-1"></i>
                                    </div>
                                @endif

                                <!-- Badge Kategori di Pojok Foto -->
                                <span class="position-absolute top-0 end-0 m-2 badge bg-dark bg-opacity-75 text-white px-2 py-1 small rounded-pill">
                                    {{ $keg->kategori }}
                                </span>
                            </div>

                            <!-- Detail Konten -->
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                
                                <!-- Info Waktu (Hari, Tanggal Bulan Tahun) -->
                                <div class="mb-2">
                                    <span class="badge-hari-tgl">
                                        <i class="bi bi-calendar-check-fill"></i>
                                        <span>{{ $keg->tanggal_lengkap }}</span>
                                    </span>
                                </div>

                                <!-- Nama Kegiatan -->
                                <h6 class="fw-bold text-dark mb-2 text-capitalize" style="min-height: 44px;">
                                    {{ $keg->nama_kegiatan }}
                                </h6>

                                <!-- Lokasi & Peserta -->
                                <div class="small text-muted mb-2">
                                    <div><i class="bi bi-geo-alt-fill text-danger me-1"></i> <strong>Lokasi:</strong> {{ $keg->tempat_lokasi }}</div>
                                    @if ($keg->peserta)
                                        <div><i class="bi bi-people-fill text-primary me-1"></i> <strong>Peserta:</strong> {{ $keg->peserta }}</div>
                                    @endif
                                </div>

                                <!-- Rincian Deskripsi -->
                                <p class="text-secondary small mb-3 flex-grow-1" style="font-size: 0.82rem; line-height: 1.5;">
                                    {{ Str::limit($keg->rincian, 140) }}
                                </p>

                                <!-- Tombol Aksi & Unduh (Download) -->
                                <div class="pt-2 border-top d-flex align-items-center justify-content-between gap-1">
                                    <button class="btn btn-light border btn-sm text-dark px-2 py-1 small rounded-2" data-bs-toggle="modal" data-bs-target="#modalDetailWasbang{{ $keg->id }}">
                                        <i class="bi bi-eye me-1"></i> Rincian
                                    </button>

                                    <div class="d-flex gap-1">
                                        <!-- Unduh Foto -->
                                        @if ($keg->foto)
                                            <a href="{{ asset($keg->foto) }}" download="Dokumentasi_{{ Str::slug($keg->nama_kegiatan) }}.jpg" class="btn btn-outline-primary btn-sm px-2 py-1 rounded-2" title="Unduh Foto Dokumentasi">
                                                <i class="bi bi-download me-1"></i> Foto
                                            </a>
                                        @endif

                                        <!-- Tonton/Unduh Video -->
                                        @if ($keg->video)
                                            <a href="{{ $keg->video }}" target="_blank" class="btn btn-outline-danger btn-sm px-2 py-1 rounded-2" title="Tonton Video Dokumentasi">
                                                <i class="bi bi-play-circle-fill me-1"></i> Video
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Modal Foto Ukuran Penuh -->
                    <div class="modal fade" id="modalFotoWasbang{{ $keg->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                                <div class="modal-header bg-dark text-white p-3">
                                    <h6 class="modal-title fw-bold mb-0 text-capitalize">{{ $keg->nama_kegiatan }}</h6>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0 text-center bg-black">
                                    <img src="{{ asset($keg->foto) }}" alt="Dokumentasi" class="img-fluid" style="max-height: 520px; object-fit: contain;">
                                </div>
                                <div class="modal-footer bg-light p-3 d-flex justify-content-between">
                                    <div class="small">
                                        <strong>Waktu:</strong> {{ $keg->tanggal_lengkap }} &bull; <strong>Lokasi:</strong> {{ $keg->tempat_lokasi }}
                                    </div>
                                    <a href="{{ asset($keg->foto) }}" download="Dokumentasi_{{ Str::slug($keg->nama_kegiatan) }}.jpg" class="btn btn-success btn-sm rounded-pill px-3">
                                        <i class="bi bi-download me-1"></i> Unduh Foto Ini
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Rincian Lengkap Kegiatan -->
                    <div class="modal fade" id="modalDetailWasbang{{ $keg->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0 shadow">
                                <div class="modal-header bg-danger text-white p-3">
                                    <h5 class="modal-title fw-bold mb-0">Rincian Laporan Kegiatan Luar</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <span class="badge bg-danger mb-2">{{ $keg->kategori }}</span>
                                    <h4 class="fw-bold text-dark mb-3">{{ $keg->nama_kegiatan }}</h4>

                                    <div class="row g-3 mb-4">
                                        <div class="col-sm-6">
                                            <div class="p-3 bg-light rounded-3 border">
                                                <small class="text-muted d-block"><i class="bi bi-calendar3 me-1"></i> Waktu Pelaksanaan</small>
                                                <strong class="text-dark">{{ $keg->tanggal_lengkap }}</strong>
                                                <div class="small text-secondary">Hari: {{ $keg->hari }} &bull; Bulan: {{ $keg->bulan }} {{ $keg->tahun }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-3 bg-light rounded-3 border">
                                                <small class="text-muted d-block"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Tempat / Lokasi</small>
                                                <strong class="text-dark">{{ $keg->tempat_lokasi }}</strong>
                                                <div class="small text-secondary">Peserta: {{ $keg->peserta ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold text-dark mb-2"><i class="bi bi-card-text text-danger me-1"></i> Narasi &amp; Rincian Pelaksanaan Lapangan:</h6>
                                    <div class="p-3 bg-white border rounded-3 mb-4" style="line-height: 1.6; font-size: 0.92rem;">
                                        {{ $keg->rincian }}
                                    </div>

                                    @if ($keg->foto)
                                        <h6 class="fw-bold text-dark mb-2"><i class="bi bi-images text-primary me-1"></i> Bukti Dokumentasi Fisik:</h6>
                                        <div class="rounded-3 border overflow-hidden mb-3 text-center bg-light">
                                            <img src="{{ asset($keg->foto) }}" alt="Dokumentasi" class="img-fluid" style="max-height: 340px; object-fit: contain;">
                                        </div>
                                    @endif
                                </div>
                                <div class="modal-footer bg-light p-3 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                                    @if ($keg->foto)
                                        <a href="{{ asset($keg->foto) }}" download="Dokumentasi_{{ Str::slug($keg->nama_kegiatan) }}.jpg" class="btn btn-success btn-sm rounded-pill px-4">
                                            <i class="bi bi-download me-1"></i> Unduh Berkas Dokumentasi
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white">
                            <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                            <h5 class="fw-bold text-dark">Belum ada arsip kegiatan yang sesuai filter</h5>
                            <p class="text-muted small mb-3">Silakan reset filter pencarian atau tambahkan pengarsipan kegiatan luar baru.</p>
                            <div>
                                <a href="{{ route('wasbang.index') }}" class="btn btn-outline-danger btn-sm rounded-pill px-4">
                                    Reset Semua Filter
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </main>

    <!-- Modal Form Tambah Arsip Kegiatan Baru -->
    <div class="modal fade" id="modalTambahArsip" tabindex="-1" aria-labelledby="modalTambahArsipLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header bg-danger text-white p-3">
                    <h5 class="modal-title fw-bold" id="modalTambahArsipLabel">
                        <i class="bi bi-file-earmark-plus-fill me-1"></i> Tambah Arsip Dokumentasi Kegiatan Luar
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('wasbang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        
                        <!-- Nama Kegiatan -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Nama / Judul Kegiatan Luar <span class="text-danger">*</span></label>
                            <input type="text" name="nama_kegiatan" class="form-control" placeholder="Contoh: Seleksi Calon Paskibraka Kab. Tanah Laut 2026" required>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Kategori Bidang <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Paskibraka">Paskibraka</option>
                                <option value="Bela Negara">Bela Negara</option>
                                <option value="Bina Ideologi">Bina Ideologi &amp; Pancasila</option>
                                <option value="Karakter Bangsa">Karakter Bangsa</option>
                                <option value="Pembauran Kebangsaan">Pembauran Kebangsaan (FPK)</option>
                            </select>
                        </div>

                        <!-- Waktu: Hari, Tanggal, Bulan, Tahun -->
                        <div class="row g-2 mb-3">
                            <div class="col-6 col-md-3">
                                <label class="form-label fw-semibold small">Hari <span class="text-danger">*</span></label>
                                <select name="hari" class="form-select" required>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label fw-semibold small">Tanggal <span class="text-danger">*</span></label>
                                <input type="number" name="tanggal" min="1" max="31" class="form-control" placeholder="1 - 31" required>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label fw-semibold small">Bulan <span class="text-danger">*</span></label>
                                <select name="bulan" class="form-select" required>
                                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bln)
                                        <option value="{{ $bln }}">{{ $bln }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label fw-semibold small">Tahun <span class="text-danger">*</span></label>
                                <input type="number" name="tahun" value="2026" class="form-control" required>
                            </div>
                        </div>

                        <!-- Tempat & Peserta -->
                        <div class="row g-2 mb-3">
                            <div class="col-md-7">
                                <label class="form-label fw-semibold small">Tempat / Lokasi Pelaksanaan <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lokasi" class="form-control" placeholder="Contoh: Stadion Pertasi Kencana Pelaihari" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-semibold small">Jumlah / Unsur Peserta</label>
                                <input type="text" name="peserta" class="form-control" placeholder="Contoh: 150 Pelajar SLTA">
                            </div>
                        </div>

                        <!-- Rincian -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Rincian Narasi Laporan Kegiatan <span class="text-danger">*</span></label>
                            <textarea name="rincian" rows="3" class="form-control" placeholder="Tuliskan jalannya kegiatan, materi, hasil evaluasi, dan ringkasan pelaksanaan..." required></textarea>
                        </div>

                        <!-- Upload Foto & Video Link -->
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Unggah Foto Dokumentasi (JPG/PNG)</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Tautan Video Dokumentasi (YouTube/Drive)</label>
                                <input type="url" name="video" class="form-control" placeholder="https://youtube.com/watch?v=...">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-light p-3">
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-4 fw-bold">
                            <i class="bi bi-save me-1"></i> Simpan Arsip
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Footer WASBANG -->
    <footer class="bg-dark text-white py-4 mt-auto border-top">
        <div class="container-fluid px-lg-5 px-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 text-secondary small">
                <div>
                    <strong>Bidang Bina Ideologi, Wawasan Kebangsaan, dan Karakter Bangsa</strong><br>
                    Badan Kesatuan Bangsa dan Politik &bull; Kabupaten Tanah Laut &bull; T.A. 2026
                </div>
                <div>
                    <a href="{{ route('portal.home') }}" class="text-light text-decoration-none me-3">Portal Utama</a>
                    <a href="{{ route('parpol.home') }}" class="text-light text-decoration-none">Layanan SIPARPOL</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
