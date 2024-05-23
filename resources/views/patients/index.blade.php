<x-layouts.app title="Pazienti">
  <x-slot name="breadcrumb">
    <ul>
      <li class="">Pazienti</li>
    </ul>
  </x-slot>

  <div class="my-3 text-2xl font-bold hover:underline select-none cursor-pointer flex justify-end">
    <a href="{{ route('patients.create') }}" wire:navigate.hover>
      <h2>Aggiungi Paziente</h2>
    </a>
  </div>

  <livewire:patients.table/>
</x-layouts.app>
