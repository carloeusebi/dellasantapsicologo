<div>
  <x-slot:title>Crea Template</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold hover:underline">
      <a href="{{ route('surveys.templates.index') }}">Templates</a>
    </li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <x-steps wire:model="step" class="border my-5 p-5">
    <x-step step="{{ self::$CHOOSE_TITLE }}" text="Titolo">
      <div class="space-y-5">
        <x-input label="Nome" placeholder="Dai un nome al Template" wire:model.live.debounce="name"/>
        <x-choices
            class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
            wire:model.live.debounce="selectedTags" label="Tags"
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
        <x-textarea label="Descrizione" placeholder="Descrizione" wire:model.live.debounce="description"/>
        <x-checkbox label="Visibile anche agli altri utenti"/>
      </div>
    </x-step>

    <x-step step="{{ self::$CHOOSE_QUESTIONNAIRES }}" text="Questionari">
      <livewire:questionnaire-picker/>

      <x-errors class="mt-2"/>
    </x-step>
  </x-steps>

  <div class="flex justify-end gap-2 items-center">
    @unless($step === self::$CHOOSE_TITLE)
      <x-button
          wire:click="prev" x-bind:disabled="$wire.step === 1" spinner="prev" wire:loading.attr="disabled"
          wire:target="prev,next,updateSelectedQuestionnaires,selectQ,removeQ"
      >Torna Indietro
      </x-button>
    @endif
    @if ($step === self::$CHOOSE_QUESTIONNAIRES)
      <x-button
          wire:click="store" spinner="store" wire:loading.attr="disabled"
          wire:target="prev,next,updateSelectedQuestionnaires,selectQ,removeQ"
          x-bind:disabled="!$wire.name || !$wire.selectedQuestionnaires.length"
          class="btn-primary"
      >Crea
      </x-button>
    @else
      <x-button
          wire:click="next" spinner="next" wire:loading.attr="disabled"
          wire:target="prev,next,updateSelectedQuestionnaires,selectQ,removeQ"
      >Prosegui
      </x-button>
    @endif
  </div>
</div>
