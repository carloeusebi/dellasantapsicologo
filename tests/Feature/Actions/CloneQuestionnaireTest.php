<?php

/** @noinspection PhpUnhandledExceptionInspection */

use App\Actions\CloneQuestionnaire;
use App\Models\Cutoff;
use App\Models\Questionnaire;
use App\Models\Variable;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;

it('clones a questionnaire', function () {
    $questionnaire = Questionnaire::factory()
        ->has(
            Variable::factory()
                ->has(Cutoff::factory()->count(2))
                ->count(2)
        )
        ->create();

    $clone = CloneQuestionnaire::run($questionnaire);

    $clone->load('questions.choices', 'variables.cutoffs', 'tags', 'choices');

    assertNotEquals($questionnaire->id, $clone->id);
    assertEquals($questionnaire->title.' - Copia', $clone->title);
    assertEquals($questionnaire->questions->count(), $clone->questions->count());
    assertEquals($questionnaire->variables->count(), $clone->variables->count());
    assertEquals($questionnaire->variables->first()->cutoffs->count(), $clone->variables->first()->cutoffs->count());
});

it('throws an exception when cloning fails', function () {
    $questionnaire = Questionnaire::factory()->create();

    DB::shouldReceive('beginTransaction')
        ->once()
        ->andThrow(new Exception('Transaction failed'));

    expect(fn () => CloneQuestionnaire::run($questionnaire))
        ->toThrow(Exception::class);
});
