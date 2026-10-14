<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'user_id',
        'category',         // 'penyalahgunaan_narkoba', 'aspirasi_masyarakat', 'whistleblowing', 'pelaporan_gratifikasi'
        'ticket_number',    // Kode unik tiket laporan (contoh: LAP-NRK-20261014-XXXX)
        'title',            // Pokok/judul laporan
        'description',      // Kronologi / detail isi laporan
        'incident_date',    // Tanggal kejadian peristiwa
        'incident_location',// Lokasi/tempat kejadian
        'suspect_name',     // Nama pihak yang dilaporkan
        'evidence_file',    // File lampiran bukti
        'status',           // 'pending', 'diproses', 'selesai', 'ditolak'
        'admin_notes',      // Catatan/tanggapan dari admin

        // P4GN Specific Fields
        'pelapor_phone',
        'pelapor_address',
        'terlapor_name',
        'terlapor_phone',
        'terlapor_address',
        'lokasi_photos',
        'jenis_narkoba',
        'jumlah_narkoba',
        'peran_terlapor',
        'pekerjaan_terlapor',
        'alamat_kejadian',
        'kendaraan_terlapor',
        'kendaraan_photos',
        'uraian_transaksi',
        'lokasi_nongkrong',
        'sumber_informasi',
        'pernyataan_valid',
    ];

    protected $casts = [
        'incident_date' => 'date',
        'pelapor_address' => 'array',
        'terlapor_address' => 'array',
        'alamat_kejadian' => 'array',
        'lokasi_photos' => 'array',
        'kendaraan_photos' => 'array',
        'jenis_narkoba' => 'array',
        'pernyataan_valid' => 'boolean',
    ];

    /**
     * Relasi ke pembuat laporan (User)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope filter berdasarkan kategori/jenis laporan
     */
    public function scopeByCategory($query, $category)
    {
        if (!empty($category)) {
            return $query->where('category', $category);
        }
        return $query;
    }

    /**
     * Scope filter tanggal, bulan, dan tahun pembuatan laporan
     */
    public function scopeFilterDate($query, $day = null, $month = null, $year = null)
    {
        if (!empty($day)) {
            $query->whereDay('created_at', $day);
        }
        if (!empty($month)) {
            $query->whereMonth('created_at', $month);
        }
        if (!empty($year)) {
            $query->whereYear('created_at', $year);
        }
        return $query;
    }

    /**
     * Scope filter status laporan
     */
    public function scopeByStatus($query, $status)
    {
        if (!empty($status)) {
            return $query->where('status', $status);
        }
        return $query;
    }
}
