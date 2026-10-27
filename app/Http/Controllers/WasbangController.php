<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWasbang;
use Illuminate\Http\Request;

class WasbangController extends Controller
{
    /**
     * Tampilan Halaman Pengarsipan Dokumentasi Kegiatan Luar Bidang WASBANG
     */
    public function index(Request $request)
    {
        $query = KegiatanWasbang::query();

        // Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter Bulan
        if ($request->filled('bulan')) {
            $query->where('bulan', $request->bulan);
        }

        // Pencarian Kata Kunci
        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_kegiatan', 'like', "%{$keyword}%")
                  ->orWhere('tempat_lokasi', 'like', "%{$keyword}%")
                  ->orWhere('rincian', 'like', "%{$keyword}%");
            });
        }

        $kegiatans = $query->orderBy('tanggal', 'asc')->get();

        // Data filter
        $kategoriList = KegiatanWasbang::select('kategori')->distinct()->pluck('kategori');
        $bulanList = KegiatanWasbang::select('bulan')->distinct()->pluck('bulan');

        // Statistik
        $totalKegiatan = KegiatanWasbang::count();
        $totalPaskibraka = KegiatanWasbang::where('kategori', 'Paskibraka')->count();
        $totalBelaNegara = KegiatanWasbang::where('kategori', 'Bela Negara')->count();
        $totalIdeologi = KegiatanWasbang::whereIn('kategori', ['Bina Ideologi', 'Karakter Bangsa', 'Pembauran Kebangsaan'])->count();

        return view('wasbang.index', compact(
            'kegiatans',
            'kategoriList',
            'bulanList',
            'totalKegiatan',
            'totalPaskibraka',
            'totalBelaNegara',
            'totalIdeologi'
        ));
    }

    /**
     * Simpan pengarsipan dokumentasi kegiatan luar baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kategori' => 'required|string',
            'hari' => 'required|string',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
            'tempat_lokasi' => 'required|string|max:255',
            'peserta' => 'nullable|string|max:255',
            'rincian' => 'required|string',
            'foto' => 'nullable|image|max:5120',
            'video' => 'nullable|string|max:500',
        ]);

        $validated['tanggal_lengkap'] = "{$validated['hari']}, " . sprintf('%02d', $validated['tanggal']) . " {$validated['bulan']} {$validated['tahun']}";

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images/wasbang', 'public');
            $validated['foto'] = 'storage/' . $path;
        } else {
            $validated['foto'] = 'images/wasbang/pancasila.jpg';
        }

        KegiatanWasbang::create($validated);

        return redirect()->route('wasbang.index')
            ->with('success', 'Dokumentasi kegiatan luar lapangan Bidang WASBANG berhasil diarsipkan ke dalam sistem!');
    }

    /**
     * Tampilan Cetak / Unduh Dokumen Rekapitulasi Laporan Kegiatan Luar WASBANG
     */
    public function cetak(Request $request)
    {
        $kegiatans = KegiatanWasbang::orderBy('tanggal', 'asc')->get();
        return view('wasbang.cetak', compact('kegiatans'));
    }
}
