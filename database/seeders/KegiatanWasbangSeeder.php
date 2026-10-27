<?php

namespace Database\Seeders;

use App\Models\KegiatanWasbang;
use Illuminate\Database\Seeder;

class KegiatanWasbangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatans = [
            [
                'nama_kegiatan' => 'Seleksi Lapangan Calon Paskibraka Kabupaten Tanah Laut Tahun 2026',
                'kategori' => 'Paskibraka',
                'hari' => 'Rabu',
                'tanggal' => 18,
                'bulan' => 'Maret',
                'tahun' => 2026,
                'tanggal_lengkap' => 'Rabu, 18 Maret 2026',
                'tempat_lokasi' => 'Stadion Pertasi Kencana, Kecamatan Pelaihari',
                'peserta' => '150 Pelajar SLTA se-Kabupaten Tanah Laut',
                'rincian' => 'Pelaksanaan uji kesamaptaan jasmani, postur, serta Peraturan Baris Berbaris (PBB) luar ruangan bagi calon Pasukan Pengibar Bendera Pusaka (Paskibraka) Kabupaten Tanah Laut tahun 2026 untuk persiapan penugasan Upacara HUT Kemerdekaan RI ke-81.',
                'foto' => 'images/wasbang/paskibraka.jpg',
                'video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'berkas_laporan' => 'docs/wasbang/laporan-seleksi-paskibraka-2026.pdf',
                'status' => 'terarsip',
            ],
            [
                'nama_kegiatan' => 'Kemah Bakti Bela Negara & Penguatan Karakter Generasi Muda',
                'kategori' => 'Bela Negara',
                'hari' => 'Sabtu',
                'tanggal' => 25,
                'bulan' => 'April',
                'tahun' => 2026,
                'tanggal_lengkap' => 'Sabtu, 25 April 2026',
                'tempat_lokasi' => 'Bumi Perkemahan Pantai Batakan Baru, Kecamatan Panyipatan',
                'peserta' => '200 Pemuda Karang Taruna & Pramuka Penegak',
                'rincian' => 'Kegiatan luar ruangan (outbound) yang memadukan wawasan kebangsaan, latihan kepemimpinan lapangan, mitigasi ancaman narkoba dan radikalisme, serta penanaman jiwa korsa cinta tanah air.',
                'foto' => 'images/wasbang/bela-negara.jpg',
                'video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'berkas_laporan' => 'docs/wasbang/laporan-kemah-bela-negara-2026.pdf',
                'status' => 'terarsip',
            ],
            [
                'nama_kegiatan' => 'Apel Akbar & Pawai Kebangsaan Peringatan Hari Lahir Pancasila',
                'kategori' => 'Bina Ideologi',
                'hari' => 'Senin',
                'tanggal' => 1,
                'bulan' => 'Juni',
                'tahun' => 2026,
                'tanggal_lengkap' => 'Senin, 01 Juni 2026',
                'tempat_lokasi' => 'Halaman Depan Kantor Bupati Tanah Laut, Pelaihari',
                'peserta' => '500 Peserta (ASN, Ormas, Tokoh Adat, dan Pelajar)',
                'rincian' => 'Upacara bendera peringatan Hari Lahir Pancasila dilanjutkan pawai kebhinekaan pakaian adat nusantara untuk memperkokoh persatuan dan kesatuan bangsa di Bumi Tuntung Pandang.',
                'foto' => 'images/wasbang/pancasila.jpg',
                'video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'berkas_laporan' => 'docs/wasbang/laporan-hari-lahir-pancasila-2026.pdf',
                'status' => 'terarsip',
            ],
            [
                'nama_kegiatan' => 'Sosialisasi Lapangan Pendidikan Karakter Bangsa & Etika Bermedia Sosial',
                'kategori' => 'Karakter Bangsa',
                'hari' => 'Kamis',
                'tanggal' => 23,
                'bulan' => 'Juli',
                'tahun' => 2026,
                'tanggal_lengkap' => 'Kamis, 23 Juli 2026',
                'tempat_lokasi' => 'Panggung Terbuka SMKN 1 Pelaihari, Kabupaten Tanah Laut',
                'peserta' => '320 Siswa-Siswi Tingkat Menengah Kejuruan',
                'rincian' => 'Sosialisasi interaktif lapangan pencegahan paham intoleransi, hoaks di media sosial, dan penanaman etika budaya luhur bangsa bagi generasi Z.',
                'foto' => 'images/wasbang/karakter-bangsa.jpg',
                'video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'berkas_laporan' => 'docs/wasbang/laporan-pendidikan-karakter-2026.pdf',
                'status' => 'terarsip',
            ],
            [
                'nama_kegiatan' => 'Dialog Kebangsaan Terbuka Forum Pembauran Kebangsaan (FPK) Lintas Etnis',
                'kategori' => 'Pembauran Kebangsaan',
                'hari' => 'Selasa',
                'tanggal' => 11,
                'bulan' => 'Agustus',
                'tahun' => 2026,
                'tanggal_lengkap' => 'Selasa, 11 Agustus 2026',
                'tempat_lokasi' => 'Balai Pertemuan Terbuka Desa Bentok Darat, Kecamatan Bati-Bati',
                'peserta' => '85 Tokoh Adat, Tokoh Agama, dan Paguyuban Etnis',
                'rincian' => 'Forum dialog terbuka lintas etnis (Banjar, Jawa, Dayak, Bugis, Sunda, Madura) di wilayah Kabupaten Tanah Laut guna merawat harmoni, toleransi, dan kerukunan warga pasca Pemilu.',
                'foto' => 'images/wasbang/pembauran-kebangsaan.jpg',
                'video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'berkas_laporan' => 'docs/wasbang/laporan-fpk-lintas-etnis-2026.pdf',
                'status' => 'terarsip',
            ],
        ];

        foreach ($kegiatans as $keg) {
            KegiatanWasbang::updateOrCreate(
                ['nama_kegiatan' => $keg['nama_kegiatan']],
                $keg
            );
        }
    }
}
