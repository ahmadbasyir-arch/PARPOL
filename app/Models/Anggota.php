<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'email',
        'no_telepon',
        'provinsi',
        'kota_kabupaten',
        'motivasi',
        'status',
    ];
}
