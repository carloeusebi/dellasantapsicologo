<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'text',
        'questionnaire_id',
        'previous_question',
        'next_question',
        'custom_choices', // Leave this here for backwards compatibility
        'reversed',
        'order',
        'old_id',
    ];

    protected $casts = [
        'reversed' => 'boolean',
        'custom_choices' => 'array', // Leave this here for backwards compatibility
    ];

    protected $touches = ['questionnaire'];

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (Question $question): void {
            DB::table('choices')
                ->where('questionable_type', 'App\Models\Question')
                ->where('questionable_id', $question->id)
                ->delete();
        });
    }

    public function calculateScore(Choice $choice): int
    {
        if (!$this->reversed) {
            return $choice->points;
        }

        $choices = $this->choices->isEmpty() ? $this->questionnaire->choices : $this->choices;

        return get_reversed_choice($choices, $choice)->points;
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function choices(): MorphMany
    {
        return $this->morphMany(Choice::class, 'questionable');
    }
}
