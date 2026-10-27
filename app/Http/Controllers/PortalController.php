<?php

namespace App\Http\Controllers;

use App\Models\Parpol;
use App\Models\WasbangKegiatan;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Tampilkan Halaman Utama Portal (Daftar Modul)
     * Referensi gaya Smart Kampus / Smart Politala yang clean dan rapi.
     */
    public function index()
    {
        // Auto-seed jika parpol atau wasbang masih kosong
        if (Parpol::count() === 0) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'ParpolSeeder', '--force' => true]);
        }
        if (WasbangKegiatan::count() === 0) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'WasbangKegiatanSeeder', '--force' => true]);
        }

        $totalParpol = Parpol::count();
        $totalWasbang = WasbangKegiatan::count();

        return view('portal.index', compact('totalParpol', 'totalWasbang'));
    }
}
