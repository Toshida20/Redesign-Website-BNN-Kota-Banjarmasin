<?php

namespace App\Http\Controllers\Lapor;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GratifikasiController extends Controller
{
    /**
     * Tampilkan form Pelaporan Gratifikasi
     */
    public function index()
    {
        return view('layouts.LAPOR.pengaduan-bnn.pelaporan-gratifikasi.index');
    }

    /**
     * Simpan laporan gratifikasi dari user yang login
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'incident_date' => 'nullable|date',
            'incident_location' => 'nullable|string|max:255',
            'suspect_name' => 'nullable|string|max:255',
            'evidence_file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx|max:10240',
        ]);

        $filePath = null;
        if ($request->hasFile('evidence_file')) {
            $filePath = $request->file('evidence_file')->store('evidence/gratifikasi', 'public');
        }

        $ticketNumber = 'LAP-GRF-' . date('Ymd') . '-' . strtoupper(Str::random(5));

        Report::create([
            'user_id' => Auth::id(),
            'category' => 'pelaporan_gratifikasi',
            'ticket_number' => $ticketNumber,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'incident_date' => $validated['incident_date'] ?? now(),
            'incident_location' => $validated['incident_location'] ?? null,
            'suspect_name' => $validated['suspect_name'] ?? null,
            'evidence_file' => $filePath,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Laporan gratifikasi berhasil dikirim. Nomor tiket: ' . $ticketNumber);
    }
}
