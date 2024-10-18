<?php

use App\Http\Controllers\Credit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
});
// Route::get('/credit', function () {
//     return view('credit.index', ['title' => 'Credit']);
// });

// Route::get('/credit/edit', function () {
//     return view('credit.edit', ['title' => 'Edit Credit']);
// });

Route::get('/credit', [Credit::class, 'index'])->name('credit.index'); // Pastikan nama ini lebih spesifik
Route::get('/credit/edit/{uuid}', [Credit::class, 'edit'])->name('credit.edit');
Route::put('/credit/update/{uuid}', [Credit::class, 'update'])->name('credit.update');
