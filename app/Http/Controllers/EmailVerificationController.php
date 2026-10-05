<?php

namespace App\Http\Controllers;

use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    protected OtpService $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Tampilkan halaman verifikasi email (form input OTP).
     */
    public function show()
    {
        $user = auth()->user();

        // Jika email sudah terverifikasi, redirect ke home
        if ($user->email_verified_at) {
            return redirect('/');
        }

        return view('auth.verify-email');
    }

    /**
     * Verifikasi kode OTP yang dimasukkan user.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code'   => 'required|array|size:5',
            'code.*' => 'required|string|size:1',
        ]);

        $code = implode('', $request->input('code'));
        $user = auth()->user();

        if ($this->otpService->verify($user->id, $code)) {
            // Set email_verified_at
            $user->email_verified_at = now();
            $user->save();

            // Logout user
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('verify.success');
        }

        return back()->withErrors(['code' => 'Kode verifikasi tidak valid atau sudah kadaluarsa.']);
    }

    /**
     * Kirim ulang kode OTP ke email user.
     */
    public function resend(Request $request)
    {
        $user = auth()->user();

        // Jika email sudah terverifikasi, tidak perlu kirim ulang
        if ($user->email_verified_at) {
            return redirect('/');
        }

        $this->otpService->generateAndSend($user->id, $user->email);

        return back()->with('resent', 'Kode verifikasi baru telah dikirim ke email Anda.');
    }
}
