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
    <div class="grid md:grid-cols-2 justify-between items-start">
      <h1 class="text-2xl font-bold">Risultati</h1>
      <div class="flex flex-col md:flex-row items-end gap-4">
        <div class="w-full">
          <x-select
              wire:model="comparisonSurvey_id" label="Confronta" :options="$this->comparisonSurveys"
              option-value="id" option-label="title" placeholder="Seleziona questionario"
          >
            <x-slot:append>
              <x-button
                  x-bind:disabled="!$wire.isComparing" icon="o-x-mark" wire:click="clearComparison"
                  spinner="clearComparison"
              />
            </x-slot:append>
          </x-select>
        </div>
        <x-button
            class="w-full md:w-fit" spinner="compare" label="Confronta"
            wire:click="compare" x-bind:disabled="!$wire.comparisonSurvey_id && !$wire.isComparing"
        />
      </div>
    </div>
  </div>


  <div class=" space-y-4 px-1 xl:px-10">
    @forelse($this->questionnaireSurveys as $questionnaireSurvey)
      <div @class([
        'grid gap-4',
        'lg:grid-cols-2' => $comparisonSurvey_id && $comparisonQuestionnaireSurveys && $comparisonQuestionnaireSurveys->isNotEmpty()
      ])>
        <div data-questionnaire-survey-id="{{ $questionnaireSurvey->id }}">
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
