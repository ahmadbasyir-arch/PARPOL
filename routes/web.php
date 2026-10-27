<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParpolController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WasbangController;
use Illuminate\Support\Facades\Route;

// Portal Utama Pelayanan Terpadu Bakesbangpol Kab. Tanah Laut
Route::get('/', [PortalController::class, 'index'])->name('portal.home');

// Bidang Politik Dalam Negeri: SIPARPOL (UTUH 100% tanpa ubahan fitur)
Route::get('/parpol', [ParpolController::class, 'index'])->name('parpol.home');
Route::get('/cetak-data', [ParpolController::class, 'cetak'])->name('parpol.cetak');
Route::post('/kirim-aspirasi', [ParpolController::class, 'storeAspirasi'])->name('parpol.aspirasi');
Route::post('/lapor-perubahan', [ParpolController::class, 'storePerubahan'])->name('parpol.lapor');

// Bidang Bina Ideologi, Wawasan Kebangsaan, dan Karakter Bangsa: WASBANG
Route::get('/wasbang', [WasbangController::class, 'index'])->name('wasbang.index');
Route::post('/wasbang/tambah', [WasbangController::class, 'store'])->name('wasbang.store');
Route::get('/wasbang/cetak', [WasbangController::class, 'cetak'])->name('wasbang.cetak');

// Otentikasi & Login Multi-Role (Admin Bakesbangpol & Parpol)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Area Terproteksi (Wajib Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});
