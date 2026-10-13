<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LhkpnReport extends Model
{
    use HasFactory;

    protected $table = 'lhkpn_reports';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'periode',
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

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(LhkpnCategory::class, 'lhkpn_report_category', 'lhkpn_report_id', 'lhkpn_category_id');
    }

    public function tables(): HasMany
    {
        return $this->hasMany(LhkpnTable::class, 'lhkpn_report_id')->orderBy('table_number', 'asc');
    }

    public function pejabats(): HasMany
    {
        return $this->hasMany(LhkpnPejabat::class, 'lhkpn_report_id')->orderBy('sort_order', 'asc');
    }

    public function scopeTerkini($query, $limit = 5)
    {
        return $query->where('status', 'published')->orderBy('published_at', 'desc')->limit($limit);
    }

    public function scopePopuler($query, $limit = 5)
    {
        return $query->where('status', 'published')->orderBy('views_count', 'desc')->limit($limit);
    }
}
