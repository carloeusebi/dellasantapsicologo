<?php

use App\Models\Choice;
use App\Models\Questionnaire;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Monolog\Utils;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('choices')) {
            Schema::create('choices', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Questionnaire::class);
                $table->tinyInteger('points');
                $table->string('text');
            });
        }

        Questionnaire::all()->each(function (Questionnaire $questionnaire) {
            $legends = json_decode($questionnaire->legend, true);
            if (!$legends) {
                return;
            }
            foreach ($legends as $key => $legend) {
                if ($questionnaire->type === 'EDI') {
                    $points = max($key - 2, 0);
                } else {
                    $points = $key + Str::of($questionnaire->type)->charAt(0);
                }

                $questionnaire->choices()->create([
                    'text' => $legend['legend'],
                    'points' => $points
                ]);
            }
        });

        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropColumn('legend');
        });
    }

    public function down(): void
    {
        if (!Schema::hasColumn('questionnaires', 'legend')) {
            Schema::table('questionnaires', function (Blueprint $table) {
                $table->text('legend')->after('type');
            });
        }

        Questionnaire::with('choices')->get()?->each(function (Questionnaire $questionnaire) {
            $legend = [];
            $questionnaire->choices->each(function (Choice $choice, int $key) use (&$legend, $questionnaire) {
                $legend[] = [
                    'id' => $key + 1,
                    'legend' => $choice->text
                ];
                /** @noinspection SqlResolve */
                DB::statement('UPDATE `questionnaires` SET `legend` = ? WHERE `id` = ?',
                    [Utils::jsonEncode($legend), $questionnaire->id]);
            });
        });

        Schema::dropIfExists('choices');
    }
};
