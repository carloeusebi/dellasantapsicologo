@php /** @var App\Models\QuestionnaireSurvey $questionnaireSurvey*/@endphp
<div>
  @forelse($this->questionnaireSurveys as $questionnaireSurvey)
    <x-timeline-item
        :title="$questionnaireSurvey->questionnaire->title"
        :first="$loop->first"
        :last="$loop->last"
        :pending="!$questionnaireSurvey->completed"
    >
      <x-slot:title>
        <a
            wire:navigate.hover href="{{ route('surveys.show',[
              $survey,
              'tab' => 'risposte',
              'questionnaireSurvey_id' => $questionnaireSurvey->id,
            ])}}"
        >
          <h3 class="underline text-xl">{{ $questionnaireSurvey->questionnaire->title }}</h3>
        </a>
      </x-slot:title>

      <x-slot:subtitle>
        @if($questionnaireSurvey->completed)
          <div class="text-xs text-base-content/50 font-semibold">
            Completato il {{ $questionnaireSurvey->updated_at->translatedFormat('d F Y H:i') }}
          </div>
        @elseif ($questionnaireSurvey->answers_count > 0)
          <div class="text-xs text-base-content/50 font-semibold">
            Ultima risposta il {{ $questionnaireSurvey->updated_at->translatedFormat('d F Y H:i') }}
          </div>
          <div>{{ $questionnaireSurvey->answers_count }} risposte
            su {{ $questionnaireSurvey->questions_count }}</div>
        @endif
      </x-slot:subtitle>

      <x-slot:description>
        @if ($questionnaireSurvey->completed)
          <div class="space-y-4 text-wrap">
            @foreach($questionnaireSurvey->questionnaire->variables as $variable)
              <div>
                <h4 class="text-base font-semibold mb-2">{{ $variable->name }}: {{ $variable->score }}</h4>
                @foreach($variable->cutoffs as $cutoff)
                  <span class="w-full border-b border-base-content/15">
                    <span
                        class="w-fit flex gap-3 !flex-row justify-start @if($cutoff->hasScored($variable->score, $variable->gender_based && $survey->patient->is_female)) bg-error/20 @endif"
                    >
                    <span class="w-44 p-1">
                      @if ($variable->gender_based && $survey->patient->is_female)
                        {{ $cutoff->well_form_target_for_female }}
                      @else
                        {{ $cutoff->well_formed_target }}
                      @endif
                    </span>
                    <span class="p-1">{{ $cutoff->name }}</span>
                    </span>
                  </span>
                @endforeach
              </div>
            @endforeach
          </div>
        @endif
      </x-slot:description>
    </x-timeline-item>

  @empty
    <div class="my-5 text-center text-base-content/50 italic">
      Nessun questionario trovato.
    </div>
  @endforelse
</div>