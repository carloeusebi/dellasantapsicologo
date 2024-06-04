<div
    class="flex flex-col grow max-w-lg w-full mx-auto" x-data="{  showQuestionnaireDescription: true }"
>

  <template x-if="showQuestionnaireDescription">
    <div class="space-y-5">
      <h2 class="text-center font-bold">{{ $questionnaireSurvey->questionnaire->title }}</h2>
      <p class="text-justify">{{ $questionnaireSurvey->questionnaire->description }}</p>
      <div class="flex justify-center items-center ">
        <button
            class="bg-brand px-12 py-1 rounded-lg font-bold text-white w-full hover:opacity-70 active:opacity-70"
            x-on:click="showQuestionnaireDescription = false"
        >
          Rispondi
        </button>
      </div>
    </div>
  </template>

  <template x-if="!showQuestionnaireDescription">
    <div class="flex flex-col grow h-full">
      <div
          id="choices-list" class="text-center mx-auto font-semibold w-full"
          wire:key="{{ $question->id }}"
      >
        <div class="bg-gray-100 relative z-10 -mt-5 pt-5">
          <div class="mb-2">{{ $question->order }}. {{ $question->text }}</div>
          <div class="text-sm text-center font-normal">
            Questionario {{ $survey->completed_questionnaire_survey_count + 1 }}
            di {{ $survey->questionnaire_surveys_count }}
          </div>
          <div class="my-2">
            <x-progress
                class="progress-primary" :value="$question->order - 1" :max="$questionnaireSurvey->questions_count"
            />
          </div>
        </div>
        <div
            class="px-1"
            :key="{{ $question->id}}"
            x-data="{
              show: false,
              answered: false,
              answerQuestion(choiceId) {
                if (this.answered) return;
                this.answered = true;
                $wire.answerQuestion(choiceId);
              }
            }"
            x-show="show"
            x-init="setTimeout(() => show = true, 10)"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 -translate-y-full"
            x-transition:enter-end="opacity-100 transform"
        >
          @foreach($question->choices->isNotEmpty() ? $question->choices :  $questionnaireSurvey->questionnaire->choices as $choice)
            <div
                wire:key="{{  $question->id }}-{{ $choice->id }}"
                x-data=" {
                /** @param {Event} event */
                selectChoice(event) {
                if (answered || (event instanceof KeyboardEvent && document.querySelector('textarea') === document.activeElement)){
                 return;
                }
                if (answered) return;
                  this.selected = true;
                  answerQuestion({{ $choice->id }});
                },
                selected: false
              }"
                :class=" { active: selected }"
                class="choice relative flex items-center min-h-[40px] w-full mb-2 py-1 pe-3 rounded bg-brand/20
            text-brand-secondary shadow cursor-pointer border border-brand-secondary hover:scale-105 transition-all"
                data-choice-id="{{ $choice->id }}"
                x-on:keyup.{{ $loop->index + 1 }}.window="selectChoice($event)"
                x-on:click="selectChoice($event)"
            >
              <div
                  class="w-6 h-6 my-1 mx-2 flex items-center justify-center rounded-sm border border-brand-secondary bg-white/80 shrink-0"
              >{{ $loop->index + 1 }}</div>
              <div class="text-start">{{ $choice->text }}</div>
              <div class="grow"></div>
              <x-icon name="o-check" class="check-icon hidden"/>
            </div>
          @endforeach
        </div>
      </div>
      <x-textarea placeholder="Lascia un commento prima di rispondere." wire:model.trim="comment"></x-textarea>
      <div class="grow"></div>
      <x-button
          class="btn btn-sm my-2 bg-brand-secondary hover:bg-brand-secondary/95 text-white disabled:text-gray-500"
          wire:click="skipQuestion"
          x-bind:disabled="!$wire.comment"
          spinner="skipQuestion"
      >Salta questa domanda
      </x-button>
      <div class="text-xs text-center select-none">Per saltare la domanda devi lasciare un commento.</div>
    </div>
  </template>
</div>
