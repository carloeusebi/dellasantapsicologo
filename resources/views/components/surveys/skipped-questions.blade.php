@php /** @var App\Models\Survey $survey */ @endphp

<div>
  @forelse($survey->skippedQuestions as $answer)
    <x-list-item :item="$answer" value="question.questionnaire.title">

      <x-slot:subValue>
        <div class="space-y-2">
          <div>
            <span>Domanda:</span>
            <span class="font-normal text-wrap">
              <span>{{ $answer->question->order }}. {{ $answer->question->text }}</span>
            </span>
          </div>
          <div>
            <span>Commento:</span>
            <span class="font-normal text-wrap">
              <span>{{ $answer->comment }}</span>
            </span>
          </div>
        </div>
      </x-slot:subValue>

      <x-slot:actions>
        <x-button
            :link="route('surveys.show', [
                  $survey,
                  'tab' => 'risposte',
                  'questionnaireSurvey_id' => $answer->questionnaire_survey_id,
                  'question_id' => $answer->question_id
                ])"
        >
          Vai alla domanda
        </x-button>
      </x-slot:actions>
    </x-list-item>
  @empty
    <div class="flex justify-center my-10 text-lg italic text-base-content/50">
      Nessuna risposta è stata saltata
    </div>
  @endforelse
</div>
