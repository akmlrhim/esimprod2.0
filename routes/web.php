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
    Route::delete('/destroy/{uuid}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::put('reset-limit/{uuid}', [BarangController::class, 'resetLimit'])->name('barang.reset-limit');
    Route::get('/print-barang', [BarangController::class, 'printBarang'])->name('barang.print-barang');
    Route::get('/print-qrcode', [BarangController::class, 'printQrCode'])->name('barang.print-qrcode');
});

Route::prefix('jenis-barang')->group(function () {
    Route::get('/', [JenisBarangController::class, 'index'])->name('jenis-barang.index');
    Route::post('/store', [JenisBarangController::class, 'store'])->name('jenis-barang.store');
    Route::get('/edit/{uuid}', [JenisBarangController::class, 'edit'])->name('jenis-barang.edit');
    Route::put('/update/{uuid}', [JenisBarangController::class, 'update'])->name('jenis-barang.update');
    Route::delete('/destroy/{uuid}', [JenisBarangController::class, 'destroy'])->name('jenis-barang.destroy');
});
