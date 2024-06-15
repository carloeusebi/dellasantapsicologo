<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('custom_choices');
            $table->dropColumn('old_id');
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->json('custom_choices')->nullable()->after('reversed');
            $table->tinyInteger('old_id')->nullable()->after('order');
        });
    }
};
