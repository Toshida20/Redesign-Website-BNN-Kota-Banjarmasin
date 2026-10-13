<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LhkpnDocument extends Model
{
    use HasFactory;

    protected $table = 'lhkpn_documents';

    protected $fillable = [
        'lhkpn_table_id',
        'nama_dokumen',
        'file_pdf',
        'keterangan',
        'sort_order',
    ];

    public function table(): BelongsTo
    {
        return $this->belongsTo(LhkpnTable::class, 'lhkpn_table_id');
    }
}
