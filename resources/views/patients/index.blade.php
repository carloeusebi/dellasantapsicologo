<x-layouts.app title="Pazienti">
  <x-slot name="breadcrumb">
    <li class="">Pazienti</li>
  </x-slot>

  <div class="my-3 text-xl font-bold flex justify-end">
    <a href="{{ route('patients.create') }}" class="hover:underline select-none cursor-pointer" wire:navigate.hover>
      <h2 class="underline">Aggiungi Paziente</h2>
    </a>
  </div>

  <livewire:patients.patient-table/>
</x-layouts.app>
