<x-layouts.app title="Batterie">
  <x-slot:breadcrumb>
    <ul>
      <li>Batterie</li>
    </ul>
  </x-slot:breadcrumb>

  <div class="my-3 text-2xl font-bold hover:underline select-none cursor-pointer flex justify-end">
    <a href="{{ route('surveys.create') }}" wire:navigate.hover>
      <h2>Nuova Batteria</h2>
    </a>
  </div>

  <livewire:surveys.table/>
</x-layouts.app>
