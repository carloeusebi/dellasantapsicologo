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
      <x-forms.template-form/>
    </x-step>

    <x-step step="{{ self::$CHOOSE_QUESTIONNAIRES }}" text="Questionari">
      <livewire:questionnaire-picker/>
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
          x-bind:disabled="!$wire.name || !$wire.form.selectedQuestionnaires.length"
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
