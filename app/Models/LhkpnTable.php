<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LhkpnTable extends Model
{
    use HasFactory;

    protected $table = 'lhkpn_tables';

    protected $fillable = [
        'lhkpn_report_id',
        'table_number',
        'title',
        'sort_order',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(LhkpnReport::class, 'lhkpn_report_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(LhkpnDocument::class, 'lhkpn_table_id')->orderBy('sort_order', 'asc');
    }
}
