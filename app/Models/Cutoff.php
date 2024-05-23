<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cutoff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'from',
        'to',
        'type',
        'gender_based',
        'fem_from',
        'fem_to',
        'gender_based',
    ];

    public function variable(): BelongsTo
    {
        return $this->belongsTo(Variable::class);
    }
}
