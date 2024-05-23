<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variable extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'questionnaire_id',
        'name',
    ];

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
