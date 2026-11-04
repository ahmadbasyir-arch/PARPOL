<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendidikanPolitik extends Model
{
    protected $fillable = [
        'parpol_id',
        'nama_kegiatan',
        'tanggal_pelaksanaan',
        'tempat_pelaksanaan',
        'peserta_jumlah',
        'peserta_kader',
        'peserta_masyarakat',
        'jumlah_biaya',
        'dokumentasi',
        'keterangan',
    ];

    protected $casts = [
        'peserta_kader' => 'boolean',
        'jumlah_biaya' => 'integer',
    ];

    public function parpol(): BelongsTo
    {
        return $this->belongsTo(Parpol::class);
    }

    /**
     * Konversi string tanggal (teks Indonesia / format apa saja) ke format YYYY-MM-DD untuk input date HTML5
     */
    public static function toYmd(?string $str): string
    {
        if (empty($str)) {
            return date('Y-m-d');
        }

        $str = trim($str);

        // Jika sudah YYYY-MM-DD
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $str)) {
            return $str;
        }

        $months = [
            'januari' => '01', 'februari' => '02', 'maret' => '03', 'april' => '04',
            'mei' => '05', 'juni' => '06', 'juli' => '07', 'agustus' => '08',
            'september' => '09', 'oktober' => '10', 'november' => '11', 'desember' => '12',
            'jan' => '01', 'feb' => '02', 'mar' => '03', 'apr' => '04',
            'jun' => '06', 'jul' => '07', 'aug' => '08', 'agt' => '08',
            'sep' => '09', 'okt' => '10', 'nov' => '11', 'des' => '12'
        ];

        // Format rentang: "09 s.d. 11 Januari 2026"
        if (preg_match('/(\d{1,2})\s+s\.?d\.?\s+(\d{1,2})\s+([a-zA-Z]+)\s+(\d{4})/i', $str, $m)) {
            $day = str_pad($m[1], 2, '0', STR_PAD_LEFT);
            $monName = strtolower($m[3]);
            $mon = $months[$monName] ?? '01';
            $year = $m[4];
            return "{$year}-{$mon}-{$day}";
        }

        // Format tanggal tunggal: "15 november 2026" atau "15-11-2026" atau "15/11/2026"
        if (preg_match('/(\d{1,2})\s+([a-zA-Z]+)\s+(\d{4})/i', $str, $m)) {
            $day = str_pad($m[1], 2, '0', STR_PAD_LEFT);
            $monName = strtolower($m[2]);
            $mon = $months[$monName] ?? '01';
            $year = $m[3];
            return "{$year}-{$mon}-{$day}";
        }

        if (preg_match('/^(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})$/', $str, $m)) {
            $day = str_pad($m[1], 2, '0', STR_PAD_LEFT);
            $mon = str_pad($m[2], 2, '0', STR_PAD_LEFT);
            $year = $m[3];
            return "{$year}-{$mon}-{$day}";
        }

        try {
            return \Carbon\Carbon::parse($str)->format('Y-m-d');
        } catch (\Throwable $e) {
            return date('Y-m-d');
        }
    }

    /**
     * Konversi format tanggal ke format teks Indonesia (contoh: 15 November 2026)
     */
    public static function formatIndonesia(?string $str): string
    {
        if (empty($str)) {
            return '';
        }

        $str = trim($str);

        // Jika berbentuk rentang teks non-standar yang mengandung s.d., pertahankan aslinya
        if (str_contains(strtolower($str), 's.d.') || str_contains(strtolower($str), 'sd')) {
            return $str;
        }

        // Jika berformat YYYY-MM-DD
        if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $str, $m)) {
            $bulanIndo = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];
            $hari = (int) $m[3];
            $bulan = (int) $m[2];
            $tahun = $m[1];
            $namaBulan = $bulanIndo[$bulan] ?? '';
            return "{$hari} {$namaBulan} {$tahun}";
        }

        return $str;
    }

    /**
     * Accessor untuk nilai input date pada form modal edit (YYYY-MM-DD)
     */
    public function getTanggalPelaksanaanInputAttribute(): string
    {
        return static::toYmd($this->tanggal_pelaksanaan);
    }
}
