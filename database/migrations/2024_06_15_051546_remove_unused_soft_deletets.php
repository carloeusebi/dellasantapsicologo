<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('cutoffs', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropTimestamps();
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropTimestamps();
        });
        Schema::table('variables', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropTimestamps();
        });

    }

    public function down(): void
    {
        Schema::table('cutoffs', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('variables', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
