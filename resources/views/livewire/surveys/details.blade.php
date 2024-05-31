<div class="grid grid-cols-1 lg:grid-cols-3 items-start gap-8">
  <div class="lg:col-span-2 space-y-8">
    <x-card title="Azioni e dettagli" separator>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="order-2 lg:order-1">
          <div>
            <span class="font-bold">Creato</span>
            <span>{!! get_formatted_date($survey->created_at) !!}</span>
          </div>
          @if ($survey->lastAnswer)
            <div>
              <span class="font-bold">Ultima risposta</span>
              <span>{!! get_formatted_date($survey->lastAnswer->created_at) !!}</span>
            </div>
          @endif
          <div>
            <span class="font-bold">Questionari completati:</span>
            {{ $survey->questionnaireSurveys->filter->completed->count() }}
            su {{ $survey->questionnaireSurveys->count() }}
          </div>
          <div>
            <span class="font-bold">Risposte totali:</span>
            {{ $survey->answers_count }} su {{ $survey->questionnaireSurveys->sum('questions_count') }}
          </div>
          <div wire:click="$parent.tab = 'commenti'">
            <span class="font-bold underline cursor-pointer">Commenti</span>: {{ $survey->comments_count }}
          </div>
          <div wire:click="$parent.tab = 'saltate'">
          <span
              class="font-bold underline cursor-pointer"
          >Risposte Saltate</span>: {{ $survey->skipped_questions_count }}
          </div>
        </div>

        <div class="flex flex-col order-1 items-end gap-2">
          <x-button
              class="w-full lg:btn-wide" icon="o-clipboard-document-list"
              x-on:click="async () => {
                try{
                  await navigator.clipboard.writeText('{{ $survey->getLink() }}');
                  $wire.dispatch('notify', {type: 'info', title: 'Info', description: 'Link copiato negli appunti.'});
                } catch (e) {
                  $wire.dispatch('notify', {type: 'error', title: 'Errore', description: 'Errore, riprovare.'});
                }
              }"
          >
            Copia Link
          </x-button>
          <x-button class="w-full lg:btn-wide" icon="o-envelope">Invia email</x-button>
          <x-button class="w-full lg:btn-wide" icon="o-trash">Elimina</x-button>
        </div>

      </div>
    </x-card>

    <livewire:surveys.other-surveys :$survey lazy/>

  </div>


  <x-card title="Timeline" separator shadow>
    @foreach($survey->questionnaireSurveys as $questionnaireSurvey)
      <x-timeline-item
          class=" text-sm
        "
          :title="$questionnaireSurvey->questionnaire->title"
          :first="$loop->first"
          :last="$loop->last"
          :pending="!$questionnaireSurvey->completed"
      >
        <x-slot:title>
          <a
              @if ($questionnaireSurvey->completed)
                href="{{ route('surveys.show', [$survey, 'tab' => 'risultati', 'questionnaireSurvey_id' => $questionnaireSurvey->id]) }}"
              class="underline" wire:navigate.hover
              @endif
          >
            <h3 class="text-xs">{{ $questionnaireSurvey->questionnaire->title }}</h3>
          </a>
        </x-slot:title>

        <x-slot:subtitle>
          <div class="text-xs">
            @if($questionnaireSurvey->completed)
              <div>
                Completato {{ $questionnaireSurvey->lastAnswer->created_at->translatedFormat('D d F Y H:i') }}
              </div>
            @elseif ($questionnaireSurvey->lastAnswer)
              <div>
                Ultima riposta {{ $questionnaireSurvey->lastAnswer->created_at->translatedFormat('D d F Y H:i') }}
              </div>
              <div>
                {{ $questionnaireSurvey->answers_count }} risposte su {{ $questionnaireSurvey->questions_count }}
              </div>
            @else
              <div>
                Non Iniziato
              </div>
            @endif
          </div>
        </x-slot:subtitle>
      </x-timeline-item>
    @endforeach
  </x-card>
</div>
