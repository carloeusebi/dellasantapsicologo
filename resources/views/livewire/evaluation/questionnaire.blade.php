<div
    class="flex flex-col max-w-lg mx-auto" x-data="{  showQuestionnaireDescription: true }"
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
    <div
        id="choices-list" class="text-center mx-auto font-semibold w-full"
        wire:key="{{ $question->id }}"
        x-data="{ show: false }"
        x-show="show"
        x-init="setTimeout(() => show = true, 10)"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 -translate-y-full"
        x-transition:enter-end="opacity-100 transform"
    >
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
      @foreach($question->choices->isNotEmpty() ? $question->choices :  $questionnaireSurvey->questionnaire->choices as $choice)
        <div
            wire:key="{{  $question->id }}-{{ $choice->id }}"
            x-data=" { selected: false }"
            :class=" { active: selected }"
            class="choice relative flex items-center min-h-[40px] w-full mb-2 py-1 pe-3 rounded bg-brand/20
            text-brand-secondary shadow cursor-pointer border border-brand-secondary hover:scale-105 transition-all"
            data-choice-id="{{ $choice->id }}"
            wire:keyup.{{ $loop->index + 1 }}.window="answerQuestion({{ $question->id }}, {{ $choice->id }})"
            wire:click="answerQuestion({{ $question->id }}, {{ $choice->id }})"
            x-on:keyup.{{ $loop->index + 1 }}.window="selected = true"
            x-on:click="selected = true"
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
  </template>
</div>
