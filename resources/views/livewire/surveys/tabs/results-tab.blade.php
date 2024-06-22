@php use App\Models\QuestionnaireSurvey; @endphp
<div
    x-init="() => {
      const targetQuestionnaireSurvey = document.querySelector(`[data-questionnaire-survey-id='${$wire.questionnaireSurvey_id}']`);
      targetQuestionnaireSurvey?.scrollIntoView({ behavior: 'instant' })
      targetQuestionnaireSurvey?.classList.add('bg-base-100', 'border-l-4', 'border-primary', 'shadow-md', 'p-4', '-m-4');

      removeFromQueryString('questionnaireSurvey_id');
    }"
>

    <div class="mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 justify-between items-start w-full gap-y-4">
            <h1 class="text-2xl font-bold hidden md:block">Risultati</h1>
            <x-surveys-comparison :comparison-surveys="$this->comparisonSurveys"/>
        </div>


        <div class="mt-10 space-y-4 px-1 xl:px-10">
            @forelse($this->questionnaireSurveys as $questionnaireSurvey)
                <div @class([
                        'grid gap-4',
                        'lg:grid-cols-2' => $comparisonSurvey_id && $comparisonQuestionnaireSurveys && $comparisonQuestionnaireSurveys->isNotEmpty()
                      ])>
                    <div class="scroll-mt-24" data-questionnaire-survey-id="{{ $questionnaireSurvey->id }}">
                        <x-surveys.questionnaire-result :$questionnaireSurvey :$survey/>
                    </div>
                    <div>
                        @if($comparisonSurvey_id && $comparisonQuestionnaireSurveys && $comparisonQuestionnaireSurveys->isNotEmpty())
                            @php
                                $comparisonQuestionnaireSurvey = $comparisonQuestionnaireSurveys->firstWhere(fn (QuestionnaireSurvey $qS) => $qS->questionnaire->id === $questionnaireSurvey->questionnaire->id )
                            @endphp
                            @if ($comparisonQuestionnaireSurvey)
                                <x-surveys.questionnaire-result
                                    :questionnaireSurvey="$comparisonQuestionnaireSurvey" :survey="$comparisonSurvey"
                                    is-comparison
                                />
                            @endif
                        @endif
                    </div>
                </div>
            @empty
                <div class="my-5 text-center text-base-content/50 italic">
                    Nessun questionario trovato.
                </div>
            @endforelse
        </div>
    </div>
