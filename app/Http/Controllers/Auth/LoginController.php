<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected OtpService $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Alamat email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'Email atau password salah. Silakan coba lagi.',
            ]);
        }

        if (!$user->is_active) {
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'Akun Anda sedang dinonaktifkan. Silakan hubungi admin.',
            ]);
        }

        if (!$user->email_verified_at) {
            
            Auth::login($user);

            $this->otpService->generateAndSend($user->id, $user->email);

            return redirect()->route('email.verify')->with('status', 'Email Anda belum diverifikasi. Kode OTP baru telah dikirimkan ke email Anda.');
        }

        Auth::login($user, $remember);
        $request->session()->regenerate();

        if ($user->role_id == 2) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role_id == 3) {
            return redirect()->route('editor.dashboard');
        } elseif ($user->role_id == 4) {
            return redirect()->route('author.dashboard');
        }

        return redirect()->intended('/')->with('status', 'Selamat datang kembali, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Anda telah berhasil keluar.');
    }
}
