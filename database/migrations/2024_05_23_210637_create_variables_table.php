<?php

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Variable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Questionnaire::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->boolean('gender_based')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('question_variable', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Question::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Variable::class)->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_variable');
        Schema::dropIfExists('variables');
    }
};
