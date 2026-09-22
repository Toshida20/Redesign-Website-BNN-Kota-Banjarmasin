<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/informasi-profil', function () {
    return view('informasi-profil');
});

Route::get('/kepala-bnnp-k-dari-masa-ke-masa', function () {
    return view('kepala-bnnk');
});