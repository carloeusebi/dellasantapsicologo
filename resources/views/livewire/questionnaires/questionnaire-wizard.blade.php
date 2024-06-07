<div>
  <x-slot:title>Crea Questionario</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('questionnaires.index') }}">Questionari</a>
    </li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <p>
    Ad ogni step le modifiche vengono salvate automaticamente.
  </p>

  <x-hr/>

  <x-steps wire:model="step" class="border my-5 p-5">
    <x-step :step="self::$CHOOSE_TITLE" text="Titolo e Descrizione">
      <div class="space-y-5">
        <x-input
            wire:model.live.debounce="form.title" label="Titolo" placeholder="Nome del questionario" first-error-only
        />
        <x-textarea
            wire:model.live.debounce="form.description" label="Descrizione" placeholder="Descrizione del questionario"
            first-error-only
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
      {{--      <div class="space-y-5">--}}
      {{--        <div class="label label-text font-semibold">Risposte</div>--}}
      {{--        <p class="text-sm text-base-content/75">Lasciare vuoto se ogni domanda ha risposte differenti.</p>--}}
      {{--        <div class="flex gap-2 md:gap-4">--}}
      {{--          @if($choices)--}}
      {{--            @foreach($choices as $choice)--}}
      {{--              <div>--}}
      {{--                <span>{{ $choice->points }}</span>--}}
      {{--                <span>{{ $choice->text }}</span>--}}
      {{--              </div>--}}
      {{--            @endforeach--}}
      {{--          @endif--}}
      {{--          <div class="shrink">--}}
      {{--            <x-input--}}
      {{--                wire:model="newChoicePoints" placeholder="Valore in punti" class="w-[50px] md:w-[80px] lg:w-fit"--}}
      {{--                label="Punti" wire:keyup.enter="addChoice"--}}
      {{--            />--}}
      {{--          </div>--}}
      {{--          <div class="grow">--}}
      {{--            <x-input--}}
      {{--                wire:model="newChoiceText" placeholder="Testo della risposta" label="Testo" wire:keyup.enter="addChoice"--}}
      {{--            />--}}
      {{--          </div>--}}
      {{--        </div>--}}
      {{--        <div class="flex justify-end">--}}
      {{--          <x-button class="btn-sm" wire:click="addChoice" spinner="addChoice">Aggiungi Risposta</x-button>--}}
      {{--        </div>--}}
      {{--      </div>--}}
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
