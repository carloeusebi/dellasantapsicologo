<?php

use App\Models\Answer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->tinyInteger('value')->nullable()->change();
            $table->boolean('skipped')->default(false)->after('comment');
        });

        Answer::whereValue(-1)->orWhereNull('value')->update([
            'skipped' => true,
            'value' => null,
        ]);
    }

    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('skipped');
        });
    }
};
