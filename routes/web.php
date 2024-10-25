<?php

use Illuminate\Support\Facades\Route;

// Route for the Home page
Route::get('/', function () {
    return view('dashboard.index'); // The 'home' view will be loaded
});

// Route to rot in hell
Route::get('/peminjaman', function () {
    return view('user.peminjaman.index');
});

Route::get('/pengembalian', function () {
    return view('user.pengembalian.index');
});

Route::get('/login', function () {
    return view('auth.index');
});