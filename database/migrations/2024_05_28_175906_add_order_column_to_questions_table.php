<?php

use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->integer('order')->default(0)->after('custom_answers');
        });

        Questionnaire::with('questions')->each(function (Questionnaire $questionnaire) {
            $questionnaire->questions->each(function (Question $question, int $index) {
                $question->update(['order' => $index + 1]);
            });
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
