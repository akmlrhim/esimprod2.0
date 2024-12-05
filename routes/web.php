<?php

use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\User\OptionsController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PerawatanController;
use App\Http\Controllers\Admin\PeminjamanController;

use App\Http\Controllers\Admin\PeruntukanController;
use App\Http\Controllers\Admin\JenisBarangController;
use App\Http\Controllers\User\PeminjamanController as PeminjamanUser;
use App\Http\Controllers\User\PengembalianController as PengembalianUser;

Route::prefix('/')->group(function () {

    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

    Route::middleware(['auth', 'admin-or-superadmin'])->group(function () {
        Route::get('/password', [AuthController::class, 'password'])->name('password');
        Route::post('/password', [AuthController::class, 'passwordValidation'])->name('password.validation');
        Route::get('/password', [AuthController::class, 'password'])->name('password');
        Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'forgotPasswordProcess'])->name('password.email');
        Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'resetPasswordProcess'])->name('password.update');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth', 'admin-or-superadmin']);

Route::prefix('barang')->middleware('auth')->group(function () {
    Route::middleware('admin-or-superadmin')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/tambah', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/detail/{uuid}', [BarangController::class, 'show'])->name('barang.show');
        Route::get('/print-barang', [BarangController::class, 'printBarang'])->name('barang.print-barang');
        Route::get('/print-qrcode', [BarangController::class, 'printQrCode'])->name('barang.print-qrcode');
        Route::get('/result', [BarangController::class, 'search'])->name('barang.search');
        Route::get('jenis-barang/{jenisBarang:uuid}', [BarangController::class, 'jenisBarang'])->name('barang.jenis-barang');
    });

    Route::middleware('superadmin')->group(function () {
        Route::get('/edit/{uuid}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/update/{uuid}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/destroy/{uuid}', [BarangController::class, 'destroy'])->name('barang.destroy');
    });
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::prefix('jenis-barang')->group(function () {
        Route::get('/', [JenisBarangController::class, 'index'])->name('jenis-barang.index');
        Route::post('/store', [JenisBarangController::class, 'store'])->name('jenis-barang.store');
        Route::get('/edit/{uuid}', [JenisBarangController::class, 'edit'])->name('jenis-barang.edit');
        Route::put('/update/{uuid}', [JenisBarangController::class, 'update'])->name('jenis-barang.update');
        Route::delete('/destroy/{uuid}', [JenisBarangController::class, 'destroy'])->name('jenis-barang.destroy');
        Route::get('/result', [JenisBarangController::class, 'search'])->name('jenis-barang.search');
    });

    Route::prefix('peruntukan')->group(function () {
        Route::get('/', [PeruntukanController::class, 'index'])->name('peruntukan.index');
        Route::post('/store', [PeruntukanController::class, 'store'])->name('peruntukan.store');
        Route::get('/edit/{uuid}', [PeruntukanController::class, 'edit'])->name('peruntukan.edit');
        Route::put('/update/{uuid}', [PeruntukanController::class, 'update'])->name('peruntukan.update');
        Route::delete('/destroy/{uuid}', [PeruntukanController::class, 'destroy'])->name('peruntukan.destroy');
        Route::get('/result', [PeruntukanController::class, 'search'])->name('peruntukan.search');
    });

    Route::prefix('jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('jabatan.index');
        Route::post('/store', [JabatanController::class, 'store'])->name('jabatan.store');
        Route::get('/edit/{uuid}', [JabatanController::class, 'edit'])->name('jabatan.edit');
        Route::put('/update/{uuid}', [JabatanController::class, 'update'])->name('jabatan.update');
        Route::delete('/destroy/{uuid}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
        Route::get('/result', [JabatanController::class, 'search'])->name('jabatan.search');
    });
});

Route::prefix('profil')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profil.index');
    Route::get('/ubah-profil', [ProfileController::class, 'editProfil'])->name('profil.ubah-profil');
    Route::get('/ubah-password', [ProfileController::class, 'editPassword'])->name('profil.ubah-password');
    Route::patch('/ubah-password', [ProfileController::class, 'updatePassword'])->name('profil.update-password');
    Route::patch('/ubah-profil', [ProfileController::class, 'updateProfil'])->name('profil.update-profil');
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::middleware(['auth', 'admin-or-superadmin'])->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/tambah', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/detail/{uuid}', [UserController::class, 'show'])->name('users.show');
        Route::get('/roles', [UserController::class, 'filterByRole'])->name('users.role');
        Route::get('/jabatan', [UserController::class, 'filterByJabatan'])->name('users.jabatan');
        Route::get('/result', [UserController::class, 'search'])->name('users.search');
    });

    Route::middleware('superadmin')->group(function () {
        Route::get('/edit/{uuid}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{uuid}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/destroy/{uuid}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

Route::prefix('peminjaman')->group(function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/tambah', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/edit/{uuid}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::put('/update/{uuid}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/destroy/{uuid}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::get('/detail/{uuid}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
    Route::get('/result', [PeminjamanController::class, 'search'])->name('peminjaman.search');
});

Route::prefix('perawatan')->group(function () {
    Route::get('/', [PerawatanController::class, 'barangTidakTersedia'])->name('perawatan.index');
    // Route::get('/tambah', [PerawatanController::class, 'create'])->name('perawatan.create');
    // Route::post('/store', [PerawatanController::class, 'store'])->name('perawatan.store');
    // Route::get('/barang', [PerawatanController::class, 'barangTidakTersedia'])->name('perawatan.barang');
    Route::get('/barang/detail/{uuid}', [PerawatanController::class, 'detailBarang'])->name('perawatan.barang.detail');
    Route::put('reset-limit/{uuid}', [PerawatanController::class, 'resetLimit'])->name('perawatan.reset-limit');
});

//Route Opsi
Route::prefix('user/option')->group(function () {
    Route::get('/', [OptionsController::class, 'index'])->name('user.option');
});

//Route Peminjaman User
Route::prefix('user/peminjaman')->group(function () {
    Route::get('/', [PeminjamanUser::class, 'index'])->name('user.peminjaman.index');
    Route::post('/scan', [PeminjamanUser::class, 'scan'])->name('user.peminjaman.scan');
    Route::delete('/remove/{uuid}', [PeminjamanUser::class, 'removeItem'])->name('user.peminjaman.remove');
    Route::post('/store', [PeminjamanUser::class, 'store'])->name('user.peminjaman.store');
    Route::get('/report', [PeminjamanUser::class, 'report'])->name('user.peminjaman.report');
    Route::get('/pdf', [PeminjamanUser::class, 'printReport'])->name('user.peminjaman.pdf');
});

//Route Pengembalian User
Route::prefix('user/pengembalian')->group(function () {
    Route::get('/', [PengembalianUser::class, 'index'])->name('user.pengembalian.index');
    Route::post('/check', [PengembalianUser::class, 'checkPeminjaman'])->name('user.pengembalian.check');
    Route::post('/validation', [PengembalianUser::class, 'validateItem'])->name('user.pengembalian.validation');
    Route::post('/store', [PengembalianUser::class, 'store'])->name('user.pengembalian.store');
    Route::get('/report', [PengembalianUser::class, 'report'])->name('user.pengembalian.report');
    Route::post('/update_desc', [PengembalianUser::class, 'desc_update'])->name('user.pengembalian.update_desc');
    route::get('/pdf', [PengembalianUser::class, 'printReport'])->name('user.pengembalian.pdf');
});
