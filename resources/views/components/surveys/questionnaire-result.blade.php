@props([
    /** @var App\Models\QuestionnaireSurvey */
    'questionnaireSurvey',
    /** @var App\Models\Survey */
    'survey',
    /** @var bool */
    'isComparison' => false,
])

<div {{ $attributes->class(['border-b border-base-content/5']) }}>
    <header class="mb-2">
        <a
            href="{{ route('surveys.show', [$survey, 'tab' => 'risposte', 'questionnaireSurvey_id' => $questionnaireSurvey->id]) }}"
            wire:navigate.hover
        >
            <h2 class="text-xl font-bold hover:underline cursor-pointer">{{ $questionnaireSurvey->questionnaire->title }}</h2>
        </a>
        @if($questionnaireSurvey->completed)
            <div class="text-xs text-base-content/50 font-semibold">
                Completato il {{ $questionnaireSurvey->updated_at->translatedFormat('d F Y H:i') }}
            </div>
        @elseif ($questionnaireSurvey->answers_count > 0)
            <div class="text-xs text-base-content/50 font-semibold">
                Ultima risposta il {{ $questionnaireSurvey->lastAnswer->updated_at->translatedFormat('d F Y H:i') }}
            </div>
            <div>{{ $questionnaireSurvey->answers_count }} risposte su {{ $questionnaireSurvey->questions_count }}</div>
        @else
            <div class="text-xs text-base-content/50 font-semibold">
                Mai iniziato
            </div>
        @endif

        @if ($questionnaireSurvey->skipped_answers_count > 0)
            <div class="text-xs text-error font-bold">
                Domande saltate: {{ $questionnaireSurvey->skipped_answers_count }}
            </div>
        @endif
    </header>

    @if ($questionnaireSurvey->completed && $questionnaireSurvey->skipped_answers_count === 0)
        @foreach($questionnaireSurvey->questionnaire->variables as $variable)
            <div class="mb-1">
                <h3 class="font-semibold">{{ $variable->name }}: {{ $variable->score }}</h3>
                @foreach($variable->cutoffs as $cutoff)
                    @php
                        $hasScored = $cutoff->hasScored($variable->score, $variable->gender_based && $survey->patient->is_female)
                    @endphp
                    <div @class([
                          'flex px-2 py-1 border-t border-base-content/5 hover:bg-base-200/50',
                          '!bg-accent/50' => $hasScored && $isComparison,
                          '!bg-primary/50' => $hasScored && !$isComparison,
                        ])
                    >
            <span class="grow min-w-fit">
              @if ($variable->gender_based && $survey->patient->is_female)
                    {{ $cutoff->well_form_target_for_female }}
                @else
                    {{ $cutoff->well_formed_target }}
                @endif
            </span>
                        <span class="shrink text-wrap text-end">{{ $cutoff->name }}</span>
                    </div>
                @endforeach
            </div>
        @endforeach
    @elseif ($questionnaireSurvey->completed && $questionnaireSurvey->skipped_answers_count > 0)
        <div class="p-2 text-sm text-base-content/50 italic">
            Il questionario è stato completato, ma sono state saltate delle domande.
        </div>
    @endif
</div>
