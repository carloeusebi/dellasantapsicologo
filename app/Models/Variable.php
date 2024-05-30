<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /** @noinspection PhpUnused */
    public function score(): Attribute
    {
        return Attribute::make(fn() => array_reduce($this->questions->map(
            fn(Question $question) => $question->answers->first()?->value ?? 0)->flatten()->toArray(),
            fn(int $total, $answerValue) => $total + $answerValue, 0)
        );
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
