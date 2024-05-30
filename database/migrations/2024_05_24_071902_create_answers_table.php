<?php

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Output\ConsoleOutput;
use Symfony\Component\Console\Helper\ProgressBar;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('answers')) {
            Schema::create('answers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('questionnaire_survey_id')->references('id')->on('questionnaire_survey')->cascadeOnDelete();
                $table->foreignIdFor(Question::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(Choice::class)->nullable()->constrained()->nullOnDelete();
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

        $progress = new ProgressBar(new ConsoleOutput(), QuestionnaireSurvey::count());

        $progress->start();
        QuestionnaireSurvey::with('questionnaire.choices', 'survey')
            ->get()
            ?->each(function (QuestionnaireSurvey $qs) use ($progress) {
                $answers_assoc = json_decode($qs->answers, true);
                if (!$answers_assoc) {
                    return;
                }
                foreach ($answers_assoc as $answer_assoc) {

                    $question = $qs->questionnaire->questions()->whereOldId($answer_assoc['id'])->first();

                    $value = $answer_assoc['answer'];

                    if ($question->reversed && $qs->questionnaire->type !== 'EDI') {
                        $possibleScores = $qs->questionnaire->choices->pluck('points')->toArray();
                        $value = min($possibleScores) + max($possibleScores) - $value;
                    } else {
                        if ($question->reversed && $qs->questionnaire->type === 'EDI') {
                            $value = 5 - $value;
                        }
                    }

                    if ($qs->questionnaire->type === 'EDI') {
                        $value = max($value - 2, 0);
                    }

                    $answer = Answer::make([
                        'value' => $value,
                        'comment' => $answer_assoc['comment'] ?? null,
                    ]);
                    $answer->questionnaireSurvey()->associate($qs);
                    $answer->question()->associate($question)->save();

                    $questionnaireType = $qs->questionnaire->type;

                    $choice = $qs
                        ->questionnaire
                        ?->choices
                        ?->first(function (Choice $choice) use ($questionnaireType, $answer_assoc) {
                            if ($questionnaireType !== 'EDI') {
                                return $answer_assoc['answer'] === $choice->points;
                            }
                            $choiceText = match ($answer_assoc['answer']) {
                                0 => 'Mai',
                                1 => 'Raramente',
                                2 => 'Talvolta',
                                3 => 'Spesso',
                                4 => 'Di solito',
                                5 => 'Sempre',
                                default => null
                            };
                            return $choice->text === $choiceText;
                        });

                    if ($choice) {
                        $answer->choice()->associate($choice)->save();
                    }
                }
                $progress->advance();
            });
        $progress->finish();

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
