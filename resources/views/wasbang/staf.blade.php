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
                            <input type="text" name="nama_kegiatan" class="form-control form-control-lg rounded-3 @error('nama_kegiatan') is-invalid @enderror" placeholder="Contoh: Pemusatan Diklat Lapangan Calon Pasukan Pengibar Bendera Pusaka" value="{{ old('nama_kegiatan') }}" required>
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
                            <input type="text" name="lokasi" class="form-control rounded-3 @error('lokasi') is-invalid @enderror" placeholder="Contoh: Stadion Pertasi Kencana Pelaihari" value="{{ old('lokasi') }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">
                                Sasaran Peserta / Undangan
                            </label>
                            <input type="text" name="sasaran_peserta" class="form-control rounded-3" placeholder="Contoh: 45 Calon Anggota Paskibraka Kabupaten Tanah Laut" value="{{ old('sasaran_peserta') }}">
                        </div>

                        <!-- Pelaksana -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">
                                Pelaksana / Penanggung Jawab Kegiatan
                            </label>
                            <input type="text" name="pelaksana" class="form-control rounded-3" placeholder="Contoh: Tim Instruktur Pelatih Paskibraka &amp; Staf Bidang Wasbang Bakesbangpol" value="{{ old('pelaksana', 'Bidang Bina Ideologi, Wasbang & Karakter Bangsa') }}">
                        </div>

                        <!-- Rincian Berita Acara -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">
                                Rincian / Laporan Kronologi Hasil Kegiatan <span class="text-danger">*</span>
                            </label>
                            <textarea name="rincian" rows="4" class="form-control rounded-3 @error('rincian') is-invalid @enderror" placeholder="Tuliskan ringkasan jalannya kegiatan lapangan, sambutan pejabat, materi yang disampaikan, dan hasil capaian acara..." required>{{ old('rincian') }}</textarea>
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
                                <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i> Berkas Notula / LPJ Resmi (Opsional)
                            </label>
                            <input type="file" name="dokumen_laporan" class="form-control rounded-3" accept=".pdf,.doc,.docx">
                            <small class="text-muted d-block mt-1">Format PDF/Word (Maks. 20 MB).</small>
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

            <div class="table-responsive">
                <table class="table table-hover table-staf align-middle m-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 14%;">Tanggal &amp; Hari</th>
                            <th style="width: 30%;">Nama Kegiatan</th>
                            <th style="width: 18%;">Kategori &amp; Lokasi</th>
                            <th style="width: 13%;">Foto Tersimpan</th>
                            <th style="width: 20%;" class="text-center">Aksi Kelola</th>
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
                                    <div class="fw-bold text-dark mb-1">{{ $kegiatan->nama_kegiatan }}</div>
                                    <small class="text-muted">{{ Str::limit($kegiatan->rincian, 70) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-semibold mb-1" style="font-size: 0.72rem;">
                                        {{ $kegiatan->kategori }}
                                    </span>
                                    <div class="small text-muted">{{ $kegiatan->lokasi }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-2 py-1">
                                        <i class="bi bi-images me-1"></i> {{ $kegiatan->jumlah_foto }} Foto
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <!-- Cetak Detail -->
                                        <a href="{{ route('wasbang.cetak.detail', $kegiatan->id) }}" target="_blank" class="btn btn-warning btn-sm text-dark" title="Cetak Berita Acara">
                                            <i class="bi bi-printer-fill"></i>
                                        </a>

                                        <!-- Lihat Modal -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalStaf{{ $kegiatan->id }}" title="Lihat Foto">
                                            <i class="bi bi-eye"></i>
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
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                    <h6 class="fw-bold text-muted">Belum ada arsip kegiatan. Silakan gunakan formulir di atas.</h6>
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
                    <p class="small text-muted">{{ $kegiatan->rincian }}</p>
                </div>
                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
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

