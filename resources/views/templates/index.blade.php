<x-layouts.app title="Templates">
  <x-slot:breadcrumb>
    <li>Templates</li>
  </x-slot:breadcrumb>

  <div class="my-3 text-xl font-bold flex justify-end">
    <a
        href="{{ route('surveys.templates.create') }}" class="hover:underline select-none cursor-pointer"
        wire:navigate.hover
    >
      <h2 class="underline">Crea un nuovo template</h2>
    </a>
  </div>

  <livewire:templates.templates-table/>
</x-layouts.app>
