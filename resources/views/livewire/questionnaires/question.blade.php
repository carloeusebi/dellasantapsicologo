<div class="flex gap-2 md:gap-4 items-center">
  <x-checkbox wire:model="reversed" wire:keyup.enter="update" wire:change="update"/>
  <div class="grow">
    <x-input class="input-sm" wire:model="text" wire:keyup.enter="update"/>
  </div>
  <div class="flex  gap-1 md:gap-2">
    @if($canEditText)
      <x-button
          class="btn-xs md:btn-sm" wire:click="update" spinner="update" responsive icon="o-pencil"
          label="Modifica"
      />
    @endif
    @if($canEditStructure)
      <x-button
          class="btn-xs md:btn-sm btn-error" wire:click="deleteModal = true" icon="o-trash" responsive label="Elimina"
      />

      <x-modal wire:model="deleteModal" title="Elimina Domanda" class="backdrop-blur">
        <p>Sei sicuro di voler eliminare questa domanda?</p>
        <x-slot:actions>
          <x-button wire:click="deleteModal = false" label="Annulla"/>
          <x-button
              wire:click="delete" spinner="delete" label="Elimina" icon="o-trash" class="btn-error"
              x-on:keyup.enter.window="
                      if ($wire.deleteModal) {
                        $wire.delete();
                      }
                    "
          />
        </x-slot:actions>
      </x-modal>
    @endif
  </div>
</div>
