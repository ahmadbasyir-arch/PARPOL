<?php

namespace Database\Seeders;

use App\Models\Parpol;
use App\Models\PendidikanPolitik;
use Illuminate\Database\Seeder;

class PendidikanPolitikSeeder extends Seeder
{
    public function run(): void
    {
        $pks = Parpol::where('nomor_urut', 7)->first();
        if (!$pks) {
            return;
        }

        $kegiatans = [
            [
                'parpol_id' => $pks->id,
                'nama_kegiatan' => 'Menghadiri rakornas bendahara di yogyakarta',
                'tanggal_pelaksanaan' => '09 s.d. 11 Januari 2026',
                'tempat_pelaksanaan' => 'Hotel Grand Mercure, Yogyakarta',
                'peserta_jumlah' => 1,
                'peserta_kader' => true,
                'peserta_masyarakat' => 0,
                'jumlah_biaya' => 4141000,
                'dokumentasi' => 'images/kegiatan/pks/kegiatan-1.jpg',
                'keterangan' => 'Rapat Koordinasi Nasional Bendahara PKS se-Indonesia',
            ],
            [
                'parpol_id' => $pks->id,
                'nama_kegiatan' => 'Sarasehan',
                'tanggal_pelaksanaan' => '28 Februari 2026',
                'tempat_pelaksanaan' => 'Kantor DPD PKS Kab. Tanah Laut',
                'peserta_jumlah' => 70,
                'peserta_kader' => true,
                'peserta_masyarakat' => 0,
                'jumlah_biaya' => 5608000,
                'dokumentasi' => 'images/kegiatan/pks/kegiatan-2.jpg',
                'keterangan' => 'Sarasehan kader politik DPD PKS Kabupaten Tanah Laut',
            ],
            [
                'parpol_id' => $pks->id,
                'nama_kegiatan' => 'Pelatihan pemantapan spritual (pps) bidang kaderisasi DPD PKS',
                'tanggal_pelaksanaan' => '01 Juni 2026',
                'tempat_pelaksanaan' => 'Aula Serbaguna DPD PKS Kab. Tanah Laut',
                'peserta_jumlah' => 14,
                'peserta_kader' => true,
                'peserta_masyarakat' => 0,
                'jumlah_biaya' => 2000000,
                'dokumentasi' => 'images/kegiatan/pks/kegiatan-3.jpg',
                'keterangan' => 'Pembekalan nilai integritas dan spiritual kaderisasi partai',
            ],
            [
                'parpol_id' => $pks->id,
                'nama_kegiatan' => 'Monev struktur DPC - Ranting',
                'tanggal_pelaksanaan' => '17 Juni 2026',
                'tempat_pelaksanaan' => 'Wilayah DPC & Ranting se-Kabupaten Tanah Laut',
                'peserta_jumlah' => 28,
                'peserta_kader' => true,
                'peserta_masyarakat' => 0,
                'jumlah_biaya' => 5868000,
                'dokumentasi' => 'images/kegiatan/pks/kegiatan-4.jpg',
                'keterangan' => 'Monitoring dan evaluasi kesiapan struktur kepengurusan DPC dan Ranting',
            ],
            [
                'parpol_id' => $pks->id,
                'nama_kegiatan' => 'Sarasehan DPD, DPC Panyipatan dan Ranting, DPC takisung dan Ranting',
                'tanggal_pelaksanaan' => '21 Juni 2026',
                'tempat_pelaksanaan' => 'Aula Pertemuan Kec. Panyipatan & Takisung',
                'peserta_jumlah' => 40,
                'peserta_kader' => true,
                'peserta_masyarakat' => 0,
                'jumlah_biaya' => 7810000,
                'dokumentasi' => 'images/kegiatan/pks/kegiatan-5.jpg',
                'keterangan' => 'Sarasehan pendidikan politik wilayah pesisir (Panyipatan & Takisung)',
            ],
            [
                'parpol_id' => $pks->id,
                'nama_kegiatan' => 'Konsolidasi DPD, DPC Pelaihari dan Ranting, DPC Bajuin dan Ranting',
                'tanggal_pelaksanaan' => '29 Juni 2026',
                'tempat_pelaksanaan' => 'Gedung Pertemuan Pemuda Pelaihari',
                'peserta_jumlah' => 47,
                'peserta_kader' => true,
                'peserta_masyarakat' => 0,
                'jumlah_biaya' => 9167100,
                'dokumentasi' => 'images/kegiatan/pks/kegiatan-6.jpg',
                'keterangan' => 'Konsolidasi penguatan kader partai wilayah Pelaihari dan Bajuin',
            ],
        ];

        foreach ($kegiatans as $k) {
            PendidikanPolitik::updateOrCreate(
                [
                    'parpol_id' => $k['parpol_id'],
                    'nama_kegiatan' => $k['nama_kegiatan'],
                ],
                $k
            );
        }
    }
}
