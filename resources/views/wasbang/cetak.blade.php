<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekapitulasi Kegiatan Luar WASBANG - Bakesbangpol Tanah Laut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
            background: #fff;
            padding: 20px;
        }

        .kop-surat {
            border-bottom: 3px double #000;
            padding-bottom: 12px;
            margin-bottom: 24px;
            text-align: center;
        }

        .kop-surat h4 {
            margin: 0;
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-surat h3 {
            margin: 0;
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-surat p {
            margin: 2px 0 0 0;
            font-size: 10pt;
            font-style: italic;
        }

        .table-cetak {
            width: 100%;
            border-collapse: collapse;
            font-size: 9.5pt;
        }

        .table-cetak th, .table-cetak td {
            border: 1px solid #000;
            padding: 6px 8px;
            vertical-align: top;
        }

        .table-cetak th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        @media print {
            .no-print {
                display: none !important;
            }
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Tombol Aksi Cetak -->
    <div class="no-print mb-4 p-3 bg-light border rounded d-flex justify-content-between align-items-center">
        <div>
            <strong>Pratinjau Dokumen Resmi Arsip Kegiatan Luar WASBANG</strong><br>
            <span class="text-muted small">Gunakan tombol di samping untuk mencetak atau menyimpan sebagai format PDF.</span>
        </div>
        <div class="d-flex gap-2">
            <button onclick="window.print()" class="btn btn-primary btn-sm px-3 fw-bold">
                Cetak / Simpan PDF
            </button>
            <a href="{{ route('wasbang.index') }}" class="btn btn-secondary btn-sm px-3">
                Kembali
            </a>
        </div>
    </div>

    <!-- Kop Surat Resmi -->
    <div class="kop-surat d-flex align-items-center justify-content-center gap-4">
        <img src="{{ asset('images/tanahlaut.png') }}" alt="Lambang Kabupaten Tanah Laut" style="width: 72px; height: auto;">
        <div>
            <h4>PEMERINTAH KABUPATEN TANAH LAUT</h4>
            <h3>BADAN KESATUAN BANGSA DAN POLITIK</h3>
            <p>Jl. A. Yani No. 01, Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70814</p>
            <p>Laman: www.tanahlautkab.go.id &bull; Pos-el: bakesbangpol@tanahlautkab.go.id</p>
        </div>
    </div>

    <div class="text-center mb-4">
        <h5 class="fw-bold mb-1 text-uppercase text-decoration-underline">REKAPITULASI PENGARSIPAN LAPORAN KEGIATAN LUAR LAPANGAN</h5>
        <div class="small fw-semibold">BIDANG BINA IDEOLOGI, WAWASAN KEBANGSAAN, DAN KARAKTER BANGSA</div>
        <div class="small text-muted">TAHUN ANGGARAN 2026</div>
    </div>

    <table class="table-cetak mb-5">
        <thead>
            <tr>
                <th style="width: 35px;">NO</th>
                <th style="width: 130px;">HARI &amp; TANGGAL</th>
                <th>NAMA KEGIATAN LAPANGAN</th>
                <th style="width: 110px;">KATEGORI</th>
                <th>TEMPAT / LOKASI</th>
                <th>PESERTA</th>
                <th>RINGKASAN RINCIAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatans as $idx => $k)
                <tr>
                    <td class="text-center fw-bold">{{ $idx + 1 }}</td>
                    <td>
                        <strong>{{ $k->hari }}</strong><br>
                        {{ sprintf('%02d', $k->tanggal) }} {{ $k->bulan }} {{ $k->tahun }}
                    </td>
                    <td><strong>{{ $k->nama_kegiatan }}</strong></td>
                    <td class="text-center">{{ $k->kategori }}</td>
                    <td>{{ $k->tempat_lokasi }}</td>
                    <td>{{ $k->peserta ?? '-' }}</td>
                    <td style="font-size: 8.5pt;">{{ $k->rincian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tanda Tangan Pengesahan -->
    <div class="d-flex justify-content-end text-center mt-4">
        <div style="width: 280px;">
            <div>Pelaihari, {{ date('d F Y') }}</div>
            <div class="fw-bold mt-1">Kepala Badan Kesatuan Bangsa dan Politik<br>Kabupaten Tanah Laut</div>
            <div style="height: 70px;"></div>
            <div class="fw-bold text-decoration-underline">Drs. H. M. SYAIFUDDIN, M.Si</div>
            <div class="small">Pembina Utama Muda (IV/c)</div>
            <div class="small">NIP. 19680512 199303 1 004</div>
        </div>
    </div>

</body>
</html>
