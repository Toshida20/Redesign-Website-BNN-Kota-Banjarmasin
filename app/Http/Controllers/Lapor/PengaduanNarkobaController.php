<?php

namespace App\Http\Controllers\Lapor;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengaduanNarkobaController extends Controller
{
    /**
     * Tampilkan form Laporan Penyalahgunaan Narkoba
     * Terbuka untuk umum (guest melihat form dalam keadaan blur + prompt login)
     */
    public function index()
    {
        return view('layouts.LAPOR.pengaduan-bnn.penyalahgunaan-narkoba.index');
    }

    /**
     * Simpan laporan dari user yang login
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus masuk ke akun terlebih dahulu untuk mengirim laporan.');
        }

        $validated = $request->validate([
            'pelapor_phone' => 'nullable|string|max:30',
            'pelapor_jalan' => 'nullable|string|max:255',
            'pelapor_wilayah' => 'nullable|string|max:255',
            'pelapor_kota' => 'nullable|string|max:255',
            'pelapor_provinsi' => 'nullable|string|max:255',
            'pelapor_kodepos' => 'nullable|string|max:20',

            'terlapor_name' => 'nullable|string|max:255',
            'terlapor_phone' => 'nullable|string|max:30',
            'terlapor_jalan' => 'nullable|string|max:255',
            'terlapor_wilayah' => 'nullable|string|max:255',
            'terlapor_kota' => 'nullable|string|max:255',
            'terlapor_provinsi' => 'nullable|string|max:255',
            'terlapor_kodepos' => 'nullable|string|max:20',

            'lokasi_photos.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'jenis_narkoba' => 'nullable|array',
            'jenis_narkoba_lainnya' => 'nullable|string|max:500',
            'jumlah_narkoba' => 'nullable|string|max:255',
            'peran_terlapor' => 'nullable|string|in:Pengguna,Bandar,Pengedar,Kurir,Lainnya',
            'peran_terlapor_lainnya' => 'nullable|string|max:255',
            'pekerjaan_terlapor' => 'nullable|string|max:255',

            'kejadian_jalan' => 'nullable|string|max:255',
            'kejadian_wilayah' => 'nullable|string|max:255',
            'kejadian_kota' => 'nullable|string|max:255',
            'kejadian_provinsi' => 'nullable|string|max:255',
            'kejadian_kodepos' => 'nullable|string|max:20',

            'kendaraan_terlapor' => 'nullable|string|max:255',
            'kendaraan_photos.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',

            'uraian_transaksi' => 'nullable|string',
            'lokasi_nongkrong' => 'nullable|string',
            'sumber_informasi' => 'nullable|string',
            'pernyataan_valid' => 'accepted',
        ]);

        // Upload foto lokasi (maks 5)
        $lokasiPaths = [];
        if ($request->hasFile('lokasi_photos')) {
            foreach ($request->file('lokasi_photos') as $file) {
                if (count($lokasiPaths) < 5) {
                    $lokasiPaths[] = $file->store('reports/lokasi', 'public');
                }
            }
        }

        // Upload foto kendaraan (maks 5)
        $kendaraanPaths = [];
        if ($request->hasFile('kendaraan_photos')) {
            foreach ($request->file('kendaraan_photos') as $file) {
                if (count($kendaraanPaths) < 5) {
                    $kendaraanPaths[] = $file->store('reports/kendaraan', 'public');
                }
            }
        }

        $pelaporAddress = [
            'jalan' => $validated['pelapor_jalan'] ?? '',
            'wilayah' => $validated['pelapor_wilayah'] ?? '',
            'kota' => $validated['pelapor_kota'] ?? '',
            'provinsi' => $validated['pelapor_provinsi'] ?? '',
            'kodepos' => $validated['pelapor_kodepos'] ?? '',
        ];

        $terlaporAddress = [
            'jalan' => $validated['terlapor_jalan'] ?? '',
            'wilayah' => $validated['terlapor_wilayah'] ?? '',
            'kota' => $validated['terlapor_kota'] ?? '',
            'provinsi' => $validated['terlapor_provinsi'] ?? '',
            'kodepos' => $validated['terlapor_kodepos'] ?? '',
        ];

        $alamatKejadian = [
            'jalan' => $validated['kejadian_jalan'] ?? '',
            'wilayah' => $validated['kejadian_wilayah'] ?? '',
            'kota' => $validated['kejadian_kota'] ?? '',
            'provinsi' => $validated['kejadian_provinsi'] ?? '',
            'kodepos' => $validated['kejadian_kodepos'] ?? '',
        ];

        // Format jenis narkoba termasuk jika ada opsi "Lainnya"
        $jenisNarkoba = $validated['jenis_narkoba'] ?? [];
        if (in_array('Lainnya', $jenisNarkoba) && !empty($validated['jenis_narkoba_lainnya'])) {
            $key = array_search('Lainnya', $jenisNarkoba);
            $jenisNarkoba[$key] = 'Lainnya: ' . $validated['jenis_narkoba_lainnya'];
        }

        // Format peran terlapor termasuk jika ada opsi "Lainnya"
        $peranTerlapor = $validated['peran_terlapor'] ?? null;
        if ($peranTerlapor === 'Lainnya' && !empty($validated['peran_terlapor_lainnya'])) {
            $peranTerlapor = 'Lainnya: ' . $validated['peran_terlapor_lainnya'];
        }

        // Buat nomor tiket unik (contoh: LAP-NRK-20261014-XXXXX)
        $ticketNumber = 'LAP-NRK-' . date('Ymd') . '-' . strtoupper(Str::random(5));

        // Format judul ringkas
        $jenisStr = !empty($jenisNarkoba) ? implode(', ', $jenisNarkoba) : 'Penyalahgunaan Narkoba';
        $reportTitle = 'Laporan Narkoba (' . $jenisStr . ') - Terlapor: ' . ($validated['terlapor_name'] ?? 'Dalam Penyelidikan');

        Report::create([
            'user_id' => Auth::id(),
            'category' => 'penyalahgunaan_narkoba',
            'ticket_number' => $ticketNumber,
            'title' => $reportTitle,
            'description' => $validated['uraian_transaksi'] ?? '-',
            'incident_date' => now(),
            'incident_location' => $validated['kejadian_jalan'] ?? ($validated['terlapor_jalan'] ?? 'Banjarmasin'),
            'suspect_name' => $validated['terlapor_name'] ?? null,
            'evidence_file' => !empty($lokasiPaths) ? $lokasiPaths[0] : (!empty($kendaraanPaths) ? $kendaraanPaths[0] : null),
            'status' => 'pending',

            'pelapor_phone' => $validated['pelapor_phone'] ?? Auth::user()->phone,
            'pelapor_address' => $pelaporAddress,
            'terlapor_name' => $validated['terlapor_name'] ?? null,
            'terlapor_phone' => $validated['terlapor_phone'] ?? null,
            'terlapor_address' => $terlaporAddress,

            'lokasi_photos' => $lokasiPaths,
            'jenis_narkoba' => $jenisNarkoba,
            'jumlah_narkoba' => $validated['jumlah_narkoba'] ?? null,
            'peran_terlapor' => $peranTerlapor,
            'pekerjaan_terlapor' => $validated['pekerjaan_terlapor'] ?? null,
            'alamat_kejadian' => $alamatKejadian,

            'kendaraan_terlapor' => $validated['kendaraan_terlapor'] ?? null,
            'kendaraan_photos' => $kendaraanPaths,

            'uraian_transaksi' => $validated['uraian_transaksi'] ?? null,
            'lokasi_nongkrong' => $validated['lokasi_nongkrong'] ?? null,
            'sumber_informasi' => $validated['sumber_informasi'] ?? null,
            'pernyataan_valid' => true,
        ]);

        return redirect()->back()->with('success', 'Laporan penyalahgunaan narkoba berhasil dikirimkan. Nomor Registrasi / Tiket Anda: ' . $ticketNumber . '. Identitas Anda dirahasiakan sepenuhnya.');
    }
}
