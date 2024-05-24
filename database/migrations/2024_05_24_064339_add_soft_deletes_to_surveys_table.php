<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->softDeletes()->after('token');
        });
    }

    public function down(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
};
