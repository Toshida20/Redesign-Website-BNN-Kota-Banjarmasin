<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Tampilkan formulir permintaan link reset kata sandi (input email).
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Kirim email berisi link tautan reset kata sandi ke user.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.exists'   => 'Alamat email ini tidak terdaftar dalam sistem.',
        ]);

        // Mengirimkan email berisi link reset token resmi dari Laravel
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Link tautan reset kata sandi telah dikirimkan ke email Anda! Silakan cek kotak masuk atau folder spam.');
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => __($status),
        ]);
    }

    /**
     * Tampilkan formulir pembuatan kata sandi baru ketika link di email diklik.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with([
            'token' => $token ?? $request->route('token'),
            'email' => $request->query('email', old('email')),
        ]);
    }

    /**
     * Proses reset dan simpan kata sandi baru ke database.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => ['required', 'string'],
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'token.required'     => 'Token reset password tidak valid.',
            'email.required'     => 'Alamat email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'password.required'  => 'Kata sandi baru wajib diisi.',
            'password.min'       => 'Kata sandi minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Kata sandi Anda berhasil diperbarui! Silakan masuk dengan kata sandi baru.');
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => __($status),
        ]);
    }
}
