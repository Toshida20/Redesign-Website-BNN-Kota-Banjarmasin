<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatisticReport extends Model
{
    use HasFactory;

    protected $table = 'statistic_reports';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'thumbnail',
        'published_at',
        'views_count',
        'status',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'views_count' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(StatisticSection::class, 'statistic_report_id')->orderBy('section_number', 'asc');
    }
}
