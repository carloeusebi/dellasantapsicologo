<div>
  <x-slot:title>Crea Questionario</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('questionnaires.index') }}" wire:navigate.hover>Questionari</a>
    </li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <x-card title="Crea Questionario" separator shadow>
    @include('questionnaires.form')

    <x-slot:actions>
      <x-button wire:click="store" spinner="store" label="Salva"/>
    </x-slot:actions>
  </x-card>
</div>
