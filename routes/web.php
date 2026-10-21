<?php

use App\Http\Controllers\ParpolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ParpolController::class, 'index'])->name('parpol.home');
Route::get('/cetak-data', [ParpolController::class, 'cetak'])->name('parpol.cetak');
Route::post('/kirim-aspirasi', [ParpolController::class, 'storeAspirasi'])->name('parpol.aspirasi');
Route::post('/lapor-perubahan', [ParpolController::class, 'storePerubahan'])->name('parpol.lapor');
