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
                $table->foreignIdFor(Questionnaire::class)->constrained()->cascadeOnDelete();
                $table->text('text')->nullable();
                $table->boolean('reversed')->default(false);
                $table->json('custom_choices')->nullable();
                $table->tinyInteger('order')->unsigned()->default(0);
                $table->integer('old_id')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        Questionnaire::all()->each(function (Questionnaire $questionnaire) {
            $items = json_decode($questionnaire->items, true);
            foreach ($items as $key => $item) {
                $questionnaire->questions()->orderByDesc('id')->first();
                $questionnaire->questions()->create([
                    'text' => $item['text'],
                    'reversed' => $item['reversed'] ?? false,
                    'custom_choices' => $item['multipleAnswers'] ?? null,
                    'old_id' => $item['id'] ?? null,
                    'order' => $key + 1,
                ]);
            }
        });

        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropColumn('items');
        });
    }

    public function down(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            if (!Schema::hasColumn('questionnaires', 'items')) {
                $table->text('items')->nullable()->after('type');
            }
        });

        Questionnaire::withoutTouching(function () {
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
        });

        Schema::dropIfExists('questions');
    }
};
