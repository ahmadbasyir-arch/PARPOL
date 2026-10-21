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
}
