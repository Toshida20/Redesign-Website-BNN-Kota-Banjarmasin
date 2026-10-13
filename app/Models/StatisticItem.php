<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatisticItem extends Model
{
    use HasFactory;

    protected $table = 'statistic_items';

    protected $fillable = [
        'statistic_section_id',
        'tahun_label',
        'image_path',
        'link_pdf',
        'sort_order',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(StatisticSection::class, 'statistic_section_id');
    }
}
