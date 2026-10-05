<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;

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

Route::get('/tugas-dan-fungsi', function () {
    return view('tugas-dan-fungsi');
});

Route::get('/struktur', function () {
    return view('struktur');
});

Route::get('/alamat-kantor', function () {
    return view('alamat-kantor');
});

Route::get('/alamat-kantor-bnnp-bnnk', function () {
    return view('alamat-kantor-bnnp-bnnk');
});

Route::get('/lhkpn', function () {
    return view('lhkpn');
});

Route::get('/lhkpn-report', function () {
    return view('lhkpn-report');
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