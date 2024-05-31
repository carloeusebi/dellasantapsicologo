@php use App\Models\Choice;use App\Models\QuestionnaireSurvey; @endphp
<div
    x-data="{
      fullscreen: false,
      quickEditMode: false,
      questions: [],
      quickAnswer: null,
      answer: {
        answerID: null,
        questionID: null,
        questionnaireSurveyID: null,
        choiceID: null,
        value: null,
        oldAnswerText: null,
        newAnswerText: null
      },
     toggleQuickEditMode() {
        this.quickEditMode = !this.quickEditMode;
        if (this.quickEditMode) {
          this.quickAnswer = new QuickAnswerHandler();
        } else {
          document.querySelectorAll('[data-questionnaire]').forEach(q => {
            q.querySelector('input').checked = false;
          });
          window.scrollTo(0, 0);
          $wire.$refresh();
        }
      }
    }"
    x-init="() => {
        const targetQuestionnaire = document.querySelector(`[data-questionnaire='${$wire.questionnaireSurvey_id}']`);
        const targetQuestion = document.querySelector(`[data-question='${$wire.question_id}']`);

        if (!targetQuestionnaire && !targetQuestion) return;

        targetQuestionnaire.scrollIntoView({behavior: 'instant'});
        targetQuestionnaire.querySelector('input').checked = true;
        targetQuestion?.scrollIntoView({behavior: 'instant'});
        targetQuestion?.classList.add('bg-primary/20');

        removeFromQueryString('questionnaireSurvey_id', 'question_id');
    }"
>
  <div
      class="px-3 flex flex-wrap sm:flex-nowrap justify-end gap-4"
  >
    <div class="md:flex justify-between w-full">
      <div>
        <x-button class="w-full btn-sm hidden xl:block" x-on:click="toggleQuickEditMode">
          <span x-text=" quickEditMode ? 'Esci' : 'Modifica Rapida'"></span>
        </x-button>
      </div>
      <div class="md:flex grow justify-end gap-4 space-y-4 md:space-y-0">
        <div class="hidden md:flex md:w-7 items-center">
          <x-loading class="text-primary me-2" wire:loading/>
        </div>
        <x-input
            class="input-sm w-full"
            icon="o-magnifying-glass" placeholder="Cerca una domanda" wire:model.live.debounce="query"
            clearable x-on:keyup.esc="$wire.query = ''; $wire.$refresh()"
        />
        <x-button
            icon="o-window" responsive class="w-full md:w-fit md:grow-0 btn-sm shadow" x-on:click="fullscreen = true"
        >
          Schermo Intero
        </x-button>
      </div>
    </div>
  </div>
  <x-hr/>
  <div :class="{'fixed inset-0 z-50 bg-base-200 p-5 overflow-y-scroll': fullscreen}">
    <x-button
        x-show="fullscreen" x-on:click="fullscreen = false" x-on:keyup.escape.window="fullscreen = false"
        icon="o-window" class="fixed right-2 top-2 z-[51] shadow-2xl btn-active"
    />
    @forelse($this->questionnaires as $questionnaireSurvey)
      @php
        /** @var QuestionnaireSurvey $questionnaireSurvey */
      @endphp
      <x-collapse
          :name="$questionnaireSurvey->id" collapse-plus-minus :key="$questionnaireSurvey->id"
          class="!rounded-none scroll-mt-20"
          data-questionnaire="{{ $questionnaireSurvey->id }}"
      >

        {{-- HEADER --}}
        <x-slot:heading>
          <x-header size=" text-lg" class="!mb-0">
            <x-slot:title>
              <h3>{{ $questionnaireSurvey->questionnaire->title }}</h3>
              @if($questionnaireSurvey->completed)
                <div class="text-xs text-base-content/50 font-semibold">Completato
                  il {{ $questionnaireSurvey->updated_at->translatedFormat('d F Y H:i') }}</div>
              @else
                <div class="text-xs text-error">Non completato</div>
              @endif

              @if ($questionnaireSurvey->skipped_answers_count > 0)
                <div class="text-xs text-error">Domande saltate: {{ $questionnaireSurvey->skipped_answers_count }}</div>
              @endif

              @foreach($questionnaireSurvey->questionnaire->tags as $tag)
                <x-questionnaires.tag :$tag :key="$tag->id"/>
              @endforeach
            </x-slot:title>
            <x-slot:subtitle>
              <p class="text-justify">{{ $questionnaireSurvey->questionnaire->description }}</p>
            </x-slot:subtitle>
          </x-header>
        </x-slot:heading>


        <x-slot:content>
          @if ($questionnaireSurvey->completed)
            <div class="mb-4 font-bold underline">
              <a
                  href="{{ route('surveys.show', [$survey, 'tab' => 'risultati', 'questionnaireSurvey_id' => $questionnaireSurvey->id]) }}"
                  wire:navigate.hover
              >
                Vai ai risultati</a>
            </div>
          @endif

          <div x-data="{ filteredAnswers: [] }">
            <div
                class="grid md:grid-flow-col mb-4 gap-2"
                style="grid-template-rows: repeat({{ (int) ($questionnaireSurvey->questionnaire->choices->count() / 2) }}, minmax(0, 1fr))"
            >
              @foreach($questionnaireSurvey->questionnaire->choices as $choice)
                <div class="flex items-center gap-2">
                  <x-button
                      class="btn"
                      x-bind:class="{ 'btn-primary': filteredAnswers.includes({{ $choice->id }}) }"
                      x-on:click="filteredAnswers.includes({{ $choice->id }})
                        ? filteredAnswers=filteredAnswers.filter(a=> a !== {{ $choice->id }})
                        : filteredAnswers.push({{ $choice->id }})
                      "
                  >
                    {{ $choice->points }}
                  </x-button>
                  <div>{{ $choice->text }}</div>
                </div>
              @endforeach
            </div>
            @foreach($questionnaireSurvey->questionnaire->questions as $question)
              @php $answer = $question->answers->first(); @endphp
              <div
                  x-show="filteredAnswers.includes({{ $answer?->choice_id }}) || !filteredAnswers.length"
                  class="border-t border-b scroll-mt-20 @if($answer?->skipped) bg-error/10 @endif focus:outline-1"
                  data-question="{{ $question->id }}"
                  data-questionnaire-survey="{{ $questionnaireSurvey->id }}"
                  x-bind:tabindex="quickEditMode ? 0 : -1"
              >
                <div class="md:flex flex-wrap md:flex-nowrap gap-4 items-center justify-between">
                  @if($questionnaireSurvey->questionnaire->choices->isNotEmpty())
                    <div class="text-wrap my-3 md:my-0">
                      <span class="pl-2">{{ $question->order }}. {{ $question->text }}</span>
                      @if ($answer)
                        <span class="italic opacity-50">
                          - {{ $questionnaireSurvey->questionnaire->choices->find($answer?->choice_id)?->text }}
                        </span>
                      @endif
                      @if ($answer?->comment)
                        <div class="text-xs ms-2 opacity-50">
                          <span>Commento:&nbsp;</span>
                          <a
                              href="{{ route('surveys.show', [$survey,'tab' => 'commenti', 'comment_id' => $answer->id]) }}"
                              wire:navigate.hover
                          >
                        <span
                            class="hover:underline cursor-pointer"
                        >{{ $answer->comment }}</span>
                          </a>
                        </div>
                      @endif
                    </div>
                    <div class="flex grow md:grow-0">
                      @foreach($questionnaireSurvey->questionnaire->choices as $choice)
                        <div
                            class="grow"
                            wire:click="updateModal = true"
                            wire:ignore.self
                            x-on:click="(e) => {
                              answer.answerID = e.target.dataset.answerId;
                              answer.questionID = {{ $question->id }};
                              answer.questionnaireSurveyID = {{ $questionnaireSurvey->id }};
                              answer.choiceID = {{ $choice->id }};
                              answer.oldAnswerText = e.target.dataset.oldAnswerText;
                              answer.newAnswerText = '{{ e($choice->text) }}';
                            }"
                        >
                          <span
                              class="btn w-full rounded-none no-animation @if($choice->id === $answer?->choice_id) btn-primary @endif"
                              data-answer-id="{{ $answer?->id }}"
                              data-choice
                              data-old-answer-text="{{ $questionnaireSurvey->questionnaire->choices->find($answer?->choice_id)?->text }}"
                              data-id="{{ $choice->id }}"
                              data-points="{{ $choice->points }}"
                          >
                          {{ $choice->points }}
                          </span>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <div class="text-wrap pl-3 my-3 md:my-0">
                      <span> {{  $question->order  }}.&nbsp;</span>
                      @if ($question->text)
                        <span>{{ $question->text }} -</span>
                      @endif
                      <span class="italic opacity-50">{{ $answer?->chosenCustomChoice($question) }}</span>
                      @if ($answer?->comment)
                        <div class="text-xs ms-2 opacity-50">
                          <span>Commento:&nbsp;</span>
                          <a
                              href="{{ route('surveys.show', [$survey,'tab' => 'commenti', 'comment_id' => $answer->id]) }}"
                              wire:navigate.hover
                          >
                        <span
                            class="hover:underline cursor-pointer"
                        >{{ $answer->comment }}</span>
                          </a>
                        </div>
                      @endif
                    </div>
                    <div class="flex grow md:grow-0">
                      @foreach($question->custom_choices as $customChoice)
                        <div
                            class="grow"
                            wire:click="updateModal = true"
                            x-on:click="(e) => {
                              answer.answerID = e.target.dataset.answerId;
                              answer.questionID = {{ $question->id }};
                              answer.questionnaireSurveyID = {{ $questionnaireSurvey->id }};
                              answer.choiceID = null;
                              answer.oldAnswerText = e.target.dataset.oldAnswerText;
                              answer.newAnswerText = '{{ e($customChoice['customAnswer']) }}';
                              answer.value = parseInt('{{ $customChoice['points'] }}');
                            }"
                        >
                          <span
                              class="btn w-full rounded-none no-animation @if($answer?->value === $customChoice['points']) btn-primary @endif"
                              data-choice data-points="{{ $customChoice['points'] }}"
                              data-answer-id="{{ $answer?->id }}"
                              data-old-answer-text="{{ $answer?->chosenCustomChoice($question) }}"
                          >
                            {{ $customChoice['points'] }}
                          </span>
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        </x-slot:content>
      </x-collapse>
    @empty
      <div class="italic text-base-content/50 my-5 text-center">Nessun questionario trovato</div>
    @endforelse
  </div>

  <x-modal wire:model="updateModal" class="backdrop-blur" title="Modifica risposta">
    <div class="text-center">
      <div>Sei sicuro di voler cambiare la risposta da:</div>
      <div x-html="answer.oldAnswerText" class="font-bold"></div>
      <div>a</div>
      <div x-html="answer.newAnswerText" class="font-bold"></div>
      ?
    </div>
    <x-hr/>
    <div class="flex flex-col gap-2">
      <x-button class="btn-sm w-full" wire:click="updateModal = false">Annulla</x-button>
      <x-button
          x-show="answer.answerID" class="btn-sm btn-error w-full" spinner="deleteAnswer"
          wire:click="deleteAnswer(answer.answerID)"
      >
        Elimina invece
      </x-button>
      <x-button
          spinner="changeAnswer"
          class="btn-sm btn-success w-full"
          wire:click="changeAnswer(
              answer.questionnaireSurveyID,
              answer.questionID,
              answer.choiceID,
              answer.value
            )"
      >Modifica
      </x-button>
    </div>
  </x-modal>

  <x-modal wire:model="massUpdateModal" title="Salva modifiche Rapide">
    <div class="mb-5">Ci sono <span id="updates-counter"></span> modifiche non salvate.</div>
    <span id="updates-store" data-store></span>
    <x-hr/>
    <div class="space-y-2">
      <x-button class="block w-full btn-sm" wire:click="massUpdateModal = false">Annulla</x-button>
      <x-button
          class="block w-full btn-sm btn-info"
          x-on:click="() => {
            toggleQuickEditMode();
            $wire.massUpdateModal = false;
          }"
      >Esci e resetta le domande
      </x-button>
      <x-button
          class="block w-full btn-sm btn-success"
          spinner="massUpdateAnswers"
          wire:click="massUpdateAnswers(
            JSON.parse(document.getElementById('updates-store').dataset.store)
          )"
      >
        Salva le modifiche
      </x-button>
    </div>
  </x-modal>

  <x-button
      x-show="quickEditMode"
      class="fixed bottom-6 right-44 z-50 shadow-xl btn-warning"
      x-on:click="toggleQuickEditMode"
  >Annulla
  </x-button>
  <x-button
      x-show="quickEditMode" class="fixed bottom-6 right-20 z-50 shadow-xl btn-success"
      wire:click="massUpdateModal = true"
  >Salva
  </x-button>
</div>
