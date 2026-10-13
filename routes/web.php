<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\backoffice\BackofficeAuthController;
use App\Http\Controllers\User\ProfileController;

/* Halaman Public */
Route::get('/', function () {
    return view('layouts.beranda.dashboard');
})->name('beranda');

Route::get('/informasi-profil', function () {
    return view('layouts.organisasi.informasi-profil.informasi-profil');
})->name('profil');

Route::get('/kepala-bnn-k-dari-masa-ke-masa', function () {
    return view('layouts.organisasi.kepala-bnnk.kepala-bnnk');
});

Route::get('/berita-utama', function () {
    return view('berita-utama');
})->name('berita.utama');

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

// Satuan Kerja (Organisasi)
Route::prefix('satuan-kerja')->group(function () {
    Route::get('/alamat-kantor-bnnp-bnnk', function () {
        return view('layouts.organisasi.satuan-kerja.alamat-kantor-bnnp-bnnk');
    });

    Route::get('/katim-bidang-pemberantasan', function () {
        return view('layouts.organisasi.satuan-kerja.katim-bidang-pemberantasan');
    });

    Route::get('/kasubbag-umum', function () {
        return view('layouts.organisasi.satuan-kerja.kasubbag-umum');
    });

    Route::get('/katim-bidang-pencegahan-dan-pemberdayaan-masyarakat', function () {
        return view('layouts.organisasi.satuan-kerja.katim-bidang-pencegahan-dan-pemberdayaan-masyarakat');
    });

    Route::get('/katim-bidang-rehabilitasi', function () {
        return view('layouts.organisasi.satuan-kerja.katim-bidang-rehabilitasi');
    });
});

// PPID & LHKPN Publik
Route::get('/ppid', function () {
    return view('layouts.ppid.ppid');
})->name('ppid');

Route::get('/lhkpn', function () {
    return view('layouts.ppid.lhkpn.lhkpn');
})->name('lhkpn');

Route::get('/lhkpn-report', function () {
    return view('layouts.ppid.lhkpn.lhkpn-report');
})->name('lhkpn.report');

Route::middleware('guest')->group(function () {
    // Login User Publik
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register User Publik
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Lupa Password (Tautan Reset via Email Resmi)
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

/* AREA USER (Kelola Profil) */
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profil/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});


/* LOGIN BACKOFFICE INTERNAL (Admin, Editor, Author - Tanpa Link di Navbar) 
Akses via URL: domain.com/backoffice/login */

Route::prefix('backoffice')->name('backoffice.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', function () {
            return view('backoffice.auth.login');
        })->name('login');
        // Route::post('/login', [BackofficeAuthController::class, 'login'])->name('login.submit');
    });
});

// Role Author (Menulis & Mengelola Berita)
Route::middleware(['auth', 'role:author,admin'])->prefix('author')->name('author.')->group(function () {
    Route::get('/dashboard', function () {
        return view('author.dashboard');
    })->name('dashboard');
    // Route::resource('articles', App\Http\Controllers\Author\ArticleController::class);
});

// Role Editor (Hanya LHKPN & PPID)
Route::middleware(['auth', 'role:editor,admin'])->prefix('editor')->name('editor.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Editor\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('lhkpn', App\Http\Controllers\Editor\LhkpnManageController::class);
    Route::resource('ppid', App\Http\Controllers\Editor\PpidManageController::class);
});

// Role Admin (User, Pegawai Divisi, Landing Poster, & Laporan)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\Admin\UserManageController::class);
    Route::resource('pegawai', App\Http\Controllers\Admin\PegawaiController::class);
    Route::resource('landing-poster', App\Http\Controllers\Admin\LandingPosterController::class);
    Route::get('/reports', [App\Http\Controllers\Admin\DashboardController::class, 'userReports'])->name('reports');
});