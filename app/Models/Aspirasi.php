<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'kategori',
        'subjek',
        'pesan',
        'status',
    ];
}
