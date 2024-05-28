@php use App\Models\QuestionnaireSurvey; @endphp
<div
    x-data="{
    fullscreen: false,
    init() {
    const targetQuestionnaire = document.querySelector(`[data-questionnaire='{{ $questionnaireSurvey_id }}']`);
    const targetQuestion = document.querySelector(`[data-question='{{ $question_id }}']`);

    if (!targetQuestionnaire || !targetQuestion) return;

    targetQuestionnaire.querySelector('input').checked = true;
    targetQuestion.scrollIntoView({behavior: 'instant'});
    targetQuestion.classList.add('bg-primary/50');
}
}"
>
  <div
      class="p-3 flex flex-wrap md:flex-nowrap justify-end gap-4 sticky top-0 bg-base-200 shadow-lg z-20"
  >
    <x-loading class="text-primary" wire:loading/>
    <div class="w-full md:w-fit min-w-[400px]">
      <x-input
          class="grow input-sm"
          icon="o-magnifying-glass" placeholder="Cerca una domanda" wire:model.live.debounce="query"
          clearable x-on:keyup.esc="$wire.query = ''; $wire.$refresh()"
      />
    </div>
    <x-button icon="o-computer-desktop" responsive class="grow md:grow-0 btn-sm" x-on:click="fullscreen = true">
      Schermo Intero
    </x-button>
  </div>
  <x-hr/>
  <div :class="{'fixed inset-0 z-50 bg-base-200 p-5 overflow-y-scroll': fullscreen}">
    <x-button
        x-show="fullscreen" x-on:click="fullscreen = false" x-on:keyup.escape.window="fullscreen = false"
        icon="o-computer-desktop" class="fixed right-2 top-2 z-[51] shadow-2xl btn-active"
    />
    @foreach($this->questionnaires as $questionnaireSurvey)
      @php
        /** @var QuestionnaireSurvey $questionnaireSurvey */
      @endphp
      <x-collapse
          :name="$questionnaireSurvey->id" collapse-plus-minus :key="$questionnaireSurvey->id" class="!rounded-none"
          data-questionnaire="{{ $questionnaireSurvey->id }}"
      >
        <x-slot:heading>
          <x-header
              size=" text-lg" class="!mb-0"
              :subtitle="$questionnaireSurvey->questionnaire->description"
          >
            <x-slot:title>
              <span>{{ $questionnaireSurvey->questionnaire->title }}</span>
              @foreach($questionnaireSurvey->questionnaire->tags as $tag)
                <div
                    class=" badge badge-sm badge-outline my-1 h-fit font-bold"
                    style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
                >{{ $tag->tag }}</div>
              @endforeach
            </x-slot:title>
          </x-header>
        </x-slot:heading>
        <x-slot:content>
          @foreach($questionnaireSurvey->questionnaire->questions as $question)
            @php $answer = $question->answers->first(); @endphp
            <div
                class="border-t border-b scroll-mt-20 ps-2 @if($answer?->skipped) bg-error/10 @endif"
                data-question="{{ $question->id }}"
            >
              <div class="flex items-center justify-between">
                @if($questionnaireSurvey->questionnaire->choices->isNotEmpty())
                  <div class="text-wrap">
                    <span>{{ $question->order }}.&nbsp;{{ $question->text }}</span>
                    @if ($answer?->comment)
                      <a href="{{ route('surveys.show', [$survey,'tab' => 'commenti', 'comment_id' => $answer->id]) }}">
                        <span
                            class="text-xs ms-2 opacity-50 hover:underline cursor-pointer"
                        >({{ $answer->comment }})</span>
                      </a>
                    @endif
                  </div>
                  <div class="flex">
                    @foreach($questionnaireSurvey->questionnaire->choices as $choice)
                      <div
                          class="btn rounded-none no-animation @if($choice->id === $answer?->choice_id) btn-primary @endif"
                      >{{ $choice->points }}</div>
                    @endforeach
                  </div>
                @else
                  <div class="text-wrap">
                    <span> {{  $question->order  }}.&nbsp;</span>
                    @if ($question->text)
                      <span>{{ $question->text }} -</span>
                    @endif
                    <span class="italic opacity-50">{{ $answer?->chosenCustomAnswer($question) }}</span>
                  </div>
                  <div class="flex">
                    @foreach($question->custom_answers as $customAnswer)
                      <div
                          class="btn rounded-none @if($customAnswer['points'] === $answer?->value) btn-primary @endif no-animation"
                      >{{ $customAnswer['points'] }}</div>
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </x-slot:content>
      </x-collapse>
    @endforeach
  </div>
</div>
