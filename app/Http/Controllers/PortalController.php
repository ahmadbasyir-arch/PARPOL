<?php

namespace App\Http\Controllers;

use App\Models\Parpol;
use App\Models\PendidikanPolitik;
use App\Models\WasbangKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PortalController extends Controller
{
    /**
     * Tampilan Portal Utama Pelayanan Terpadu Bakesbangpol Kab. Tanah Laut
     */
    public function index()
    {
        // Auto-seed jika parpol atau wasbang masih kosong
        if (Parpol::count() === 0) {
            Artisan::call('db:seed', ['--class' => 'ParpolSeeder', '--force' => true]);
        }
        if (WasbangKegiatan::count() === 0) {
            Artisan::call('db:seed', ['--class' => 'WasbangKegiatanSeeder', '--force' => true]);
        }

        $totalParpol = Parpol::count();
        $totalDikpol = PendidikanPolitik::count();
        $totalWasbang = WasbangKegiatan::count();

        return view('portal.index', compact('totalParpol', 'totalDikpol', 'totalWasbang'));
    }
}
