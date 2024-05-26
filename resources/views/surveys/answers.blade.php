<div>


  @foreach($survey->surveyQuestionnaires as $surveyQuestionnaire)
    <x-timeline-item
        class="text-xs sticky"
        :title="$surveyQuestionnaire->questionnaire->title" :first="$loop->first" :last="$loop->last"
        :pending="!$surveyQuestionnaire->completed"
    >
      <x-slot:subtitle>
        @if($surveyQuestionnaire->last_answered)
          <span>{{ $surveyQuestionnaire->completed ? 'Completato: ' : 'Ultima risposta: ' }}</span>
          <span>{{ $surveyQuestionnaire->last_answered?->translatedFormat('d F Y H:i') }}</span>
        @endif
      </x-slot:subtitle>
      <x-slot:description>
        @foreach($surveyQuestionnaire->answers as $answer)
          <x-list-item :item="$answer->question" no-hover>
            <x-slot:subValue>
              <div class="text-wrap">
                {{ $answer->comment }}
              </div>
            </x-slot:subValue>
            @if ($surveyQuestionnaire->questionnaire->choices->count())
              <x-slot:value>
                <div class="text-wrap mb-2">{{ $loop->index + 1 }}. {{ $answer->question->text }}</div>
                <div class="space-y-1">
                  @foreach($surveyQuestionnaire->questionnaire->choices as $choice)
                    <div>
                      @if($choice->is($answer->choice))
                        <span><x-button class="btn-sm btn-primary">{{ $choice->points }}</x-button></span>
                      @else
                        <span><x-button class="btn-sm">{{ $choice->points }}</x-button></span>
                      @endif
                      <span>{{ $choice->text }}</span>
                    </div>
                  @endforeach
                </div>
              </x-slot:value>
            @else
              <x-slot:value>
                <div class="space-y-1">
                  @foreach($answer->question->custom_answers as $custom_answer)
                    <div>
                      @if ($answer->value === $custom_answer['points'])
                        <span><x-button class="btn-sm btn-primary">{{ $custom_answer['points'] }}</x-button></span>
                      @else
                        <span><x-button class="btn-sm">{{ $custom_answer['points'] }}</x-button></span>
                      @endif
                      <span>{{ $custom_answer['customAnswer'] }}</span>
                    </div>
                  @endforeach
                </div>
              </x-slot:value>
            @endif
          </x-list-item>
        @endforeach
      </x-slot:description>
    </x-timeline-item>
  @endforeach

</div>
