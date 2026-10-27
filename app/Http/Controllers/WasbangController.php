<?php

namespace App\Http\Controllers;

use App\Models\WasbangKegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WasbangController extends Controller
{
    /**
     * Tampilkan Portal Pengarsipan Dokumentasi Kegiatan Luar Bidang Wasbang
     */
    public function index(Request $request)
    {
        // Auto-seed jika database wasbang masih kosong
        if (WasbangKegiatan::count() === 0) {
            Artisan::call('db:seed', ['--class' => 'WasbangKegiatanSeeder', '--force' => true]);
        }

        $query = WasbangKegiatan::query();

        // Filter Pencarian
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_kegiatan', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('rincian', 'like', "%{$search}%")
                  ->orWhere('pelaksana', 'like', "%{$search}%")
                  ->orWhere('sasaran_peserta', 'like', "%{$search}%");
            });
        }

        // Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter Bulan Pelaksanaan
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        // Filter Tahun Pelaksanaan
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        // Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Urutan terbaru
        $kegiatans = $query->orderBy('tanggal', 'desc')->get();

        // Statistik Pengarsipan
        $totalKegiatan = WasbangKegiatan::count();
        $totalFoto = WasbangKegiatan::whereNotNull('foto')->count();
        $totalVideo = WasbangKegiatan::where(function ($q) {
            $q->whereNotNull('video')->orWhereNotNull('video_url');
        })->count();
        $totalSelesai = WasbangKegiatan::where('status', 'Selesai Dilaksanakan')->count();
        $totalBerlangsung = WasbangKegiatan::where('status', 'Sedang Dilaksanakan')->count();

        // Kategori List
        $kategoriList = [
            'Wawasan Kebangsaan',
            'Bina Ideologi Pancasila',
            'Karakter Bangsa & Moralitas',
            'Bela Negara & Ketahanan Bangsa',
            'Paskibraka & Kepemimpinan Pemuda',
            'Pembauran Kebangsaan & Kerukunan',
        ];

        return view('wasbang.index', compact(
            'kegiatans',
            'totalKegiatan',
            'totalFoto',
            'totalVideo',
            'totalSelesai',
            'totalBerlangsung',
            'kategoriList'
        ));
    }

    /**
     * Simpan dokumentasi kegiatan luar baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'waktu' => 'nullable|string|max:50',
            'lokasi' => 'required|string|max:255',
            'sasaran_peserta' => 'nullable|string|max:255',
            'pelaksana' => 'nullable|string|max:255',
            'rincian' => 'required|string|max:10000',
            'status' => 'required|string|max:50',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg|max:12288',
            'video' => 'nullable|file|mimes:mp4,mov,avi,webm,mkv|max:51200',
            'video_url' => 'nullable|url|max:255',
            'dokumen_laporan' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:20480',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'kategori.required' => 'Kategori kegiatan wajib dipilih.',
            'tanggal.required' => 'Tanggal pelaksanaan kegiatan wajib diisi.',
            'lokasi.required' => 'Lokasi kegiatan luar wajib diisi.',
            'rincian.required' => 'Rincian / laporan hasil kegiatan wajib diisi.',
            'foto.mimes' => 'Format foto harus berupa JPG, PNG, WEBP, atau SVG.',
            'video.mimes' => 'Format video harus berupa MP4, WEBM, atau MOV.',
            'dokumen_laporan.mimes' => 'Format dokumen harus berupa PDF atau DOCX.',
        ]);

        // Auto hitung nama hari
        $validated['hari'] = WasbangKegiatan::getHariIndonesia($validated['tanggal']);

        if (empty($validated['pelaksana'])) {
            $validated['pelaksana'] = 'Bidang Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa';
        }

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoName = 'foto_' . time() . '_' . Str::slug(substr($validated['nama_kegiatan'], 0, 30)) . '.' . $fotoFile->getClientOriginalExtension();
            $destPath = public_path('uploads/wasbang/foto');
            if (!File::exists($destPath)) {
                File::makeDirectory($destPath, 0755, true);
            }
            $fotoFile->move($destPath, $fotoName);
            $validated['foto'] = 'uploads/wasbang/foto/' . $fotoName;
        }

        // Handle upload video
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = 'video_' . time() . '_' . Str::slug(substr($validated['nama_kegiatan'], 0, 30)) . '.' . $videoFile->getClientOriginalExtension();
            $destPath = public_path('uploads/wasbang/video');
            if (!File::exists($destPath)) {
                File::makeDirectory($destPath, 0755, true);
            }
            $videoFile->move($destPath, $videoName);
            $validated['video'] = 'uploads/wasbang/video/' . $videoName;
        }

        // Handle upload dokumen laporan
        if ($request->hasFile('dokumen_laporan')) {
            $dokFile = $request->file('dokumen_laporan');
            $dokName = 'laporan_' . time() . '_' . Str::slug(substr($validated['nama_kegiatan'], 0, 30)) . '.' . $dokFile->getClientOriginalExtension();
            $destPath = public_path('uploads/wasbang/laporan');
            if (!File::exists($destPath)) {
                File::makeDirectory($destPath, 0755, true);
            }
            $dokFile->move($destPath, $dokName);
            $validated['dokumen_laporan'] = 'uploads/wasbang/laporan/' . $dokName;
        }

        WasbangKegiatan::create($validated);

        return redirect()->route('wasbang.index', ['#arsip-kegiatan'])
            ->with('wasbang_success', 'Dokumentasi laporan kegiatan luar "' . $validated['nama_kegiatan'] . '" berhasil diarsipkan.');
    }

    /**
     * Unduh file media (foto / video / laporan) secara langsung
     */
    public function downloadMedia($id, $type)
    {
        $kegiatan = WasbangKegiatan::findOrFail($id);
        $slug = Str::slug($kegiatan->nama_kegiatan);

        if ($type === 'foto' && $kegiatan->foto) {
            $filePath = public_path($kegiatan->foto);
            if (File::exists($filePath)) {
                $ext = pathinfo($filePath, PATHINFO_EXTENSION);
                return response()->download($filePath, "Dokumentasi_Foto_{$slug}.{$ext}");
            }
        } elseif ($type === 'video' && $kegiatan->video) {
            $filePath = public_path($kegiatan->video);
            if (File::exists($filePath)) {
                $ext = pathinfo($filePath, PATHINFO_EXTENSION);
                return response()->download($filePath, "Dokumentasi_Video_{$slug}.{$ext}");
            }
        } elseif ($type === 'dokumen' && $kegiatan->dokumen_laporan) {
            $filePath = public_path($kegiatan->dokumen_laporan);
            if (File::exists($filePath)) {
                $ext = pathinfo($filePath, PATHINFO_EXTENSION);
                return response()->download($filePath, "Laporan_Kegiatan_{$slug}.{$ext}");
            }
        }

        return redirect()->back()->with('wasbang_error', 'Berkas media yang diminta tidak tersedia di penyimpanan server.');
    }

    /**
     * Cetak rekapitulasi semua arsip laporan kegiatan bidang wasbang
     */
    public function cetak(Request $request)
    {
        $query = WasbangKegiatan::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $kegiatans = $query->orderBy('tanggal', 'desc')->get();

        return view('wasbang.cetak', compact('kegiatans'));
    }

    /**
     * Cetak lembar laporan dokumentasi tunggal (Berita Acara Kegiatan Luar)
     */
    public function cetakDetail($id)
    {
        $kegiatan = WasbangKegiatan::findOrFail($id);
        return view('wasbang.cetak-detail', compact('kegiatan'));
    }

    /**
     * Hapus arsip kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = WasbangKegiatan::findOrFail($id);

        // Hapus file dari disk jika ada
        if ($kegiatan->foto && str_starts_with($kegiatan->foto, 'uploads/')) {
            File::delete(public_path($kegiatan->foto));
        }
        if ($kegiatan->video && str_starts_with($kegiatan->video, 'uploads/')) {
            File::delete(public_path($kegiatan->video));
        }
        if ($kegiatan->dokumen_laporan && str_starts_with($kegiatan->dokumen_laporan, 'uploads/')) {
            File::delete(public_path($kegiatan->dokumen_laporan));
        }

        $nama = $kegiatan->nama_kegiatan;
        $kegiatan->delete();

        return redirect()->route('wasbang.index', ['#arsip-kegiatan'])
            ->with('wasbang_success', 'Dokumentasi kegiatan "' . $nama . '" berhasil dihapus dari arsip.');
    }
}
