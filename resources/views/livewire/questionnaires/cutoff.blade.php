<div class="flex justify-between items-start md:items-center">
  <div class="flex flex-col md:flex-row md:items-center gap-x-2">
    <span class="font-bold">{{ $cutoff->name }}</span>
    <span class="hidden md:block">-</span>
    <span>{{ $cutoff->well_formed_target }}
      @if ($variable->gender_based)
        , {{ $cutoff->well_form_target_for_female }} (F)
      @endif
    </span>
  </div>
  @can('updateStructure', $questionnaire)
    <div class="flex justify-end items-center h-full gap-2">
      <x-button class="btn-xs" icon="o-pencil" x-on:click="$wire.updateModal = true"/>
      <x-button
          class="btn-error btn-xs" icon="o-trash" x-on:click="$wire.deleteModal = true"
      />
    </div>

    <x-modal wire:model="updateModal" title="Modifica Soglia" class="backdrop-blur" persistent>
      <x-form wire:submit="update">
        <x-forms.cutoff-form :$form :$variable/>
        <x-slot:actions>
          <x-button wire:click="closeUpdateModal">Annulla</x-button>
          <x-button class="md:btn-wide" type="submit" spinner="update">Salva</x-button>
        </x-slot:actions>
      </x-form>
    </x-modal>

    <x-modal wire:model="deleteModal" title="Elimina Soglia" class="backdrop-blur">
      <div>Sei sicuro di voler eliminare la soglia <span class="italic">{{ $cutoff->name }}</span>?</div>
      <x-slot:actions>
        <x-button x-on:click="$wire.deleteModal = false">Annulla</x-button>
        <x-button class="btn-error" wire:click="delete" spinner="delete">Elimina</x-button>
      </x-slot:actions>
    </x-modal>
  @endcan
</div>
