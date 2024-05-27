<div>
  <x-slot:title>{{ $survey->title }} di {{ $survey->patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Valutazioni</a></li>
    <li>{{ $survey->title }}</li>
  </x-slot:breadcrumb>

  <x-header size="text-xl" separator class="!mb-0">
    <x-slot:title>
      <span>{{ $survey->title }} di </span>
      <a href="{{ route('patients.show', $survey->patient) }}" class="underline" wire:navigate.hover>
        {{ $survey->patient->full_name }}
      </a>
    </x-slot:title>
  </x-header>


  <x-tabs wire:model.live="tab">
    <x-tab name="dettagli" label="Dettagli" icon="o-document-magnifying-glass">
    </x-tab>

    <x-tab name="risposte" label="Risposte" icon="o-list-bullet">
      <livewire:surveys.answers :$survey/>
    </x-tab>

    <x-tab name="risultati" label="Risultati" icon="o-presentation-chart-line">
    </x-tab>

    <x-tab name="commenti" label="Commenti" icon="o-chat-bubble-bottom-center-text">
      <livewire:surveys.comments :$survey lazy/>
    </x-tab>
  </x-tabs>

  <!--suppress CssUnusedSymbol -->
  <style>
    .tab-content {
      padding-bottom: 0;
    }

    .tab-content > div {
      max-height: calc(100vh - 240px);
      overflow-y: scroll;
    }
  </style>
</div>
