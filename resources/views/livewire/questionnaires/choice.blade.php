<div class="flex gap-2 md:gap-4 items-end">
  <div class="w-[50px] lg:w-[100px]">
    <x-input
        wire:model="points" class="input-sm" placeholder="Punti" first-error-only
        x-bind:disabled="!$wire.canEditStructure" wire:keyup.enter="update"
    />
  </div>
  <div class="grow">
    <x-input
        wire:model="text" class="input-sm grow" placeholder="Testo" first-error-only
        x-bind:disabled="!$wire.canEditText" wire:keyup.enter="update"
    />
  </div>
  <div class="flex gap-2">
    <x-button class="btn-sm btn-info" wire:click="update" spinner="update" responsive icon="o-pencil">
      Modifica
    </x-button>
    @if($canEditStructure)
      <x-button class="btn-sm btn-error" wire:click="deleteModal = true" responsive icon="o-trash">
        Elimina
      </x-button>
    @endif
  </div>

  @if($canEditStructure)
    <x-modal wire:model="deleteModal" title="Elimina risposta" class="backdrop-blur" wire:keyup.enter="delete">
      <div>
        Sei sicuro di voler eliminare la risposta?
      </div>
      <x-slot:actions>
        <x-button wire:click="deleteModal = false">Annulla</x-button>
        <x-button class="btn-error" icon="o-trash" wire:click="delete" spinner="delete">
          Elimina
        </x-button>
      </x-slot:actions>
    </x-modal>
  @endif
</div>
