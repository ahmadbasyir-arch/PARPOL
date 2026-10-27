<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanWasbang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'kategori',
        'hari',
        'tanggal',
        'bulan',
        'tahun',
        'tanggal_lengkap',
        'tempat_lokasi',
        'peserta',
        'rincian',
        'foto',
        'video',
        'berkas_laporan',
        'status',
    ];
}
