<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Pengarsipan Dokumentasi Laporan Kegiatan Luar | Bidang Wasbang Bakesbangpol Tala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000000;
            background: #ffffff;
            font-size: 10.5pt;
            padding: 20px;
        }

        @media print {
            .no-print {
                display: none !important;
            }
            body {
                padding: 0;
            }
            @page {
                size: landscape;
                margin: 1.5cm;
            }
        }

        .kop-surat {
            border-bottom: 3px double #000000;
            padding-bottom: 12px;
            margin-bottom: 20px;
            text-align: center;
        }

        .kop-instansi {
            font-size: 13pt;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
        }

        .kop-badan {
            font-size: 15pt;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
        }

        .kop-bidang {
            font-size: 12pt;
            font-weight: bold;
            color: #b91c1c;
            text-transform: uppercase;
        }

        .kop-alamat {
            font-size: 9.5pt;
            font-style: italic;
        }

        .header-title {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            text-transform: uppercase;
            text-decoration: underline;
            margin-bottom: 4px;
        }

        .header-sub {
            text-align: center;
            font-size: 10pt;
            margin-bottom: 20px;
        }

        .table-doc {
            width: 100%;
            border-collapse: collapse;
        }

        .table-doc th, .table-doc td {
            border: 1px solid #000000;
            padding: 7px 9px;
            vertical-align: top;
        }

        .table-doc th {
            text-align: center;
            font-weight: bold;
            background-color: #f1f5f9;
            font-size: 9.5pt;
        }

        .thumb-preview {
            max-width: 90px;
            max-height: 60px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #94a3b8;
            display: block;
            margin: 0 auto 4px;
        }

        .sign-area {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
        }
    </style>
</head>
<body>

    <!-- Tombol Navigasi Cetak (Disembunyikan saat dicetak) -->
    <div class="no-print mb-4 d-flex justify-content-between align-items-center bg-light p-3 border rounded">
        <div>
            <a href="{{ route('wasbang.index') }}" class="btn btn-outline-secondary btn-sm me-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Wasbang
            </a>
            <span class="text-muted small">Cetak / Ekspor Rekapitulasi Laporan Dokumentasi Kegiatan Luar</span>
        </div>
        <div>
            <button onclick="window.print()" class="btn btn-danger btn-sm px-4 fw-bold shadow-sm">
                <i class="bi bi-printer-fill me-1"></i> Cetak Dokumen (PDF)
            </button>
        </div>
    </div>

    <!-- Kop Surat Resmi Bakesbangpol -->
    <div class="kop-surat">
        <div class="kop-instansi">PEMERINTAH KABUPATEN TANAH LAUT</div>
        <div class="kop-badan">BADAN KESATUAN BANGSA DAN POLITIK</div>
        <div class="kop-bidang">BIDANG BINA IDEOLOGI, WAWASAN KEBANGSAAN DAN KARAKTER BANGSA</div>
        <div class="kop-alamat">
            Jalan A. Yani, Kompleks Perkantoran Gagas, Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70814
        </div>
    </div>

    <!-- Judul Dokumen -->
    <div class="header-title">
        REKAPITULASI PENGARSIPAN DOKUMENTASI LAPORAN KEGIATAN LUAR LAPANGAN
    </div>
    <div class="header-sub">
        Tahun Anggaran 2026 &bull; Tanggal Cetak: {{ date('d F Y') }}
    </div>

    <!-- Tabel Rekapitulasi -->
    <table class="table-doc">
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th style="width: 20%;">Nama Kegiatan &amp; Kategori</th>
                <th style="width: 14%;">Hari, Tanggal &amp; Waktu</th>
                <th style="width: 15%;">Lokasi Pelaksanaan</th>
                <th style="width: 13%;">Sasaran / Peserta</th>
                <th style="width: 22%;">Rincian Laporan Hasil Kegiatan</th>
                <th style="width: 12%;">Dokumentasi Foto / Media</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatans as $index => $k)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $k->nama_kegiatan }}</strong><br>
                        <small class="text-muted">Kategori: {{ $k->kategori }}</small><br>
                        <span class="badge {{ $k->status === 'Sedang Dilaksanakan' ? 'bg-warning text-dark' : 'bg-success text-white' }} p-1 mt-1" style="font-size: 7.5pt;">
                            {{ $k->status }}
                        </span>
                    </td>
                    <td>
                        <strong>{{ $k->hari_tanggal_formatted }}</strong>
                        @if($k->waktu)
                            <br><small>{{ $k->waktu }}</small>
                        @endif
                    </td>
                    <td>
                        {{ $k->lokasi }}
                    </td>
                    <td>
                        {{ $k->sasaran_peserta ?? '-' }}
                    </td>
                    <td style="font-size: 9.5pt; text-align: justify;">
                        {{ Str::limit($k->rincian, 280) }}
                    </td>
                    <td class="text-center">
                        @if($k->foto)
                            <img src="{{ $k->foto_url }}" alt="Dokumentasi" class="thumb-preview">
                            <small style="font-size: 7.5pt;">Foto Terlampir</small>
                        @else
                            <small class="text-muted">Tidak Ada Foto</small>
                        @endif

                        @if($k->video || $k->video_url)
                            <br><small style="font-size: 7.5pt; color: #b91c1c;">(Video Tersedia)</small>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Belum ada arsip dokumentasi kegiatan yang tercatat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tanda Tangan Pengesahan -->
    <div class="sign-area">
        <div style="width: 300px; text-align: center;">
            <p class="mb-1">Mengetahui,</p>
            <p class="fw-bold mb-5">Kepala Badan Kesatuan Bangsa dan Politik<br>Kabupaten Tanah Laut</p>
            <p class="fw-bold text-decoration-underline mb-0">Drs. H. M. SYAHRIN NOOR, M.Si</p>
            <p class="small mb-0">Pembina Utama Muda (IV/c)</p>
            <p class="small">NIP. 19700512 199603 1 004</p>
        </div>

        <div style="width: 320px; text-align: center;">
            <p class="mb-1">Pelaihari, {{ date('d F Y') }}</p>
            <p class="fw-bold mb-5">Kepala Bidang Bina Ideologi, Wasbang<br>dan Karakter Bangsa</p>
            <p class="fw-bold text-decoration-underline mb-0">H. AKHMAD SUBEKTI, S.Sos, M.AP</p>
            <p class="small mb-0">Pembina (IV/a)</p>
            <p class="small">NIP. 19760824 200212 1 003</p>
        </div>
    </div>

</body>
</html>
