<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\User\OptionsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PerawatanController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PeruntukanController;
use App\Http\Controllers\Admin\JenisBarangController;


Route::prefix('/')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('/password', [AuthController::class, 'password'])->name('password');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
    Route::post('/password', [AuthController::class, 'passwordValidation'])->name('password.validation');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/options', [OptionsController::class, 'index'])->name('options');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('credit')->group(function () {
    Route::get('/', [CreditController::class, 'index'])->name('credit.index');
    Route::get('/edit/{uuid}', [CreditController::class, 'edit'])->name('credit.edit');
    Route::get('/{uuid}/guidebook', [CreditController::class, 'guidebook'])->name('credit.guidebook');
    Route::put('/update/{uuid}', [CreditController::class, 'update'])->name('credit.update');
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/tambah', [BarangController::class, 'create'])->name('barang.create');
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
    Route::get('/', [PerawatanController::class, 'barangTidakTersedia'])->name('perawatan.index');
    // Route::get('/tambah', [PerawatanController::class, 'create'])->name('perawatan.create');
    // Route::post('/store', [PerawatanController::class, 'store'])->name('perawatan.store');
    // Route::get('/barang', [PerawatanController::class, 'barangTidakTersedia'])->name('perawatan.barang');
    Route::get('/barang/detail/{uuid}', [PerawatanController::class, 'detailBarang'])->name('perawatan.barang.detail');
    Route::put('reset-limit/{uuid}', [PerawatanController::class, 'resetLimit'])->name('perawatan.reset-limit');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/tambah', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{uuid}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/update/{uuid}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/destroy/{uuid}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/filter', [UserController::class, 'filterByRole'])->name('users.role');
});

Route::prefix('peruntukan')->group(function () {
    Route::get('/', [PeruntukanController::class, 'index'])->name('peruntukan.index');
    Route::post('/store', [PeruntukanController::class, 'store'])->name('peruntukan.store');
    Route::get('/edit/{uuid}', [PeruntukanController::class, 'edit'])->name('peruntukan.edit');
    Route::put('/update/{uuid}', [PeruntukanController::class, 'update'])->name('peruntukan.update');
    Route::delete('/destroy/{uuid}', [PeruntukanController::class, 'destroy'])->name('peruntukan.destroy');
});

Route::prefix('peminjaman')->group(function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/tambah', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/edit/{uuid}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::put('/update/{uuid}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/destroy/{uuid}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
});
