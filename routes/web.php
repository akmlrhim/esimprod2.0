<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\Credit;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;


Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');


Route::prefix('credit')->group(function () {
    Route::get('/', [Credit::class, 'index'])->name('credit.index');
    Route::get('/edit/{uuid}', [Credit::class, 'edit'])->name('credit.edit');
    Route::get('/{uuid}/guidebook', [Credit::class, 'guidebook'])->name('credit.guidebook');
    Route::put('/update/{uuid}', [Credit::class, 'update'])->name('credit.update');
});

Route::prefix('barang')->group(function () {
    Route::get('/', [Barang::class, 'index'])->name('barang.index');
    Route::get('/create', [Barang::class, 'create'])->name('barang.create');
    Route::post('/store', [Barang::class, 'store'])->name('barang.store');
    Route::get('/edit/{uuid}', [Barang::class, 'edit'])->name('barang.edit');
    Route::put('/update/{uuid}', [Barang::class, 'update'])->name('barang.update');
    Route::delete('/destroy/{uuid}', [Barang::class, 'destroy'])->name('barang.destroy');
});
