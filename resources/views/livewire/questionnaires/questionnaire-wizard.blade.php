<div>
  <x-slot:title>Crea Questionario</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('questionnaires.index') }}">Questionari</a>
    </li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <p>
    - Ad ogni step le modifiche vengono salvate automaticamente.
  </p>
  @can('updateText', $questionnaire)
    <p>
      - Si può modificare la struttura solamente finché il questionario non è stato utilizzato. Una volta che è stato
      utilizzato si possono solamente modificare i testi.
    </p>
  @endcan

  <x-hr/>

  <x-steps wire:model="step" class="border my-5 py-5 px-1 md:px-5">
    <x-step :step="self::$CHOOSE_TITLE" text="Titolo e Descrizione">
      <div class="space-y-5">
        <x-input
            wire:model.live.debounce="form.title" label="Titolo" placeholder="Nome del questionario" first-error-only
        />
        <x-textarea
            wire:model.live.debounce="form.description" label="Descrizione" placeholder="Descrizione del questionario"
            first-error-only rows="5"
        />

        <x-choices
            class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
            wire:model.live="form.selectedTags" label="Tags"
            option-label="tag" option-value="id" placeholder="Cerca per tag"
            error-field="selectedTags.*" first-error-only
        >
          @scope('item', $tag)
          <x-list-item :item="$tag" class="h-10">
            <x-slot:value>
              <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
            </x-slot:value>
          </x-list-item>
          @endscope
          @scope('selection', $tag)
          <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
          @endscope
        </x-choices>
        <x-checkbox label="Visibile anche agli altri utenti" wire:model="form.visible"/>
      </div>
    </x-step>

    <x-step :step="self::$CHOOSE_QUESTIONS" text="Domande">
      <div class="mb-5">
        <span class="label label-text font-semibold">Risposte</span>
        <span class="text-xs text-base-content/75">Lasciare vuoto se ogni domanda ha il suo set di risposte.</span>
      </div>
      <div class="space-y-4">
        @forelse($questionnaire?->choices ?? [] as $choice)
          <livewire:questionnaires.choice
              :choice="$choice" :key="$choice->id"
              :can-edit-text="auth()->user()->can('updateText', $questionnaire)"
              :can-edit-structure="auth()->user()->can('updateStructure', $questionnaire)"
          />
        @empty
          <div class="my-5 text-center text-base-content/50 italic">Nessuna Risposta</div>
        @endforelse
        @can('updateStructure', $questionnaire)
          <x-divider/>
          <div class="flex gap-2 md:gap-4">
            <div class="w-[50px] lg:w-[130px]">
              <x-input
                  wire:model.live.debounce="newChoicePoints" class="input-sm" placeholder="Punti" first-error-only
                  wire:keyup.enter="addChoice" type="number" autofocus
              />
            </div>
            <div class="grow">
              <x-input
                  wire:model="newChoiceText" class="input-sm grow" placeholder="Testo" first-error-only
                  wire:keyup.enter="addChoice"
              />
            </div>
            <x-button
                class="btn-sm btn-info" wire:click="addChoice" spinner="addChoice" label="Aggiungi risposta"
                icon="o-plus" responsive
            />
          </div>
        @endcan
      </div>

      <x-hr/>
      <div>
        <div class="label label-text font-semibold">Domande</div>
        <div class="space-y-2" wire:sortable="updateQuestionsOrder" wire:sortable.options="{ animation: 250 }">
          @forelse($questionnaire?->questions ?? [] as $question)
            <div
                class="flex items-center gap-1 sm:gap-2"
                wire:sortable.item="{{ $question->id }}" wire:key="{{ $question->id }}"
            >
              @can('updateText', $questionnaire)
                <x-button
                    class="btn btn-xs md:btn-sm cursor-grab" type="button" wire:sortable.handle icon="o-bars-3"
                />
              @else
                <input type="hidden" wire:sortable.handle/>
              @endcan
              <div class="grow">
                <livewire:questionnaires.question
                    :question="$question" :key="$question->id"
                    :can-edit-text="auth()->user()->can('updateText', $questionnaire)"
                    :can-edit-structure="auth()->user()->can('updateStructure', $questionnaire)"
                />
              </div>
            </div>
          @empty
            <div class="my-5 text-center text-base-content/50 italic">Nessuna Domanda</div>
          @endforelse
        </div>
        @can('updateStructure', $questionnaire)
          <x-divider/>
          <div class="flex items-start gap-2 md:gap-4">
            <div class="flex items-center h-full">
              <x-checkbox wire:model="newQuestionReversed"/>
            </div>
            <div class="grow">
              <x-input
                  wire:model="newQuestionText" class="input-sm grow" placeholder="Testo" first-error-only
                  wire:keyup.enter="addQuestion"
              />
            </div>
            <x-button
                class="btn-sm btn-info" wire:click="addQuestion" spinner="addQuestion" label="Aggiungi domanda"
                icon="o-plus" responsive
            />
          </div>
        @endcan
      </div>
    </x-step>

    <x-step :step="self::$CHOOSE_VARIABLES" text="Variabili">
      VARIABILI
    </x-step>
  </x-steps>

  <div class="flex justify-end my-5 gap-4">
    @unless($step === self::$CHOOSE_TITLE)
      <x-button wire:click="previous" spinner="previous" label="Torna indietro"/>
    @endunless
    @if($step === self::$CHOOSE_VARIABLES)
      <x-button wire:click="save" spinner="save" label="Salva"/>
    @else
      <x-button wire:click="next" spinner="next" label="Prosegui"/>
    @endif
  </div>
</div>
