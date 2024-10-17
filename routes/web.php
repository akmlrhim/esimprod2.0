<?php

use Illuminate\Support\Facades\Route;

// Route for the Home page
Route::get('/', function () {
    return view('home'); // The 'home' view will be loaded
});

// Route for the About page
Route::get('/about', function () {
    return view('about'); // The 'about' view will be loaded
});

// Route for the Test page
Route::get('/test', function () {
    return view('test');
});