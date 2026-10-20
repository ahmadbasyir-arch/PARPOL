# PARPOL - Website Resmi Partai Politik Republik Indonesia

Website portal resmi partai politik (PARPOL) berbasis framework **Laravel 12** dan **PHP 8.2+**, dirancang dengan antarmuka modern, responsif, dan kaya fitur interaktif untuk publik, kader, dan simpatisan.

---

## 🌟 Fitur Utama Website PARPOL

1. **Beranda Interaktif (Landing Portal)**
   - Header & Hero section bertema kebangsaan dinamis dengan visual modern.
   - Live Counter Statistik (38 DPD Provinsi, 514 DPC Kab/Kota, 125.000+ Kader terdaftar, 8.400+ Aspirasi publik).
   - Manifesto kebangsaan dan status keterbukaan informasi publik.

2. **Visi, Misi & 4 Pilar Gerakan**
   - Visi kedaulatan, keadilan, dan kemakmuran rakyat.
   - 4 Pilar: Kedaulatan Rakyat, Ekonomi Berdikari, Keadilan Hukum & HAM, serta SDM Unggul & Berkarakter.

3. **Struktur Pimpinan Dewan Pimpinan Pusat (DPP)**
   - Profil Ketua Umum, Sekretaris Jenderal, Bendahara Umum, dan Ketua Dewan Pembina.

4. **Program Kerja & Aksi Nyata**
   - 6 Program unggulan: Integritas & Anti-Korupsi, Kedaulatan Ekonomi & UMKM, Pendidikan Gratis, Kesehatan Merata, Transisi Energi Hijau, dan Akademi Kepemimpinan Muda.

5. **Warta & Publikasi Terkini**
   - Rilis pers, agenda konsolidasi nasional, dan aksi sosial kerakyatan.

6. **Pendaftaran Kader Online (e-KTA)**
   - Formulir pendaftaran anggota terintegrasi dengan database (Nama, NIK 16 digit valid, email, kontak WhatsApp, domisili provinsi & kota/kabupaten, motivasi).
   - Validasi data & pesan konfirmasi sukses otomatis.

7. **Kanal Aspirasi & Suara Rakyat**
   - Formulir pengaduan, masukan undang-undang, dan aspirasi publik langsung ke fraksi.
   - Feed aspirasi masuk terbaru dengan transparansi status penanganan.

---

## 🛠️ Struktur Teknis Project

- **Framework**: Laravel 12.x
- **Bahasa**: PHP 8.2.12
- **Database**: SQLite (default tanpa perlu konfigurasi MySQL tambahan) / siap dialihkan ke MySQL / PostgreSQL via `.env`
- **Frontend**: Blade Templating + Bootstrap 5.3 + Bootstrap Icons + Google Fonts (*Plus Jakarta Sans*)
- **Lokasi Proyek**: `C:\Users\LENOVO\.gemini\antigravity\scratch\parpol`

### File & Direktori Kunci
- `app/Http/Controllers/ParpolController.php` : Controller utama untuk beranda, registrasi kader, dan aspirasi.
- `app/Models/Anggota.php` : Model data pendaftaran kader/anggota partai.
- `app/Models/Aspirasi.php` : Model data kanal aspirasi rakyat.
- `database/migrations/` : Tabel `anggotas` dan `aspirasis`.
- `database/seeders/DatabaseSeeder.php` : Data awal/sample kader dan aspirasi.
- `resources/views/layouts/app.blade.php` : Master layout (Navbar, Topbar DPP, Footer, Meta).
- `resources/views/parpol/index.blade.php` : Tampilan visual lengkap portal PARPOL.
- `routes/web.php` : Routing halaman beranda dan endpoint POST.
- `tests/Feature/ExampleTest.php` : Pengujian otomatis (Unit & Feature Test) yang telah lulus 100%.

---

## 🚀 Cara Menjalankan Website

Buka terminal di folder project:

```powershell
cd C:\Users\LENOVO\.gemini\antigravity\scratch\parpol
```

Jalankan web server lokal Laravel:

```powershell
php artisan serve
```

Buka peramban (browser) dan akses:
👉 **http://127.0.0.1:8000**

---

## 🧪 Menjalankan Pengujian Otomatis

Untuk memastikan semua modul dan database berfungsi:

```powershell
php artisan test
```

Hasil test:
```text
PASS  Tests\Unit\ExampleTest
✓ that true is true

PASS  Tests\Feature\ExampleTest
✓ the application returns a successful response
✓ can register new anggota
✓ can submit aspirasi

Tests: 4 passed (8 assertions)
```
