<div>
  <x-slot:title>{{ $survey->title }} di {{ $survey->patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Batterie</a></li>
    <li>{{ $survey->title }}</li>
  </x-slot:breadcrumb>

  <x-header :title="$survey->title.' di '. $survey->patient->full_name" size="text-xl" separator class="!mb-2"/>


  <x-tabs wire:model.live="tab">
    <x-tab name="dettagli" label="Dettagli" icon="o-document-magnifying-glass">
      <div>Dettagli</div>
    </x-tab>

    <x-tab name="risposte" label="Risposte" icon="o-list-bullet">
      <div>Risposte</div>
    </x-tab>

    <x-tab name="risultati" label="Risultati" icon="o-presentation-chart-line">
    </x-tab>

    <x-tab name="commenti" label="Commenti" icon="o-chat-bubble-bottom-center-text">
      <livewire:surveys.comments :$survey lazy/>
    </x-tab>
  </x-tabs>
</div>
