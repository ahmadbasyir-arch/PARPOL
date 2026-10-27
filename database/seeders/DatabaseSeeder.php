<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Aspirasi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ParpolSeeder::class);
        $this->call(PendidikanPolitikSeeder::class);
        $this->call(WasbangKegiatanSeeder::class);
        User::firstOrCreate(
            ['email' => 'admin@parpol.or.id'],
            [
                'name' => 'Administrator DPP PARPOL',
                'password' => bcrypt('password123'),
            ]
        );

        // Sample kader awal
        Anggota::firstOrCreate(
            ['nik' => '3201123456780001'],
            [
                'nama_lengkap' => 'Raden Muhammad Ilham',
                'email' => 'ilham@example.com',
                'no_telepon' => '081298765432',
                'provinsi' => 'Jawa Barat',
                'kota_kabupaten' => 'Kota Bogor',
                'motivasi' => 'Mewujudkan tata kelola pedesaan mandiri pangan dan melek teknologi.',
                'status' => 'terverifikasi',
            ]
        );

        Anggota::firstOrCreate(
            ['nik' => '3171123456780002'],
            [
                'nama_lengkap' => 'Anisa Rahmawati, S.E.',
                'email' => 'anisa.rahma@example.com',
                'no_telepon' => '081387654321',
                'provinsi' => 'DKI Jakarta',
                'kota_kabupaten' => 'Jakarta Selatan',
                'motivasi' => 'Mendorong akses pembiayaan mikro bagi pedagang pasar tradisional.',
                'status' => 'terverifikasi',
            ]
        );

        // Sample aspirasi publik
        Aspirasi::firstOrCreate(
            ['subjek' => 'Perbaikan Irigasi Sawah di Karawang'],
            [
                'nama' => 'Pak Joko Susilo',
                'email' => 'joko.petani@example.com',
                'kategori' => 'Pertanian & Pangan',
                'pesan' => 'Mohon bantuan Fraksi PARPOL untuk menyampaikan ke Dinas PUPR terkait normalisasi saluran irigasi sawah tersier di wilayah Karawang Timur yang mendangkal.',
                'status' => 'diproses',
            ]
        );

        Aspirasi::firstOrCreate(
            ['subjek' => 'Beasiswa Kuliah Mahasiswa Berprestasi Kurang Mampu'],
            [
                'nama' => 'Fitri Handayani',
                'email' => 'fitri.h@example.com',
                'kategori' => 'Pendidikan',
                'pesan' => 'Apakah PARPOL memiliki program beasiswa advokasi jalur aspirasi DPR RI untuk mahasiswa aktif dari keluarga buruh tani?',
                'status' => 'diterima',
            ]
        );

        Aspirasi::firstOrCreate(
            ['subjek' => 'Pelatihan Legalitas Usaha & NIB Gratis'],
            [
                'nama' => 'Bambang Tri',
                'email' => 'bambang.umkm@example.com',
                'kategori' => 'Ekonomi & UMKM',
                'pesan' => 'Sangat mengapresiasi program pendampingan izin edar BPOM dan NIB gratis dari DPD PARPOL. Semoga bisa rutin diadakan setiap bulan.',
                'status' => 'selesai',
            ]
        );
    }
}
