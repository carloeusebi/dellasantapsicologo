<x-layouts.app title="Templates">
    <x-slot:breadcrumb>
        <li>Templates</li>
    </x-slot:breadcrumb>

    <x-create-button route="surveys.templates.create" label="Crea un nuovo Template"/>

    <livewire:templates.components.templates-table/>
</x-layouts.app>
