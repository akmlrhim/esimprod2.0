<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PerawatanController;
use App\Http\Controllers\Admin\JenisBarangController;
use App\Http\Controllers\Admin\PeminjamanController;

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
    Route::get('/result', [BarangController::class, 'search'])->name('barang.search');
    Route::get('jenis-barang/{jenisBarang:uuid}', [BarangController::class, 'jenisBarang'])->name('barang.jenis-barang');
});

Route::prefix('jenis-barang')->group(function () {
    Route::get('/', [JenisBarangController::class, 'index'])->name('jenis-barang.index');
    Route::post('/store', [JenisBarangController::class, 'store'])->name('jenis-barang.store');
    Route::get('/edit/{uuid}', [JenisBarangController::class, 'edit'])->name('jenis-barang.edit');
    Route::put('/update/{uuid}', [JenisBarangController::class, 'update'])->name('jenis-barang.update');
    Route::delete('/destroy/{uuid}', [JenisBarangController::class, 'destroy'])->name('jenis-barang.destroy');
});

Route::prefix('perawatan')->group(function () {
    Route::get('/', [PerawatanController::class, 'index'])->name('perawatan.index');
});

Route::prefix('peminjaman')->group(function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
});
