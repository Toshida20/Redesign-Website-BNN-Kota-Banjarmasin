<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/informasi-profil', function () {
    return view('informasi-profil');
});

Route::get('/kepala-bnn-k-dari-masa-ke-masa', function () {
    return view('kepala-bnnk');
});

Route::get('/berita-utama', function () {
    return view('berita-utama');
});

Route::get('/berita-kegiatan', function () {
    return view('berita-kegiatan');
});

Route::get('/foto', function () {
    return view('foto');
});

Route::get('/video', function () {
    return view('video');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/siaran-pers', function () {
    return view('siaran-pers');
});

Route::get('/visi-dan-misi', function () {
    return view('visi-dan-misi');
});