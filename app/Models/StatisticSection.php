<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatisticSection extends Model
{
    use HasFactory;

    protected $table = 'statistic_sections';

    protected $fillable = [
        'statistic_report_id',
        'section_number',
        'title',
        'type',
        'sort_order',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(StatisticReport::class, 'statistic_report_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(StatisticItem::class, 'statistic_section_id')->orderBy('sort_order', 'asc');
    }
}
