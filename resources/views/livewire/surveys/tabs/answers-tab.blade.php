<div x-data="answers" x-on:keyup.window="handleQuickMovement($event)">
    <div>
        <div class="mb-4">
            <x-button class="btn-sm w-full xl:btn-wide" x-on:click="toggleQuickEditMode">
                <span x-text=" quickEditMode ? 'Esci' : 'Modifica Rapida'"></span>
            </x-button>
            <span x-show="quickEditMode" class="text-xs text-base-content/75 italic">
                  Usa le frecce per muoverti, e la tastiera per rispondere alle domande
                </span>
        </div>
    </div>
    <div class="xl:flex grow justify-between items-end gap-4 space-y-4 xl:space-y-0">
        <x-button
            icon="o-arrows-pointing-out" responsive class="w-full xl:btn-wide md:grow-0 btn-sm shadow"
            x-on:click="fullscreenMode = true"
        >
            Schermo Intero
        </x-button>
        <div class="grow">
            <x-input
                class="input-sm w-full"
                icon="o-magnifying-glass" placeholder="Cerca una domanda" wire:model.live.debounce="query"
                clearable x-on:keyup.esc="$wire.query = ''; $wire.$refresh()"
            />
        </div>
        <div class="grow">
            <x-surveys-comparison :comparison-surveys="$this->comparisonSurveys"/>
        </div>
    </div>
    <x-hr/>
    <div id="poll" :class="{'fixed inset-0 z-50 bg-base-200 p-5 overflow-y-scroll': fullscreenMode}" wire:poll.10s>
        <x-button
            x-show="fullscreenMode" x-on:click="fullscreenMode = false"
            x-on:keyup.escape.window="fullscreenMode = false"
            icon="o-arrows-pointing-in" class="fixed right-2 top-2 z-[51] shadow-2xl btn-active"
        />
        @forelse($this->questionnaires as $questionnaireSurvey)
            @php
                $comparisonQuestionnaireSurvey = $comparisonQuestionnaireSurveys
                    ?->firstWhere(function (App\Models\QuestionnaireSurvey $qS) use ($questionnaireSurvey) {
                        return $qS->questionnaire->id === $questionnaireSurvey->questionnaire->id;
                    });
            @endphp
            <x-collapse
                :name="$questionnaireSurvey->id" collapse-plus-minus :key="$questionnaireSurvey->id"
                class="!rounded-none scroll-mt-20" separator
                data-questionnaire="{{ $questionnaireSurvey->id }}"
            >

                {{-- HEADER --}}
                <x-slot:heading>
                    <x-header size=" text-lg" class="!mb-0">
                        <x-slot:title>
                            <div class="lg:flex justify-between">
                                <div>
                                    <h3>{{ $questionnaireSurvey->questionnaire->title }}</h3>
                                    @if($questionnaireSurvey->completed)
                                        <div class="text-xs text-base-content/50 font-semibold">Completato
                                            il {{ $questionnaireSurvey->updated_at->translatedFormat('d F Y H:i') }}</div>
                                    @else
                                        <div class="text-xs text-error">Non completato</div>
                                    @endif

                                    @if ($questionnaireSurvey->skipped_answers_count > 0)
                                        <div class="text-xs text-error">Domande
                                            saltate: {{ $questionnaireSurvey->skipped_answers_count }}</div>
                                    @endif

                                    @foreach($questionnaireSurvey->questionnaire->tags as $tag)
                                        <x-questionnaires.tag :$tag :key="$tag->id"/>
                                    @endforeach
                                </div>
                                <div>
                                    @if($this->comparisonSurvey)
                                        <div class="flex gap-4 my-3 font-bold text-sm">
                                            <div class="flex items-center gap-2">
                                                <button class="inline-block h-5 w-5 bg-primary border border-base-300"
                                                        disabled></button>
                                                <span>{{ $this->survey->title }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <button class="inline-block h-5 w-5 bg-accent/50 border border-base-300"
                                                        disabled></button>
                                                <span>{{ $this->comparisonSurvey->title }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
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

                    <div
                        x-data="{
                            showReversed: false,
                            filteredAnswers: [],
                            variableQuestionIds: [],
                            handleVariableClick(checked, questionIds) {
                              if (checked) {
                                this.variableQuestionIds = [...this.variableQuestionIds, ...questionIds];
                              } else {
                                this.variableQuestionIds = this.variableQuestionIds.filter(id => !questionIds.includes(id));
                              }
                            },
                            showQuestion(value, questionId) {
                              return (this.filteredAnswers.includes(value) || !this.filteredAnswers.length)
                              && (this.variableQuestionIds.includes(questionId) || !this.variableQuestionIds.length)
                            }
                       }"
                    >
                        <div
                            class="grid md:grid-flow-col mb-4 gap-2"
                            style="grid-template-rows: repeat({{ (int) ($questionnaireSurvey->questionnaire->choices->count() / 2) }}, minmax(0, 1fr))"
                        >
                            @foreach($questionnaireSurvey->questionnaire->choices as $choice)
                                <div
                                    class="flex items-center gap-2 cursor-pointer"
                                    x-on:click="filteredAnswers.includes({{ $choice->points }})
                                        ? filteredAnswers=filteredAnswers.filter(a=> a !== {{ $choice->points }})
                                        : filteredAnswers.push({{ $choice->points }})
                                    "
                                >
                                    <x-button
                                        class="btn"
                                        x-bind:class="{ 'btn-primary': filteredAnswers.includes({{ $choice->points }}) }"
                                    >
                                        {{ $choice?->points }}
                                    </x-button>
                                    <div>{{ $choice?->text }}</div>
                                </div>
                            @endforeach
                        </div>
                        @unless($questionnaireSurvey->questionnaire->questions->where('reversed', true)->isEmpty())
                            <div class="select-none">
                                <x-checkbox
                                    :label="'Evidenzia domande a punteggio invertito ('. $questionnaireSurvey->questionnaire->questions->where('reversed', true)->count() .')'"
                                    x-model="showReversed"
                                />
                            </div>
                        @endunless
                        @unless($questionnaireSurvey->questionnaire->variables->isEmpty())
                            <div class="my-5">
                                <div class="font-bold mb-2">Filtra le risposte per variabile</div>
                                <div class="space-y-2">
                                    @foreach($questionnaireSurvey->questionnaire->variables as $variable)
                                        <x-checkbox
                                            :label="$variable->name"
                                            x-on:change="handleVariableClick($event.target.checked, {{ json_encode($variable->questions->pluck('id')->toArray()) }})"
                                        />
                                    @endforeach
                                </div>
                            </div>
                        @endunless
                        @foreach($questionnaireSurvey->questionnaire->questions as $question)
                            @php
                                $answer = $question->answers->first();
                                $comparisonAnswer = $comparisonQuestionnaireSurvey?->questions->firstWhere('id', $question->id)?->answers->first();
                            @endphp
                            <div
                                x-show="showQuestion({{ $answer?->value ?? -99 }}, {{ $question->id }})"
                                class="border-t border-2 border-b scroll-mt-20 @if($answer?->skipped) bg-error/10 @endif"
                                :class="{
                                'focus:border-primary': quickEditMode,
                                'bg-primary/20': showReversed && {{ json_encode($question->reversed) }}
                               }"
                                data-question="{{ $question->id }}"
                                data-questionnaire-survey="{{ $questionnaireSurvey->id }}"
                                @if($question->reversed) data-reversed @endif
                                x-bind:tabindex="quickEditMode ? 0 : -1"
                                x-on:click="focusQuestion({{ $question->id }})"
                                x-on:keydown="handleKeydownEvent({{  $question->id }}, $event)"
                            >
                                <div class="md:flex flex-wrap md:flex-nowrap gap-4 items-center justify-between">
                                    <div class="text-wrap my-3 md:my-0 p-2">
                                        <span>{{ $question->order }}. {{ $question->text }}</span>
                                        @if ($answer)
                                            <span class="italic opacity-50">- {{ $answer->choice?->text }}</span>
                                        @endif
                                        @if ($answer?->comment)
                                            <div class="text-xs ms-2 opacity-50">
                                                <span>Commento:&nbsp;</span>
                                                <a
                                                    href="{{ route('surveys.show', [$survey,'tab' => 'commenti', 'comment_id' => $answer->id]) }}"
                                                    wire:navigate.hover
                                                > <span
                                                        class="hover:underline cursor-pointer"
                                                    >{{ $answer->comment }}</span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex grow md:grow-0">
                                        @foreach($question->choices->isEmpty() ? $questionnaireSurvey->questionnaire->choices : $question->choices as $choice)
                                            <div
                                                class="grow"
                                                wire:ignore.self
                                                x-on:click.stop="handleChoiceClick($event)"
                                            >
                                                  <span
                                                      class="btn w-full rounded-none no-animation"
                                                      :class="{
                                                        'bg-primary border-primary': {{ json_encode($answer && $answer->choice?->is($choice)) }} || ((filteredAnswers.length && filteredAnswers.includes({{ $choice->points }}) || showReversed && {{ json_encode($question->reversed) }}) && {{ json_encode($answer && $answer->value === $choice->points) }}),
                                                        'bg-primary/15 border-primary': {{ json_encode($answer && $answer->choice?->is($choice) && $answer->value !== $choice->points) }} && (filteredAnswers.length || showReversed && {{ json_encode($question->reversed) }}),
                                                        'bg-accent/50 border-accent': {{ json_encode($comparisonAnswer && $comparisonAnswer->choice?->is($choice)) }} || ((filteredAnswers.length && filteredAnswers.includes({{ $choice->points }}) || showReversed && {{ json_encode($question->reversed) }}) && {{ json_encode($comparisonAnswer && $comparisonAnswer->value === $choice->points) }}),
                                                        '!bg-accent/15 border-accent': {{ json_encode($comparisonAnswer && $comparisonAnswer->choice?->is($choice) && $comparisonAnswer->value !== $choice->points) }} && (filteredAnswers.length || showReversed && {{ json_encode($question->reversed) }})
                                                      }"
                                                      data-old-answer-text="{{ $question->choices->find($answer?->choice_id)?->text ?? $questionnaireSurvey->questionnaire->choices->find($answer?->choice_id)?->text }}"
                                                      data-choice data-id="{{ $choice->id }}"
                                                      data-text="{{ $choice?->text }}"
                                                      data-answer-id="{{ $answer?->id }}"
                                                      data-question-id="{{ $question->id }}"
                                                      data-points="{{ $choice->points }}"
                                                      data-questionnaire-survey-id="{{ $questionnaireSurvey->id }}"
                                                  >
                                                {{ $choice->points }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-collapse>
        @empty
            <div class="italic text-base-content/50 my-5 text-center">Nessun questionario in comune trovato</div>
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
                )"
            >Modifica
            </x-button>
        </div>
    </x-modal>

    <x-modal wire:model="massUpdateModal" title="Salva modifiche Rapide">
        <div class="mb-5">Ci sono <span x-text="updates.length"></span> modifiche non salvate.</div>
        <span id="updates-store" data-store></span>
        <x-hr/>
        <div class="space-y-2">
            <x-button class="block w-full btn-sm" wire:click="massUpdateModal = false">Annulla</x-button>
            <x-button class="block w-full btn-sm btn-info" x-on:click="toggleQuickEditMode">
                Esci e resetta le domande
            </x-button>
            <x-button
                class="block w-full btn-sm btn-success"
                spinner="massUpdateAnswers"
                x-on:click="$wire.massUpdateAnswers(updates); quickEditMode = false; updates = []; $wire.$refresh();"
            >
                Salva le modifiche
            </x-button>
        </div>
    </x-modal>

    <x-button
        x-show="quickEditMode"
        class="fixed bottom-6 right-44 z-50 shadow-xl btn-warning"
        x-on:click="reset"
    >Annulla
    </x-button>
    <x-button
        x-show="quickEditMode" class="fixed bottom-6 right-20 z-50 shadow-xl btn-success"
        wire:click="massUpdateModal = true"
    >Salva
    </x-button>


    @script
    <script>
        window.answers = function () {
            return {
                fullscreenMode: false,
                quickEditMode: false,
                answer: {
                    answerID: null,
                    questionID: null,
                    questionnaireSurveyID: null,
                    choiceID: null,
                    value: null,
                    oldAnswerText: null,
                    newAnswerText: null,
                },

                /** @type {HTMLDivElement[]} */
                questions: [],

                /** @type {array<{question_id: number; questionnaire_survey_id: number; choice_id: number }>} */
                updates: [],

                selectedQuestion: 0,

                tap: new Audio('{{ asset('assets/tap.mp3') }}'),

                init() {
                    const targetQuestionnaire = document.querySelector(`[data-questionnaire='${$wire.questionnaireSurvey_id}']`);
                    const targetQuestion = document.querySelector(`[data-question='${$wire.question_id}']`);

                    if (!targetQuestionnaire && !targetQuestion) return;

                    targetQuestionnaire.scrollIntoView({behavior: 'instant'});
                    targetQuestionnaire.querySelector('input').checked = true;
                    targetQuestion?.scrollIntoView({behavior: 'instant'});
                    targetQuestion?.classList.add('!bg-primary/20');

                    removeFromQueryString('questionnaireSurvey_id', 'question_id');
                },

                reset() {
                    this.quickEditMode = false;
                    this.updates = [];
                    $wire.massUpdateModal = false;
                    $wire.$refresh();
                    document.getElementById('poll').setAttribute('wire:poll.10s', '');
                },

                toggleQuickEditMode() {
                    if (!this.quickEditMode) {
                        this.quickEditMode = true;
                        document.getElementById('poll').removeAttribute('wire:poll.10s');
                        this.initQuickEditMode();
                    } else {
                        this.reset();
                    }
                },

                initQuickEditMode() {
                    this.questions = Array.from(document.querySelectorAll('[data-question]'));
                    document.querySelectorAll('[data-questionnaire]').forEach(q => {
                        q.querySelector('input').checked = true;
                    });
                    this.selectedQuestion = 0;
                    this.questions[0].focus();
                },

                /**
                 * @param {MouseEvent} e
                 */
                handleChoiceClick(e) {
                    if (this.quickEditMode) {
                        this.focusQuestion(parseInt(e.target.dataset.questionId));
                        const choices = this.selectedQuestionEl.querySelectorAll('[data-choice]');
                        choices.forEach(el => el.classList.remove('bg-primary', 'bg-accent/50', '!bg-accent/15'));
                        e.target.classList.add('bg-primary');
                        this.focusNextQuestion();
                        this.addChoice(
                            parseInt(e.target.dataset.questionId),
                            parseInt(e.target.dataset.questionnaireSurveyId),
                            parseInt(e.target.dataset.id),
                        );
                    } else {
                        this.answer.answerID = e.target.dataset.answerId;
                        this.answer.questionID = e.target.dataset.questionId;
                        this.answer.questionnaireSurveyID = e.target.dataset.questionnaireSurveyId;
                        this.answer.choiceID = e.target.dataset.id;
                        this.answer.oldAnswerText = e.target.dataset.oldAnswerText;
                        this.answer.newAnswerText = e.target.dataset.text;
                        $wire.updateModal = true;
                    }
                },

                /**
                 * @param {number} questionID
                 * @param {KeyboardEvent} e
                 */
                handleKeydownEvent(questionID, e) {
                    if (!this.quickEditMode) return;
                    if (questionID !== this.selectedQuestionId) return;

                    const choices = Array.from(this.selectedQuestionEl.querySelectorAll('[data-choice]'));

                    if (!e.key || !choices.map(el => el.dataset.points).includes(e.key)) return;

                    choices.forEach(el => el.classList.remove('bg-primary', 'bg-accent/50', '!bg-accent/15'));
                    const newChoiceEL = choices.find(el => el.dataset.points === e.key);
                    newChoiceEL.classList.add('bg-primary');

                    this.addChoice(
                        parseInt(this.selectedQuestionEl.dataset.question),
                        parseInt(this.selectedQuestionEl.dataset.questionnaireSurvey),
                        parseInt(newChoiceEL.dataset.id),
                    );
                    this.focusNextQuestion();
                },

                /**
                 * @param {number} question_id
                 * @param {number} questionnaire_survey_id
                 * @param {number} choice_id
                 */
                addChoice(question_id, questionnaire_survey_id, choice_id) {
                    this.updates = this.updates
                        .filter(update => update.question_id !== question_id);
                    this.updates.push({question_id, questionnaire_survey_id, choice_id});

                    try {
                        this.tap.play();
                    } catch (err) {
                        console.error(err);
                    }
                },

                /** @param {number} id */
                focusQuestion(id) {
                    if (!this.quickEditMode) return;
                    const index = this.questions.findIndex(q => q.dataset.question === id.toString());
                    this.questions[index].focus();
                    this.selectedQuestion = index;
                },

                focusPreviousQuestion() {
                    if (this.selectedQuestion === 0) return;
                    this.selectedQuestion--;
                    this.questions[this.selectedQuestion].focus();
                },

                focusNextQuestion() {
                    if (this.selectedQuestion === this.questions.length - 1) return;
                    this.selectedQuestion++;
                    this.questions[this.selectedQuestion].focus();
                },

                /** @param {KeyboardEvent} e */
                handleQuickMovement(e) {
                    if (!this.quickEditMode) return;
                    if (e.key === 'ArrowUp' || (e.shiftKey && e.key === 'Tab')) {
                        this.focusPreviousQuestion();
                        e.preventDefault();
                    } else if (e.key === 'ArrowDown' || e.key === 'Tab') {
                        this.focusNextQuestion();
                        e.preventDefault();
                    }
                },

                /** @returns {HTMLDivElement} */
                get selectedQuestionEl() {
                    return this.questions[this.selectedQuestion];
                },

                get selectedQuestionId() {
                    return parseInt(this.questions[this.selectedQuestion]?.dataset.question);
                },
            };
        };
    </script>
    @endscript
</div>
