@php use App\Models\QuestionnaireSurvey; @endphp
@php
  /** @var QuestionnaireSurvey[] $questionnaireSurvey */
@endphp

<div>
  <div class="p-3 flex flex-wrap md:flex-nowrap justify-end gap-4 sticky top-0 bg-base-100 z-20 shadow-lg">
    <x-loading class="text-primary" wire:loading/>
    <div class="w-full md:w-fit min-w-[400px]">
      <x-input
          class="grow"
          icon="o-magnifying-glass" placeholder="Cerca questionario" wire:model.live.debounce="query"
          clearable x-on:keyup.esc="$wire.query = ''; $wire.$refresh()"
      />
    </div>
    <x-button icon="o-computer-desktop" responsive class="grow md:grow-0">Schermo Intero</x-button>
  </div>
  <x-hr/>
  <x-accordion wire:model="accordion">
    @foreach($this->questionnaires as $questionnaireSurvey)
      <x-collapse :name="$questionnaireSurvey->id" collapse-plus-minus :key="$questionnaireSurvey->id">
        <x-slot:heading>
          <x-header
              size="text-lg" class="!mb-0"
              :subtitle="$questionnaireSurvey->questionnaire->description"
          >
            <x-slot:title>
              <span>{{ $questionnaireSurvey->questionnaire->title }}</span>
              @foreach($questionnaireSurvey->questionnaire->tags as $tag)
                <div
                    class="badge badge-sm badge-outline my-1 h-fit font-bold"
                    style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
                >{{ $tag->tag }}</div>
              @endforeach
            </x-slot:title>
          </x-header>
        </x-slot:heading>
        <x-slot:content>
          @foreach($questionnaireSurvey->answers as $answer)
            <x-list-item :item="$answer->question" no-hover>
              <x-slot:subValue>
                <div class="text-wrap">
                  {{ $answer->comment }}
                </div>
              </x-slot:subValue>
              @if ($questionnaireSurvey->questionnaire->choices->count())
                <x-slot:value>
                  <div class="text-wrap mb-2">{{ $loop->index + 1 }}. {{ $answer->question->text }}</div>
                  <div class="space-y-1">
                    @foreach($questionnaireSurvey->questionnaire->choices as $choice)
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
        </x-slot:content>
      </x-collapse>
    @endforeach
  </x-accordion>

</div>
