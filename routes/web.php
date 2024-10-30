<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisBarangController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


Route::prefix('credit')->group(function () {
    Route::get('/', [CreditController::class, 'index'])->name('credit.index');
    Route::get('/edit/{uuid}', [CreditController::class, 'edit'])->name('credit.edit');
    Route::get('/{uuid}/guidebook', [CreditController::class, 'guidebook'])->name('credit.guidebook');
    Route::put('/update/{uuid}', [CreditController::class, 'update'])->name('credit.update');
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/edit/{uuid}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::get('/detail/{uuid}', [BarangController::class, 'show'])->name('barang.show');
    Route::put('/update/{uuid}', [BarangController::class, 'update'])->name('barang.update');
    // Route::delete('/destroy/{uuid}', [Barang::class, 'destroy'])->name('barang.destroy');
});

Route::prefix('jenis_barang')->group(function () {
    Route::get('/', [JenisBarangController::class, 'index'])->name('jenis_barang.index');
    Route::post('/store', [JenisBarangController::class, 'store'])->name('jenis_barang.store');
    Route::get('/edit/{uuid}', [JenisBarangController::class, 'edit'])->name('jenis_barang.edit');
    Route::put('/update/{uuid}', [JenisBarangController::class, 'update'])->name('jenis_barang.update');
    Route::delete('/destroy/{uuid}', [JenisBarangController::class, 'destroy'])->name('jenis_barang.destroy');
});
