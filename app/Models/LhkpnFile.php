<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LhkpnFile extends Model
{
    use HasFactory;

    protected $table = 'lhkpn_files';

    protected $fillable = [
        'lhkpn_pejabat_id',
        'tahun',
        'judul_laporan',
        'file_pdf',
        'sort_order',
    ];

    public function pejabat(): BelongsTo
    {
        return $this->belongsTo(LhkpnPejabat::class, 'lhkpn_pejabat_id');
    }
}
