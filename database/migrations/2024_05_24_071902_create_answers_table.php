<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('answers')) {
            Schema::create('answers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('questionnaire_survey_id')->references('id')->on('questionnaire_survey')->cascadeOnDelete();
                $table->foreignIdFor(Question::class)->constrained()->cascadeOnDelete();
                $table->tinyInteger('value');
                $table->text('comment')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        if (Schema::hasColumn('questions', 'answers')) {
            Schema::table('questions', function (Blueprint $table) {
                $table->renameColumn('answers', 'custom_answers');
            });
        }

        QuestionnaireSurvey::with('questionnaire', 'survey')->get()->each(function (QuestionnaireSurvey $qs) {
            $answers_assoc = json_decode($qs->answers, true);
            if (!$answers_assoc) {
                return;
            }
            foreach ($answers_assoc as $answer_assoc) {
                $answer = Answer::make([
                    'value' => $answer_assoc['answer'],
                    'comment' => $answer_assoc['comment'] ?? null,
                ]);
                $answer->questionnaireSurvey()->associate($qs);
                $question = $qs->questionnaire->questions()->whereOldId($answer_assoc['id'])->first();
                $answer->question()->associate($question)->save();
            }
        });

        if (Schema::hasColumn('questionnaire_survey', 'answers')) {
            Schema::table('questionnaire_survey', function (Blueprint $table) {
                $table->dropColumn('answers');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('questionnaire_survey', 'answers')) {
            Schema::table('questionnaire_survey', function (Blueprint $table) {
                $table->json('answers')->nullable()->after('survey_id');
            });
        }

        QuestionnaireSurvey::all()->each(function (QuestionnaireSurvey $qs) {
            $answers = [];
            $qs->answers()->with('question')->get()?->each(function (Answer $answer) use (&$answers) {
                $new_assoc_answer = [
                    'id' => $answer->question->old_id,
                    'answer' => $answer->value,
                ];
                if ($answer->comment) {
                    $new_assoc_answer['comment'] = $answer->comment;
                }
                $answers[] = $new_assoc_answer;
            });
            /** @noinspection SqlResolve */
            Db::statement("UPDATE questionnaire_survey SET answers = ? WHERE `questionnaire_survey`.`id` = ?",
                [json_encode($answers), $qs->id]);
        });

        Schema::dropIfExists('answers');
    }
};
