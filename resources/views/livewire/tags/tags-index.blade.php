<div>
  <x-slot:title>Tags</x-slot:title>
  <x-slot:breadcrumb>
    <li>Tags</li>
  </x-slot:breadcrumb>

  <div class="my-3 text-xl font-bold flex justify-end">
    <a class="hover:underline select-none cursor-pointer" wire:click="create">
      <h2 class="underline">Aggiungi Tag</h2>
    </a>
  </div>

  <livewire:tags.tags-table lazy wire:key="{{ $key }}"/>

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
