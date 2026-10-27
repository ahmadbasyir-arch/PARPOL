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
        // 1. Akun Superadmin Bakesbangpol Kab. Tanah Laut
        User::updateOrCreate(
            ['email' => 'admin@parpol.or.id'],
            [
                'name' => 'Administrator DPP PARPOL',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'parpol_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@tanahlautkab.go.id'],
            [
                'name' => 'Administrator Bakesbangpol Kab. Tanah Laut',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'parpol_id' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'bakesbangpol@tanahlautkab.go.id'],
            [
                'name' => 'Bakesbangpol Kab. Tanah Laut (Bidang Poldagri)',
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
