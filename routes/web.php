<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParpolController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', [ParpolController::class, 'index'])->name('parpol.home');
Route::get('/cetak-data', [ParpolController::class, 'cetak'])->name('parpol.cetak');
Route::post('/kirim-aspirasi', [ParpolController::class, 'storeAspirasi'])->name('parpol.aspirasi');
Route::post('/lapor-perubahan', [ParpolController::class, 'storePerubahan'])->name('parpol.lapor');

// Otentikasi & Login Multi-Role (Admin Bakesbangpol & Parpol)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Area Terproteksi (Wajib Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});
