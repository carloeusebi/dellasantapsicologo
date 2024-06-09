<div>
  <x-slot:title>Crea Questionario</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('questionnaires.index') }}" wire:navigate.hover>Questionari</a>
    </li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <x-header
      title="Creazione Questionario" size="text-2xl" subtitle="Compila i campi per creare un nuovo questionario."
      separator
  />

  @include('questionnaires.form')

  <x-hr/>

  <div class="flex justify-end">
    <x-button class="btn-wide" wire:click="store" spinner="store" label="Salva"/>
  </div>
</div>
