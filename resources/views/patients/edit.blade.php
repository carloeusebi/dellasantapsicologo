<x-layouts.app :title="'Modifica ' . $patient->full_name">
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a>
    </li>
    <li class="font-bold">
      <a href="{{ route('patients.show', $patient) }}" wire:navigate>{{ $patient->full_name }}</a>
    </li>
    <li>Modifica</li>
  </x-slot:breadcrumb>
</x-layouts.app>
