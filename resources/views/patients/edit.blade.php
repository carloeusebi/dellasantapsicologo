<x-layouts.app :title="'Modifica ' . $patient->full_name">
  <x-slot name="breadcrumb">
    <ul>
      <li class="font-bold">
        <a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a>
      </li>
      <li class="font-bold">
        <a href="{{ route('patients.show', $patient) }}" wire:navigate>{{ $patient->full_name }}</a>
      </li>
      <li>Modifica</li>
    </ul>
  </x-slot>
</x-layouts.app>
