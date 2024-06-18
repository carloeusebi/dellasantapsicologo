<x-layouts.app title="Pazienti">
    <x-slot name="breadcrumb">
        <li class="">Pazienti</li>
    </x-slot>

    <x-create-button route="patients.create" label="Crea nuovo paziente"/>

    <livewire:patients.components.patient-table/>
</x-layouts.app>
