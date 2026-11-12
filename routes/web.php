<?php

use Illuminate\Support\Facades\Route;

// Halaman Welcome Screen
Route::get('/', function () {
    return view('welcome');
});

// Halaman Beranda Utama
Route::get('/beranda', function () {
    return view('beranda');
});

// TAMBAHKAN RUTE LOGIN INI:
Route::get('/login', function () {
    // Jika kamu punya view khusus login, ganti 'auth.login' dengan nama view-nya
    // Contoh jika menggunakan view welcome/beranda sementara atau halaman login statis:
    return "Halaman Login untuk Role: " . request()->query('role');
});
