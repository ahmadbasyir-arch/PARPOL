<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parpol extends Model
{
    protected $fillable = [
        'nomor_urut',
        'nama_partai',
        'akronim',
        'logo',
        'warna_primer',
        'no_sk',
        'tanggal_sk',
        'ketua',
        'no_hp_ketua',
        'sekretaris',
        'bendahara',
        'lo_nama',
        'lo_hp',
        'alamat',
        'kelurahan_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'sk3p3',
    ];

    /**
     * Pastikan path logo selalu mengarah ke berkas logo resmi terbaru
     * meskipun database lokal pengguna/teman belum di-reseed.
     */
    public function getLogoAttribute($value)
    {
        $latestLogos = [
            1 => 'images/parpol/pkb.svg',
            2 => 'images/parpol/gerindra.png',
            3 => 'images/parpol/pdi-perjuangan.png',
            4 => 'images/parpol/golkar.jpg',
            5 => 'images/parpol/nasdem.png',
            6 => 'images/parpol/gelora.png',
            7 => 'images/parpol/pks.jpg',
            8 => 'images/parpol/hanura.png',
            9 => 'images/parpol/pan.jpg',
            10 => 'images/parpol/pbb.jpg',
            11 => 'images/parpol/demokrat.png',
            12 => 'images/parpol/psi.png',
            13 => 'images/parpol/perindo.png',
            14 => 'images/parpol/ppp.png',
            15 => 'images/parpol/gerakan-rakyat.png',
        ];

        return $latestLogos[$this->nomor_urut] ?? $value;
    }
}
