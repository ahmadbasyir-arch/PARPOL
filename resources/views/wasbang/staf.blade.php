@extends('layouts.app')

@section('title', 'Panel Kerja Staf Pelaksana Wasbang - Operator Lapangan')

@push('styles')
<style>
    .hero-staf {
        background: linear-gradient(135deg, #064e3b 0%, #0f172a 70%, #1e3a8a 100%);
        color: #ffffff;
        padding: 45px 0 35px 0;
        position: relative;
        border-bottom: 4px solid #10b981;
    }

    .badge-staf-role {
        background: rgba(16, 185, 129, 0.2);
        color: #6ee7b7;
        border: 1px solid rgba(16, 185, 129, 0.4);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .card-form-staf {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .form-header-staf {
        background: linear-gradient(135deg, #064e3b, #047857);
        color: #ffffff;
        padding: 22px 28px;
    }

    .table-staf thead th {
        background: #064e3b;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 14px 12px;
        border: none;
    }

    .table-staf tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        font-size: 0.88rem;
    }

    .table-staf tbody tr:hover {
        background-color: #f0fdf4;
    }

    .modal-hero-header {
        background: linear-gradient(135deg, #064e3b, #0f172a);
        color: #ffffff;
        border-bottom: 3px solid #10b981;
        padding: 20px 24px;
    }
</style>
@endpush

@section('content')

<!-- Hero Section Khusus Staf Pelaksana Wasbang -->
<section class="hero-staf">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="badge-staf-role mb-3">
                    <i class="bi bi-pencil-square text-success"></i>
                    PANEL OPERATOR LAPANGAN &bull; STAF PELAKSANA BIDANG WASBANG
                </div>
                <h1 class="fw-extrabold text-white mb-2" style="font-size: 2.1rem; line-height: 1.25;">
                    Selamat Datang, <span class="text-success">Staf Pelaksana Lapangan</span>
                </h1>
                <p class="text-white-50 mb-3" style="font-size: 0.95rem;">
                    NIP. <strong>{{ auth()->user()->nip ?? '19951015 202203 1 002' }}</strong> &bull; Operator Pengarsipan Dokumentasi Bidang Wasbang
                </p>
                <p class="text-light opacity-75 mb-4" style="max-width: 720px; line-height: 1.6; font-size: 0.9rem;">
                    Anda memiliki hak akses penuh untuk <strong>mengunggah dokumentasi album foto sepulang dari dinas luar</strong>, menulis kronologi rincian acara, mengunggah video kegiatan &amp; berkas LPJ, serta merawat atau menghapus arsip jika terjadi duplikasi data.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#form-pengarsipan" class="btn btn-success px-4 py-2 fw-bold rounded-3 shadow-sm">
                        <i class="bi bi-cloud-arrow-up-fill me-1"></i> Unggah Dokumentasi Baru
                    </a>
                    <a href="#tabel-kelola" class="btn btn-outline-light px-3 py-2 fw-semibold rounded-3">
                        <i class="bi bi-folder-fill me-1"></i> Kelola Arsip Kegiatan
                    </a>
                    <a href="{{ route('wasbang.index', ['view' => 'publik']) }}" class="btn btn-outline-info px-3 py-2 fw-semibold rounded-3 text-white">
                        <i class="bi bi-eye-fill me-1"></i> Lihat Portal Publik
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="p-4 rounded-4 border border-success border-opacity-25" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px);">
                    <div class="mx-auto mb-3 text-success" style="width: 70px; height: 70px; background: rgba(16, 185, 129, 0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; border: 2px solid #10b981;">
                        <i class="bi bi-camera-fill"></i>
                    </div>
                    <h6 class="fw-bold text-white mb-1">Staf Pelaksana Lapangan</h6>
                    <small class="text-success d-block mb-3">Operator Pengarsipan Resmi</small>
                    <div class="p-2 bg-black bg-opacity-30 rounded-3 text-start small border border-white border-opacity-10 text-white-50" style="font-size: 0.78rem;">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Wewenang Input:</span>
                            <strong class="text-success">Multi-Upload Foto</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Wewenang Hapus:</span>
                            <strong class="text-white">Diizinkan (Staf)</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Pejabat Pengesah:</span>
                            <strong class="text-warning">Ibu Auranti Muraya P.</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Konten Utama Dashboard Staf -->
<section class="py-5 bg-light" style="min-height: 70vh;">
    <div class="container">

        <!-- Notifikasi -->
        @if(session('wasbang_success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm p-4 mb-4" role="alert" style="border-left: 6px solid #10b981 !important;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-3 text-success me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Berhasil!</h6>
                        <span class="small text-muted">{{ session('wasbang_success') }}</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('wasbang_error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm p-4 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-4 text-danger me-2"></i>
                {{ session('wasbang_error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Formulir Cepat Unggah Dokumentasi Sepulang Dinas Luar -->
        <div class="card card-form-staf mb-5" id="form-pengarsipan">
            <div class="form-header-staf d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 44px; height: 44px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold m-0 text-white">Formulir Pengarsipan Dokumentasi Kegiatan Lapangan</h4>
                        <small class="text-white-50">Silakan input data acara luar lapangan beserta multi-foto dokumentasi sepulang dari dinas luar.</small>
                    </div>
                </div>
                <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold small">
                    <i class="bi bi-check-circle-fill me-1"></i> Mode Operator Aktif
                </span>
            </div>

            <div class="p-4 p-md-5">
                <form action="{{ route('wasbang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <!-- Nama Kegiatan -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">
                                Nama Kegiatan Luar Lapangan <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="nama_kegiatan" class="form-control form-control-lg rounded-3 @error('nama_kegiatan') is-invalid @enderror" placeholder="Contoh: Penjaringan Calon Paskibraka di SMA/Pesantren Kintap / Menghadiri Acara..." value="{{ old('nama_kegiatan') }}" required>
                            @error('nama_kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori & Status -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                Kategori Bidang Wasbang <span class="text-danger">*</span>
                            </label>
                            <select name="kategori" class="form-select rounded-3 @error('kategori') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Kategori Kegiatan</option>
                                @foreach($kategoriList as $kat)
                                    <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
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
                            <select name="status" class="form-select rounded-3 @error('status') is-invalid @enderror" required>
                                <option value="Selesai Dilaksanakan" {{ old('status') == 'Selesai Dilaksanakan' ? 'selected' : '' }}>Selesai Dilaksanakan</option>
                                <option value="Sedang Dilaksanakan" {{ old('status') == 'Sedang Dilaksanakan' ? 'selected' : '' }}>Sedang Dilaksanakan</option>
                            </select>
                        </div>

                        <!-- Tanggal & Jam -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                Tanggal Pelaksanaan <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text" name="tanggal" id="inputTanggal" class="form-control datepicker-id rounded-start-3 @error('tanggal') is-invalid @enderror" placeholder="Pilih Tanggal Pelaksanaan..." value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="window.openIndoDatePicker && window.openIndoDatePicker(this)" title="Buka Kalender">
                                    <i class="bi bi-calendar-event"></i>
                                </button>
                            </div>
                            <small class="text-success fw-semibold mt-1 d-block" id="previewHariText">
                                <i class="bi bi-info-circle me-1"></i> Nama hari pelaksanaan akan terisi otomatis.
                            </small>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                Waktu / Jam Pelaksanaan (Opsional)
                            </label>
                            <input type="text" name="waktu" class="form-control rounded-3" placeholder="Contoh: 08:30 - 12:00 WITA" value="{{ old('waktu') }}">
                        </div>

                        <!-- Lokasi & Sasaran Peserta -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                Lokasi Kegiatan Luar <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="lokasi" class="form-control rounded-3 @error('lokasi') is-invalid @enderror" placeholder="Contoh: SMAN 1 Kintap / MA Pondok Pesantren / Aula Kantor Camat..." value="{{ old('lokasi') }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                Sasaran Peserta / Undangan
                            </label>
                            <input type="text" name="sasaran_peserta" class="form-control rounded-3" placeholder="Contoh: Siswa-Siswi SMA/SMK &amp; Santri Aliyah Pesantren / Tamu Undangan" value="{{ old('sasaran_peserta') }}">
                        </div>

                        <!-- Pelaksana -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">
                                Pelaksana / Penanggung Jawab Kegiatan
                            </label>
                            <input type="text" name="pelaksana" class="form-control rounded-3" placeholder="Contoh: Tim Bidang BIW Bakesbangpol bersama Pelatih &amp; Pamong Paskibraka" value="{{ old('pelaksana', 'Bidang Bina Ideologi, Wasbang & Karakter Bangsa') }}">
                        </div>

                        <!-- Rincian Berita Acara -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">
                                Rincian / Laporan Kronologi Hasil Kegiatan <span class="text-danger">*</span>
                            </label>
                            <textarea name="rincian" rows="4" class="form-control rounded-3 @error('rincian') is-invalid @enderror" placeholder="Tuliskan ringkasan jalannya kegiatan lapangan (misal: penjaringan seleksi postur/wawasan Paskibraka di SMA/Pesantren, atau catatan agenda menghadiri acara dinas)..." required>{{ old('rincian') }}</textarea>
                            @error('rincian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload Foto Sampul -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                <i class="bi bi-image text-danger me-1"></i> Foto Sampul Utama Kegiatan
                            </label>
                            <input type="file" name="foto" class="form-control rounded-3 @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">Foto resolusi terbaik yang mewakili kegiatan (Maks. 12 MB).</small>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Multi-Upload Foto Tambahan -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                <i class="bi bi-images text-success me-1"></i> Upload Foto Tambahan (Bisa Banyak Sekaligus)
                            </label>
                            <input type="file" name="foto_tambahan[]" class="form-control rounded-3 @error('foto_tambahan.*') is-invalid @enderror" accept="image/*" multiple>
                            <small class="text-muted d-block mt-1">Tahan tombol <strong>Ctrl</strong> saat memilih file foto di laptop untuk memilih banyak foto sekaligus.</small>
                            @error('foto_tambahan.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Video & LPJ PDF -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                <i class="bi bi-camera-reels text-primary me-1"></i> Rekaman Video Kegiatan (Opsional)
                            </label>
                            <input type="file" name="video" class="form-control rounded-3" accept="video/mp4,video/webm">
                            <small class="text-muted d-block mt-1">Format MP4 (Maks. 50 MB).</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                <i class="bi bi-file-earmark-text-fill text-danger me-1"></i> Berkas Surat Kedinasan / SPJ / LPJ Lapangan (Opsional)
                            </label>
                            <input type="file" name="dokumen_laporan" class="form-control rounded-3" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            <small class="text-muted d-block mt-1">Surat tugas, SPJ dinas, atau LPJ. Format: PDF, Word, Excel (Maks. 20 MB).</small>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-md-12 text-end pt-3">
                            <button type="submit" class="btn btn-success btn-lg px-5 py-3 fw-bold rounded-3 shadow">
                                <i class="bi bi-cloud-arrow-up-fill me-2"></i> Arsipkan Dokumentasi Kegiatan Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Kelola Arsip Kegiatan (Staf Operator) -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5" id="tabel-kelola">
            <div class="p-4 bg-white border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1 rounded-pill text-uppercase mb-1" style="font-size: 0.72rem;">
                        <i class="bi bi-folder-check me-1"></i> Pemeliharaan Arsip
                    </span>
                    <h4 class="fw-bold text-dark m-0">Daftar Dokumentasi yang Telah Tersimpan di Server</h4>
                    <p class="text-muted small m-0 mt-1">
                        Total {{ $totalKegiatan }} agenda kegiatan telah terdata dengan aman di pangkalan data Bakesbangpol Tanah Laut.
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('wasbang.cetak') }}" target="_blank" class="btn btn-warning btn-sm text-dark px-3 py-2 fw-bold rounded-3 shadow-sm">
                        <i class="bi bi-printer-fill me-1"></i> Cetak Rekapitulasi Dinas
                    </a>
                </div>
            </div>

            <!-- Filter & Pencarian Cepat Staf Operator -->
            <div class="p-3 bg-light border-bottom">
                <form action="{{ route('wasbang.index') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-lg-4 col-md-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" name="q" class="form-control border-start-0" placeholder="Cari kegiatan, lokasi (mis: Kintap, Jorong)..." value="{{ request('q') }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <select name="kategori" class="form-select form-select-sm">
                            <option value="">-- Semua Kategori Bidang --</option>
                            @foreach($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <select name="bulan" class="form-select form-select-sm">
                            <option value="">-- Semua Bulan --</option>
                            @for($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                    {{ \App\Models\WasbangKegiatan::getBulanIndonesia($m) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-12 d-flex gap-2 justify-content-md-start justify-content-lg-end">
                        <button type="submit" class="btn btn-success btn-sm px-3 fw-semibold shadow-sm">
                            <i class="bi bi-funnel-fill me-1"></i> Saring Data
                        </button>
                        @if(request()->hasAny(['q', 'kategori', 'bulan', 'status']))
                            <a href="{{ route('wasbang.index') }}" class="btn btn-outline-secondary btn-sm" title="Reset Filter">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-staf align-middle m-0">
                    <thead>
                        <tr>
                            <th style="width: 4%;">No</th>
                            <th style="width: 13%;">Tanggal &amp; Hari</th>
                            <th style="width: 26%;">Nama Kegiatan Lapangan</th>
                            <th style="width: 17%;">Kategori &amp; Lokasi</th>
                            <th style="width: 11%;">Media Foto</th>
                            <th style="width: 14%;">Berkas SPJ/LPJ</th>
                            <th style="width: 15%;" class="text-center">Aksi Kelola</th>
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
                                    <small class="text-muted d-block text-truncate" style="max-width: 280px;">{{ Str::limit($kegiatan->rincian, 70) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-semibold mb-1" style="font-size: 0.72rem;">
                                        {{ $kegiatan->kategori }}
                                    </span>
                                    <div class="small text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $kegiatan->lokasi }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-2 py-1">
                                        <i class="bi bi-images me-1"></i> {{ $kegiatan->jumlah_foto }} Foto
                                    </span>
                                    @if($kegiatan->video || $kegiatan->video_url)
                                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-0.5 mt-1 d-inline-block small" style="font-size: 0.68rem;">
                                            <i class="bi bi-camera-video me-1"></i> Video
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($kegiatan->dokumen_laporan)
                                        <a href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'dokumen']) }}" class="badge bg-primary-subtle text-primary border border-primary-subtle text-decoration-none py-1.5 px-2 d-inline-flex align-items-center gap-1 shadow-sm" title="Unduh Berkas Surat/SPJ (.{{ pathinfo($kegiatan->dokumen_laporan, PATHINFO_EXTENSION) }})">
                                            <i class="bi bi-file-earmark-check-fill text-danger"></i>
                                            <span>Ada Berkas</span>
                                        </a>
                                    @else
                                        <span class="badge bg-light text-muted border py-1.5 px-2 small" title="Belum ada berkas surat tugas atau SPJ perjalanan dinas yang diunggah">
                                            <i class="bi bi-dash-circle me-1"></i> Belum Ada
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <!-- Cetak Detail -->
                                        <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning btn-sm text-dark shadow-sm" title="Cetak Berita Acara">
                                            <i class="bi bi-printer-fill"></i>
                                        </a>

                                        <!-- Lihat Modal -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalStaf{{ $kegiatan->id }}" title="Lihat Foto &amp; Rincian Lengkap">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                        <!-- Edit Kegiatan (Khusus Staf Pelaksana) -->
                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditStaf{{ $kegiatan->id }}" title="Edit Dokumentasi &amp; Berkas">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Hapus Arsip (Khusus Staf) -->
                                        <form action="{{ route('wasbang.destroy', $kegiatan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip dokumentasi ini? File foto dan dokumen akan dihapus dari server.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus Arsip">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                    <h6 class="fw-bold text-muted">Belum ada arsip kegiatan yang sesuai dengan pencarian Anda.</h6>
                                    @if(request()->hasAny(['q', 'kategori', 'bulan', 'status']))
                                        <a href="{{ route('wasbang.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="bi bi-arrow-counterclockwise me-1"></i> Tampilkan Semua Kegiatan
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- Modal Preview untuk Staf -->
@foreach($kegiatans as $kegiatan)
    <div class="modal fade" id="modalStaf{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalStafLabel{{ $kegiatan->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-hero-header d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-success text-white fw-bold px-2 py-1 mb-1">{{ $kegiatan->kategori }}</span>
                        <h5 class="modal-title fw-bold text-white m-0">{{ $kegiatan->nama_kegiatan }}</h5>
                        <small class="text-white-50"><i class="bi bi-calendar3 me-1"></i> {{ $kegiatan->hari_tanggal_formatted }} &bull; {{ $kegiatan->lokasi }}</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    @if($kegiatan->jumlah_foto > 0)
                        <div class="mb-3 text-center bg-dark rounded-3 p-2">
                            <img id="modalImgStaf{{ $kegiatan->id }}" src="{{ $kegiatan->foto_url ?? $kegiatan->semua_foto_urls[0] }}" alt="{{ $kegiatan->nama_kegiatan }}" class="img-fluid rounded-2 shadow-sm" style="max-height: 380px; width: 100%; object-fit: contain;">
                        </div>
                        @if($kegiatan->jumlah_foto > 1)
                            <div class="p-2 bg-light rounded-3 border mb-3">
                                <small class="text-muted d-block mb-2 fw-semibold">Pilih foto dokumentasi lapangan:</small>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($kegiatan->semua_foto_urls as $idx => $fUrl)
                                        <div style="width: 70px; height: 50px; border-radius: 6px; overflow: hidden; border: 2px solid #cbd5e1; cursor: pointer;">
                                            <img src="{{ $fUrl }}" alt="Foto {{ $idx + 1 }}" style="width: 100%; height: 100%; object-fit: cover;" onclick="document.getElementById('modalImgStaf{{ $kegiatan->id }}').src = '{{ $fUrl }}';">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    <!-- Tabel Rincian Data Kegiatan -->
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-sm align-middle">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 30%;">Waktu Pelaksanaan</th>
                                    <td>{{ $kegiatan->waktu ?? 'Waktu tentatif kedinasan' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Lokasi Kegiatan</th>
                                    <td>{{ $kegiatan->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Sasaran Peserta</th>
                                    <td>{{ $kegiatan->sasaran_peserta ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Pelaksana / Tim</th>
                                    <td>{{ $kegiatan->pelaksana ?? 'Bidang Wasbang' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Status Pelaksanaan</th>
                                    <td>
                                        <span class="badge {{ $kegiatan->status === 'Sedang Dilaksanakan' ? 'bg-warning text-dark' : 'bg-success text-white' }} px-2 py-1">
                                            {{ $kegiatan->status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Berkas Surat / SPJ / LPJ</th>
                                    <td>
                                        @if($kegiatan->dokumen_laporan)
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="text-success fw-bold small">
                                                    <i class="bi bi-file-earmark-check-fill me-1"></i> {{ basename($kegiatan->dokumen_laporan) }}
                                                </span>
                                                <a href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'dokumen']) }}" class="btn btn-outline-primary btn-sm py-0 px-2 fw-semibold" style="font-size: 0.78rem;">
                                                    <i class="bi bi-download me-1"></i> Unduh Berkas
                                                </a>
                                            </div>
                                        @else
                                            <span class="text-muted small"><i class="bi bi-dash-circle me-1"></i> Belum ada berkas surat dinas / SPJ yang diunggah.</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Rincian Hasil Lapangan</th>
                                    <td style="white-space: pre-line;">{{ $kegiatan->rincian }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer bg-light p-3 d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-outline-success btn-sm px-3 fw-semibold" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalEditStaf{{ $kegiatan->id }}">
                            <i class="bi bi-pencil-square me-1"></i> Edit Data / Berkas
                        </button>
                        <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning btn-sm fw-bold text-dark ms-1 shadow-sm">
                            <i class="bi bi-printer-fill me-1"></i> Cetak Berita Acara
                        </a>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Dokumentasi untuk Staf -->
    <div class="modal fade" id="modalEditStaf{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalEditStafLabel{{ $kegiatan->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <form action="{{ route('wasbang.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="max-height: 90vh;">
                @csrf
                @method('PUT')
                <div class="modal-header bg-success text-white py-3 px-4 flex-shrink-0">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square fs-4"></i>
                        <div>
                            <h5 class="modal-title fw-bold text-white m-0" id="modalEditStafLabel{{ $kegiatan->id }}">Edit Dokumentasi: {{ $kegiatan->nama_kegiatan }}</h5>
                            <small class="text-white-50">Perbarui rincian kegiatan luar lapangan, foto dokumentasi, atau berkas surat dinas / SPJ / LPJ</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4 p-md-5" style="overflow-y: auto;">
                    <div class="row g-4">
                        <!-- Nama Kegiatan -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">Nama Kegiatan Luar Lapangan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_kegiatan" class="form-control rounded-3" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" required>
                        </div>

                        <!-- Kategori & Status -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Kategori Bidang Wasbang <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select rounded-3" required>
                                @foreach($kategoriList as $kat)
                                    <option value="{{ $kat }}" {{ old('kategori', $kegiatan->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Status Pelaksanaan <span class="text-danger">*</span></label>
                            <select name="status" class="form-select rounded-3" required>
                                <option value="Selesai Dilaksanakan" {{ old('status', $kegiatan->status) == 'Selesai Dilaksanakan' ? 'selected' : '' }}>Selesai Dilaksanakan</option>
                                <option value="Sedang Dilaksanakan" {{ old('status', $kegiatan->status) == 'Sedang Dilaksanakan' ? 'selected' : '' }}>Sedang Dilaksanakan</option>
                            </select>
                        </div>

                        <!-- Tanggal & Jam -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control rounded-3" value="{{ old('tanggal', $kegiatan->tanggal ? $kegiatan->tanggal->format('Y-m-d') : date('Y-m-d')) }}" required>
                            <small class="text-muted">Nama hari pelaksanaan akan disesuaikan otomatis oleh sistem.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Waktu / Jam Pelaksanaan</label>
                            <input type="text" name="waktu" class="form-control rounded-3" value="{{ old('waktu', $kegiatan->waktu) }}" placeholder="Contoh: 08:30 - 12:00 WITA">
                        </div>

                        <!-- Lokasi & Sasaran Peserta -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Lokasi Kegiatan Luar <span class="text-danger">*</span></label>
                            <input type="text" name="lokasi" class="form-control rounded-3" value="{{ old('lokasi', $kegiatan->lokasi) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Sasaran Peserta / Undangan</label>
                            <input type="text" name="sasaran_peserta" class="form-control rounded-3" value="{{ old('sasaran_peserta', $kegiatan->sasaran_peserta) }}" placeholder="Contoh: Siswa-Siswi SMA/SMK &amp; Santri Aliyah Pesantren">
                        </div>

                        <!-- Pelaksana -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">Pelaksana / Penanggung Jawab Kegiatan</label>
                            <input type="text" name="pelaksana" class="form-control rounded-3" value="{{ old('pelaksana', $kegiatan->pelaksana) }}">
                        </div>

                        <!-- Rincian Berita Acara -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">Rincian / Laporan Kronologi Hasil Kegiatan <span class="text-danger">*</span></label>
                            <textarea name="rincian" rows="4" class="form-control rounded-3" required>{{ old('rincian', $kegiatan->rincian) }}</textarea>
                        </div>

                        <!-- SEPARATOR: PENGELOLAAN BERKAS & DOKUMENTASI -->
                        <div class="col-md-12">
                            <div class="border-top pt-3">
                                <h6 class="fw-bold text-dark mb-1"><i class="bi bi-paperclip text-success me-1"></i> Berkas Lampiran &amp; Media Dokumentasi</h6>
                                <p class="text-muted small m-0">Perbarui bukti fisik foto lapangan, berkas dinas (surat tugas/SPJ/LPJ), atau rekaman video.</p>
                            </div>
                        </div>

                        <!-- GANTI / KELOLA BERKAS SURAT DINAS / SPJ / LPJ (DEDICATED FULL-WIDTH BOX) -->
                        <div class="col-md-12">
                            <div class="p-3 bg-light rounded-3 border border-2 border-primary-subtle shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-label fw-bold text-dark m-0 fs-6">
                                        <i class="bi bi-file-earmark-text-fill text-danger me-1"></i> Berkas Kedinasan (Surat Perintah Tugas / SPJ Perjalanan Dinas / Notula / LPJ Lapangan)
                                    </label>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Format: PDF, Word, Excel (Maks. 20 MB)</span>
                                </div>

                                @if($kegiatan->dokumen_laporan)
                                    <div class="p-3 bg-white rounded-3 border mb-3">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="p-2 bg-success-subtle text-success rounded-3">
                                                    <i class="bi bi-file-earmark-check-fill fs-4"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark small">Berkas Saat Ini Tersimpan di Server:</div>
                                                    <span class="text-primary fw-semibold small">{{ basename($kegiatan->dokumen_laporan) }}</span>
                                                    <span class="badge bg-light text-dark border ms-1">.{{ strtoupper(pathinfo($kegiatan->dokumen_laporan, PATHINFO_EXTENSION)) }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="{{ route('wasbang.download', ['id' => $kegiatan->id, 'type' => 'dokumen']) }}" class="btn btn-outline-primary btn-sm px-3 fw-semibold">
                                                    <i class="bi bi-download me-1"></i> Unduh / Cek Berkas Saat Ini
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-2 pt-2 border-top">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hapus_dokumen" value="1" id="hapusDokStaf{{ $kegiatan->id }}">
                                                <label class="form-check-label text-danger small fw-semibold" for="hapusDokStaf{{ $kegiatan->id }}">
                                                    <i class="bi bi-trash3 me-1"></i> Hapus berkas surat dinas / SPJ lama ini (jadikan tanpa lampiran)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-light border small text-muted py-2 px-3 mb-3">
                                        <i class="bi bi-info-circle me-1 text-primary"></i> Belum ada berkas surat dinas / SPJ / LPJ yang terunggah untuk kegiatan ini.
                                    </div>
                                @endif

                                <div>
                                    <label class="form-label small fw-bold text-secondary mb-1">
                                        <i class="bi bi-arrow-repeat text-success me-1"></i> Unggah Berkas Baru untuk Mengganti / Mengisi Surat SPJ / LPJ:
                                    </label>
                                    <input type="file" name="dokumen_laporan" class="form-control rounded-3" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                    <div class="form-text text-muted">
                                        <i class="bi bi-info-circle me-1"></i>Pilih file baru jika ingin mengganti berkas surat tugas, SPJ dinas, atau LPJ. Biarkan kosong jika tidak ingin mengubah berkas yang ada.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Utama -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark"><i class="bi bi-image text-danger me-1"></i> Foto Utama / Sampul</label>
                            @if($kegiatan->foto)
                                <div class="d-flex align-items-center gap-2 mb-2 p-2 bg-light rounded-3 border">
                                    <img src="{{ $kegiatan->foto_url }}" alt="Sampul" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                    <div class="small">
                                        <span class="text-success fw-bold d-block"><i class="bi bi-check2-circle me-1"></i> Foto utama tersimpan</span>
                                        <span class="text-muted" style="font-size: 0.72rem;">Unggah file baru jika ingin mengganti</span>
                                    </div>
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control rounded-3" accept="image/*">
                            <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP (Maks. 12 MB). Kosongkan jika tidak ingin mengubah.</small>
                        </div>

                        <!-- Foto Tambahan -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark"><i class="bi bi-images text-success me-1"></i> Tambah Foto Galeri (Bisa Banyak Sekaligus)</label>
                            @if($kegiatan->jumlah_foto > 1)
                                <div class="mb-2 p-2 bg-light rounded-3 border small">
                                    <span class="text-primary fw-semibold"><i class="bi bi-images me-1"></i> {{ $kegiatan->jumlah_foto }} foto saat ini tersimpan dalam album.</span>
                                </div>
                            @endif
                            <input type="file" name="foto_tambahan[]" class="form-control rounded-3" accept="image/*" multiple>
                            <small class="text-muted d-block mt-1">Tahan tombol <strong>Ctrl</strong> untuk memilih beberapa foto tambahan baru.</small>
                        </div>

                        <!-- Video -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark"><i class="bi bi-camera-reels text-primary me-1"></i> Rekaman Video Kegiatan (Opsional)</label>
                            @if($kegiatan->video)
                                <div class="mb-2 p-2 bg-light rounded-3 border small">
                                    <span class="text-info-emphasis fw-semibold"><i class="bi bi-play-circle-fill me-1"></i> Video saat ini tersimpan di server</span>
                                </div>
                            @endif
                            <input type="file" name="video" class="form-control rounded-3 mb-2" accept="video/mp4,video/webm">
                            <input type="url" name="video_url" class="form-control rounded-3" placeholder="Atau tautan video streaming: https://..." value="{{ old('video_url', $kegiatan->video_url) }}">
                            <small class="text-muted d-block mt-1">Unggah file video baru atau perbarui tautan eksternal.</small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light p-3 d-flex justify-content-between align-items-center flex-shrink-0 border-top">
                    <button type="button" class="btn btn-outline-secondary px-4 fw-semibold" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Batalkan
                    </button>
                    <button type="submit" class="btn btn-success px-5 py-2.5 fw-bold shadow">
                        <i class="bi bi-check-circle-fill me-1"></i> Simpan Pembaruan Dokumentasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach

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
                    previewHariText.innerHTML = '<i class="bi bi-check-circle-fill text-success me-1"></i> Hari Pelaksanaan: <strong class="text-success">' + hariNames[dayIndex] + '</strong>';
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

