<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nip',
        'jabatan',
        'email',
        'password',
        'role',
        'parpol_id',
    ];

    /**
     * Relasi ke Partai Politik jika role = 'parpol'
     */
    public function parpol()
    {
        return $this->belongsTo(Parpol::class);
    }

    /**
     * Cek apakah user adalah Kepala Badan / Superadmin Bakesbangpol
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'kaban', 'superadmin']);
    }

    /**
     * Cek apakah user adalah Kepala Badan Kesbangpol
     */
    public function isKaban(): bool
    {
        return $this->role === 'kaban' 
            || str_contains(strtolower($this->jabatan ?? ''), 'kepala badan') 
            || str_contains(strtolower($this->email ?? ''), 'kaban');
    }

    /**
     * Cek apakah user adalah Kepala Bidang Wasbang
     */
    public function isKabidWasbang(): bool
    {
        return $this->role === 'kabid_wasbang';
    }

    /**
     * Cek apakah user adalah Staf Pelaksana Bidang Wasbang
     */
    public function isStafWasbang(): bool
    {
        return $this->role === 'staf_wasbang';
    }

    /**
     * Cek apakah user adalah Tim Internal Wasbang (Kabid atau Staf)
     */
    public function isWasbang(): bool
    {
        return in_array($this->role, ['staf_wasbang', 'kabid_wasbang', 'admin', 'kaban']);
    }

    /**
     * Cek apakah user adalah Operator/Pengurus Partai Politik
     */
    public function isParpol(): bool
    {
        return $this->role === 'parpol';
    }

    /**
     * Label peran pengguna untuk tampilan UI
     */
    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'kaban', 'admin' => 'Kepala Badan / Admin Bakesbangpol',
            'kabid_wasbang' => 'Kepala Bidang Wasbang',
            'staf_wasbang' => 'Staf Pelaksana Wasbang',
            'parpol' => 'Operator / Pengurus Partai',
            default => 'Pengguna Bakesbangpol',
        };
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
