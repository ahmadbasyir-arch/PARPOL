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
}
