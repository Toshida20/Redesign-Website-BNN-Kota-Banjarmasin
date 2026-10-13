<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BnnLeader extends Model
{
    use HasFactory;

    protected $table = 'bnn_leaders';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'pangkat',
        'nrp',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan_terakhir',
        'mulai_menjabat',
        'akhir_menjabat',
        'periode',
        'is_active',
        'sort_order',
        'biografi',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
