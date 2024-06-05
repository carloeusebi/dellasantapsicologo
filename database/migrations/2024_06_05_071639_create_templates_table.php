<?php

use App\Models\Questionnaire;
use App\Models\Tag;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->text('description');
            $table->boolean('visible');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('questionnaire_template', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Questionnaire::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Template::class)->constrained()->cascadeOnDelete();
        });

        Schema::create('tag_template', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Template::class)->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_tag');
        Schema::dropIfExists('questionnaire_template');
        Schema::dropIfExists('templates');
    }
};
