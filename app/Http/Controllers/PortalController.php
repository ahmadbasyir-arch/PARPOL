<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWasbang;
use App\Models\Parpol;
use App\Models\PendidikanPolitik;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Tampilan Portal Utama Pelayanan Terpadu Bakesbangpol Kab. Tanah Laut
     */
    public function index()
    {
        $totalParpol = Parpol::count();
        $totalDikpol = PendidikanPolitik::count();
        $totalWasbang = KegiatanWasbang::count();

        return view('portal.index', compact('totalParpol', 'totalDikpol', 'totalWasbang'));
    }
}
