<?php

use App\Models\Answer;
use App\Models\Choice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('answers', 'choice_id')) {
            Schema::table('answers', function (Blueprint $table) {
                $table->foreignIdFor(Choice::class)->nullable()->after('question_id');
            });
        }

        Answer::with('questionnaireSurvey.questionnaire.choices')
            ->get()
            ?->each(function (Answer $answer) {
                $questionnaireType = $answer->questionnaireSurvey->questionnaire->type;
                $choice = $answer->questionnaireSurvey
                    ->questionnaire
                    ?->choices
                    ?->first(function (Choice $choice) use ($questionnaireType, $answer) {
                        if ($questionnaireType !== 'EDI') {
                            return $answer->value === $choice->points;
                        }
                        $choiceText = match ($answer->value) {
                            0 => 'Mai',
                            1 => 'Raramente',
                            2 => 'Talvolta',
                            3 => 'Spesso',
                            4 => 'Di solito',
                            5 => 'Sempre'
                        };
                        return $choice->text === $choiceText;
                    }
                    );
                if ($choice) {
                    $answer->choice()->associate($choice)->save();
                }
            });
    }

    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeignIdFor(Choice::class);
        });
    }
};
