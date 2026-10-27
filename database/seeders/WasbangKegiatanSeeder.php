<?php

namespace Database\Seeders;

use App\Models\WasbangKegiatan;
use Illuminate\Database\Seeder;

class WasbangKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatans = [
            [
                'nama_kegiatan' => 'Sosialisasi Penguatan 4 Konsensus Dasar Kebangsaan & Nilai Pancasila bagi Generasi Muda',
                'kategori' => 'Wawasan Kebangsaan',
                'tanggal' => '2026-08-18',
                'hari' => 'Selasa',
                'waktu' => '08:30 - 12:30 WITA',
                'lokasi' => 'Lapangan Terbuka SMKN 1 Pelaihari, Jl. Gembira No. 1',
                'sasaran_peserta' => '250 Siswa-Siswi OSIS & Pramuka Penegak se-Kecamatan Pelaihari',
                'pelaksana' => 'Subbidang Bina Ideologi & Wawasan Kebangsaan',
                'rincian' => "Pelaksanaan sosialisasi lapangan penguatan 4 Konsensus Dasar Kebangsaan (Pancasila, UUD 1945, NKRI, dan Bhinneka Tunggal Ika).\n\nNarasumber berasal dari Kodim 1009/Tanah Laut dan Bakesbangpol Kabupaten Tanah Laut. Kegiatan berlangsung interaktif di ruang terbuka dengan metode outbound kepemimpinan, simulasi pemecahan masalah kebangsaan, dan ikrar pemuda penerus bangsa. Diakhiri dengan penyerahan simbolis paket bendera merah putih kepada masing-masing perwakilan sekolah.",
                'status' => 'Selesai Dilaksanakan',
                'foto' => 'images/wasbang/wasbang-1.svg',
                'foto_tambahan' => json_encode([
                    'images/wasbang/wasbang-1.svg',
                    'images/wasbang/wasbang-3.svg',
                ]),
                'video' => null,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'dokumen_laporan' => null,
            ],
            [
                'nama_kegiatan' => 'Monitoring & Evaluasi Lapangan Pembinaan Desa Tangguh Ideologi & Kerukunan Beragama',
                'kategori' => 'Bina Ideologi Pancasila',
                'tanggal' => '2026-09-09',
                'hari' => 'Rabu',
                'waktu' => '09:00 - 14:00 WITA',
                'lokasi' => 'Balai Pertemuan Terbuka Desa Sumber Makmur, Kec. Takisung',
                'sasaran_peserta' => '65 Peserta (Aparatur Desa, Tokoh Agama, Tokoh Adat, BPD & Karang Taruna)',
                'pelaksana' => 'Tim Monitoring Ketahanan Ideologi Bakesbangpol Tala',
                'rincian' => "Monitoring langsung ke lapangan terhadap pelaksanaan program Desa Tangguh Ideologi Pancasila di wilayah pesisir Kecamatan Takisung.\n\nTim melakukan dialog terbuka bersama pemuka agama (MUI, FKUB), tokoh masyarakat transmigran, dan generasi muda desa. Fokus bahasan mencakup pemetaan potensi kerawanan gesekan sosial, penguatan deteksi dini paham radikal intoleran, serta pemantapan gotong royong warga antar-suku.",
                'status' => 'Selesai Dilaksanakan',
                'foto' => 'images/wasbang/wasbang-2.svg',
                'foto_tambahan' => json_encode([
                    'images/wasbang/wasbang-2.svg',
                ]),
                'video' => null,
                'video_url' => null,
                'dokumen_laporan' => null,
            ],
            [
                'nama_kegiatan' => 'Pemusatan Diklat Lapangan Calon Pasukan Pengibar Bendera Pusaka (Paskibraka) Tala 2026',
                'kategori' => 'Paskibraka & Kepemimpinan Pemuda',
                'tanggal' => '2026-08-05',
                'hari' => 'Rabu',
                'waktu' => '07:00 - 17:30 WITA',
                'lokasi' => 'Lapangan Pertasi Kencana Pelaihari, Kab. Tanah Laut',
                'sasaran_peserta' => '40 Calon Paskibraka Terpilih dari 11 Kecamatan di Kabupaten Tanah Laut',
                'pelaksana' => 'Bidang Bina Ideologi Wasbang bersama Tim Instruktur TNI/Polri',
                'rincian' => "Latihan intensif luar ruangan pembentukan mental, disiplin Peraturan Baris Berbaris (PBB), formasi pengibaran bendera pusaka, serta wawasan kebangsaan nusantara bagi 40 calon Paskibraka Kabupaten Tanah Laut Tahun 2026.\n\nDidampingi pelatih dari Kodim 1009/TLA, Polres Tanah Laut, PPI Tala, serta pengawalan tim medis Dinas Kesehatan Tala. Kondisi seluruh peserta fisik dan stamina prima.",
                'status' => 'Selesai Dilaksanakan',
                'foto' => 'images/wasbang/wasbang-3.svg',
                'foto_tambahan' => json_encode([
                    'images/wasbang/wasbang-3.svg',
                    'images/wasbang/wasbang-1.svg',
                ]),
                'video' => null,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'dokumen_laporan' => null,
            ],
            [
                'nama_kegiatan' => 'Kemah Wawasan Nusantara & Bela Negara Pemuda Lintas Etnis Tanah Laut',
                'kategori' => 'Bela Negara & Ketahanan Bangsa',
                'tanggal' => '2026-10-10',
                'hari' => 'Sabtu',
                'waktu' => '2 Hari 1 Malam (10 - 11 Okt 2026)',
                'lokasi' => 'Bumi Perkemahan Agro Wisata Desa Tirta Jaya, Kec. Bajuin',
                'sasaran_peserta' => '150 Pemuda perwakilan KNPI, Pemuda Pancasila, FPK, dan BEM se-Tala',
                'pelaksana' => 'Bidang Bina Ideologi, Wasbang & Karakter Bangsa',
                'rincian' => "Penyelenggaraan kemah outdoor wawasan nusantara dan bela negara. Agenda meliputi: (1) Apel Kebangsaan pembuka, (2) Lintas alam jelajah ketahanan fisik, (3) Diskusi panel peran pemuda menyongsong Indonesia Emas 2045, (4) Api unggun kebangsaan dengan ikrar persatuan lintas suku (Banjar, Jawa, Bugis, Dayak, Madura, Bali), serta (5) Kerja bakti pembersihan area wisata lokal Bajuin.",
                'status' => 'Selesai Dilaksanakan',
                'foto' => 'images/wasbang/wasbang-4.svg',
                'foto_tambahan' => json_encode([
                    'images/wasbang/wasbang-4.svg',
                ]),
                'video' => null,
                'video_url' => null,
                'dokumen_laporan' => null,
            ],
            [
                'nama_kegiatan' => 'Aksi Lapangan Gerakan Pembagian 10 Juta Bendera Merah Putih & Kampanye Cinta Tanah Air',
                'kategori' => 'Karakter Bangsa & Moralitas',
                'tanggal' => '2026-08-01',
                'hari' => 'Sabtu',
                'waktu' => '07:30 - 10:30 WITA',
                'lokasi' => 'Simpang Bundaran Angsau & Area Terbuka Pasar Rakyat Pelaihari',
                'sasaran_peserta' => '1.000+ Masyarakat umum, pedagang, dan pengguna jalan raya',
                'pelaksana' => 'Bakesbangpol Tala bersama Jajaran Forkopimda & Ormas Kebangsaan',
                'rincian' => "Aksi turun ke jalan membagikan bendera merah putih secara cuma-cuma kepada masyarakat pengendara roda dua, roda empat, pedagang pasar, dan warga sekitar bundaran Angsau Pelaihari.\n\nKegiatan ini merupakan implementasi Surat Edaran Kementerian Dalam Negeri tentang Gerakan Pembagian 10 Juta Bendera Merah Putih dalam rangka menyemarakkan HUT ke-81 Kemerdekaan Republik Indonesia.",
                'status' => 'Selesai Dilaksanakan',
                'foto' => 'images/wasbang/wasbang-5.svg',
                'foto_tambahan' => json_encode([
                    'images/wasbang/wasbang-5.svg',
                ]),
                'video' => null,
                'video_url' => null,
                'dokumen_laporan' => null,
            ],
            [
                'nama_kegiatan' => 'Roadshow Lapangan Ketahanan Budaya Lokal & Pencegahan Faham Ekstremisme di Tambang Ulang',
                'kategori' => 'Karakter Bangsa & Moralitas',
                'tanggal' => '2026-10-24',
                'hari' => 'Sabtu',
                'waktu' => '09:00 - 13:00 WITA',
                'lokasi' => 'Halaman Terbuka Kantor Camat Tambang Ulang, Kab. Tanah Laut',
                'sasaran_peserta' => '90 Tokoh Pemuda, Karang Taruna, dan Pamong Desa',
                'pelaksana' => 'Subbidang Bina Karakter Bangsa',
                'rincian' => "Kegiatan sosialisasi dan dialog interaktif outdoor penguatan ketahanan kearifan lokal Banjar dalam membentengi generasi muda dari infiltrasi paham radikal dan ekstrimisme berbasis agama maupun separatisme.\n\nDilakukan penandatanganan deklarasi pemuda Tambang Ulang pelopor perdamaian dan kerukunan warga.",
                'status' => 'Sedang Dilaksanakan',
                'foto' => 'images/wasbang/wasbang-6.svg',
                'foto_tambahan' => json_encode([
                    'images/wasbang/wasbang-6.svg',
                ]),
                'video' => null,
                'video_url' => null,
                'dokumen_laporan' => null,
            ],
        ];

        foreach ($kegiatans as $k) {
            WasbangKegiatan::updateOrCreate(
                ['nama_kegiatan' => $k['nama_kegiatan']],
                $k
            );
        }
    }
}
