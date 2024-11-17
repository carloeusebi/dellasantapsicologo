<?php

use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Questionnaire::where('not_current', true)->delete();

        Schema::table('questionnaires', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable()->after('id')->constrained()->nullOnDelete();
            $table->dropColumn('type');
            $table->dropColumn('not_current');
            $table->boolean('visible')->default(true)->after('description');
        });

        $user = User::find(1);

        Questionnaire::withTrashed()->get()?->each(function (Questionnaire $questionnaire) use ($user) {
            $questionnaire->timestamps = false;
            $questionnaire->user()->associate($user);
            $questionnaire->update(['visible' => true], ['timestamps' => false]);
        });
    }

    public function down(): void
    {
        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(User::class);
            $table->string('type')->after('description');
            $table->boolean('not_current')->default(false)->after('description');
            $table->dropColumn('visible');
        });
    }
};
