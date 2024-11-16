<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('questions', 'questionnaires');
        Schema::rename('question_survey', 'questionnaire_survey');
        Schema::rename('question_tag', 'questionnaire_tag');

        Schema::table('questionnaire_survey', function (Blueprint $table) {
            $table->renameColumn('question_id', 'questionnaire_id');
        });
        Schema::table('questionnaire_tag', function (Blueprint $table) {
            $table->renameColumn('question_id', 'questionnaire_id');
        });
    }

    public function down(): void
    {
        Schema::rename('questionnaires', 'questions');
        Schema::rename('questionnaire_survey', 'question_survey');
        Schema::rename('questionnaire_tag', 'question_tag');

        Schema::table('question_survey', function (Blueprint $table) {
            $table->renameColumn('questionnaire_id', 'question_id');
        });
        Schema::table('question_tag', function (Blueprint $table) {
            $table->renameColumn('questionnaire_id', 'question_id');
        });
    }
};
