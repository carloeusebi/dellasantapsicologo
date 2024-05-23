<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    public function surveys(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function firstQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'first_question_id');
    }
}
