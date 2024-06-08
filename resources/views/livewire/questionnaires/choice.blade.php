<div class="flex gap-2 md:gap-4 items-end">
  <div class="w-[50px] lg:w-[100px]">
    <x-input
        wire:model="points" class="input-sm text-center" placeholder="Punti" first-error-only
        :disabled="!$canEditStructure" wire:keyup.enter="update" :label="$isFirst ? 'Punti' : ' '"
    />
  </div>
  <div class="grow">
    <x-input
        wire:model="text" class="input-sm grow" placeholder="Testo" first-error-only
        :disabled="!$canEditText" wire:keyup.enter="update" :label="$isFirst ? 'Testo' : ' '"
    >
      @if($canEditText)
        <x-slot:append>
          <x-button
              class="btn-sm rounded-s-none" icon="o-check" wire:click="update" spinner="update" responsive label="Salva"
          />
        </x-slot:append>
      @endif
    </x-input>
  </div>

  @if($canEditStructure)
    <div class="flex gap-2 items-center">
      <x-button class="btn-sm btn-error" wire:click="deleteModal = true" responsive icon="o-trash"/>

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
    </div>
  @endif
</div>
