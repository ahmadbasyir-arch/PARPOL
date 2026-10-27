<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasbangKegiatan extends Model
{
    use HasFactory;

    protected $table = 'wasbang_kegiatans';

    protected $fillable = [
        'nama_kegiatan',
        'kategori',
        'tanggal',
        'hari',
        'waktu',
        'lokasi',
        'sasaran_peserta',
        'pelaksana',
        'rincian',
        'status',
        'foto',
        'foto_tambahan',
        'video',
        'video_url',
        'dokumen_laporan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'foto_tambahan' => 'array',
    ];

    /**
     * Nama hari dalam bahasa Indonesia
     */
    public static function getHariIndonesia($date)
    {
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        $dayEnglish = Carbon::parse($date)->format('l');
        return $days[$dayEnglish] ?? $dayEnglish;
    }

    /**
     * Nama bulan dalam bahasa Indonesia
     */
    public static function getBulanIndonesia($monthNum)
    {
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $months[(int)$monthNum] ?? '';
    }

    /**
     * Format Hari, Tanggal Bulan Tahun (e.g. Senin, 26 Oktober 2026)
     */
    public function getHariTanggalFormattedAttribute()
    {
        if (!$this->tanggal) {
            return '-';
        }

        $carbon = Carbon::parse($this->tanggal);
        $hari = $this->hari ?: self::getHariIndonesia($carbon);
        $tgl = $carbon->format('d');
        $bln = self::getBulanIndonesia($carbon->format('n'));
        $thn = $carbon->format('Y');

        return "{$hari}, {$tgl} {$bln} {$thn}";
    }

    /**
     * Format Tanggal Bulan Tahun (e.g. 26 Oktober 2026)
     */
    public function getTanggalFormattedAttribute()
    {
        if (!$this->tanggal) {
            return '-';
        }

        $carbon = Carbon::parse($this->tanggal);
        $tgl = $carbon->format('d');
        $bln = self::getBulanIndonesia($carbon->format('n'));
        $thn = $carbon->format('Y');

        return "{$tgl} {$bln} {$thn}";
    }

    /**
     * URL Foto Utama
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            if (str_starts_with($this->foto, 'http://') || str_starts_with($this->foto, 'https://')) {
                return $this->foto;
            }
            return asset($this->foto);
        }
        return null;
    }

    /**
     * URL Video
     */
    public function getVideoUrlDisplayAttribute()
    {
        if ($this->video) {
            if (str_starts_with($this->video, 'http://') || str_starts_with($this->video, 'https://')) {
                return $this->video;
            }
            return asset($this->video);
        }
        return $this->video_url ?: null;
    }

    /**
     * URL Dokumen Laporan
     */
    public function getDokumenUrlAttribute()
    {
        if ($this->dokumen_laporan) {
            if (str_starts_with($this->dokumen_laporan, 'http://') || str_starts_with($this->dokumen_laporan, 'https://')) {
                return $this->dokumen_laporan;
            }
            return asset($this->dokumen_laporan);
        }
        return null;
    }
}
