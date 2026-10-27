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
                            <img src="{{ asset($parpol->logo) }}" alt="{{ $parpol->akronim }}" style="width: 100%; height: 100%; object-fit: contain; border-radius: 10px;">
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
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('login_success') }}</div>
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
                <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" disabled title="Akan diaktifkan pada Langkah 4">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Laporan Baru (Langkah 4)
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dikpols as $idx => $keg)
                            <tr>
                                <td class="text-center fw-bold">{{ $idx + 1 }}</td>
                                <td class="fw-semibold text-dark">{{ $keg->nama_kegiatan }}</td>
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
                                        <img src="{{ asset($keg->dokumentasi) }}" alt="Dokumentasi" class="rounded border" style="width: 44px; height: 32px; object-fit: cover;">
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-1"></i>
                                    Belum ada data kegiatan pendidikan politik yang diinput untuk partai ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
