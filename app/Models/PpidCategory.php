<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PpidCategory extends Model
{
    use HasFactory;

    protected $table = 'ppid_categories';

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'sort_order',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(PpidDocument::class, 'ppid_category_id')->orderBy('sort_order', 'asc');
    }
}
