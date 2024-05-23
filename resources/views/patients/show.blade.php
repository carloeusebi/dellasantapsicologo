<x-layouts.app :title="$patient->full_name">
  <x-slot:breadcrumb>
    <li class="font-bold"><a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a></li>
    <li>{{ $patient->full_name }}</li>
  </x-slot:breadcrumb>
</x-layouts.app>
