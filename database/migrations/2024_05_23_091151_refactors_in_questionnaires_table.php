<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->renameColumn('question', 'title');
            $table->softDeletes()->after('not_current');
        });
    }

    public function down(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->renameColumn('title', 'question');
            $table->dropSoftDeletes();
        });
    }
};
