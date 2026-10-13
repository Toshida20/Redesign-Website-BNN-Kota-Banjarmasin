<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LhkpnCategory extends Model
{
    use HasFactory;

    protected $table = 'lhkpn_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function reports(): BelongsToMany
    {
        return $this->belongsToMany(LhkpnReport::class, 'lhkpn_report_category', 'lhkpn_category_id', 'lhkpn_report_id');
    }
}
