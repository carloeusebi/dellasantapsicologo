<?php

namespace App\Actions;

use App\Models\Cutoff;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Tag;
use App\Models\Variable;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class CloneQuestionnaire
{
    use AsAction;

    /**
     * @throws Exception
     */
    public function handle(Questionnaire $questionnaire): Questionnaire
    {
        $newQuestionnaire = $questionnaire->replicate();
        $newQuestionnaire->title = $newQuestionnaire->title.' - Copia';

        try {
            DB::beginTransaction();

            $newQuestionnaire->save();

            $questionnaire->questions->load('choices');
            $questionnaire->questions->each(function (Question $question) use ($newQuestionnaire) {
                $newQuestion = $question->replicate();
                $newQuestionnaire->questions()->save($newQuestion);
                $question->choices->each(function ($choice) use ($newQuestion) {
                    $newChoice = $choice->replicate();
                    $newQuestion->choices()->save($newChoice);
                });
            });

            $questionnaire->tags->each(function (Tag $tag) use ($newQuestionnaire) {
                $newQuestionnaire->tags()->attach($tag);
            });

            $questionnaire->variables->load('cutoffs');
            $questionnaire->variables->each(function (Variable $variable) use ($newQuestionnaire) {
                $newVariable = $variable->replicate();
                $newQuestionnaire->variables()->save($newVariable);
                $variable->cutoffs->each(function (Cutoff $cutoff) use ($newVariable) {
                    $newCutoff = $cutoff->replicate();
                    $newVariable->cutoffs()->save($newCutoff);
                    $newCutoff->save();
                });
            });

            $questionnaire->choices()->each(function ($choice) use ($newQuestionnaire) {
                $newChoice = $choice->replicate();
                $newQuestionnaire->choices()->save($newChoice);
            });

            $newQuestionnaire->restore();

            DB::commit();

            return $newQuestionnaire;

        } catch (Exception $e) {

            DB::rollBack();

            Log::error($e->getTraceAsString());

            throw $e;
        }
    }
}
