<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Partai Politik Kab. Tanah Laut Tahun 2026</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tanahlaut.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000000;
            background: #ffffff;
            font-size: 11pt;
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

        .header-title {
            text-align: center;
            font-weight: bold;
            font-size: 14pt;
            text-transform: uppercase;
            text-decoration: underline;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }

        .table-doc {
            width: 100%;
            border-collapse: collapse;
        }

        .table-doc th, .table-doc td {
            border: 1px solid #000000;
            padding: 8px 10px;
            vertical-align: top;
        }

        .table-doc th {
            text-align: center;
            font-weight: bold;
            background-color: #f1f5f9;
            font-size: 10pt;
        }

        .logo-img {
            max-width: 65px;
            max-height: 65px;
            object-fit: contain;
            display: block;
            margin: 0 auto 5px;
        }

        .sign-area {
            margin-top: 40px;
            float: right;
            text-align: center;
            width: 280px;
        }
    </style>
</head>
<body>

    <!-- Tombol Aksi Layar -->
    <div class="no-print mb-4 p-3 bg-light border rounded d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
        <div>
            <h5 class="m-0 fw-bold">Pratinjau Cetak Format Dokumen Resmi</h5>
            <span class="small text-muted">Format A4 Landscape &bull; Rekapitulasi {{ count($parpols) }} Partai Politik Kab. Tanah Laut</span>
        </div>
        <div class="d-flex gap-2 w-100 w-sm-auto">
            <a href="{{ route('parpol.home') }}" class="btn btn-outline-secondary btn-sm flex-fill flex-sm-grow-0 text-center">
                &larr; Kembali
            </a>
            <button onclick="window.print()" class="btn btn-primary btn-sm fw-bold flex-fill flex-sm-grow-0 text-center">
                Cetak / Simpan PDF
            </button>
        </div>
    </div>

    <!-- Banner Panduan Khusus Layar Ponsel (Otomatis Sembunyi Saat Cetak) -->
    <div class="no-print alert alert-info py-2 px-3 small d-md-none rounded-3 mb-3 d-flex align-items-center gap-2">
        <i class="bi bi-info-circle-fill text-primary fs-5 flex-shrink-0"></i>
        <div>
            <strong>Info Tampilan Ponsel:</strong> Dokumen rekapitulasi ini diformat untuk kertas <strong>A4 Landscape</strong>. Geser tabel ke samping untuk membaca seluruh kolom, atau klik <em>"Cetak / Simpan PDF"</em>.
        </div>
    </div>

    <!-- Judul Dokumen Resmi -->
    <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
        <img src="{{ asset('images/tanahlaut.png') }}" alt="Logo Kab. Tanah Laut" style="width: 58px; height: auto;">
        <div class="header-title mb-0">
            DATA PARTAI POLITIK KAB. TANAH LAUT TAHUN 2026
        </div>
    </div>

    <!-- Tabel Rekapitulasi (Dapat Digeser Halus di Ponsel) -->
    <div class="table-responsive shadow-sm border rounded-3 p-1 mb-4" style="-webkit-overflow-scrolling: touch;">
        <table class="table-doc" style="min-width: 840px;">
        <thead>
            <tr>
                <th style="width: 40px;">NO</th>
                <th style="width: 140px;">PARPOL</th>
                <th style="width: 220px;">LEGALITAS</th>
                <th style="width: 250px;">PENGURUS</th>
                <th>ALAMAT</th>
                <th style="width: 65px;">SK3P3</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parpols as $p)
                <tr>
                    <td style="text-align: center; font-weight: bold;">
                        {{ $p->nomor_urut }}
                    </td>
                    <td style="text-align: center;">
                        <img src="{{ asset($p->logo) }}?v=16" alt="Logo {{ $p->akronim }}" class="logo-img">
                        <strong style="font-size: 10pt;">{{ $p->akronim }}</strong>
                    </td>
                    <td style="font-size: 9.5pt;">
                        <div>No SK Kepengurusan</div>
                        <strong>{{ $p->no_sk }}</strong>
                        @if ($p->tanggal_sk)
                            <div>{{ $p->tanggal_sk }}</div>
                        @endif
                    </td>
                    <td style="font-size: 9.5pt;">
                        <table style="width: 100%; border: none;">
                            <tr>
                                <td style="border: none; padding: 1px; width: 75px;">Ketua</td>
                                <td style="border: none; padding: 1px;">: <strong>{{ $p->ketua }}</strong></td>
                            </tr>
                            <tr>
                                <td style="border: none; padding: 1px;">No.Hp</td>
                                <td style="border: none; padding: 1px;">: {{ $p->no_hp_ketua ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td style="border: none; padding: 1px;">Sekretaris</td>
                                <td style="border: none; padding: 1px;">: {{ $p->sekretaris }}</td>
                            </tr>
                            <tr>
                                <td style="border: none; padding: 1px;">Bendahara</td>
                                <td style="border: none; padding: 1px;">: {{ $p->bendahara }}</td>
                            </tr>
                            <tr>
                                <td style="border: none; padding: 1px;">LO</td>
                                <td style="border: none; padding: 1px;">: {{ $p->lo_nama }} @if($p->lo_hp)({{ $p->lo_hp }})@endif</td>
                            </tr>
                        </table>
                    </td>
                    <td style="font-size: 9.5pt;">
                        {{ $p->alamat }}
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 9.5pt;">
                        {{ $p->sk3p3 }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="sign-area">
        <div>Pelaihari, 2026</div>
        <div style="margin-bottom: 70px;">Mengetahui,</div>
        <div style="font-weight: bold; text-decoration: underline;">Petugas Verifikator Data</div>
        <div>NIP. ........................................</div>
    </div>

</body>
</html>
