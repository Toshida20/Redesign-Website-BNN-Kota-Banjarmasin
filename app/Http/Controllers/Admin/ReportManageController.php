<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportManageController extends Controller
{
    /**
     * Halaman Utama Menu "Lihat Laporan" (Dashboard Ringkasan / Kategori)
     */
    public function index()
    {
        $counts = [
            'total' => Report::count(),
            'pending' => Report::where('status', 'pending')->count(),
            'narkoba' => Report::where('category', 'penyalahgunaan_narkoba')->count(),
            'aspirasi' => Report::where('category', 'aspirasi_masyarakat')->count(),
            'whistleblowing' => Report::where('category', 'whistleblowing')->count(),
            'gratifikasi' => Report::where('category', 'pelaporan_gratifikasi')->count(),
        ];

        return view('admin.reports.index', compact('counts'));
    }

    /**
     * Daftar Laporan Penyalahgunaan Narkoba (dengan Filter Tanggal, Bulan, Tahun)
     */
    public function narkoba(Request $request)
    {
        $query = Report::with('user')
            ->where('category', 'penyalahgunaan_narkoba')
            ->filterDate($request->day, $request->month, $request->year)
            ->byStatus($request->status);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ticket_number', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('incident_location', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $reports = $query->latest()->paginate(10)->withQueryString();

        return view('admin.reports.penyalahgunaan-narkoba.index', compact('reports'));
    }

    /**
     * Daftar Aspirasi Masyarakat (dengan Filter Tanggal, Bulan, Tahun)
     */
    public function aspirasi(Request $request)
    {
        $query = Report::with('user')
            ->where('category', 'aspirasi_masyarakat')
            ->filterDate($request->day, $request->month, $request->year)
            ->byStatus($request->status);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ticket_number', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $reports = $query->latest()->paginate(10)->withQueryString();

        return view('admin.reports.aspirasi-masyarakat.index', compact('reports'));
    }

    /**
     * Daftar Whistleblowing & Pengaduan Pelayanan Publik
     */
    public function whistleblowing(Request $request)
    {
        $query = Report::with('user')
            ->where('category', 'whistleblowing')
            ->filterDate($request->day, $request->month, $request->year)
            ->byStatus($request->status);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ticket_number', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $reports = $query->latest()->paginate(10)->withQueryString();

        return view('admin.reports.whistleblowing.index', compact('reports'));
    }

    /**
     * Daftar Pelaporan Gratifikasi
     */
    public function gratifikasi(Request $request)
    {
        $query = Report::with('user')
            ->where('category', 'pelaporan_gratifikasi')
            ->filterDate($request->day, $request->month, $request->year)
            ->byStatus($request->status);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ticket_number', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $reports = $query->latest()->paginate(10)->withQueryString();

        return view('admin.reports.pelaporan-gratifikasi.index', compact('reports'));
    }

    /**
     * Detail Laporan
     */
    public function show($id)
    {
        $report = Report::with('user')->findOrFail($id);

        $viewMap = [
            'penyalahgunaan_narkoba' => 'admin.reports.penyalahgunaan-narkoba.show',
            'aspirasi_masyarakat' => 'admin.reports.aspirasi-masyarakat.show',
            'whistleblowing' => 'admin.reports.whistleblowing.show',
            'pelaporan_gratifikasi' => 'admin.reports.pelaporan-gratifikasi.show',
        ];

        $view = $viewMap[$report->category] ?? 'admin.reports.show';

        return view($view, compact('report'));
    }

    /**
     * Update Status Laporan & Catatan Admin
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,ditolak',
            'admin_notes' => 'nullable|string',
        ]);

        $report = Report::findOrFail($id);
        $report->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', 'Status laporan ' . $report->ticket_number . ' berhasil diperbarui.');
    }
}
