<x-layouts.app title="Pazienti">
  <x-slot name="breadcrumb">
    <li class="">Pazienti</li>
  </x-slot>

  <div class="my-3 text-2xl font-bold flex justify-end">
    <a href="{{ route('patients.create') }}" class="hover:underline select-none cursor-pointer" wire:navigate.hover>
      <h2>Aggiungi Paziente</h2>
    </a>
  </div>

  <livewire:patients.table/>
</x-layouts.app>
