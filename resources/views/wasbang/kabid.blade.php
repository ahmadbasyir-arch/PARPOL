@extends('layouts.app')

@section('title', 'Ruang Kerja Kepala Bidang Wasbang - Ibu Auranti Muraya Purihaningrum, S.STP.')

@push('styles')
<style>
    .hero-kabid {
        background: linear-gradient(135deg, #450a0a 0%, #1e1b4b 60%, #0f172a 100%);
        color: #ffffff;
        padding: 45px 0 35px 0;
        position: relative;
        border-bottom: 4px solid #f59e0b;
    }

    .badge-kabid-role {
        background: rgba(245, 158, 11, 0.2);
        color: #fcd34d;
        border: 1px solid rgba(245, 158, 11, 0.4);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .card-stat-kabid {
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        transition: transform 0.2s;
    }

    .card-stat-kabid:hover {
        transform: translateY(-3px);
    }

    .stat-icon-kabid {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .table-verifikasi thead th {
        background: #1e1b4b;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 14px 12px;
        border: none;
    }

    .table-verifikasi tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        font-size: 0.88rem;
    }

    .table-verifikasi tbody tr:hover {
        background-color: #fdf2f2;
    }

    .btn-action-pimpinan {
        font-size: 0.8rem;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .modal-hero-header {
        background: linear-gradient(135deg, #0f172a, #450a0a);
        color: #ffffff;
        border-bottom: 3px solid #b91c1c;
        padding: 20px 24px;
    }
</style>
@endpush

@section('content')

<!-- Hero Section Khusus Ibu Kabid Wasbang -->
<section class="hero-kabid">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="badge-kabid-role mb-3">
                    <i class="bi bi-patch-check-fill text-warning"></i>
                    PANEL KERJA KEPALA BIDANG &bull; VERIFIKATOR &amp; PENGESAH LAPORAN
                </div>
                <h1 class="fw-extrabold text-white mb-2" style="font-size: 2.1rem; line-height: 1.25;">
                    Selamat Datang, Ibu <span class="text-warning">Auranti Muraya Purihaningrum, S.STP.</span>
                </h1>
                <p class="text-white-50 mb-3" style="font-size: 0.95rem;">
                    NIP. <strong>198605022004122001</strong> &bull; Kepala Bidang Bina Ideologi, Wawasan Kebangsaan dan Karakter Bangsa
                </p>
                <p class="text-light opacity-75 mb-4" style="max-width: 720px; line-height: 1.6; font-size: 0.9rem;">
                    Anda berada dalam <strong>Ruang Kerja Pimpinan Bidang</strong>. Halaman ini khusus disediakan bagi Anda untuk meninjau hasil dokumentasi foto kegiatan yang telah diarsipkan oleh staf pelaksana lapangan, memverifikasi kelengkapan bukti fisik, serta mengesahkan dan mencetak lembar Berita Acara resmi kedinasan.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-warning px-4 py-2 fw-bold text-dark rounded-3 shadow-sm">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Rekapitulasi Dinas (A4)
                    </a>
                    <a href="{{ asset('Panduan_Bimbingan_PKL_Wasbang.pdf') }}" download target="_blank" class="btn btn-outline-light px-3 py-2 fw-semibold rounded-3">
                        <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i> Panduan PDF
                    </a>
                    <a href="{{ route('wasbang.index', ['view' => 'publik']) }}" class="btn btn-outline-warning px-3 py-2 fw-semibold rounded-3 text-white">
                        <i class="bi bi-eye-fill me-1"></i> Lihat Portal Publik (Tampilan Tamu)
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="p-4 rounded-4 border border-warning border-opacity-25" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px);">
                    <div class="mx-auto mb-3 text-warning" style="width: 70px; height: 70px; background: rgba(245, 158, 11, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; border: 2px solid #f59e0b;">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <h6 class="fw-bold text-white mb-1">Kepala Bidang Wasbang</h6>
                    <small class="text-warning d-block mb-3">Bakesbangpol Kab. Tanah Laut</small>
                    <div class="p-2 bg-black bg-opacity-30 rounded-3 text-start small border border-white border-opacity-10 text-white-50" style="font-size: 0.78rem;">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Status Otoritas:</span>
                            <strong class="text-success">Pengesah Resmi</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Kewenangan Cetak:</span>
                            <strong class="text-white">Berita Acara &amp; Rekap</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Input Teknis Foto:</span>
                            <strong class="text-warning">Oleh Staf Pelaksana</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Utama Dashboard Kabid -->
<section class="py-5 bg-light" style="min-height: 70vh;">
    <div class="container">

        <!-- Notifikasi jika ada -->
        @if(session('wasbang_success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm p-4 mb-4" role="alert" style="border-left: 6px solid #22c55e !important;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-3 text-success me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Pemberitahuan Sistem</h6>
                        <span class="small text-muted">{{ session('wasbang_success') }}</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Statistik Ringkasan Eksekutif Bidang Wasbang -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-6">
                <div class="card-stat-kabid">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Agenda Kegiatan Lapangan</div>
                            <h3 class="fw-extrabold text-dark m-0 mt-1">{{ $totalKegiatan }}</h3>
                            <small class="text-success"><i class="bi bi-check-circle me-1"></i>Terdata Lengkap</small>
                        </div>
                        <div class="stat-icon-kabid bg-danger-subtle text-danger">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-stat-kabid">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Dokumentasi Foto Masuk</div>
                            <h3 class="fw-extrabold text-success m-0 mt-1">{{ $totalFoto }}</h3>
                            <small class="text-muted">Bukti Otentik Lapangan</small>
                        </div>
                        <div class="stat-icon-kabid bg-success-subtle text-success">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-stat-kabid">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Kesiapan Berita Acara</div>
                            <h3 class="fw-extrabold text-warning m-0 mt-1">100%</h3>
                            <small class="text-warning fw-semibold"><i class="bi bi-patch-check-fill me-1"></i>Siap Ditandatangani</small>
                        </div>
                        <div class="stat-icon-kabid bg-warning-subtle text-warning">
                            <i class="bi bi-file-earmark-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-stat-kabid">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small fw-semibold">Rekaman Video Kegiatan</div>
                            <h3 class="fw-extrabold text-info m-0 mt-1">{{ $totalVideo }}</h3>
                            <small class="text-muted">Liputan Audio Visual</small>
                        </div>
                        <div class="stat-icon-kabid bg-info-subtle text-info">
                            <i class="bi bi-film"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Verifikasi dan Lembar Pengesahan Berita Acara -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
            <div class="p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-1 rounded-pill text-uppercase mb-1" style="font-size: 0.72rem;">
                        <i class="bi bi-shield-check me-1"></i> Tugas Pokok Kepala Bidang
                    </span>
                    <h4 class="fw-bold text-dark m-0">Daftar Dokumentasi Kegiatan yang Memerlukan Pengesahan</h4>
                    <p class="text-muted small m-0 mt-1">
                        Berikut adalah daftar agenda luar lapangan yang telah diarsipkan oleh staf. Klik <strong>Cetak Berita Acara</strong> untuk mencetak lembar laporan resmi bertanda tangan Anda.
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-warning btn-sm px-3 py-2 fw-bold text-dark rounded-3 shadow-sm">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Rekapitulasi Keseluruhan (A4)
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-verifikasi align-middle m-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 14%;">Tanggal &amp; Hari</th>
                            <th style="width: 28%;">Nama Kegiatan Lapangan</th>
                            <th style="width: 18%;">Kategori &amp; Lokasi</th>
                            <th style="width: 13%;">Dokumentasi Foto</th>
                            <th style="width: 22%;" class="text-center">Aksi Pengesahan Kabid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kegiatans as $index => $kegiatan)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark">{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</div>
                                    <span class="badge bg-light text-danger border border-danger-subtle fw-semibold" style="font-size: 0.75rem;">
                                        Hari {{ $kegiatan->hari ?? \Carbon\Carbon::parse($kegiatan->tanggal)->locale('id')->isoFormat('dddd') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark mb-1" style="font-size: 0.92rem;">{{ $kegiatan->nama_kegiatan }}</div>
                                    <small class="text-muted d-block text-truncate" style="max-width: 320px;">
                                        {{ Str::limit($kegiatan->rincian, 80) }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold mb-1" style="font-size: 0.72rem;">
                                        {{ $kegiatan->kategori }}
                                    </span>
                                    <div class="small text-muted">
                                        <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $kegiatan->lokasi }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-pill fw-bold" style="font-size: 0.75rem;">
                                        <i class="bi bi-images me-1"></i> {{ $kegiatan->jumlah_foto }} Foto Tersimpan
                                    </span>
                                    @if($kegiatan->video || $kegiatan->video_url)
                                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1 rounded-pill fw-bold d-block mt-1" style="font-size: 0.7rem;">
                                            <i class="bi bi-camera-video me-1"></i> Ada Video
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <!-- Tombol Cetak Berita Acara Tunggal -->
                                        <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning btn-sm btn-action-pimpinan text-dark shadow-sm" title="Cetak Berita Acara Pengesahan Kabid">
                                            <i class="bi bi-printer-fill me-1"></i> Cetak Berita Acara
                                        </a>

                                        <!-- Tombol Tinjau Modal Foto & Rincian -->
                                        <button type="button" class="btn btn-outline-primary btn-sm btn-action-pimpinan" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $kegiatan->id }}" title="Tinjau Kelengkapan Bukti Otentik">
                                            <i class="bi bi-eye-fill me-1"></i> Tinjau Foto
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                    <h6 class="fw-bold text-muted">Belum ada dokumentasi kegiatan lapangan yang diarsipkan.</h6>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Box Catatan Arahan Kepala Bidang -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #1e1b4b, #312e81); color: #ffffff;">
            <div class="card-body p-4 p-md-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill mb-2 text-uppercase" style="font-size: 0.72rem;">
                            <i class="bi bi-lightbulb-fill me-1"></i> Panduan Alur Kerja Kepala Bidang Wasbang
                        </span>
                        <h4 class="fw-bold text-white mb-2">Pemberian Pengesahan &amp; Verifikasi Administrasi</h4>
                        <p class="text-white-50 m-0" style="line-height: 1.7; font-size: 0.92rem;">
                            Setiap lembar <strong>Berita Acara &amp; Lembar Dokumentasi</strong> yang Anda cetak secara otomatis menyertakan nama terang dan NIP resmi Anda sebagai Kepala Bidang Wasbang Bakesbangpol Kab. Tanah Laut. Dokumen ini menjadi bukti fisik sah yang siap dilampirkan dalam Laporan Pertanggungjawaban (LPJ) Dinas serta audit kinerja bidang.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-warning px-4 py-3 fw-bold text-dark rounded-3 shadow">
                            <i class="bi bi-printer-fill me-2 fs-5"></i> Cetak Rekapitulasi Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Include Modal Detail Kegiatan untuk Preview Dokumentasi Foto -->
@foreach($kegiatans as $kegiatan)
    <div class="modal fade" id="modalDetail{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $kegiatan->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-hero-header d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-warning text-dark fw-bold px-2 py-1 mb-1">{{ $kegiatan->kategori }}</span>
                        <h5 class="modal-title fw-bold text-white m-0">{{ $kegiatan->nama_kegiatan }}</h5>
                        <small class="text-white-50"><i class="bi bi-calendar3 me-1"></i> {{ $kegiatan->hari_tanggal_formatted }} &bull; Lokasi: {{ $kegiatan->lokasi }}</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    @if($kegiatan->jumlah_foto > 0)
                        <div class="mb-3 text-center bg-dark rounded-3 p-2">
                            <img id="modalImgKabid{{ $kegiatan->id }}" src="{{ $kegiatan->foto_url ?? $kegiatan->semua_foto_urls[0] }}" alt="{{ $kegiatan->nama_kegiatan }}" class="img-fluid rounded-2 shadow-sm" style="max-height: 400px; width: 100%; object-fit: contain;">
                        </div>
                        @if($kegiatan->jumlah_foto > 1)
                            <div class="p-2 bg-light rounded-3 border mb-3">
                                <small class="text-muted d-block mb-2 fw-semibold">Pilih foto dokumentasi yang ingin ditampilkan:</small>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($kegiatan->semua_foto_urls as $idx => $fUrl)
                                        <div style="width: 70px; height: 50px; border-radius: 6px; overflow: hidden; border: 2px solid #cbd5e1; cursor: pointer;">
                                            <img src="{{ $fUrl }}" alt="Foto {{ $idx + 1 }}" style="width: 100%; height: 100%; object-fit: cover;" onclick="document.getElementById('modalImgKabid{{ $kegiatan->id }}').src = '{{ $fUrl }}';">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm align-middle">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 30%;">Sasaran Peserta</th>
                                    <td>{{ $kegiatan->sasaran_peserta ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Pelaksana</th>
                                    <td>{{ $kegiatan->pelaksana ?? 'Bidang Wasbang' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Rincian Hasil Lapangan</th>
                                    <td>{{ $kegiatan->rincian }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer bg-light p-3">
                    <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning fw-bold text-dark">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Berita Acara Resmi Ini
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

