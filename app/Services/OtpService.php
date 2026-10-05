<?php

namespace App\Services;

use App\Models\EmailVerification;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class OtpService
{
    /**
     * Generate kode OTP 5 digit, simpan ke database, dan kirim via email.
     */
    public function generateAndSend(int $userId, string $email): EmailVerification
    {
        // Nonaktifkan kode OTP sebelumnya yang belum digunakan
        EmailVerification::where('user_id', $userId)
            ->where('is_used', false)
            ->update(['is_used' => true]);

        // Generate kode 5 digit
        $code = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);

        // Simpan ke database dengan masa berlaku 2 menit
        $verification = EmailVerification::create([
            'user_id' => $userId,
            'email'   => $email,
            'code'    => $code,
            'expires_at' => now()->addMinutes(2),
        ]);

        // Kirim email OTP
        Mail::to($email)->send(new OtpMail($code));

        return $verification;
    }

    /**
     * Verifikasi kode OTP yang dimasukkan user.
     */
    public function verify(int $userId, string $code): bool
    {
        $verification = EmailVerification::where('user_id', $userId)
            ->where('code', $code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$verification) {
            return false;
        }

        $verification->update(['is_used' => true]);

        return true;
    }
}
