<x-layouts.app title="Templates">
  <x-slot:breadcrumb>
    <li>Templates</li>
  </x-slot:breadcrumb>

  <x-link-to-create
      route="surveys.templates.create"
      label="Crea un nuovo Template"
  />

  <livewire:templates.templates-table/>
</x-layouts.app>
