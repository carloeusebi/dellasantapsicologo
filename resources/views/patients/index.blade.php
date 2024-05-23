<x-layouts.app title="Pazienti">
  <x-slot name="breadcrumb">
    <ul>
      <li class="">Pazienti</li>
    </ul>
  </x-slot>

  <div class="card shadow-2xl">
    <div class="card-body px-2">
      <livewire:patients.table/>
    </div>
  </div>
</x-layouts.app>
