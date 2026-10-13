<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman kelola profil pengguna.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Perbarui data profil pengguna (Nama, Avatar).
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'avatar'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:3072'],
            'avatar_data' => ['nullable', 'string'], // Data base64 dari kamera
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'avatar.image'  => 'File avatar harus berupa gambar.',
            'avatar.mimes'  => 'Format gambar yang didukung: JPG, JPEG, PNG, WEBP, AVIF.',
            'avatar.max'    => 'Ukuran foto maksimal adalah 3MB.',
        ]);

        $user->name = $request->name;

        // 1. Jika ada upload file dari perangkat
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada di storage
            if ($user->avatar && Str::startsWith($user->avatar, 'storage/avatars/')) {
                $oldPath = str_replace('storage/', '', $user->avatar);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('avatar');
            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('avatars', $filename, 'public');
            $user->avatar = 'storage/avatars/' . $filename;
        }
        // 2. Jika ada data base64 dari tangkapan kamera
        elseif ($request->filled('avatar_data')) {
            $avatarData = $request->avatar_data;
            if (preg_match('/^data:image\/(\w+);base64,/', $avatarData, $type)) {
                $avatarData = substr($avatarData, strpos($avatarData, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, etc.
                $avatarData = base64_decode($avatarData);

                if ($avatarData !== false) {
                    // Hapus avatar lama jika ada
                    if ($user->avatar && Str::startsWith($user->avatar, 'storage/avatars/')) {
                        $oldPath = str_replace('storage/', '', $user->avatar);
                        Storage::disk('public')->delete($oldPath);
                    }

                    $filename = 'avatar_' . $user->id . '_' . time() . '.' . ($type === 'jpeg' ? 'jpg' : $type);
                    Storage::disk('public')->put('avatars/' . $filename, $avatarData);
                    $user->avatar = 'storage/avatars/' . $filename;
                }
            }
        }

        $user->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui!',
                'avatar'  => asset($user->avatar),
                'name'    => $user->name,
            ]);
        }

        return back()->with('status_profile', 'Profil Anda berhasil disimpan!');
    }

    /**
     * Perbarui kata sandi akun pengguna (Reset Password).
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required'         => 'Password baru wajib diisi.',
            'password.min'              => 'Password baru minimal harus 8 karakter.',
            'password.confirmed'        => 'Konfirmasi password baru tidak cocok.',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password saat ini yang Anda masukkan salah.',
                ], 422);
            }
            return back()->withErrors(['current_password' => 'Password saat ini yang Anda masukkan salah.'])->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Password berhasil diubah!',
            ]);
        }

        return back()->with('status_password', 'Password Anda berhasil diperbarui!');
    }
}
