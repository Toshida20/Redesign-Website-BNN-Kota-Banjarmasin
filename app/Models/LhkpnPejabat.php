<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LhkpnPejabat extends Model
{
    use HasFactory;

    protected $table = 'lhkpn_pejabats';

    protected $fillable = [
        'lhkpn_report_id',
        'pejabat_number',
        'nama_jabatan',
        'sort_order',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(LhkpnReport::class, 'lhkpn_report_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(LhkpnFile::class, 'lhkpn_pejabat_id')->orderBy('sort_order', 'asc');
    }
}
