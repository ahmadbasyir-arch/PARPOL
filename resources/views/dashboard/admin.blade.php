@extends('layouts.app')

@section('title', 'Dashboard Administrator Bakesbangpol - SIPARPOL')

@section('content')
<div class="py-5 bg-light" style="min-height: 85vh;">
    <div class="container py-3">

        <!-- Welcome Banner -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);">
            <div class="card-body p-4 p-md-5 text-white">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white rounded-3 p-2 shadow d-flex align-items-center justify-content-center" style="width: 68px; height: 68px;">
                            <img src="{{ asset('images/tanahlaut.png') }}" alt="Lambang Kabupaten Tanah Laut" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div>
                            <span class="badge bg-warning text-dark text-uppercase px-2 py-1 mb-1 fw-bold">Hak Akses: Superadmin</span>
                            <h3 class="fw-bold mb-1">{{ $user->name }}</h3>
                            <p class="text-white-50 mb-0 small">
                                Panel Verifikasi Bantuan Keuangan &amp; Pelaporan Kegiatan Parpol Kabupaten Tanah Laut
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('parpol.home') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            <i class="bi bi-eye me-1"></i> Lihat Portal Publik
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
                    <i class="bi bi-exclamation-triangle-fill"></i> Terdapat kesalahan pada input form:
                </div>
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- 4 Kartu Statistik Ringkas -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 fs-3">
                            <i class="bi bi-bank2"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Total Parpol Terdaftar</span>
                            <h4 class="fw-bold mb-0 text-dark">{{ $totalParpol }} Partai</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 fs-3">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Total Biaya Terserap</span>
                            <h4 class="fw-bold mb-0 text-success">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 fs-3">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Kegiatan Dikpol Masuk</span>
                            <h4 class="fw-bold mb-0 text-dark">{{ $dikpols->count() }} Kegiatan</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-info bg-opacity-10 text-info rounded-3 p-3 fs-3">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Peserta Kaderisasi</span>
                            <h4 class="fw-bold mb-0 text-dark">{{ $totalPeserta }} Orang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Laporan Masuk yang Membutuhkan Verifikasi -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-header bg-white p-3 d-flex flex-wrap align-items-center justify-content-between gap-2 border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-clipboard2-check-fill text-primary fs-5"></i>
                    <div>
                        <h6 class="fw-bold mb-0">Daftar Laporan Pelaksanaan Bantuan Keuangan Masuk</h6>
                        <small class="text-muted">Kelola dan entri laporan kegiatan untuk seluruh 20 partai politik</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2 small d-none d-md-inline-block">
                        Total {{ $dikpols->count() }} Laporan
                    </span>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#modalTambahDikpolAdmin">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Laporan Kegiatan Baru
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-secondary">
                        <tr>
                            <th class="text-center" style="width: 45px;">No</th>
                            <th>Partai Politik</th>
                            <th>Nama Kegiatan / Agenda</th>
                            <th>Tempat &amp; Waktu</th>
                            <th class="text-end">Biaya Realisasi</th>
                            <th class="text-center">Dokumentasi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dikpols as $idx => $item)
                            <tr>
                                <td class="text-center fw-bold">{{ $idx + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 32px; height: 32px; border-radius: 6px; background: #ffffff; border: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 2px;" class="flex-shrink-0">
                                            <img src="{{ asset($item->parpol->logo) }}?v=16" alt="{{ $item->parpol->akronim }}" style="width: 100%; height: 100%; object-fit: contain;">
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark d-block" style="font-size: 0.88rem;">{{ $item->parpol->akronim }}</span>
                                            <small class="text-muted" style="font-size: 0.72rem;">No. {{ sprintf('%02d', $item->parpol->nomor_urut) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $item->nama_kegiatan }}</div>
                                    <span class="text-muted small"><i class="bi bi-people me-1"></i>{{ $item->peserta_jumlah }} Peserta</span>
                                </td>
                                <td class="small">
                                    <div><i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $item->tempat_pelaksanaan ?? 'Kab. Tanah Laut' }}</div>
                                    <span class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $item->tanggal_pelaksanaan }}</span>
                                </td>
                                <td class="text-end fw-bold text-success">
                                    Rp {{ number_format($item->jumlah_biaya, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    @if ($item->dokumentasi)
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalFotoAdmin{{ $item->id }}" title="Lihat Foto Dokumentasi">
                                            <img src="{{ asset($item->dokumentasi) }}" alt="Foto" class="rounded border shadow-sm" style="width: 44px; height: 32px; object-fit: cover;">
                                        </a>
                                    @else
                                        <span class="badge bg-light text-muted border">Tanpa Foto</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success bg-opacity-25 border border-success text-success px-2 py-1 small">
                                        <i class="bi bi-check-circle-fill me-1"></i> Terverifikasi
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalDetailDikpolAdmin{{ $item->id }}" title="Lihat Detail LPJ">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditDikpolAdmin{{ $item->id }}" title="Edit Laporan Kegiatan">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalHapusDikpolAdmin{{ $item->id }}" title="Hapus Laporan Kegiatan">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                                    <p class="mb-2 fw-semibold">Belum ada berkas laporan masuk dari partai politik.</p>
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahDikpolAdmin">
                                        <i class="bi bi-plus-circle me-1"></i> Tambah Laporan Sekarang
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
<!-- MODAL: TAMBAH LAPORAN KEGIATAN BARU (SUPERADMIN)         -->
<!-- ======================================================== -->
<div class="modal fade" id="modalTambahDikpolAdmin" tabindex="-1" aria-labelledby="modalTambahDikpolAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white p-3 px-4">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalTambahDikpolAdminLabel">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Laporan Kegiatan Baru (Superadmin)
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dikpol.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="alert alert-primary py-2 px-3 small rounded-3 mb-3 d-flex align-items-center gap-2">
                        <i class="bi bi-shield-check fs-5"></i>
                        <span>Sebagai <strong>Superadmin Bakesbangpol</strong>, Anda dapat menginput laporan atas nama salah satu dari 20 partai politik yang terdaftar.</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Pilih Partai Politik Pengusung <span class="text-danger">*</span></label>
                            <select name="parpol_id" class="form-select rounded-3" required>
                                <option value="" disabled selected>-- Pilih Partai Politik (20 Partai) --</option>
                                @foreach ($parpols as $p)
                                    <option value="{{ $p->id }}" {{ old('parpol_id') == $p->id ? 'selected' : '' }}>
                                        No. {{ sprintf('%02d', $p->nomor_urut) }} - {{ $p->nama_partai }} ({{ $p->akronim }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Nama Agenda Kegiatan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_kegiatan" class="form-control rounded-3" placeholder="Contoh: Pendidikan Politik dan Kaderisasi Pengurus DPC/DPD Tahun 2026" required value="{{ old('nama_kegiatan') }}">
                        </div>

                        <div class="col-md-7">
                            <label class="form-label fw-bold small text-dark">Tempat / Lokasi Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="text" name="tempat_pelaksanaan" class="form-control rounded-3" placeholder="Contoh: Aula Hotel Sinar Pelaihari" required value="{{ old('tempat_pelaksanaan') }}">
                        </div>

                        <div class="col-md-5">
                            <label class="form-label fw-bold small text-dark">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                            <input type="text" name="tanggal_pelaksanaan" class="form-control rounded-3" placeholder="Contoh: 15 Maret 2026 atau 2026-03-15" required value="{{ old('tanggal_pelaksanaan') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-dark">Jumlah Peserta (Orang) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-people-fill text-muted"></i></span>
                                <input type="number" name="peserta_jumlah" class="form-control" min="1" placeholder="Contoh: 80" required value="{{ old('peserta_jumlah') }}">
                                <span class="input-group-text bg-light small">Peserta</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-dark">Biaya Realisasi (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                <input type="number" name="jumlah_biaya" class="form-control" min="0" step="1000" placeholder="Contoh: 15000000" required value="{{ old('jumlah_biaya') }}">
                            </div>
                            <small class="text-muted" style="font-size: 0.75rem;">Masukkan angka bulat (contoh: 15000000 untuk Rp 15.000.000)</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Foto Dokumentasi Kegiatan (Opsional)</label>
                            <input type="file" name="dokumentasi" class="form-control rounded-3" accept="image/jpeg,image/png,image/jpg,image/webp">
                            <small class="text-muted" style="font-size: 0.75rem;">Format file: JPG, PNG, WEBP (maksimal 5 MB).</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-dark">Keterangan Tambahan / Ringkasan LPJ</label>
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
<!-- MODAL: EDIT, DETAIL, HAPUS & PREVIEW FOTO (ADMIN)        -->
<!-- ======================================================== -->
@foreach ($dikpols as $item)
    <!-- Modal Detail LPJ Admin -->
    <div class="modal fade" id="modalDetailDikpolAdmin{{ $item->id }}" tabindex="-1" aria-labelledby="modalDetailDikpolAdminLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-dark text-white p-3 px-4">
                    <h6 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalDetailDikpolAdminLabel{{ $item->id }}">
                        <i class="bi bi-file-earmark-text"></i> Lembar Verifikasi Kegiatan LPJ
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-3 p-3 bg-light rounded-3 border">
                        <div style="width: 44px; height: 44px; border-radius: 8px; background: #ffffff; border: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 2px;" class="flex-shrink-0">
                            <img src="{{ asset($item->parpol->logo) }}?v=16" alt="{{ $item->parpol->akronim }}" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div>
                            <span class="badge bg-warning text-dark text-uppercase small fw-bold">Nomor Urut {{ sprintf('%02d', $item->parpol->nomor_urut) }}</span>
                            <h6 class="fw-bold mb-0 text-dark">{{ $item->parpol->nama_partai }} ({{ $item->parpol->akronim }})</h6>
                        </div>
                    </div>

                    <table class="table table-sm table-borderless small mb-3">
                        <tbody>
                            <tr>
                                <th style="width: 140px;" class="text-secondary">Agenda Kegiatan</th>
                                <td class="fw-bold text-dark">{{ $item->nama_kegiatan }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Tempat</th>
                                <td>{{ $item->tempat_pelaksanaan ?? 'Kab. Tanah Laut' }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Waktu/Tanggal</th>
                                <td>{{ $item->tanggal_pelaksanaan }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Peserta</th>
                                <td><strong>{{ $item->peserta_jumlah }} Orang</strong> (Kader &amp; Masyarakat)</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Biaya Terserap</th>
                                <td class="fw-bold text-success fs-6">Rp {{ number_format($item->jumlah_biaya, 0, ',', '.') }}</td>
                            </tr>
                            @if ($item->keterangan)
                                <tr>
                                    <th class="text-secondary">Catatan/Keterangan</th>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    @if ($item->dokumentasi)
                        <div class="border rounded-3 overflow-hidden text-center bg-black">
                            <img src="{{ asset($item->dokumentasi) }}" alt="Dokumentasi" class="img-fluid" style="max-height: 220px; object-fit: contain;">
                        </div>
                    @endif
                </div>
                <div class="modal-footer bg-light p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Dikpol Admin -->
    <div class="modal fade" id="modalEditDikpolAdmin{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditDikpolAdminLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-dark text-white p-3 px-4">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalEditDikpolAdminLabel{{ $item->id }}">
                        <i class="bi bi-pencil-square"></i> Edit Laporan Kegiatan (Superadmin)
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dikpol.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Partai Politik Pengusung <span class="text-danger">*</span></label>
                                <select name="parpol_id" class="form-select rounded-3" required>
                                    @foreach ($parpols as $p)
                                        <option value="{{ $p->id }}" {{ old('parpol_id', $item->parpol_id) == $p->id ? 'selected' : '' }}>
                                            No. {{ sprintf('%02d', $p->nomor_urut) }} - {{ $p->nama_partai }} ({{ $p->akronim }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Nama Agenda Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kegiatan" class="form-control rounded-3" required value="{{ old('nama_kegiatan', $item->nama_kegiatan) }}">
                            </div>

                            <div class="col-md-7">
                                <label class="form-label fw-bold small text-dark">Tempat / Lokasi Pelaksanaan <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_pelaksanaan" class="form-control rounded-3" required value="{{ old('tempat_pelaksanaan', $item->tempat_pelaksanaan) }}">
                            </div>

                            <div class="col-md-5">
                                <label class="form-label fw-bold small text-dark">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                                <input type="text" name="tanggal_pelaksanaan" class="form-control rounded-3" required value="{{ old('tanggal_pelaksanaan', $item->tanggal_pelaksanaan) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-dark">Jumlah Peserta (Orang) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-people-fill text-muted"></i></span>
                                    <input type="number" name="peserta_jumlah" class="form-control" min="1" required value="{{ old('peserta_jumlah', $item->peserta_jumlah) }}">
                                    <span class="input-group-text bg-light small">Peserta</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-dark">Biaya Realisasi (Rp) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                    <input type="number" name="jumlah_biaya" class="form-control" min="0" step="1000" required value="{{ old('jumlah_biaya', $item->jumlah_biaya) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Ganti Foto Dokumentasi (Opsional)</label>
                                @if ($item->dokumentasi)
                                    <div class="d-flex align-items-center gap-3 mb-2 p-2 bg-light rounded-3 border">
                                        <img src="{{ asset($item->dokumentasi) }}" alt="Foto saat ini" class="rounded border" style="width: 60px; height: 45px; object-fit: cover;">
                                        <span class="small text-muted">Foto saat ini tersimpan. Unggah berkas baru hanya jika ingin memperbaruinya.</span>
                                    </div>
                                @endif
                                <input type="file" name="dokumentasi" class="form-control rounded-3" accept="image/jpeg,image/png,image/jpg,image/webp">
                                <small class="text-muted" style="font-size: 0.75rem;">Maksimal 5 MB (JPG, PNG, WEBP).</small>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-dark">Keterangan Tambahan / Ringkasan LPJ</label>
                                <textarea name="keterangan" rows="2" class="form-control rounded-3">{{ old('keterangan', $item->keterangan) }}</textarea>
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

    <!-- Modal Hapus Dikpol Admin -->
    <div class="modal fade" id="modalHapusDikpolAdmin{{ $item->id }}" tabindex="-1" aria-labelledby="modalHapusDikpolAdminLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-danger text-white p-3 px-4">
                    <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalHapusDikpolAdminLabel{{ $item->id }}">
                        <i class="bi bi-exclamation-triangle-fill"></i> Konfirmasi Hapus Laporan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <i class="bi bi-trash3 text-danger fs-1 d-block mb-3"></i>
                    <p class="mb-2">Apakah Anda yakin ingin menghapus laporan dari <strong>{{ $item->parpol->nama_partai }}</strong>:</p>
                    <h6 class="fw-bold text-dark mb-3">"{{ $item->nama_kegiatan }}"</h6>
                    <p class="small text-muted mb-0">Tindakan ini permanen. Anggaran sebesar <strong>Rp {{ number_format($item->jumlah_biaya, 0, ',', '.') }}</strong> akan dihapus dari rekapitulasi realisasi Bakesbangpol.</p>
                </div>
                <div class="modal-footer bg-light p-3 justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('dikpol.destroy', $item->id) }}" method="POST">
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

    <!-- Modal Preview Foto Dokumentasi Admin -->
    @if ($item->dokumentasi)
        <div class="modal fade" id="modalFotoAdmin{{ $item->id }}" tabindex="-1" aria-labelledby="modalFotoAdminLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header bg-dark text-white p-3 px-4">
                        <h6 class="modal-title fw-bold" id="modalFotoAdminLabel{{ $item->id }}">
                            <i class="bi bi-image me-1"></i> {{ $item->parpol->akronim }} &bull; {{ $item->nama_kegiatan }}
                        </h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 text-center bg-black">
                        <img src="{{ asset($item->dokumentasi) }}" alt="{{ $item->nama_kegiatan }}" class="img-fluid" style="max-height: 75vh; object-fit: contain;">
                    </div>
                    <div class="modal-footer bg-light p-2 px-3 d-flex justify-content-between align-items-center">
                        <span class="small text-muted">
                            <i class="bi bi-geo-alt me-1"></i>{{ $item->tempat_pelaksanaan }} &bull; <i class="bi bi-calendar-event me-1"></i>{{ $item->tanggal_pelaksanaan }}
                        </span>
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach

@endsection
