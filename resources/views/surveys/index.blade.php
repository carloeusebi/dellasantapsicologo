<x-layouts.app title="Valutazioni">
  <x-slot:breadcrumb>
    <ul>
      <li>Valutazioni</li>
    </ul>
  </x-slot:breadcrumb>

  <div class="my-3 text-2xl font-bold flex justify-end">
    <a href="{{ route('surveys.create') }}" class="hover:underline select-none cursor-pointer" wire:navigate.hover>
      <h2>Nuova Batteria</h2>
    </a>
  </div>

  <livewire:surveys.table/>
</x-layouts.app>
