<?php

namespace App\Http\Controllers;

use App\Models\Parpol;
use App\Models\PendidikanPolitik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PendidikanPolitikController extends Controller
{
    /**
     * Simpan laporan kegiatan pendidikan politik baru
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $rules = [
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|string|max:100',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'peserta_jumlah' => 'required|integer|min:1',
            'peserta_kader' => 'nullable|integer|min:0',
            'peserta_masyarakat' => 'nullable|integer|min:0',
            'jumlah_biaya' => 'required|numeric|min:0',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'keterangan' => 'nullable|string|max:1000',
        ];

        // Jika admin, wajib memilih parpol mana yang dibuatkan laporan
        if ($user->isAdmin()) {
            $rules['parpol_id'] = 'required|exists:parpols,id';
        }

        $validated = $request->validate($rules, [
            'nama_kegiatan.required' => 'Nama agenda kegiatan wajib diisi.',
            'tanggal_pelaksanaan.required' => 'Tanggal pelaksanaan kegiatan wajib diisi.',
            'tempat_pelaksanaan.required' => 'Tempat pelaksanaan kegiatan wajib diisi.',
            'peserta_jumlah.required' => 'Jumlah peserta wajib diisi.',
            'jumlah_biaya.required' => 'Jumlah biaya realisasi wajib diisi.',
            'dokumentasi.image' => 'File dokumentasi harus berupa gambar (JPEG, PNG, WebP).',
            'dokumentasi.max' => 'Ukuran file gambar maksimal 5 MB.',
            'parpol_id.required' => 'Silakan pilih partai politik pengusung kegiatan.',
        ]);

        $parpolId = $user->isAdmin() ? $validated['parpol_id'] : $user->parpol_id;

        // Handle upload foto dokumentasi
        $dokPath = null;
        if ($request->hasFile('dokumentasi')) {
            $file = $request->file('dokumentasi');
            $fileName = 'dikpol_' . time() . '_' . Str::slug(substr($validated['nama_kegiatan'], 0, 30)) . '.' . $file->getClientOriginalExtension();
            $destPath = public_path('uploads/dikpol');
            if (!File::exists($destPath)) {
                File::makeDirectory($destPath, 0755, true);
            }
            $file->move($destPath, $fileName);
            $dokPath = 'uploads/dikpol/' . $fileName;
        }

        // Kalkulasi peserta kader dan masyarakat
        $totalPeserta = (int) $validated['peserta_jumlah'];
        $pesertaKader = isset($validated['peserta_kader']) && $validated['peserta_kader'] > 0 
            ? (int) $validated['peserta_kader'] 
            : ceil($totalPeserta * 0.6); // default 60% kader
        $pesertaMasy = isset($validated['peserta_masyarakat']) && $validated['peserta_masyarakat'] > 0
            ? (int) $validated['peserta_masyarakat']
            : ($totalPeserta - $pesertaKader);

        PendidikanPolitik::create([
            'parpol_id' => $parpolId,
            'nama_kegiatan' => $validated['nama_kegiatan'],
            'tanggal_pelaksanaan' => $validated['tanggal_pelaksanaan'],
            'tempat_pelaksanaan' => $validated['tempat_pelaksanaan'],
            'peserta_jumlah' => $totalPeserta,
            'peserta_kader' => true,
            'peserta_masyarakat' => max(0, $pesertaMasy),
            'jumlah_biaya' => (int) $validated['jumlah_biaya'],
            'dokumentasi' => $dokPath,
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        $namaParpol = Parpol::find($parpolId)->akronim ?? 'Partai';

        return redirect()->back()->with('success', "Laporan kegiatan pendidikan politik {$namaParpol} berhasil ditambahkan!");
    }

    /**
     * Perbarui laporan kegiatan pendidikan politik
     */
    public function update(Request $request, $id)
    {
        $kegiatan = PendidikanPolitik::findOrFail($id);
        $user = Auth::user();

        // Otorisasi: hanya admin atau parpol pemilik yang boleh edit
        if (!$user->isAdmin() && $kegiatan->parpol_id !== $user->parpol_id) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengubah data kegiatan partai lain.');
        }

        $rules = [
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|string|max:100',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'peserta_jumlah' => 'required|integer|min:1',
            'jumlah_biaya' => 'required|numeric|min:0',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'keterangan' => 'nullable|string|max:1000',
        ];

        if ($user->isAdmin() && $request->has('parpol_id')) {
            $rules['parpol_id'] = 'required|exists:parpols,id';
        }

        $validated = $request->validate($rules, [
            'nama_kegiatan.required' => 'Nama agenda kegiatan wajib diisi.',
            'tanggal_pelaksanaan.required' => 'Tanggal pelaksanaan kegiatan wajib diisi.',
            'tempat_pelaksanaan.required' => 'Tempat pelaksanaan kegiatan wajib diisi.',
            'peserta_jumlah.required' => 'Jumlah peserta wajib diisi.',
            'jumlah_biaya.required' => 'Jumlah biaya realisasi wajib diisi.',
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama jika ada dan berada di folder uploads
            if ($kegiatan->dokumentasi && File::exists(public_path($kegiatan->dokumentasi)) && str_starts_with($kegiatan->dokumentasi, 'uploads/')) {
                File::delete(public_path($kegiatan->dokumentasi));
            }

            $file = $request->file('dokumentasi');
            $fileName = 'dikpol_' . time() . '_' . Str::slug(substr($validated['nama_kegiatan'], 0, 30)) . '.' . $file->getClientOriginalExtension();
            $destPath = public_path('uploads/dikpol');
            if (!File::exists($destPath)) {
                File::makeDirectory($destPath, 0755, true);
            }
            $file->move($destPath, $fileName);
            $kegiatan->dokumentasi = 'uploads/dikpol/' . $fileName;
        }

        $kegiatan->nama_kegiatan = $validated['nama_kegiatan'];
        $kegiatan->tanggal_pelaksanaan = $validated['tanggal_pelaksanaan'];
        $kegiatan->tempat_pelaksanaan = $validated['tempat_pelaksanaan'];
        $kegiatan->peserta_jumlah = (int) $validated['peserta_jumlah'];
        $kegiatan->jumlah_biaya = (int) $validated['jumlah_biaya'];
        if (isset($validated['keterangan'])) {
            $kegiatan->keterangan = $validated['keterangan'];
        }
        if ($user->isAdmin() && isset($validated['parpol_id'])) {
            $kegiatan->parpol_id = $validated['parpol_id'];
        }

        $kegiatan->save();

        return redirect()->back()->with('success', 'Laporan kegiatan pendidikan politik berhasil diperbarui!');
    }

    /**
     * Hapus laporan kegiatan pendidikan politik
     */
    public function destroy($id)
    {
        $kegiatan = PendidikanPolitik::findOrFail($id);
        $user = Auth::user();

        // Otorisasi: hanya admin atau parpol pemilik yang boleh hapus
        if (!$user->isAdmin() && $kegiatan->parpol_id !== $user->parpol_id) {
            abort(403, 'Anda tidak memiliki hak akses untuk menghapus data kegiatan partai lain.');
        }

        // Hapus file foto jika ada
        if ($kegiatan->dokumentasi && File::exists(public_path($kegiatan->dokumentasi)) && str_starts_with($kegiatan->dokumentasi, 'uploads/')) {
            File::delete(public_path($kegiatan->dokumentasi));
        }

        $kegiatan->delete();

        return redirect()->back()->with('success', 'Laporan kegiatan berhasil dihapus!');
    }
}
