<?php

use App\Http\Controllers\Credit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
});

Route::get('/credit', [Credit::class, 'index'])->name('credit.index');
Route::get('/credit/edit/{uuid}', [Credit::class, 'edit'])->name('credit.edit');
Route::get('/credit/{uuid}/guidebook', [Credit::class, 'guidebook'])->name('credit.guidebook');
Route::put('/credit/update/{uuid}', [Credit::class, 'update'])->name('credit.update');
