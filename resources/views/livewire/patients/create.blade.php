<div>
  <x-slot:title>Crea Paziente</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('patients.index') }}" wire:navigate.hover class="font-bold">Pazienti</a></li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <x-header title="Aggiungi un nuovo Paziente" size="text-xl" separator/>

  @include('patients.form')
</div>
