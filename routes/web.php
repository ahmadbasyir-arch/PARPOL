<?php

use App\Http\Controllers\ParpolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ParpolController::class, 'index'])->name('parpol.home');
Route::post('/daftar-kader', [ParpolController::class, 'storeAnggota'])->name('parpol.daftar');
Route::post('/kirim-aspirasi', [ParpolController::class, 'storeAspirasi'])->name('parpol.aspirasi');
