<div class="flex gap-2 md:gap-4 items-center">
  <div class="grow @if($canEditText) [&_.rounded-l-lg]:!rounded-l-none @endif">
    <x-input class="input-sm !rounded-s-none" wire:model="text" wire:keyup.enter="update" :disabled="!$canEditText">
      <x-slot:prepend>
        @if ($canEditText)
          <x-checkbox class="mx-1" wire:model="reversed" wire:change="update"/>
        @endif
        <span class="hidden md:block w-[29px] text-center">{{ $question->order }}</span>
      </x-slot:prepend>
      @if($canEditText)
        <x-slot:append>
          <x-button
              class="btn-sm rounded-s-none" icon="o-check" wire:click="update" spinner="update" responsive label="Salva"
          />
        </x-slot:append>
      @endif
    </x-input>
  </div>
  <div class="flex  gap-1 md:gap-2">
    @if($canEditStructure)
      <x-button class="btn-sm btn-error" wire:click="deleteModal = true" icon="o-trash" responsive/>

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
