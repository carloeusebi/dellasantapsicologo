<?php

use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('questions')) {
            Schema::create('questions', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Questionnaire::class)->constrained();
                $table->text('text');
                $table->boolean('reversed')->default(false);
                $table->json('answers')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });

            Schema::table('questions', function (Blueprint $table) {
                $table->foreignId('previous_question')->after('questionnaire_id')->nullable()->references('id')->on('questions')->nullOnDelete();
                $table->foreignId('next_question')->after('previous_question')->nullable()->references('id')->on('questions')->nullOnDelete();
            });

        }
        if (!Schema::hasColumn('questionnaires', 'first_question_id')) {
            Schema::table('questionnaires', function (Blueprint $table) {
                $table->foreignId('first_question_id')->after('id')->nullable()->references('id')->on('questions')->nullOnDelete();
            });
        }

        Questionnaire::all()->each(function (Questionnaire $questionnaire) {
            $items = json_decode($questionnaire->items, true);
            foreach ($items as $key => $item) {
                $previousQuestion = $questionnaire->questions()->orderByDesc('id')->first();
                $question = $questionnaire->questions()->create([
                    'text' => $item['text'],
                    'reversed' => $item['reversed'] ?? false,
                    'answers' => $item['multipleAnswers'] ?? null,
                ]);
                if ($key !== 0) {
                    $question->previousQuestion()->associate($previousQuestion)->save();
                    $previousQuestion?->nextQuestion()->associate($question)->save();
                } else {
                    $questionnaire->firstQuestion()->associate($question)->save();
                }
            }
        });

        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropColumn('items');
        });
    }

    public function down(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropForeign('questionnaires_first_question_id_foreign');
            $table->dropColumn('first_question_id');
            if (!Schema::hasColumn('questionnaires', 'items')) {
                $table->text('items')->nullable()->after('type');
            }
        });

        Questionnaire::with('questions')->get()->each(function (Questionnaire $questionnaire) {
            $items = [];
            $questionnaire->questions->each(function (Question $question, int $key) use (&$items) {
                $items[] = [
                    'id' => $key + 1,
                    'text' => $question->text,
                    'reversed' => $question->reversed,
                    'multipleAnswers' => $question->answers,
                    'hasMultipleAnswers' => isset($question->answers) && count($question->answers) > 0,
                ];
            });
            $questionnaire->items = $items;
            $questionnaire->save();
        });

        Schema::dropIfExists('questions');
    }
};
