<?php

use App\Models\Choice;
use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Question::whereNull('text')->delete();

        $scid = Questionnaire::query()
            ->with('questions.choices')
            ->withCount('choices')
            ->firstWhere('title', 'SCID 5-PD Questionario');

        if (! $scid || $scid->choices_count > 0) {
            return;
        }

        $scid->questions->first()->choices->each(function (Choice $choice) use ($scid) {
            $clone = $choice->replicate();
            $scid->choices()->save($clone);
        });

        $scid->questions->each(function (Question $question) {
            $question->choices()->delete();
        });
    }
};
