<?php

namespace App\Http\Controllers\Lapor;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AspirasiController extends Controller
{
    /**
     * Tampilkan form Aspirasi Masyarakat
     * Dapat diakses oleh umum (guest melihat form blur + prompt login)
     */
    public function index()
    {
        return view('layouts.LAPOR.aspirasi-masyarakat.index');
    }

    /**
     * Simpan aspirasi dari user yang login
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus masuk ke akun terlebih dahulu untuk mengirim aspirasi.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ticketNumber = 'LAP-ASP-' . date('Ymd') . '-' . strtoupper(Str::random(5));

        Report::create([
            'user_id' => Auth::id(),
            'category' => 'aspirasi_masyarakat',
            'ticket_number' => $ticketNumber,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'incident_date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Aspirasi Anda berhasil dikirimkan. Nomor Registrasi / Tiket: ' . $ticketNumber . '. Terima kasih atas partisipasi Anda!');
    }
}
