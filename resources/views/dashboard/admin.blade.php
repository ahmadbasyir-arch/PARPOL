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
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('login_success') }}</div>
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
            <div class="card-header bg-white p-3 d-flex align-items-center justify-content-between border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-clipboard2-check-fill text-primary fs-5"></i>
                    <h6 class="fw-bold mb-0">Daftar Laporan Pelaksanaan Bantuan Keuangan Masuk</h6>
                </div>
                <span class="badge bg-primary rounded-pill px-3 py-2">Semua Partai Politik</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-secondary">
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Partai Politik</th>
                            <th>Nama Kegiatan / Agenda</th>
                            <th>Tempat &amp; Waktu</th>
                            <th class="text-end">Biaya Realisasi</th>
                            <th class="text-center">Status Laporan</th>
                            <th class="text-center">Aksi Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dikpols as $idx => $item)
                            <tr>
                                <td class="text-center fw-bold">{{ $idx + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 32px; height: 32px; border-radius: 6px; background: #ffffff; border: 1px solid #cbd5e1; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 2px;" class="flex-shrink-0">
                                            <img src="{{ asset($item->parpol->logo) }}" alt="{{ $item->parpol->akronim }}" style="width: 100%; height: 100%; object-fit: contain;">
                                        </div>
                                        <span class="fw-bold text-dark">{{ $item->parpol->akronim }}</span>
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
                                    <span class="badge bg-success bg-opacity-25 border border-success text-success px-2 py-1 small">
                                        <i class="bi bi-check-circle-fill me-1"></i> Terverifikasi
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1">
                                        <i class="bi bi-search me-1"></i> Detail LPJ
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">Belum ada berkas laporan masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
