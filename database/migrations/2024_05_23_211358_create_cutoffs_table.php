<?php

use App\Models\Cutoff;
use App\Models\Questionnaire;
use App\Models\Variable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('cutoffs')) {
            Schema::create('cutoffs', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Variable::class)->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->smallInteger('from')->nullable();
                $table->smallInteger('to')->nullable();
                $table->enum('type', ['lesser_than', 'greater_than', 'range']);
                $table->smallInteger('fem_from')->nullable();
                $table->smallInteger('fem_to')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        Questionnaire::with('questions')->get()->each(function (Questionnaire $questionnaire) {
            $variables = json_decode($questionnaire->variables, true);
            foreach ($variables as $variable_assoc) {
                $variable = $questionnaire->variables()->create([
                    'name' => $variable_assoc['name'],
                    'gender_based' => $variable_assoc['genderBased'] ?? false,
                ]);
                foreach ($variable_assoc['items'] as $itemId) {
                    $question = $questionnaire->questions->firstWhere('old_id', $itemId);
                    if ($question) {
                        $variable->questions()->attach($question);
                    }
                }
                foreach ($variable_assoc['cutoffs'] as $cutoff_assoc) {
                    $variable->cutoffs()->create([
                        'name' => $cutoff_assoc['name'],
                        'type' => Str::of($cutoff_assoc['type'])->replace('-', '_'),
                        'from' => $cutoff_assoc['from'],
                        'to' => $cutoff_assoc['to'],
                        'fem_from' => $cutoff_assoc['femFrom'] ?? null,
                        'fem_to' => $cutoff_assoc['femTo'] ?? null,
                    ]);
                }
            }
        });

        Schema::table('questionnaires', function (Blueprint $table) {
            $table->dropColumn('variables');
        });
    }

    public function down(): void
    {
        if (! Schema::hasColumn('questionnaires', 'variables')) {
            Schema::table('questionnaires', function (Blueprint $table) {
                $table->text('variables')->nullable()->after('legend');
            });
        }

        Questionnaire::all()->each(function (
            Questionnaire $questionnaire
        ) {
            $variables = [];
            $questionnaire->variables()->with('cutoffs', 'questions')
                ->get()?->each(function (Variable $variable, int $key) use (&$variables) {
                    $cutoffs = [];
                    $variable->cutoffs->each(function (Cutoff $cutoff, int $key) use (&$cutoffs) {
                        $cutoffs[] = [
                            'id' => $key + 1,
                            'name' => $cutoff->name,
                            'type' => Str::of($cutoff->type)->replace('_', '-'),
                            'from' => $cutoff->from,
                            'to' => $cutoff->to,
                            'femFrom' => $cutoff->fem_from,
                            'femTo' => $cutoff->fem_to,
                        ];
                    });
                    $variables[] = [
                        'id' => $key + 1,
                        'name' => $variable->name,
                        'items' => $variable->questions->pluck('id')->toArray(),
                        'genderBased' => $variable->gender_based,
                        'cutoffs' => $cutoffs,
                    ];
                });

            /** @noinspection SqlResolve / it triggers an error because variable column doesn't exist anymore */
            DB::statement('UPDATE `questionnaires` SET `variables` = ? WHERE `id` = ?',
                [json_encode($variables), $questionnaire->id]);
        });

        Schema::dropIfExists('cutoffs');
    }
};
