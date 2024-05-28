<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionnaire extends Model
{
    use SoftDeletes;

    public function surveys(): BelongsToMany
    {
        return $this->belongsToMany(Survey::class)
            ->using(QuestionnaireSurvey::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)
            ->orderBy('order');
    }

    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    public function firstQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'first_question_id');
    }

    public function variables(): HasMany
    {
        return $this->hasMany(Variable::class);
    }

    public function cutoffs(): HasManyThrough
    {
        return $this->hasManyThrough(Cutoff::class, Variable::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
