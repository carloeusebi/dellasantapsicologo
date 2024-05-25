<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use SoftDeletes;

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class)
            ->withArchived();
    }

    public function questionnaires(): BelongsToMany
    {
        return $this->belongsToMany(Questionnaire::class)
            ->using(QuestionnaireSurvey::class);
    }
}
