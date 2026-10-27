<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParpolController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WasbangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Portal Utama Bakesbangpol (Daftar Modul - Smart Portal)
|--------------------------------------------------------------------------
*/
Route::get('/', [PortalController::class, 'index'])->name('portal.home');

/*
|--------------------------------------------------------------------------
| Modul 1: SIPARPOL (Data Partai Politik)
|--------------------------------------------------------------------------
*/
Route::get('/parpol', [ParpolController::class, 'index'])->name('parpol.home');
Route::get('/cetak-data', [ParpolController::class, 'cetak'])->name('parpol.cetak');
Route::post('/kirim-aspirasi', [ParpolController::class, 'storeAspirasi'])->name('parpol.aspirasi');
Route::post('/lapor-perubahan', [ParpolController::class, 'storePerubahan'])->name('parpol.lapor');

/*
|--------------------------------------------------------------------------
| Portal WASBANG (Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa)
| Pengarsipan Dokumentasi Laporan Kegiatan Luar Lapangan
|--------------------------------------------------------------------------
*/
Route::prefix('wasbang')->name('wasbang.')->group(function () {
    Route::get('/', [WasbangController::class, 'index'])->name('index');
    Route::post('/tambah', [WasbangController::class, 'store'])->name('store');
    Route::get('/cetak', [WasbangController::class, 'cetak'])->name('cetak');
    Route::get('/cetak/{id}', [WasbangController::class, 'cetakDetail'])->name('cetak.detail');
    Route::get('/download/{id}/{type}', [WasbangController::class, 'downloadMedia'])->name('download');
    Route::delete('/hapus/{id}', [WasbangController::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Otentikasi & Login Multi-Role (Admin Bakesbangpol & Parpol)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Area Terproteksi (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});
