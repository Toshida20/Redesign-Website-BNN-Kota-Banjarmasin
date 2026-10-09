<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;

Route::get('/', function () {
    return view('layouts.beranda.dashboard');
});

Route::get('/informasi-profil', function () {
    return view('layouts.organisasi.informasi-profil.informasi-profil');
});

Route::get('/kepala-bnn-k-dari-masa-ke-masa', function () {
    return view('layouts.organisasi.kepala-bnnk.kepala-bnnk');
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

Route::get('/struktur', function () {
    return view('layouts.organisasi.informasi-profil.struktur');
});

Route::get('/kontak', function () {
    return view('layouts.kontak.kontak');
});

Route::get('/satuan-kerja/alamat-kantor-bnnp-bnnk', function () {
    return view('layouts.organisasi.satuan-kerja.alamat-kantor-bnnp-bnnk');
});

Route::get('/satuan-kerja/katim-bidang-pemberantasan', function () {
    return view('layouts.organisasi.satuan-kerja.katim-bidang-pemberantasan');
});

Route::get('/satuan-kerja/kasubbag-umum', function () {
    return view('layouts.organisasi.satuan-kerja.kasubbag-umum');
});

Route::get('/satuan-kerja/katim-bidang-pencegahan-dan-pemberdayaan-masyarakat', function () {
    return view('layouts.organisasi.satuan-kerja.katim-bidang-pencegahan-dan-pemberdayaan-masyarakat');
});

Route::get('/satuan-kerja/katim-bidang-rehabilitasi', function () {
    return view('layouts.organisasi.satuan-kerja.katim-bidang-rehabilitasi');
});

Route::get('/lhkpn', function () {
    return view('layouts.organisasi.informasi-profil.lhkpn.lhkpn');
});

Route::get('/lhkpn-report', function () {
    return view('layouts.organisasi.informasi-profil.lhkpn.lhkpn-report');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [EmailVerificationController::class, 'show'])->name('email.verify');
    Route::post('/email/verify-code', [EmailVerificationController::class, 'verify'])->name('email.verify.code');
    Route::post('/email/resend-otp', [EmailVerificationController::class, 'resend'])->name('email.resend.otp');
});

Route::get('/verify-success', function () {
    return view('auth.verify-success');
})->name('verify.success');

Route::get('/verify-complete', function () {
    return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
})->name('verify.complete');

// .blade
