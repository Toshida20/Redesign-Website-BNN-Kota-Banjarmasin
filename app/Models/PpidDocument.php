<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpidDocument extends Model
{
    use HasFactory;

    protected $table = 'ppid_documents';

    protected $fillable = [
        'ppid_category_id',
        'user_id',
        'nama_dokumen',
        'tahun',
        'file_pdf',
        'keterangan',
        'download_count',
        'sort_order',
    ];

    protected $casts = [
        'download_count' => 'integer',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PpidCategory::class, 'ppid_category_id');
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
