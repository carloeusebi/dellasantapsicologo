<x-layouts.app :title="$patient->full_name">
  <x-slot name="breadcrumb">
    <ul>
      <li class="font-bold"><a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a></li>
      <li>{{ $patient->full_name }}</li>
    </ul>
  </x-slot>
</x-layouts.app>
