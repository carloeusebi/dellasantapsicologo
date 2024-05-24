<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variable extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'gender_based'
    ];

    public function casts(): array
    {
        return [
            'gender_based' => 'boolean'
        ];
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }

    public function cutoffs(): HasMany
    {
        return $this->hasMany(Cutoff::class);
    }
}
