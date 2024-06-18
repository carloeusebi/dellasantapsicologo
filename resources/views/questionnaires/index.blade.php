<x-layouts.app title="Questionari">
    <x-slot:breadcrumb>
        <li>Questionari</li>
    </x-slot:breadcrumb>

    <x-create-button route="questionnaires.create" label="Crea questionario"/>

    <livewire:questionnaires.components.questionnaires-table/>
</x-layouts.app>
