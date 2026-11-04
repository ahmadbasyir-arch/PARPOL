@extends('layouts.app')

@section('title', 'Dashboard Pengurus ' . ($parpol->akronim ?? 'Partai') . ' - SIPARPOL')

@section('content')
<div class="py-5 bg-light" style="min-height: 85vh;">
    <div class="container py-3">

        <!-- Welcome Banner Partai -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" style="background: linear-gradient(135deg, #1e293b 0%, #0f766e 100%);">
            <div class="card-body p-4 p-md-5 text-white">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="shadow-sm flex-shrink-0" style="width: 80px; height: 80px; background: #ffffff; border-radius: 16px; border: 2px solid rgba(255, 255, 255, 0.4); display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 6px;">
                            <img src="{{ asset($parpol->logo) }}?v=16" alt="{{ $parpol->akronim }}" style="width: 100%; height: 100%; object-fit: contain; border-radius: 10px;">
                        </div>
                        <div>
                            <span class="badge bg-warning text-dark text-uppercase px-2 py-1 mb-1 fw-bold">Nomor Urut {{ sprintf('%02d', $parpol->nomor_urut) }} &bull; Pengurus DPC/DPD</span>
                            <h3 class="fw-bold mb-1">{{ $parpol->nama_partai }} ({{ $parpol->akronim }})</h3>
                            <p class="text-white-50 mb-0 small">
                                <i class="bi bi-geo-alt me-1"></i> {{ $parpol->alamat }}, Kec. {{ $parpol->kecamatan }} &bull; Akun: <strong>{{ $user->email }}</strong>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('parpol.home') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            <i class="bi bi-eye me-1"></i> Portal Publik
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (session('login_success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('login_success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div class="fw-semibold">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0 mb-3" role="alert">
                <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                    <i class="bi bi-exclamation-triangle-fill"></i> Terjadi kesalahan dalam penginputan form:
                </div>
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Statistik Partai -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <span class="text-muted small d-block">Kegiatan Terlaporkan</span>
                    <h4 class="fw-bold mb-0 text-primary">{{ $dikpols->count() }} Agenda</h4>
                    <span class="small text-muted">Pendidikan Politik T.A. 2026</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <span class="text-muted small d-block">Total Anggaran Terealisasi</span>
                    <h4 class="fw-bold mb-0 text-success">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</h4>
                    <span class="small text-muted">Dana Banpol Terserap</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <span class="text-muted small d-block">Total Kader &amp; Warga</span>
                    <h4 class="fw-bold mb-0 text-warning">{{ $totalPeserta }} Peserta</h4>
                    <span class="small text-muted">Pendidikan Demokrasi</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <span class="text-muted small d-block">Status Verifikasi</span>
                    <h4 class="fw-bold mb-0 text-dark">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fs-6">
                            Lengkap
                        </span>
                    </h4>
                    <span class="small text-muted">Telah Diaudit Bakesbangpol</span>
                </div>
            </div>
        </div>

        <!-- Daftar Kegiatan Yang Diinput Oleh Partai Ini -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-header bg-white p-3 d-flex flex-wrap align-items-center justify-content-between gap-2 border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-mortarboard-fill text-primary fs-5"></i>
                    <h6 class="fw-bold mb-0">Realisasi Kegiatan Pendidikan Politik Partai Anda</h6>
                </div>
                <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#modalTambahDikpol">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Laporan Baru
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-secondary">
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Nama Agenda Dikpol</th>
                            <th>Tempat Pelaksanaan</th>
                            <th>Tanggal</th>
                            <th class="text-center">Peserta</th>
                            <th class="text-end">Biaya Realisasi</th>
                            <th class="text-center">Dokumentasi</th>
                            <th class="text-center" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dikpols as $idx => $keg)
                            <tr>
                                <td class="text-center fw-bold">{{ $idx + 1 }}</td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $keg->nama_kegiatan }}</div>
                                    @if ($keg->keterangan)
                                        <small class="text-muted d-block text-truncate" style="max-width: 250px;">
                                            <i class="bi bi-info-circle me-1"></i>{{ $keg->keterangan }}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    <i class="bi bi-geo-alt text-danger me-1"></i> {{ $keg->tempat_pelaksanaan ?? 'Kabupaten Tanah Laut' }}
                                </td>
                                <td>
                                    <i class="bi bi-calendar-event text-primary me-1"></i> {{ $keg->tanggal_pelaksanaan }}
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-secondary rounded-pill px-2 py-1">{{ $keg->peserta_jumlah }} Orang</span>
                                </td>
                                <td class="text-end fw-bold text-success">
                                    Rp {{ number_format($keg->jumlah_biaya, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    @if ($keg->dokumentasi)
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $keg->id }}" title="Klik untuk perbesar foto">
                                            <img src="{{ asset($keg->dokumentasi) }}" alt="Dokumentasi" class="rounded border shadow-sm" style="width: 48px; height: 34px; object-fit: cover;">
                                        </a>
                                    @else
                                        <span class="badge bg-light text-muted border">Tanpa Foto</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditDikpol{{ $keg->id }}" title="Edit Laporan Kegiatan">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalHapusDikpol{{ $keg->id }}" title="Hapus Laporan Kegiatan">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                                    <p class="mb-2 fw-semibold">Belum ada data kegiatan pendidikan politik yang diinput untuk partai ini.</p>
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahDikpol">
                                        <i class="bi bi-plus-circle me-1"></i> Input Laporan Kegiatan Pertama Sekarang
                                    </button>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- ======================================================== -->
<!-- MODAL: TAMBAH LAPORAN KEGIATAN BARU (PARPOL)             -->
<!-- ======================================================== -->
<div class="modal fade" id="modalTambahDikpol" tabindex="-1" aria-labelledby="modalTambahDikpolLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white p-3 px-4">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalTambahDikpolLabel">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Laporan Realisasi Pendidikan Politik
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dikpol.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 px-3 small rounded-3 mb-3 d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle-fill fs-5"></i>
                        <span>Laporan ini akan tercatat resmi atas nama <strong>{{ $parpol->nama_partai }} ({{ $parpol->akronim }})</strong> dan langsung muncul pada Portal Publik SIPARPOL Kab. Tanah Laut.</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Nama Agenda Kegiatan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_kegiatan" class="form-control rounded-3" placeholder="Contoh: Pendidikan Politik dan Kaderisasi Pengurus DPC/DPD Tahun 2026" required value="{{ old('nama_kegiatan') }}">
                        </div>

                        <div class="col-md-7">
                            <label class="form-label fw-bold small text-dark">Tempat / Lokasi Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="text" name="tempat_pelaksanaan" class="form-control rounded-3" placeholder="Contoh: Aula Hotel Sinar Pelaihari / Gedung Sekretariat DPC" required value="{{ old('tempat_pelaksanaan') }}">
                        </div>

                        <div class="col-md-5">
                            <label class="form-label fw-bold small text-dark">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-primary" style="cursor: pointer;" onclick="openIndoDatePicker(this)" title="Buka Kalender Bahasa Indonesia">
                                    <i class="bi bi-calendar-event"></i>
                                </span>
                                <input type="text" 
                                       name="tanggal_pelaksanaan" 
                                       class="form-control datepicker-id bg-white" 
                                       placeholder="Pilih Tanggal Pelaksanaan" 
                                       required 
                                       value="{{ old('tanggal_pelaksanaan', date('Y-m-d')) }}">
                            </div>
                            <small class="text-muted" style="font-size: 0.75rem;">
                                <i class="bi bi-calendar-check me-1 text-primary"></i> Kalender Bahasa Indonesia
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-dark">Jumlah Peserta (Orang) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-people-fill text-muted"></i></span>
                                <input type="number" name="peserta_jumlah" class="form-control" min="1" placeholder="Contoh: 75" required value="{{ old('peserta_jumlah') }}">
                                <span class="input-group-text bg-light small">Peserta</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-dark">Biaya Realisasi (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                <input type="number" name="jumlah_biaya" class="form-control" min="0" step="1000" placeholder="Contoh: 15000000" required value="{{ old('jumlah_biaya') }}">
                            </div>
                            <small class="text-muted" style="font-size: 0.75rem;">Masukkan angka bulat tanpa titik (contoh: 15000000 untuk Rp 15.000.000)</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Foto Dokumentasi Kegiatan (Opsional)</label>
                            <input type="file" name="dokumentasi" class="form-control rounded-3" accept="image/jpeg,image/png,image/jpg,image/webp">
                            <small class="text-muted" style="font-size: 0.75rem;">Format diperbolehkan: JPG, PNG, WEBP. Maksimal ukuran file 5 MB.</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Keterangan Tambahan / Ringkasan Agenda</label>
                            <textarea name="keterangan" rows="2" class="form-control rounded-3" placeholder="Contoh: Menghadirkan narasumber dari Bawaslu & Akademisi dengan materi penguatan integritas pemilu...">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                        <i class="bi bi-save2 me-1"></i> Simpan Laporan Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ======================================================== -->
<!-- MODAL: EDIT, HAPUS & PREVIEW FOTO PER KEGIATAN           -->
<!-- ======================================================== -->
@foreach ($dikpols as $keg)
    <!-- Modal Edit Dikpol -->
    <div class="modal fade" id="modalEditDikpol{{ $keg->id }}" tabindex="-1" aria-labelledby="modalEditDikpolLabel{{ $keg->id }}" aria-hidden="true" data-bs-focus="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-dark text-white p-3 px-4">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalEditDikpolLabel{{ $keg->id }}">
                        <i class="bi bi-pencil-square"></i> Perbarui Laporan Pendidikan Politik
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dikpol.update', $keg->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Nama Agenda Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kegiatan" class="form-control rounded-3" required value="{{ old('nama_kegiatan', $keg->nama_kegiatan) }}">
                            </div>

                            <div class="col-md-7">
                                <label class="form-label fw-bold small text-dark">Tempat / Lokasi Pelaksanaan <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_pelaksanaan" class="form-control rounded-3" required value="{{ old('tempat_pelaksanaan', $keg->tempat_pelaksanaan) }}">
                            </div>

                            <div class="col-md-5">
                                <label class="form-label fw-bold small text-dark">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary" style="cursor: pointer;" onclick="openIndoDatePicker(this)" title="Buka Kalender Bahasa Indonesia">
                                        <i class="bi bi-calendar-event"></i>
                                    </span>
                                    <input type="text" 
                                           name="tanggal_pelaksanaan" 
                                           class="form-control datepicker-id bg-white" 
                                           placeholder="Pilih Tanggal Pelaksanaan" 
                                           required 
                                           value="{{ old('tanggal_pelaksanaan', $keg->tanggal_pelaksanaan_input) }}">
                                </div>
                                <small class="text-muted" style="font-size: 0.75rem;">
                                    <i class="bi bi-clock-history me-1"></i> Tersimpan: {{ $keg->tanggal_pelaksanaan }}
                                </small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-dark">Jumlah Peserta (Orang) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-people-fill text-muted"></i></span>
                                    <input type="number" name="peserta_jumlah" class="form-control" min="1" required value="{{ old('peserta_jumlah', $keg->peserta_jumlah) }}">
                                    <span class="input-group-text bg-light small">Peserta</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-dark">Biaya Realisasi (Rp) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                    <input type="number" name="jumlah_biaya" class="form-control" min="0" step="1000" required value="{{ old('jumlah_biaya', $keg->jumlah_biaya) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Ganti Foto Dokumentasi (Opsional)</label>
                                @if ($keg->dokumentasi)
                                    <div class="d-flex align-items-center gap-3 mb-2 p-2 bg-light rounded-3 border">
                                        <img src="{{ asset($keg->dokumentasi) }}" alt="Foto saat ini" class="rounded border" style="width: 60px; height: 45px; object-fit: cover;">
                                        <span class="small text-muted">Foto saat ini tersimpan. Unggah file baru di bawah ini hanya jika ingin menggantinya.</span>
                                    </div>
                                @endif
                                <input type="file" name="dokumentasi" class="form-control rounded-3" accept="image/jpeg,image/png,image/jpg,image/webp">
                                <small class="text-muted" style="font-size: 0.75rem;">Maksimal 5 MB (JPG, PNG, WEBP).</small>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Keterangan Tambahan / Ringkasan Agenda</label>
                                <textarea name="keterangan" rows="2" class="form-control rounded-3">{{ old('keterangan', $keg->keterangan) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light p-3">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Dikpol -->
    <div class="modal fade" id="modalHapusDikpol{{ $keg->id }}" tabindex="-1" aria-labelledby="modalHapusDikpolLabel{{ $keg->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-danger text-white p-3 px-4">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalHapusDikpolLabel{{ $keg->id }}">
                        <i class="bi bi-exclamation-triangle-fill"></i> Konfirmasi Hapus Laporan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <i class="bi bi-trash3 text-danger fs-1 d-block mb-3"></i>
                    <p class="mb-2">Apakah Anda yakin ingin menghapus laporan kegiatan:</p>
                    <h6 class="fw-bold text-dark mb-3">"{{ $keg->nama_kegiatan }}"</h6>
                    <p class="small text-muted mb-0">Tindakan ini tidak dapat dibatalkan. Berkas foto dokumentasi dan catatan anggaran sebesar <strong>Rp {{ number_format($keg->jumlah_biaya, 0, ',', '.') }}</strong> akan dihapus permanen dari sistem.</p>
                </div>
                <div class="modal-footer bg-light p-3 justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('dikpol.destroy', $keg->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">
                            <i class="bi bi-trash-fill me-1"></i> Ya, Hapus Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview Foto Dokumentasi -->
    @if ($keg->dokumentasi)
        <div class="modal fade" id="modalFoto{{ $keg->id }}" tabindex="-1" aria-labelledby="modalFotoLabel{{ $keg->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header bg-dark text-white p-3 px-4">
                        <h6 class="modal-title fw-bold" id="modalFotoLabel{{ $keg->id }}">
                            <i class="bi bi-image me-1"></i> {{ $keg->nama_kegiatan }}
                        </h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 text-center bg-black">
                        <img src="{{ asset($keg->dokumentasi) }}" alt="{{ $keg->nama_kegiatan }}" class="img-fluid" style="max-height: 75vh; object-fit: contain;">
                    </div>
                    <div class="modal-footer bg-light p-2 px-3 d-flex justify-content-between align-items-center">
                        <span class="small text-muted">
                            <i class="bi bi-geo-alt me-1"></i>{{ $keg->tempat_pelaksanaan }} &bull; <i class="bi bi-calendar-event me-1"></i>{{ $keg->tanggal_pelaksanaan }}
                        </span>
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

@endsection
