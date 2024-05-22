<x-layouts.app title="Nuovo Paziente">
  <x-slot name="breadcrumb">
    <ul>
      <li class="font-bold"><a href="{{ route('patients.index') }}" wire:navigate.hover>Pazienti</a></li>
      <li>Nuovo</li>
    </ul>
  </x-slot>
</x-layouts.app>
