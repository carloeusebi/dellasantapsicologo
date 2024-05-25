<div>
  <x-slot:title>Modifica {{ $patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('patients.index') }}" class="font-bold" wire:navigate.hover>Pazienti</a></li>
    <li><a
          href="{{ route('patients.show', $patient) }}" class="font-bold" wire:navigate.hover
      >{{ $patient->full_name }}</a></li>
    <li>Modifica</li>
  </x-slot:breadcrumb>

  <x-header :title="'Modifica '. $patient->full_name" size="text-xl" separator/>

  @include('patients.form')

</div>
