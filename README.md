# SIPARPOL - Data Partai Politik Kabupaten Tanah Laut Tahun 2026

Website portal resmi sistem informasi direktori dan rekapitulasi data **Partai Politik Kabupaten Tanah Laut Tahun 2026** (Provinsi Kalimantan Selatan) berbasis framework **Laravel 12** dan **PHP 8.2+**.

Menyajikan data otentik 20 partai politik lengkap dengan logo resmi, legalitas SK kepengurusan, jajaran pengurus DPC/DPD (Ketua, Sekretaris, Bendahara), nomor kontak penghubung (LO), alamat kantor sekretariat, dan status berkas SK3P3.

---

## 🏛️ Daftar 20 Partai Politik Kabupaten Tanah Laut (2026)

| No | Partai Politik | Akronim | Ketua DPC/DPD | Petugas Penghubung (LO) | Wilayah Kantor | SK3P3 |
|:--:|---|:---:|---|---|---|:---:|
| 1 | Partai Kebangkitan Bangsa | **PKB** | H. MUHAMMAD ZAZULI, S.H. | SUPIAN HADI (085249727776) | Kel. Angsau, Pelaihari | Ada |
| 2 | Partai Gerakan Indonesia Raya | **GERINDRA** | H. ATMARI | RISNAWATI (081347075054) | Kel. Angsau, Pelaihari | Ada |
| 3 | Partai Demokrasi Indonesia Perjuangan | **PDI PERJUANGAN** | H. JUNAIDI, S.K.M | NURUL (08125156376) | Kel. Pabahanan, Pelaihari | Ada |
| 4 | Partai Golongan Karya | **GOLKAR** | H. AGUS PRASETYA BUDIONO | TAUFIK (088245416377) | Kel. Angsau, Pelaihari | Ada |
| 5 | Partai NasDem | **Partai NasDem** | JOKO PITOYO, S.AP | PAULUS A P, SE (085251362186) | Kel. Angsau, Pelaihari | Ada |
| 6 | Partai Gelombang Rakyat Indonesia | **GELORA** | SURYANI PRAMESTI PODO | RENDI (085391910345) | Kel. Sarang Halang, Pelaihari | Ada |
| 7 | Partai Keadilan Sejahtera | **PKS** | FUAD AMIN | SLAMET HERMAWAN (083152039062) | Kel. Sarang Halang, Pelaihari | Ada |
| 8 | Partai Hati Nurani Rakyat | **HANURA** | YUDI RIZAL | FIRMAN (083145203320) | Kel. Sarang Halang, Pelaihari | Ada |
| 9 | Partai Amanat Nasional | **PAN** | YOGA PINIS SUHENDRA, ST, MH | ASRIEL (082156488770) | Kel. Karang Taruna, Pelaihari | Ada |
| 10 | Partai Bulan Bintang | **PBB** | MUHAMMAD GAZALI RAHMAN SE | ZALI (083185778444 / 085345494445) | Kel. Pelaihari, Pelaihari | Ada |
| 11 | Partai Demokrat | **PARTAI DEMOKRAT** | H. ARKANI, S.Pd. M.Si | SAMINGAN (085248522432) | Kel. Angsau, Pelaihari | Ada |
| 12 | Partai Solidaritas Indonesia | **PSI** | HARRY YADI | GALANG (082252973411) | Kel. Angsau, Pelaihari | Ada |
| 13 | Partai Persatuan Indonesia | **PARTAI PERINDO** | KASIR | KASIR (082154094043) | Kel. Karang Taruna, Pelaihari | Ada |
| 14 | Partai Persatuan Pembangunan | **PPP** | AIRLANGGA | ANGGA (085347222285) | Kel. Karang Taruna, Pelaihari | Ada |
| 15 | Partai Gerakan Rakyat | **GERAKAN RAKYAT** | MADI | MADI (085248837818) | Desa Damit Hulu, Kec. Batu Ampar | Ada |
| 16 | Partai Gema Bangsa | **GEMA BANGSA** | EKO CAHYADI, SE | EKO CAHYADI, SE (081349237329) | Kel. Pelaihari, Pelaihari | Ada |
| 17 | Partai Garda Perubahan Indonesia | **GARUDA** | TRI SURADIANINGSIH | NADIA (085971881052) | Kel. Pelaihari, Pelaihari | Blm |
| 18 | Partai Kebangkitan Nusantara | **PKN** | MIXE SRIBIMA AREOTEJO, SH | ALI MASHARI (081271781122) | Desa Atu Atu, Pelaihari | Blm |
| 19 | Partai Ummat | **PARTAI UMMAT** | RONIANSYAH | SYAHRIANTO (085347222285) | Kel. Angsau, Pelaihari | Blm |
| 20 | Partai Buruh | **PARTAI BURUH** | NURYANTO | MULYAJI (085386145752) | Desa Panggung, Pelaihari | Blm |

---

## 🌟 Fitur Utama Website

1. **Format Tabel Dokumen Resmi**: Menampilkan seluruh data sesuai lembar rekapitulasi fisik (No, Logo, Legalitas SK, Pengurus, Alamat, SK3P3).
2. **Pencarian Realtime & Filter Wilayah**: Filter instan nama partai, pengurus, atau wilayah (Kec. Pelaihari / Kec. Batu Ampar).
3. **Direktori Kartu Visual (Grid Cards)**: Menampilkan logo beresolusi tinggi (format vektor SVG) serta nomor kontak resmi petugas penghubung (LO).
4. **Modal Rincian Partai**: Pop-up interaktif rincian legalitas SK, Google Maps alamat, dan susunan pengurus.
5. **Pratinjau & Cetak Dokumen (A4 Landscape)**: Format cetak siap print (Ctrl+P) persis lembar rekapitulasi pemerintah daerah.
6. **Layanan Pengkinian Data Pengurus**: Formulir khusus LO / pengurus parpol untuk mengajukan update SK atau pergantian struktur.

---

## 🚀 Cara Menjalankan Website Secara Lokal

Buka terminal di folder project:
```powershell
cd C:\Users\LENOVO\.gemini\antigravity\scratch\parpol
```

Jalankan perintah:
```powershell
php artisan serve
```

Akses website di browser:
👉 **http://127.0.0.1:8000**
👉 Format Cetak: **http://127.0.0.1:8000/cetak-data**

---

## 🧪 Pengujian Otomatis (Testing)

Semua pengujian unit dan fitur telah lulus 100%:
```powershell
php artisan test
```
```text
PASS  Tests\Unit\ExampleTest
✓ that true is true

PASS  Tests\Feature\ExampleTest
✓ the application returns a successful response
✓ cetak page returns successful response
✓ can submit aspirasi
✓ can submit perubahan data

Tests: 5 passed (17 assertions)
```
