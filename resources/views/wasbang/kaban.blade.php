@extends('layouts.app')

@section('title', 'Ruang Kerja Eksekutif Kepala Badan Kesbangpol - H. Bambang Kusdariman, S.I.P., M.Si.')

@push('styles')
<style>
    .hero-kaban {
        background: linear-gradient(135deg, #090d16 0%, #1e3a8a 60%, #0f172a 100%);
        color: #ffffff;
        padding: 45px 0 35px 0;
        position: relative;
        border-bottom: 4px solid #3b82f6;
    }

    .badge-kaban-role {
        background: rgba(59, 130, 246, 0.2);
        color: #93c5fd;
        border: 1px solid rgba(59, 130, 246, 0.4);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .card-stat-kaban {
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        transition: transform 0.2s;
    }

    .card-stat-kaban:hover {
        transform: translateY(-3px);
    }

    .stat-icon-kaban {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .table-monitoring thead th {
        background: #0f172a;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 14px 12px;
        border: none;
    }

    .table-monitoring tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        font-size: 0.88rem;
    }

    .table-monitoring tbody tr:hover {
        background-color: #f0f7ff;
    }

    .modal-hero-header {
        background: linear-gradient(135deg, #090d16, #1e3a8a);
        color: #ffffff;
        border-bottom: 3px solid #3b82f6;
        padding: 20px 24px;
    }
</style>
@endpush

@section('content')

<!-- Hero Section Khusus Kepala Badan Kesbangpol -->
<section class="hero-kaban">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="badge-kaban-role mb-3">
                    <i class="bi bi-building-fill-check text-info"></i>
                    RUANG KERJA EKSEKUTIF &bull; KEPALA BADAN KESBANGPOL TALA
                </div>
                <h1 class="fw-extrabold text-white mb-2" style="font-size: 2.1rem; line-height: 1.25;">
                    Selamat Datang, Bapak <span class="text-info">H. Bambang Kusdariman, S.I.P., M.Si.</span>
                </h1>
                <p class="text-white-50 mb-3" style="font-size: 0.95rem;">
                    NIP. <strong>19680818 199010 1 003</strong> &bull; Kepala Badan Kesatuan Bangsa dan Politik Kabupaten Tanah Laut
                </p>
                <p class="text-light opacity-75 mb-4" style="max-width: 720px; line-height: 1.6; font-size: 0.9rem;">
                    Anda berada dalam <strong>Panel Supervisi Eksekutif Kepala Badan</strong>. Anda memiliki kewenangan pengawasan tertinggi terhadap seluruh realisasi program kegiatan Bidang Bina Ideologi, Wasbang dan Karakter Bangsa di Kabupaten Tanah Laut, serta pengesahan dokumen Rekapitulasi Berkas Dinas (<em>Mengetahui Kepala Badan</em>).
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-primary px-4 py-2 fw-bold rounded-3 shadow-sm">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Rekapitulasi Eksekutif (Kaban &amp; Kabid)
                    </a>
                    <a href="{{ asset('Panduan_Bimbingan_PKL_Wasbang.pdf') }}" download target="_blank" class="btn btn-outline-light px-3 py-2 fw-semibold rounded-3">
                        <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i> Panduan PDF
                    </a>
                    <a href="{{ route('wasbang.index', ['view' => 'publik']) }}" class="btn btn-outline-info px-3 py-2 fw-semibold rounded-3 text-white">
                        <i class="bi bi-eye-fill me-1"></i> Buka Tampilan Publik
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="p-4 rounded-4 border border-info border-opacity-25" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px);">
                    <div class="mx-auto mb-3 text-info" style="width: 70px; height: 70px; background: rgba(59, 130, 246, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; border: 2px solid #3b82f6;">
                        <i class="bi bi-shield-shaded"></i>
                    </div>
                    <h6 class="fw-bold text-white mb-1">Kepala Badan Kesbangpol</h6>
                    <small class="text-info d-block mb-3">Pemerintah Kabupaten Tanah Laut</small>
                    <div class="p-2 bg-black bg-opacity-30 rounded-3 text-start small border border-white border-opacity-10 text-white-50" style="font-size: 0.78rem;">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Tingkat Otoritas:</span>
                            <strong class="text-info">Kepala Badan (Eksekutif)</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Pengesahan Rekap:</span>
                            <strong class="text-success">Mengetahui Kaban</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Kepala Bidang Wasbang:</span>
                            <strong class="text-warning">Auranti Muraya P., S.STP.</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Utama Dashboard Kepala Badan -->
<section class="py-5 bg-light" style="min-height: 70vh;">
    <div class="container">

        <!-- Indikator Kinerja Utama (IKU) Bidang Wasbang -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-6">
                <div class="card-stat-kaban">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Program Wasbang Terlaksana</div>
                            <h3 class="fw-extrabold text-primary m-0 mt-1">{{ $totalKegiatan }}</h3>
                            <small class="text-success"><i class="bi bi-check2-all me-1"></i>100% Realisasi</small>
                        </div>
                        <div class="stat-icon-kaban bg-primary-subtle text-primary">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-stat-kaban">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Arsip Bukti Otentik (Foto)</div>
                            <h3 class="fw-extrabold text-success m-0 mt-1">{{ $totalFoto }}</h3>
                            <small class="text-muted">Dokumentasi Digital</small>
                        </div>
                        <div class="stat-icon-kaban bg-success-subtle text-success">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-stat-kaban">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Liputan Video Lapangan</div>
                            <h3 class="fw-extrabold text-info m-0 mt-1">{{ $totalVideo }}</h3>
                            <small class="text-muted">Dokumentasi Audio Visual</small>
                        </div>
                        <div class="stat-icon-kaban bg-info-subtle text-info">
                            <i class="bi bi-camera-reels-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-stat-kaban">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Kategori Bidang Aktif</div>
                            <h3 class="fw-extrabold text-dark m-0 mt-1">6</h3>
                            <small class="text-primary fw-semibold">Ideologi, Wasbang &amp; Karakter</small>
                        </div>
                        <div class="stat-icon-kaban bg-dark-subtle text-dark">
                            <i class="bi bi-diagram-3-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Monitoring Program Kebangsaan Tingkat Kabupaten -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
            <div class="p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1 rounded-pill text-uppercase mb-1" style="font-size: 0.72rem;">
                        <i class="bi bi-clipboard-data-fill me-1"></i> Monitoring Eksekutif Kepala Badan
                    </span>
                    <h4 class="fw-bold text-dark m-0">Matriks Capaian Pelaksanaan Kegiatan Bidang Wasbang</h4>
                    <p class="text-muted small m-0 mt-1">
                        Rekapitulasi berkas pertanggungjawaban program yang dilaporkan oleh Kepala Bidang Wasbang (Ibu Auranti Muraya Purihaningrum, S.STP.).
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-primary btn-sm px-3 py-2 fw-bold rounded-3 shadow-sm">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Rekapitulasi (Kaban &amp; Kabid)
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-monitoring align-middle m-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 14%;">Tanggal &amp; Hari</th>
                            <th style="width: 30%;">Program &amp; Nama Kegiatan</th>
                            <th style="width: 18%;">Kategori &amp; Wilayah</th>
                            <th style="width: 15%;">Pelaksana &amp; Sasaran</th>
                            <th style="width: 18%;" class="text-center">Supervisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kegiatans as $index => $kegiatan)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</div>
                                    <small class="text-muted">Hari {{ $kegiatan->hari ?? '-' }}</small>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark mb-1" style="font-size: 0.92rem;">{{ $kegiatan->nama_kegiatan }}</div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold" style="font-size: 0.72rem;">
                                        <i class="bi bi-check2-circle me-1"></i> {{ $kegiatan->status }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle fw-bold mb-1" style="font-size: 0.72rem;">
                                        {{ $kegiatan->kategori }}
                                    </span>
                                    <div class="small text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $kegiatan->lokasi }}</div>
                                </td>
                                <td>
                                    <div class="small fw-semibold text-dark">{{ $kegiatan->pelaksana }}</div>
                                    <small class="text-muted">{{ Str::limit($kegiatan->sasaran_peserta, 30) }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <button type="button" class="btn btn-outline-primary btn-sm px-3 rounded-3" data-bs-toggle="modal" data-bs-target="#modalDetailKaban{{ $kegiatan->id }}">
                                            <i class="bi bi-eye-fill me-1"></i> Tinjau Foto
                                        </button>
                                        <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-outline-warning btn-sm text-dark px-2 rounded-3" title="Lembar Berita Acara">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                    <h6 class="fw-bold text-muted">Belum ada data kegiatan yang terlapor.</h6>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Box Ikhtisar untuk Pimpinan Daerah (Bupati Tanah Laut) -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #090d16, #1e3a8a); color: #ffffff;">
            <div class="card-body p-4 p-md-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="badge bg-info text-dark fw-bold px-3 py-1 rounded-pill mb-2 text-uppercase" style="font-size: 0.72rem;">
                            <i class="bi bi-shield-check me-1"></i> Tanggung Jawab Eksekutif Bakesbangpol
                        </span>
                        <h4 class="fw-bold text-white mb-2">Pengesahan Rekapitulasi Berkas Laporan Tingkat Badan</h4>
                        <p class="text-white-50 m-0" style="line-height: 1.7; font-size: 0.92rem;">
                            Seluruh laporan dokumentasi kegiatan bidang Wasbang telah terarsip secara sistematis dan siap ditandatangani secara resmi dengan format ganda: <strong>Kepala Badan Kesatuan Bangsa dan Politik</strong> (sebelah kiri) dan <strong>Kepala Bidang Wasbang</strong> (sebelah kanan), sebagai bahan laporan berkala kepada Bupati Tanah Laut.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-primary px-4 py-3 fw-bold rounded-3 shadow">
                            <i class="bi bi-printer-fill me-2 fs-5"></i> Cetak Rekapitulasi Eksekutif
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Modal Detail Preview Dokumentasi untuk Kaban -->
@foreach($kegiatans as $kegiatan)
    <div class="modal fade" id="modalDetailKaban{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalDetailKabanLabel{{ $kegiatan->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-hero-header d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-info text-dark fw-bold px-2 py-1 mb-1">{{ $kegiatan->kategori }}</span>
                        <h5 class="modal-title fw-bold text-white m-0">{{ $kegiatan->nama_kegiatan }}</h5>
                        <small class="text-white-50">{{ $kegiatan->hari_tanggal_formatted }} &bull; {{ $kegiatan->lokasi }}</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    @if($kegiatan->jumlah_foto > 0)
                        <div class="mb-3 text-center bg-dark rounded-3 p-2">
                            <img src="{{ $kegiatan->foto_url ?? $kegiatan->semua_foto_urls[0] }}" alt="{{ $kegiatan->nama_kegiatan }}" class="img-fluid rounded-2" style="max-height: 380px; width: 100%; object-fit: contain;">
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm align-middle">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 25%;">Pelaksana</th>
                                    <td>{{ $kegiatan->pelaksana }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Sasaran Peserta</th>
                                    <td>{{ $kegiatan->sasaran_peserta }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Rincian Acara</th>
                                    <td>{{ $kegiatan->rincian }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer bg-light p-3">
                    <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning fw-bold text-dark">
                        <i class="bi bi-printer-fill me-1"></i> Lembar Berita Acara
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

