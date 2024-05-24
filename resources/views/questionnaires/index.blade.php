<x-layouts.app title="Questionari">
  <x-slot:breadcrumb>
    <li>Questionari</li>
  </x-slot:breadcrumb>

  <div class="my-3 text-2xl font-bold hover:underline select-none cursor-pointer flex justify-end">
    <a href="{{ route('questionnaires.create') }}" wire:navigate.hover>
      <h2>Crea Questionario</h2>
    </a>
  </div>

  <livewire:questionnaires.table/>
</x-layouts.app>
