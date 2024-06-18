<div>
    <x-slot:title>Tags</x-slot:title>
    <x-slot:breadcrumb>
        <li>Tags</li>
    </x-slot:breadcrumb>

    @can('create', App\Models\Tag::class)
        <x-create-button wire:click.prevent="create" label="Crea nuovo Tag"/>
    @endcan

    <livewire:tags.components.tags-table lazy wire:key="{{ $key }}"/>

    <x-modal wire:model="tagModal" :title="$form->tag ? 'Modifica Tag' : 'Nuovo Tag'" class="backdrop-blur">
        <x-form class="space-y-1">
            <x-input wire:model="form.name" label="Nome" required/>
            <x-colorpicker wire:model="form.color" label="Colore" required/>
            <x-slot:actions>
                <x-button x-on:click="$wire.tagModal = false">Annulla</x-button>
                <x-button wire:click="save" spinner="save">Salva</x-button>
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
