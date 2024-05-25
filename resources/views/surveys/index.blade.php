<x-layouts.app title="Valutazioni">
  <x-slot:breadcrumb>
    <ul>
      <li>Valutazioni</li>
    </ul>
  </x-slot:breadcrumb>

  <div class="my-3 text-2xl font-bold flex justify-end">
    <a href="{{ route('surveys.create') }}" class="hover:underline select-none cursor-pointer" wire:navigate.hover>
      <h2>Nuovo Test di Valutazione</h2>
    </a>
  </div>

  <livewire:surveys.surveys-table/>
</x-layouts.app>
