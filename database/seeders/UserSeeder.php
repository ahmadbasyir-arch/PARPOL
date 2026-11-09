<?php

namespace Database\Seeders;

use App\Models\Parpol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Kepala Badan Kesatuan Bangsa dan Politik Kab. Tanah Laut
        User::updateOrCreate(
            ['email' => 'kaban@tanahlautkab.go.id'],
            [
                'name' => 'H. Bambang Kusdariman, S.I.P., M.Si.',
                'nip' => '19680818 199010 1 003',
                'jabatan' => 'Kepala Badan Kesatuan Bangsa dan Politik Kabupaten Tanah Laut',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'parpol_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@tanahlautkab.go.id'],
            [
                'name' => 'H. Bambang Kusdariman, S.I.P., M.Si.',
                'nip' => '19680818 199010 1 003',
                'jabatan' => 'Kepala Badan Kesatuan Bangsa dan Politik Kabupaten Tanah Laut',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'parpol_id' => null,
            ]
        );

        // 2. Akun Kepala Bidang Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa
        User::updateOrCreate(
            ['email' => 'kabid.wasbang@tanahlautkab.go.id'],
            [
                'name' => 'Auranti Muraya Purihaningrum, S.STP.',
                'nip' => '198605022004122001',
                'jabatan' => 'Kepala Bidang Bina Ideologi, Wawasan Kebangsaan dan Karakter Bangsa',
                'password' => Hash::make('password123'),
                'role' => 'kabid_wasbang',
                'parpol_id' => null,
            ]
        );

        // 3. Akun Staf Pelaksana Bidang Wasbang (Operator Pengarsipan Dokumentasi Kegiatan)
        User::updateOrCreate(
            ['email' => 'wasbang@tanahlautkab.go.id'],
            [
                'name' => 'Staf Pelaksana Bidang Wasbang',
                'nip' => '19951015 202203 1 002',
                'jabatan' => 'Staf Pelaksana Pengarsipan Dokumentasi Lapangan',
                'password' => Hash::make('password123'),
                'role' => 'staf_wasbang',
                'parpol_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'staf.wasbang@tanahlautkab.go.id'],
            [
                'name' => 'Staf Pelaksana Bidang Wasbang',
                'nip' => '19951015 202203 1 002',
                'jabatan' => 'Staf Pelaksana Pengarsipan Dokumentasi Lapangan',
                'password' => Hash::make('password123'),
                'role' => 'staf_wasbang',
                'parpol_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'bakesbangpol@tanahlautkab.go.id'],
            [
                'name' => 'Bakesbangpol Kab. Tanah Laut (Bidang Poldagri)',
                'nip' => '19750412 199803 1 005',
                'jabatan' => 'Admin Poldagri & Banpol',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'parpol_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@parpol.or.id'],
            [
                'name' => 'Administrator DPP PARPOL',
                'nip' => null,
                'jabatan' => 'Administrator Sistem',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'parpol_id' => null,
            ]
        );

        // 2. Daftar Pemetaan Akun Resmi 20 Partai Politik di Kab. Tanah Laut
        $parpolSlugs = [
            1 => ['slug' => 'pkb', 'nama' => 'DPC PKB Kab. Tanah Laut'],
            2 => ['slug' => 'gerindra', 'nama' => 'DPC Partai Gerindra Kab. Tanah Laut'],
            3 => ['slug' => 'pdiperjuangan', 'nama' => 'DPC PDI Perjuangan Kab. Tanah Laut'],
            4 => ['slug' => 'golkar', 'nama' => 'DPD Partai Golkar Kab. Tanah Laut'],
            5 => ['slug' => 'nasdem', 'nama' => 'DPD Partai NasDem Kab. Tanah Laut'],
            6 => ['slug' => 'gelora', 'nama' => 'DPD Partai Gelora Kab. Tanah Laut'],
            7 => ['slug' => 'pks', 'nama' => 'DPD PKS Kab. Tanah Laut'],
            8 => ['slug' => 'hanura', 'nama' => 'DPC Partai Hanura Kab. Tanah Laut'],
            9 => ['slug' => 'pan', 'nama' => 'DPD PAN Kab. Tanah Laut'],
            10 => ['slug' => 'pbb', 'nama' => 'DPC PBB Kab. Tanah Laut'],
            11 => ['slug' => 'demokrat', 'nama' => 'DPC Partai Demokrat Kab. Tanah Laut'],
            12 => ['slug' => 'psi', 'nama' => 'DPD PSI Kab. Tanah Laut'],
            13 => ['slug' => 'perindo', 'nama' => 'DPD Partai Perindo Kab. Tanah Laut'],
            14 => ['slug' => 'ppp', 'nama' => 'DPC PPP Kab. Tanah Laut'],
            15 => ['slug' => 'gerakanrakyat', 'nama' => 'DPC Partai Gerakan Rakyat Kab. Tanah Laut'],
            16 => ['slug' => 'gemabangsa', 'nama' => 'DPC Partai Gema Bangsa Kab. Tanah Laut'],
            17 => ['slug' => 'garuda', 'nama' => 'DPC Partai Garuda Kab. Tanah Laut'],
            18 => ['slug' => 'pkn', 'nama' => 'Pimcab PKN Kab. Tanah Laut'],
            19 => ['slug' => 'ummat', 'nama' => 'DPD Partai Ummat Kab. Tanah Laut'],
            20 => ['slug' => 'buruh', 'nama' => 'Exco Partai Buruh Kab. Tanah Laut'],
        ];

        foreach ($parpolSlugs as $nomorUrut => $info) {
            $parpol = Parpol::where('nomor_urut', $nomorUrut)->first();
            if ($parpol) {
                User::updateOrCreate(
                    ['email' => $info['slug'] . '@tanahlautkab.go.id'],
                    [
                        'name' => $info['nama'],
                        'password' => Hash::make('password123'),
                        'role' => 'parpol',
                        'parpol_id' => $parpol->id,
                    ]
                );
            }
        }
    }
}
