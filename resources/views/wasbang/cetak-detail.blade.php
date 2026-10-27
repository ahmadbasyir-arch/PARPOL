<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara & Laporan Dokumentasi: {{ $kegiatan->nama_kegiatan }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000000;
            background: #ffffff;
            font-size: 11pt;
            padding: 30px;
        }

        @media print {
            .no-print {
                display: none !important;
            }
            body {
                padding: 0;
            }
            @page {
                size: portrait;
                margin: 2cm;
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
            margin-bottom: 25px;
        }

        .table-meta {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-meta th, .table-meta td {
            border: 1px solid #333333;
            padding: 8px 12px;
            vertical-align: top;
        }

        .table-meta th {
            width: 28%;
            background-color: #f8fafc;
            font-weight: bold;
        }

        .photo-box {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #94a3b8;
            background: #fafafa;
        }

        .photo-img {
            max-width: 100%;
            max-height: 380px;
            object-fit: contain;
        }

        .rincian-box {
            border: 1px solid #333333;
            padding: 15px;
            margin-bottom: 25px;
            text-align: justify;
            line-height: 1.8;
            white-space: pre-line;
            background: #ffffff;
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

    <!-- Tombol Aksi Layar -->
    <div class="no-print mb-4 d-flex justify-content-between align-items-center bg-light p-3 border rounded">
        <div>
            <a href="{{ route('wasbang.index') }}" class="btn btn-outline-secondary btn-sm me-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Arsip
            </a>
            <span class="text-muted small">Format Berita Acara &amp; Lembar Laporan Kegiatan Luar</span>
        </div>
        <div>
            <button onclick="window.print()" class="btn btn-danger btn-sm px-4 fw-bold shadow-sm">
                <i class="bi bi-printer-fill me-1"></i> Cetak / Simpan PDF
            </button>
        </div>
    </div>

    <!-- Kop Surat -->
    <div class="kop-surat">
        <div class="kop-instansi">PEMERINTAH KABUPATEN TANAH LAUT</div>
        <div class="kop-badan">BADAN KESATUAN BANGSA DAN POLITIK</div>
        <div class="kop-bidang">BIDANG BINA IDEOLOGI, WAWASAN KEBANGSAAN DAN KARAKTER BANGSA</div>
        <div class="kop-alamat">
            Jalan A. Yani, Kompleks Perkantoran Gagas, Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70814
        </div>
    </div>

    <!-- Judul Berita Acara -->
    <div class="header-title">
        BERITA ACARA &amp; LEMBAR LAPORAN DOKUMENTASI KEGIATAN LUAR
    </div>
    <div class="header-sub">
        Nomor Register Arsip: BA-WASBANG/{{ $kegiatan->id }}/{{ date('Y') }}
    </div>

    <!-- Tabel Data Kegiatan -->
    <table class="table-meta">
        <tbody>
            <tr>
                <th>Nama Kegiatan</th>
                <td><strong>{{ $kegiatan->nama_kegiatan }}</strong></td>
            </tr>
            <tr>
                <th>Kategori Bidang</th>
                <td>{{ $kegiatan->kategori }}</td>
            </tr>
            <tr>
                <th>Hari &amp; Tanggal</th>
                <td><strong>{{ $kegiatan->hari_tanggal_formatted }}</strong></td>
            </tr>
            <tr>
                <th>Waktu Pelaksanaan</th>
                <td>{{ $kegiatan->waktu ?? 'Sesuai Agenda Terjadwal' }}</td>
            </tr>
            <tr>
                <th>Lokasi Pelaksanaan (Luar)</th>
                <td>{{ $kegiatan->lokasi }}</td>
            </tr>
            <tr>
                <th>Sasaran / Peserta</th>
                <td>{{ $kegiatan->sasaran_peserta ?? 'Masyarakat / Generasi Muda Kabupaten Tanah Laut' }}</td>
            </tr>
            <tr>
                <th>Unit / Tim Pelaksana</th>
                <td>{{ $kegiatan->pelaksana }}</td>
            </tr>
            <tr>
                <th>Status Pelaksanaan</th>
                <td>{{ $kegiatan->status }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Foto Dokumentasi Lapangan -->
    @if($kegiatan->foto)
        <div class="photo-box">
            <img src="{{ $kegiatan->foto_url }}" alt="Dokumentasi Kegiatan" class="photo-img">
            <div class="small text-muted mt-2">
                Dokumentasi Lapangan Otentik &bull; Lokasi: {{ $kegiatan->lokasi }} &bull; Tanggal: {{ $kegiatan->tanggal_formatted }}
            </div>
        </div>
    @endif

    <!-- Rincian & Kronologis Pelaksanaan -->
    <h6 class="fw-bold mt-4 mb-2">RINCIAN LAPORAN HASIL PELAKSANAAN KEGIATAN:</h6>
    <div class="rincian-box">
        {{ $kegiatan->rincian }}
    </div>

    <!-- Tanda Tangan -->
    <div class="sign-area">
        <div style="width: 280px; text-align: center;">
            <p class="mb-1">Petugas / Tim Lapangan,</p>
            <p class="fw-bold mb-5">Subbidang Bina Ideologi &amp; Wasbang</p>
            <p class="fw-bold text-decoration-underline mb-0">STAF PELAKSANA</p>
            <p class="small">Bakesbangpol Kab. Tanah Laut</p>
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
