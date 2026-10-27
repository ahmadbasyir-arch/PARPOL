<?php

namespace App\Http\Controllers;

use App\Models\Parpol;
use App\Models\PendidikanPolitik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan formulir login SIPARPOL
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Ambil daftar parpol untuk fitur Quick-Fill Demo Akun
        $parpols = Parpol::orderBy('nomor_urut')->get();

        return view('auth.login', compact('parpols'));
    }

    /**
     * Proses otentikasi login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email login wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $namaPengguna = $user->name;

            if ($user->isAdmin()) {
                return redirect()->intended(route('dashboard'))
                    ->with('login_success', "Selamat datang, {$namaPengguna}! Anda masuk sebagai Administrator Bakesbangpol.");
            } else {
                $namaPartai = $user->parpol->nama_partai ?? 'Partai Politik';
                return redirect()->intended(route('dashboard'))
                    ->with('login_success', "Selamat datang, {$namaPengguna}! Anda masuk sebagai perwakilan resmi {$namaPartai}.");
            }
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan tidak sesuai.',
        ])->onlyInput('email');
    }

    /**
     * Tampilan Dashboard terintegrasi (Admin Bakesbangpol & Pengurus Parpol)
     */
    public function dashboard()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            // Dashboard Khusus Admin Bakesbangpol
            $totalParpol = Parpol::count();
            $dikpols = PendidikanPolitik::with('parpol')->latest()->get();
            $totalBiaya = $dikpols->sum('jumlah_biaya');
            $totalPeserta = $dikpols->sum('peserta_jumlah');
            $parpols = Parpol::with('pendidikanPolitik')->orderBy('nomor_urut')->get();

            return view('dashboard.admin', compact(
                'user',
                'totalParpol',
                'dikpols',
                'totalBiaya',
                'totalPeserta',
                'parpols'
            ));
        } else {
            // Dashboard Khusus Operator / LO Partai Politik
            $parpol = $user->parpol;
            $dikpols = PendidikanPolitik::where('parpol_id', $user->parpol_id)->latest()->get();
            $totalBiaya = $dikpols->sum('jumlah_biaya');
            $totalPeserta = $dikpols->sum('peserta_jumlah');

            return view('dashboard.parpol', compact(
                'user',
                'parpol',
                'dikpols',
                'totalBiaya',
                'totalPeserta'
            ));
        }
    }

    /**
     * Proses logout dari sistem
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('parpol.home')
            ->with('success', 'Anda telah berhasil keluar (logout) dari sistem SIPARPOL.');
    }
}
