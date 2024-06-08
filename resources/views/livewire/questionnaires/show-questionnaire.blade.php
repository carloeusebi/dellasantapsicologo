<div>
  <x-slot:title>Crea Questionario</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('questionnaires.index') }}" wire:navigate.hover>Questionari</a>
    </li>
    <li>{{ $questionnaire->title }}</li>
  </x-slot:breadcrumb>

  <x-header :title="$questionnaire->title" size="text-xl">
    <x-slot:subtitle>
      @if ($questionnaire->user)
        Caricato da: {{ $questionnaire->user->name }}, {{ $questionnaire->created_at->translatedFormat('d F Y') }}
        @unless ($questionnaire->created_at->eq($questionnaire->updated_at))
          (ultima modifica {{ $questionnaire->updated_at->translatedFormat('d F Y') }})
        @endunless
      @endif
      <div>Utilizzato in {{ $questionnaire->surveys_count }} valutazioni</div>
    </x-slot:subtitle>
    <x-slot:actions>
      <x-button
          label="Crea una copie del questionario" icon="o-clipboard-document-list"
          x-on:click="alert('Feature in costruzione')"
      />
      @can('delete', $questionnaire)
        <x-button icon="o-trash" label="Elimina" onclick="deleteModal.showModal()"/>
        <x-modal id="deleteModal" title="Elimina Questionario" class="backdrop-blur">
          <p>Sei sicuro di voler eliminare il questionario?</p>
          <x-slot:actions>
            <x-button onclick="deleteModal.close()" label="Annulla"/>
            <x-button class="btn-error" icon="o-trash" wire:click="delete" spinner="delete" label="Elimina"/>
          </x-slot:actions>
        </x-modal>
      @endcan
    </x-slot:actions>
  </x-header>

  <x-tabs wire:model="selectedTab">
    <x-tab :name="self::$TITLE" label="Titolo e Descrizione">
      <livewire:questionnaires.title-tab :$questionnaire lazy/>
    </x-tab>

    <x-tab :name="self::$QUESTIONS" label="Domande">
      <livewire:questionnaires.questions-tab :$questionnaire lazy/>
    </x-tab>

    <x-tab :name="self::$VARIABLES" label="Variabili"></x-tab>
  </x-tabs>
</div>
