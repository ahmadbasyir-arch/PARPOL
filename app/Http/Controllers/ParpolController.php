<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Aspirasi;
use App\Models\Parpol;
use Illuminate\Http\Request;

class ParpolController extends Controller
{
    /**
     * Tampilkan Portal Data Partai Politik Kabupaten Tanah Laut Tahun 2026
     */
    public function index(Request $request)
    {
        // Auto-seed jika database masih kosong
        if (Parpol::count() === 0) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'ParpolSeeder', '--force' => true]);
        }
        if (\App\Models\PendidikanPolitik::count() === 0) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'PendidikanPolitikSeeder', '--force' => true]);
        }

        $query = Parpol::with('pendidikanPolitik');

        // Filter berdasarkan pencarian nama partai, akronim, atau nama pengurus
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_partai', 'like', "%{$search}%")
                  ->orWhere('akronim', 'like', "%{$search}%")
                  ->orWhere('ketua', 'like', "%{$search}%")
                  ->orWhere('sekretaris', 'like', "%{$search}%")
                  ->orWhere('bendahara', 'like', "%{$search}%")
                  ->orWhere('lo_nama', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        // Filter kecamatan
        if ($request->filled('kecamatan')) {
            $query->where('kecamatan', $request->kecamatan);
        }

        $parpols = $query->orderBy('nomor_urut')->get();

        // Statistik Keseluruhan
        $totalParpol = Parpol::count();
        $totalPelaihari = Parpol::where('kecamatan', 'Pelaihari')->count();
        $totalBatuAmpar = Parpol::where('kecamatan', 'Batu Ampar')->count();
        $totalLo = Parpol::whereNotNull('lo_hp')->count();
        $totalSkAda = Parpol::where('sk3p3', 'Ada')->count();
        $totalSkBlm = Parpol::where('sk3p3', '!=', 'Ada')->count();

        // Data Realisasi Pendidikan Politik (Banpol)
        $dikpols = \App\Models\PendidikanPolitik::with('parpol')->get();
        $totalDikpol = $dikpols->count();
        $totalBiayaDikpol = $dikpols->sum('jumlah_biaya');
        $totalPesertaDikpol = $dikpols->sum('peserta_jumlah');
        $totalTempatDikpol = $dikpols->pluck('tempat_pelaksanaan')->unique()->count();

        $aspirasiTerbaru = Aspirasi::latest()->take(5)->get();

        return view('parpol.index', compact(
            'parpols',
            'totalParpol',
            'totalPelaihari',
            'totalBatuAmpar',
            'totalLo',
            'totalSkAda',
            'totalSkBlm',
            'aspirasiTerbaru',
            'dikpols',
            'totalDikpol',
            'totalBiayaDikpol',
            'totalPesertaDikpol',
            'totalTempatDikpol'
        ));
    }

    /**
     * Tampilan Cetak Dokumen Resmi Data Parpol Kab. Tanah Laut Tahun 2026
     */
    public function cetak()
    {
        $parpols = Parpol::orderBy('nomor_urut')->get();
        return view('parpol.cetak', compact('parpols'));
    }

    /**
     * Simpan formulir aspirasi / pengaduan masyarakat
     */
    public function storeAspirasi(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kategori' => 'required|string',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:2000',
        ], [
            'nama.required' => 'Nama pengirim wajib diisi.',
            'email.required' => 'Email atau kontak wajib diisi.',
            'kategori.required' => 'Silakan pilih kategori pesan.',
            'subjek.required' => 'Subjek atau perihal wajib diisi.',
            'pesan.required' => 'Isi pesan wajib diisi.',
        ]);

        Aspirasi::create($validated);

        return redirect()->to(url()->previous() . '#aspirasi')
            ->with('aspirasi_success', 'Terima kasih. Pesan atau aspirasi Anda telah berhasil dikirimkan ke Tim Layanan Informasi Partai Politik Kabupaten Tanah Laut.');
    }

    /**
     * Simpan laporan permohonan pembaruan data pengurus / alamat DPC Parpol
     */
    public function storePerubahan(Request $request)
    {
        $validated = $request->validate([
            'nama_partai' => 'required|string|max:100',
            'nama_pemohon' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'rincian_perubahan' => 'required|string|max:2000',
        ]);

        // Simpan sebagai aspirasi berlabel koreksi data
        Aspirasi::create([
            'nama' => $validated['nama_pemohon'] . ' (' . $validated['jabatan'] . ' ' . $validated['nama_partai'] . ')',
            'email' => 'lo.' . strtolower(str_replace(' ', '', $validated['nama_partai'])) . '@tanahlautkab.go.id',
            'kategori' => 'Pembaruan Data Pengurus',
            'subjek' => 'Permohonan Update Data: ' . $validated['nama_partai'],
            'pesan' => "No HP Pemohon: {$validated['no_hp']}\n\nRincian Pembaruan:\n" . $validated['rincian_perubahan'],
            'status' => 'diproses',
        ]);

        return redirect()->to(url()->previous() . '#lapor')
            ->with('lapor_success', 'Permohonan pembaruan data DPC ' . $validated['nama_partai'] . ' berhasil diajukan. Tim verifikator akan menghubungi nomor LO untuk konfirmasi berkas SK.');
    }
}
