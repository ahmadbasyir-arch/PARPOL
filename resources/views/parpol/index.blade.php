@extends('layouts.app')

@section('title', 'Data Partai Politik Kab. Tanah Laut Tahun 2026 | Portal Resmi')

@push('styles')
<style>
    /* Hero Section */
    .hero-section {
        background: radial-gradient(circle at 80% 20%, rgba(30, 58, 138, 0.25), transparent 45%),
                    linear-gradient(135deg, #090e1a 0%, #0f172a 50%, #172554 100%);
        color: #ffffff;
        padding: 70px 0 90px;
        position: relative;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(30, 58, 138, 0.4);
        border: 1px solid rgba(96, 165, 250, 0.4);
        color: #93c5fd;
        padding: 7px 18px;
        border-radius: 50px;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.8px;
        margin-bottom: 20px;
    }

    .hero-title {
        font-size: 2.9rem;
        font-weight: 800;
        line-height: 1.2;
        letter-spacing: -1px;
        margin-bottom: 18px;
    }

    .hero-title .highlight {
        background: linear-gradient(120deg, #60a5fa, #38bdf8, #facc15);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-lead {
        font-size: 1.12rem;
        color: #cbd5e1;
        line-height: 1.7;
        margin-bottom: 30px;
        max-width: 700px;
    }

    /* Stats Banner */
    .stats-bar {
        background: #ffffff;
        border-radius: 18px;
        margin-top: -45px;
        box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.1);
        padding: 26px 20px;
        position: relative;
        z-index: 20;
        border: 1px solid #e2e8f0;
    }

    .stat-number {
        font-size: 2.1rem;
        font-weight: 800;
        color: var(--parpol-primary);
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-label {
        font-size: 0.8rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Official Table Styles */
    .table-parpol {
        background: #ffffff;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid #cbd5e1;
    }

    .table-parpol thead th {
        background: #0f172a;
        color: #ffffff;
        font-size: 0.82rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 14px 16px;
        border-bottom: 3px solid var(--parpol-primary);
        vertical-align: middle;
    }

    .table-parpol tbody td {
        padding: 16px 16px;
        vertical-align: top;
        font-size: 0.88rem;
        border-bottom: 1px solid #e2e8f0;
        color: #334155;
    }

    .table-parpol tbody tr:hover {
        background-color: #f8fafc;
    }

    .table-parpol tbody tr:last-child td {
        border-bottom: none;
    }

    .logo-box {
        width: 72px !important;
        min-width: 72px !important;
        max-width: 72px !important;
        height: 72px !important;
        min-height: 72px !important;
        max-height: 72px !important;
        flex-shrink: 0 !important;
        aspect-ratio: 1 / 1 !important;
        background: #ffffff;
        border-radius: 12px;
        border: 1.5px solid #cbd5e1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        box-sizing: border-box;
        overflow: hidden;
    }

    .logo-box img {
        width: 100%;
        height: 100%;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Party Cards */
    .party-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.04);
        transition: all 0.28s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        width: 100%;
        box-sizing: border-box;
    }

    .party-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(15, 23, 42, 0.09);
        border-color: #93c5fd;
    }

    .party-card-header {
        padding: 16px 20px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        box-sizing: border-box;
    }

    .party-card-body {
        padding: 20px;
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        width: 100%;
        box-sizing: border-box;
    }

    .party-card-footer {
        padding: 14px 20px;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        width: 100%;
        box-sizing: border-box;
    }

    .btn-wa {
        background-color: #25d366;
        color: #ffffff;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        padding: 7px 14px;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-wa:hover {
        background-color: #1eb954;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .badge-sk {
        background: #dcfce7;
        color: #15803d;
        border: 1px solid #86efac;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.78rem;
    }

    /* Sebaran Wilayah */
    .wilayah-box {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 20px;
        height: 100%;
    }
</style>
@endpush

@section('content')

    <!-- ================= HERO SECTION ================= -->
    <section class="hero-section" id="beranda">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-8">
                    <div class="hero-badge">
                        <i class="bi bi-shield-check text-warning"></i> REKAPITULASI RESMI TAHUN 2026
                    </div>
                    <h1 class="hero-title">
                        Data Partai Politik <span class="highlight">Kabupaten Tanah Laut</span>
                    </h1>
                    <p class="hero-lead">
                        Portal resmi sistem informasi rekapitulasi data legalitas surat keputusan (SK), susunan pengurus (Ketua, Sekretaris, Bendahara), petugas penghubung (LO), serta alamat kantor sekretariat {{ $totalParpol }} partai politik di Kabupaten Tanah Laut, Provinsi Kalimantan Selatan.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#tabel-data" class="btn btn-primary btn-lg fw-bold px-4 rounded-3 shadow-sm">
                            <i class="bi bi-table me-2"></i> Telusuri Tabel Resmi ({{ $totalParpol }} Parpol)
                        </a>
                        <a href="#galeri-partai" class="btn btn-outline-light btn-lg fw-semibold px-4 rounded-3">
                            <i class="bi bi-grid-3x3-gap me-2"></i> Direktori Kartu & Logo
                        </a>
                        <a href="{{ route('parpol.cetak') }}" target="_blank" class="btn btn-warning btn-lg fw-bold text-dark px-4 rounded-3 shadow-sm">
                            <i class="bi bi-printer-fill me-2"></i> Cetak Laporan A4
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block text-center">
                    <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.12); backdrop-filter: blur(12px);">
                        <div class="d-inline-flex p-3 rounded-circle bg-primary bg-opacity-25 border border-primary text-white mb-3">
                            <i class="bi bi-patch-check-fill fs-1 text-warning"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-1">Status Verifikasi</h4>
                        <span class="badge bg-success px-3 py-2 text-uppercase mb-3">{{ $totalSkAda }} Terverifikasi SK3P3</span>
                        <p class="text-light opacity-75 small mb-3">
                            Sebanyak {{ $totalSkAda }} partai politik telah diverifikasi berkas SK3P3, dan {{ $totalSkBlm }} partai dalam proses verifikasi.
                        </p>
                        <div class="border-top border-secondary pt-3 text-start small text-light opacity-75">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i> {{ $totalPelaihari }} Parpol di Kec. Pelaihari
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i> {{ $totalBatuAmpar }} Parpol di Kec. Batu Ampar
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-telephone-fill text-success me-2"></i> {{ $totalLo }} LO Memiliki Kontak Aktif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= STATS BAR ================= -->
    <div class="container">
        <div class="stats-bar">
            <div class="row text-center g-3">
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-number">{{ $totalParpol }}</div>
                    <div class="stat-label">Partai Politik Terdaftar</div>
                </div>
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-number text-success">{{ $totalSkAda }} / {{ $totalParpol }}</div>
                    <div class="stat-label">Status SK3P3 ({{ $totalSkAda }} Ada, {{ $totalSkBlm }} Proses)</div>
                </div>
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-number text-primary">{{ $totalPelaihari }}</div>
                    <div class="stat-label">Sekretariat di Kec. Pelaihari</div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-number text-danger">{{ $totalBatuAmpar }}</div>
                    <div class="stat-label">Sekretariat di Kec. Batu Ampar</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= TABEL DATA RESMI (PERSIS DOKUMEN FISIK) ================= -->
    <section class="py-5 mt-4" id="tabel-data">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4">
                <div>
                    <span class="section-badge"><i class="bi bi-file-earmark-spreadsheet me-1"></i> Format Resmi Dokumen</span>
                    <h2 class="section-title mb-1">Tabel Data Partai Politik Kab. Tanah Laut Tahun 2026</h2>
                    <p class="text-secondary small mb-0">
                        Disusun persis berdasarkan lembar rekapitulasi partai politik Kabupaten Tanah Laut. Dilengkapi logo berkualitas tinggi dan kontak langsung LO.
                    </p>
                </div>
                <div class="mt-3 mt-md-0 d-flex gap-2">
                    <a href="{{ route('parpol.cetak') }}" target="_blank" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                        <i class="bi bi-printer me-1"></i> Cetak Format Dokumen (A4)
                    </a>
                </div>
            </div>

            <!-- Bilah Pencarian & Filter Cepat -->
            <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white border">
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" id="liveSearchInput" class="form-control border-start-0 ps-0" placeholder="Ketik nama partai (misal: PKB, Gerindra, Golkar, PKS) atau nama pengurus..." onkeyup="filterParpolTable()">
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end d-flex flex-wrap gap-2 justify-content-md-end">
                        <button class="btn btn-sm btn-outline-primary active filter-btn" onclick="filterByKecamatan('all', this)">Semua ({{ $totalParpol }})</button>
                        <button class="btn btn-sm btn-outline-primary filter-btn" onclick="filterByKecamatan('Pelaihari', this)">Kec. Pelaihari ({{ $totalPelaihari }})</button>
                        <button class="btn btn-sm btn-outline-primary filter-btn" onclick="filterByKecamatan('Batu Ampar', this)">Kec. Batu Ampar ({{ $totalBatuAmpar }})</button>
                    </div>
                </div>
            </div>

            <!-- Tabel Responsif -->
            <div class="table-responsive shadow-sm rounded-4">
                <table class="table table-parpol table-hover align-middle mb-0" id="mainParpolTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th style="min-width: 240px;">PARPOL</th>
                            <th style="min-width: 220px;">LEGALITAS</th>
                            <th style="min-width: 260px;">PENGURUS</th>
                            <th style="min-width: 240px;">ALAMAT KANTOR</th>
                            <th class="text-center" style="width: 80px;">SK3P3</th>
                            <th class="text-center" style="width: 100px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parpols as $p)
                            <tr class="parpol-row" data-kecamatan="{{ $p->kecamatan }}" data-search="{{ strtolower($p->nama_partai . ' ' . $p->akronim . ' ' . $p->ketua . ' ' . $p->sekretaris . ' ' . $p->bendahara . ' ' . $p->lo_nama . ' ' . $p->alamat . ' ' . $p->no_sk) }}">
                                <!-- NO -->
                                <td class="text-center fw-bold fs-5 text-secondary">
                                    {{ $p->nomor_urut }}
                                </td>

                                <!-- PARPOL & LOGO -->
                                <td>
                                    <div class="d-flex align-items-center gap-3" style="min-width: 220px;">
                                        <div class="logo-box flex-shrink-0">
                                            <img src="{{ asset($p->logo) }}?v=3" alt="Logo {{ $p->akronim }}">
                                        </div>
                                        <div>
                                            <h6 class="fw-bold text-dark mb-0">{{ $p->akronim }}</h6>
                                            <span class="small text-muted">{{ $p->nama_partai }}</span>
                                            @if ($p->pendidikanPolitik->count() > 0)
                                                <div>
                                                    <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill px-2 py-0 mt-1" style="font-size: 0.72rem;">
                                                        <i class="bi bi-mortarboard-fill me-1"></i> Ada Laporan Dikpol ({{ $p->pendidikanPolitik->count() }} Kegiatan)
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- LEGALITAS -->
                                <td>
                                    <div class="small">
                                        <span class="text-muted d-block">No SK Kepengurusan:</span>
                                        <strong class="text-dark">{{ $p->no_sk }}</strong>
                                        @if ($p->tanggal_sk)
                                            <div class="text-muted mt-1">
                                                <i class="bi bi-calendar-check me-1 text-primary"></i> {{ $p->tanggal_sk }}
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <!-- PENGURUS -->
                                <td>
                                    <div class="small">
                                        <div class="mb-1">
                                            <span class="text-muted">Ketua:</span> <strong>{{ $p->ketua }}</strong>
                                            @if ($p->no_hp_ketua && $p->no_hp_ketua != '-')
                                                <span class="text-muted">({{ $p->no_hp_ketua }})</span>
                                            @endif
                                        </div>
                                        <div class="mb-1">
                                            <span class="text-muted">Sekretaris:</span> <strong>{{ $p->sekretaris }}</strong>
                                        </div>
                                        <div class="mb-1">
                                            <span class="text-muted">Bendahara:</span> <strong>{{ $p->bendahara }}</strong>
                                        </div>
                                        <div class="mt-2 pt-1 border-top">
                                            <span class="text-muted">LO:</span> 
                                            <strong class="text-primary">{{ $p->lo_nama }}</strong>
                                            @if ($p->lo_hp)
                                                <br>
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (str_starts_with($p->lo_hp, '0') ? '62' . substr($p->lo_hp, 1) : $p->lo_hp)) }}" target="_blank" class="btn btn-wa mt-1">
                                                    <i class="bi bi-whatsapp"></i> {{ $p->lo_hp }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- ALAMAT -->
                                <td>
                                    <div class="small">
                                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                                        {{ $p->alamat }}
                                        <div class="mt-1">
                                            <span class="badge bg-light text-secondary border">Kec. {{ $p->kecamatan }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- SK3P3 -->
                                <td class="text-center">
                                    @if (strtolower($p->sk3p3) === 'ada')
                                        <span class="badge-sk">
                                            <i class="bi bi-check2-circle me-1"></i> Ada
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark border border-warning rounded-pill px-2 py-1 fw-semibold small">
                                            <i class="bi bi-hourglass-split me-1"></i> Belum
                                        </span>
                                    @endif
                                </td>

                                <!-- AKSI -->
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary w-100 mb-1" data-bs-toggle="modal" data-bs-target="#modalParpol{{ $p->id }}">
                                        <i class="bi bi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ================= GALERI DIREKTORI KARTU (MODERN VIEW) ================= -->
    <section class="py-5 bg-white border-top border-bottom" id="galeri-partai">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-grid-3x3-gap me-1"></i> Direktori Profil</span>
                <h2 class="section-title">Direktori Kartu {{ $totalParpol }} Partai Politik</h2>
                <p class="section-subtitle">
                    Tampilan kartu visual modern yang memudahkan pembaca melihat lambang partai, pimpinan DPC/DPD, dan nomor WhatsApp petugas penghubung.
                </p>
            </div>

            <div class="row g-4">
                @foreach ($parpols as $p)
                    <div class="col-md-6 col-lg-4">
                        <div class="party-card">
                            <div class="party-card-header bg-light border-bottom">
                                <span class="badge bg-dark rounded-pill px-3 py-2 fw-bold">NO. {{ $p->nomor_urut }}</span>
                                @if (strtolower($p->sk3p3) === 'ada')
                                    <span class="badge-sk"><i class="bi bi-check-circle-fill me-1"></i> SK3P3: Ada</span>
                                @else
                                    <span class="badge bg-warning text-dark border border-warning rounded-pill px-2 py-1 fw-bold small"><i class="bi bi-hourglass-split me-1"></i> SK3P3: Belum</span>
                                @endif
                            </div>

                            <div class="party-card-body text-center">
                                <div class="mx-auto mb-3" style="width: 90px; height: 90px; padding: 6px; background: #ffffff; border-radius: 12px; border: 1.5px solid #cbd5e1; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                                    <img src="{{ asset($p->logo) }}?v=4" alt="Logo {{ $p->akronim }}" style="max-width: 90%; max-height: 90%; object-fit: contain;">
                                </div>

                                <h5 class="fw-bold text-dark mb-1">{{ $p->akronim }}</h5>
                                <p class="text-muted small mb-2" style="min-height: 38px;">{{ $p->nama_partai }}</p>

                                @if ($p->pendidikanPolitik->count() > 0)
                                    <div class="mb-2">
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill px-3 py-1 small fw-semibold">
                                            <i class="bi bi-mortarboard-fill me-1"></i> {{ $p->pendidikanPolitik->count() }} Kegiatan Dikpol Terlaksana
                                        </span>
                                    </div>
                                @endif

                                <div class="text-start p-3 rounded-3 bg-light border small mb-3 mt-auto">
                                    <div class="mb-1 text-break">
                                        <span class="text-muted">Ketua:</span> <strong class="text-dark">{{ $p->ketua }}</strong>
                                    </div>
                                    <div class="mb-1 text-break">
                                        <span class="text-muted">Sekretaris:</span> <strong class="text-dark">{{ $p->sekretaris }}</strong>
                                    </div>
                                    <div class="mb-1 text-break">
                                        <span class="text-muted">Bendahara:</span> <strong class="text-dark">{{ $p->bendahara }}</strong>
                                    </div>
                                    <div class="mb-0 text-break">
                                        <span class="text-muted">LO:</span> <strong class="text-primary">{{ $p->lo_nama }}</strong>
                                    </div>
                                </div>

                                <div class="text-start small text-secondary">
                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ Str::limit($p->alamat, 75) }}
                                </div>
                            </div>

                            <div class="party-card-footer d-flex justify-content-between align-items-center gap-2">
                                <button class="btn {{ $p->pendidikanPolitik->count() > 0 ? 'btn-outline-primary' : 'btn-outline-secondary' }} btn-sm" data-bs-toggle="modal" data-bs-target="#modalParpol{{ $p->id }}">
                                    <i class="bi bi-info-circle me-1"></i> {{ $p->pendidikanPolitik->count() > 0 ? 'Rincian & Dikpol' : 'Rincian SK' }}
                                </button>
                                @if ($p->lo_hp)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (str_starts_with($p->lo_hp, '0') ? '62' . substr($p->lo_hp, 1) : $p->lo_hp)) }}" target="_blank" class="btn btn-wa btn-sm">
                                        <i class="bi bi-whatsapp"></i> Hubungi LO
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= SEBARAN WILAYAH SEKRETARIAT ================= -->
    <section class="py-5" id="sebaran">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-map me-1"></i> Pemetaan Kantor</span>
                <h2 class="section-title">Sebaran Kantor Sekretariat Partai Politik</h2>
                <p class="section-subtitle">
                    Distribusi letak kantor DPC/DPD partai politik di wilayah Kabupaten Tanah Laut berdasarkan kelurahan dan kecamatan.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="wilayah-box shadow-sm">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <div>
                                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Kecamatan Pelaihari</h5>
                                <span class="small text-muted">Ibu Kota Kabupaten Tanah Laut</span>
                            </div>
                            <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill">{{ $totalPelaihari }} Partai</span>
                        </div>
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Kelurahan Angsau</strong>
                                    <div class="text-muted">Jl. Boejasin, Jl. KH Mansyur, Jl. Ks Tubun, Jl. Almanar, Puri Anggoro, Jl. Al Jihad Manunggal</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">7 Parpol (PKB, Gerindra, Golkar, NasDem, Demokrat, PSI, Ummat)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Kelurahan Pelaihari</strong>
                                    <div class="text-muted">Jl. Majakeling No.10, Jl. Norsehat, Jl. Gembira No.29</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">3 Parpol (PBB, Gema Bangsa, Garuda)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Kelurahan Sarang Halang</strong>
                                    <div class="text-muted">Jl. A. Yani, Jl. A. Syairani</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">3 Parpol (Gelora, PKS, Hanura)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Kelurahan Karang Taruna</strong>
                                    <div class="text-muted">Jl. Raya Takisung, Komp. Permata Jingga, Komp. Perumahan SATP</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">3 Parpol (PAN, Perindo, PPP)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Kelurahan Pabahanan</strong>
                                    <div class="text-muted">Jl. A. Yani Rt.04 Rw.02</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">1 Parpol (PDI Perjuangan)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Desa Atu Atu</strong>
                                    <div class="text-muted">Jl. Kolonel Soepirman Rt.03 Rw.01 No.86</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">1 Parpol (PKN)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Desa Panggung</strong>
                                    <div class="text-muted">Jl. Pondok Indah III Desa Panggung</div>
                                </div>
                                <span class="badge bg-secondary rounded-pill">1 Parpol (Partai Buruh)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="wilayah-box shadow-sm">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <div>
                                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Kecamatan Batu Ampar</h5>
                                <span class="small text-muted">Wilayah Luar Ibu Kota</span>
                            </div>
                            <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill">1 Partai</span>
                        </div>
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Desa Damit Hulu</strong>
                                    <div class="text-muted">Jl. Damit Hulu RT. 05 Desa Damit Hulu</div>
                                </div>
                                <span class="badge bg-danger rounded-pill">1 Parpol (Partai Gerakan Rakyat)</span>
                            </li>
                        </ul>

                        <div class="p-3 bg-light rounded-3 mt-4 border">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-info-circle-fill text-info me-1"></i> Catatan Keterbukaan Publik</h6>
                            <p class="small text-secondary mb-0">
                                Seluruh alamat sekretariat di atas tercatat resmi pada dokumen pendataan partai politik Kabupaten Tanah Laut Tahun 2026 dan dapat dikunjungi untuk urusan koordinasi atau kepemiluan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= UPDATE DATA PENGURUS / LO ================= -->
    <section class="py-5 bg-white border-top border-bottom" id="lapor">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="section-badge"><i class="bi bi-pencil-square me-1"></i> Layanan Khusus Parpol</span>
                    <h2 class="section-title mb-3">Pengkinian / Perubahan Data DPC Parpol</h2>
                    <p class="text-secondary mb-4">
                        Bagi pengurus DPC/DPD atau Liaison Officer (LO) partai politik di Kabupaten Tanah Laut yang memiliki pembaharuan Surat Keputusan (SK) atau pergantian pengurus, silakan ajukan laporan perubahan melalui formulir ini.
                    </p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3">
                            <div class="text-primary fs-4"><i class="bi bi-file-earmark-arrow-up"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Lampirkan Nomor SK Terbaru</h6>
                                <p class="text-secondary small mb-0">Pastikan nomor SK DPP/DPD dan tanggal penetapan dicantumkan lengkap.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="text-primary fs-4"><i class="bi bi-whatsapp"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Konfirmasi Kontak LO</h6>
                                <p class="text-secondary small mb-0">Tim verifikator akan menghubungi nomor WhatsApp LO terdaftar untuk verifikasi dokumen.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="p-4 rounded-4 border bg-light shadow-sm">
                        <h4 class="fw-bold text-dark mb-3">Formulir Permohonan Pembaruan Data</h4>

                        @if (session('lapor_success'))
                            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                                <div>
                                    <strong>Laporan Terkirim!</strong> {{ session('lapor_success') }}
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('parpol.lapor') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Pilih Partai Politik <span class="text-danger">*</span></label>
                                    <select class="form-select" name="nama_partai" required>
                                        <option value="">-- Pilih Partai --</option>
                                        @foreach ($parpols as $p)
                                            <option value="{{ $p->akronim }} - {{ $p->nama_partai }}">{{ $p->nomor_urut }}. {{ $p->akronim }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Nama Pemohon / Pelapor <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama_pemohon" placeholder="Nama lengkap Anda" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Jabatan di Partai <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jabatan" placeholder="Contoh: LO / Sekretaris DPC" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">No. WhatsApp Aktif <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="no_hp" placeholder="08xxxxxxxxxx" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">Rincian Perubahan Data <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="rincian_perubahan" rows="4" placeholder="Sampaikan perubahan yang diajukan (misal: Nomor SK baru, pergantian nama pengurus, atau pemindahan alamat kantor)..." required></textarea>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                        <i class="bi bi-send-check me-2"></i> Kirim Permohonan Pembaruan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= MODAL DETAIL PROFIL TIAP PARTAI ================= -->
    @foreach ($parpols as $p)
        <div class="modal fade" id="modalParpol{{ $p->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $p->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered {{ $p->pendidikanPolitik->count() > 0 ? 'modal-xl' : 'modal-lg' }}">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header bg-dark text-white p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 55px; height: 55px; background: #ffffff; border-radius: 10px; padding: 4px; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ asset($p->logo) }}?v=3" alt="Logo {{ $p->akronim }}" style="max-width: 95%; max-height: 95%; object-fit: contain;">
                            </div>
                            <div>
                                <span class="badge bg-danger text-uppercase px-2 py-1 mb-1">Nomor Urut {{ $p->nomor_urut }}</span>
                                <h4 class="modal-title fw-bold mb-0" id="modalLabel{{ $p->id }}">{{ $p->akronim }}</h4>
                                <span class="small text-light opacity-75">{{ $p->nama_partai }}</span>
                            </div>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4">
                        @if ($p->pendidikanPolitik->count() > 0)
                            <!-- Nav Tabs Khusus Partai yang Memiliki Laporan Dikpol -->
                            <ul class="nav nav-pills nav-fill mb-4 p-1 bg-light rounded-3 border" id="modalTab{{ $p->id }}" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active fw-bold py-2" id="profil-tab{{ $p->id }}" data-bs-toggle="tab" data-bs-target="#profil-content{{ $p->id }}" type="button" role="tab" aria-controls="profil-content{{ $p->id }}" aria-selected="true">
                                        <i class="bi bi-shield-check me-1"></i> Legalitas & Struktur Pengurus
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold py-2" id="dikpol-tab{{ $p->id }}" data-bs-toggle="tab" data-bs-target="#dikpol-content{{ $p->id }}" type="button" role="tab" aria-controls="dikpol-content{{ $p->id }}" aria-selected="false">
                                        <i class="bi bi-mortarboard-fill me-1 text-warning"></i> Realisasi Pendidikan Politik 2026
                                        <span class="badge bg-danger ms-1">{{ $p->pendidikanPolitik->count() }} Kegiatan</span>
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="modalTabContent{{ $p->id }}">
                                <!-- Tab 1: Legalitas & Struktur -->
                                <div class="tab-pane fade show active" id="profil-content{{ $p->id }}" role="tabpanel" aria-labelledby="profil-tab{{ $p->id }}">
                        @endif

                        <div class="row g-4">
                            <!-- Kolom Kiri: Legalitas & Alamat -->
                            <div class="col-md-6 border-end-md">
                                <h6 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-file-earmark-check me-1"></i> Legalitas Kepengurusan
                                </h6>
                                <div class="p-3 bg-light rounded-3 mb-3 small">
                                    <div class="text-muted">Nomor Surat Keputusan (SK):</div>
                                    <strong class="text-dark fs-6">{{ $p->no_sk }}</strong>
                                    @if ($p->tanggal_sk)
                                        <div class="text-muted mt-2">Tanggal Penetapan SK:</div>
                                        <strong>{{ $p->tanggal_sk }}</strong>
                                    @endif
                                    <div class="text-muted mt-2">Status SK3P3:</div>
                                    @if (strtolower($p->sk3p3) === 'ada')
                                        <span class="badge bg-success text-uppercase">{{ $p->sk3p3 }} (Terverifikasi)</span>
                                    @else
                                        <span class="badge bg-warning text-dark text-uppercase">{{ $p->sk3p3 }} (Dalam Proses)</span>
                                    @endif
                                </div>

                                <h6 class="fw-bold text-primary mb-2">
                                    <i class="bi bi-geo-alt me-1"></i> Alamat Kantor Sekretariat
                                </h6>
                                <p class="small text-secondary mb-2">
                                    {{ $p->alamat }}
                                </p>
                                <div class="small text-muted mb-3">
                                    Kelurahan/Desa: <strong>{{ $p->kelurahan_desa ?? '-' }}</strong><br>
                                    Kecamatan: <strong>{{ $p->kecamatan }}</strong><br>
                                    Kabupaten: <strong>{{ $p->kabupaten }}, {{ $p->provinsi }}</strong>
                                </div>
                                <a href="https://www.google.com/maps/search/{{ urlencode($p->alamat) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-map me-1"></i> Buka di Google Maps
                                </a>
                            </div>

                            <!-- Kolom Kanan: Susunan Pengurus & LO -->
                            <div class="col-md-6 ps-md-4">
                                <h6 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-people me-1"></i> Susunan Pengurus DPC / DPD
                                </h6>
                                <div class="list-group list-group-flush small mb-3">
                                    <div class="list-group-item px-0">
                                        <span class="text-muted d-block">Ketua:</span>
                                        <strong class="fs-6 text-dark">{{ $p->ketua }}</strong>
                                        @if ($p->no_hp_ketua && $p->no_hp_ketua != '-')
                                            <div class="text-muted small">No. HP: {{ $p->no_hp_ketua }}</div>
                                        @endif
                                    </div>
                                    <div class="list-group-item px-0">
                                        <span class="text-muted d-block">Sekretaris:</span>
                                        <strong class="fs-6 text-dark">{{ $p->sekretaris }}</strong>
                                    </div>
                                    <div class="list-group-item px-0">
                                        <span class="text-muted d-block">Bendahara:</span>
                                        <strong class="fs-6 text-dark">{{ $p->bendahara }}</strong>
                                    </div>
                                </div>

                                <div class="p-3 rounded-3 bg-primary bg-opacity-10 border border-primary-subtle">
                                    <span class="text-primary fw-bold small text-uppercase d-block mb-1">Petugas Penghubung (LO)</span>
                                    <h6 class="fw-bold text-dark mb-1">{{ $p->lo_nama }}</h6>
                                    @if ($p->lo_hp)
                                        <span class="text-muted small d-block mb-2">Kontak / WhatsApp: {{ $p->lo_hp }}</span>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (str_starts_with($p->lo_hp, '0') ? '62' . substr($p->lo_hp, 1) : $p->lo_hp)) }}" target="_blank" class="btn btn-wa w-100 justify-content-center">
                                            <i class="bi bi-whatsapp"></i> Chat WhatsApp LO
                                        </a>
                                    @else
                                        <span class="text-muted small">Kontak belum tercantum</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($p->pendidikanPolitik->count() > 0)
                                </div><!-- End Tab 1 -->

                                <!-- Tab 2: Realisasi Pendidikan Politik -->
                                <div class="tab-pane fade" id="dikpol-content{{ $p->id }}" role="tabpanel" aria-labelledby="dikpol-tab{{ $p->id }}">
                                    <!-- Banner Header Laporan -->
                                    <div class="p-3 mb-4 rounded-3 text-white d-flex flex-wrap align-items-center justify-content-between gap-3 shadow-sm" style="background: linear-gradient(135deg, #1e3a8a, #0f172a);">
                                        <div>
                                            <span class="badge bg-warning text-dark fw-bold text-uppercase px-2 py-1 mb-1">
                                                <i class="bi bi-file-earmark-bar-graph-fill me-1"></i> Bantuan Keuangan Parpol (Banpol) T.A. 2026
                                            </span>
                                            <h5 class="fw-bold mb-1">Realisasi Pendidikan Politik DPD {{ $p->akronim }}</h5>
                                            <div class="small opacity-75">Periode Pelaksanaan: <strong>Januari s.d. Agustus T.A. 2026</strong> &bull; Kabupaten Tanah Laut</div>
                                        </div>
                                        <div>
                                            <span class="badge bg-success bg-opacity-25 border border-success text-white px-3 py-2 fs-6">
                                                <i class="bi bi-check2-circle me-1"></i> 100% Selesai Dilaporkan
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 3 Stat Cards Ringkasan -->
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded-3 border text-center h-100">
                                                <span class="text-muted small text-uppercase fw-bold d-block mb-1">Total Realisasi Anggaran</span>
                                                <h4 class="fw-bold text-success mb-0">Rp {{ number_format($p->pendidikanPolitik->sum('jumlah_biaya'), 0, ',', '.') }}</h4>
                                                <span class="small text-muted">Realisasi pos pendidikan politik</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded-3 border text-center h-100">
                                                <span class="text-muted small text-uppercase fw-bold d-block mb-1">Total Partisipasi Peserta</span>
                                                <h4 class="fw-bold text-primary mb-0">{{ $p->pendidikanPolitik->sum('peserta_jumlah') }} Orang</h4>
                                                <span class="small text-muted">Kader DPD, DPC & Ranting</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded-3 border text-center h-100">
                                                <span class="text-muted small text-uppercase fw-bold d-block mb-1">Jumlah Agenda Terlaksana</span>
                                                <h4 class="fw-bold text-dark mb-0">{{ $p->pendidikanPolitik->count() }} Kegiatan</h4>
                                                <span class="small text-muted">Rakornas, Sarasehan, Monev, PPS</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Rekapitulasi Realisasi -->
                                    <div class="table-responsive rounded-3 border shadow-sm mb-4">
                                        <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th class="text-center" style="width: 45px;">NO</th>
                                                    <th>NAMA PENDIDIKAN POLITIK</th>
                                                    <th style="min-width: 140px;">TANGGAL</th>
                                                    <th class="text-center" style="width: 110px;">PESERTA</th>
                                                    <th class="text-end" style="min-width: 130px;">JUMLAH BIAYA</th>
                                                    <th class="text-center" style="min-width: 140px;">DOKUMENTASI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($p->pendidikanPolitik as $idx => $keg)
                                                    <tr>
                                                        <td class="text-center fw-bold text-secondary">{{ $idx + 1 }}</td>
                                                        <td>
                                                            <strong class="text-dark d-block text-capitalize">{{ $keg->nama_kegiatan }}</strong>
                                                            @if ($keg->keterangan)
                                                                <span class="small text-muted">{{ $keg->keterangan }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <i class="bi bi-calendar3 text-primary me-1"></i> {{ $keg->tanggal_pelaksanaan }}
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge bg-primary rounded-pill px-2 py-1">{{ $keg->peserta_jumlah }} Orang</span>
                                                            <div class="small text-muted mt-1"><i class="bi bi-check-circle-fill text-success"></i> Kader</div>
                                                        </td>
                                                        <td class="text-end fw-bold text-dark">
                                                            Rp {{ number_format($keg->jumlah_biaya, 0, ',', '.') }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($keg->dokumentasi)
                                                                <a href="{{ asset($keg->dokumentasi) }}" target="_blank" title="Klik untuk membuka foto asli">
                                                                    <img src="{{ asset($keg->dokumentasi) }}" alt="Dokumentasi {{ $keg->nama_kegiatan }}" class="rounded shadow-sm border" style="width: 120px; height: 58px; object-fit: cover;">
                                                                </a>
                                                                <div class="small text-muted mt-1" style="font-size: 0.72rem;"><i class="bi bi-zoom-in"></i> Klik perbesar</div>
                                                            @else
                                                                <span class="text-muted small">-</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-light fw-bold">
                                                <tr>
                                                    <td colspan="3" class="text-end text-uppercase">Total Rekapitulasi:</td>
                                                    <td class="text-center text-primary fs-6">{{ $p->pendidikanPolitik->sum('peserta_jumlah') }} Kader</td>
                                                    <td class="text-end text-success fs-6">Rp {{ number_format($p->pendidikanPolitik->sum('jumlah_biaya'), 0, ',', '.') }}</td>
                                                    <td class="text-center text-muted small">6 Berkas Foto Fisik</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <!-- Catatan Sumber Dokumen Fisik -->
                                    <div class="p-3 bg-light rounded-3 border small text-secondary d-flex align-items-center justify-content-between flex-wrap gap-2">
                                        <div>
                                            <i class="bi bi-info-circle-fill text-primary me-1"></i>
                                            Sumber Data: <strong>Lembar Asli Realisasi Pendidikan Politik DPD PKS Kabupaten Tanah Laut Periode Januari s.d. Agustus T.A. 2026</strong>.
                                        </div>
                                        <div>
                                            <span class="badge bg-secondary">Format Pertanggungjawaban Banpol 2026</span>
                                        </div>
                                    </div>
                                </div><!-- End Tab 2 -->
                            </div><!-- End Tab Content -->
                        @endif
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')
<script>
    // Live Search Filter Tabel
    function filterParpolTable() {
        let input = document.getElementById('liveSearchInput').value.toLowerCase();
        let rows = document.querySelectorAll('.parpol-row');

        rows.forEach(row => {
            let searchContent = row.getAttribute('data-search');
            if (searchContent.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Filter berdasarkan Kecamatan
    function filterByKecamatan(kec, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        let rows = document.querySelectorAll('.parpol-row');
        rows.forEach(row => {
            let rowKec = row.getAttribute('data-kecamatan');
            if (kec === 'all' || rowKec === kec) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endpush
