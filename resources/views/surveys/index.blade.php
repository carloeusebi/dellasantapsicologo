<x-layouts.app title="Valutazioni">
  <x-slot:breadcrumb>
    <ul>
      <li>Valutazioni</li>
    </ul>
  </x-slot:breadcrumb>

  <x-create-button route="surveys.create" label="Crea nuova valutazione"/>

  <livewire:surveys.surveys-table/>
</x-layouts.app>
