<div>
  @can('updateStructure', $questionnaire)
    <div class="mb-2 flex justify-end">
      <x-button
          class="btn-error btn-xs" icon="o-trash" wire:click="delete"
          wire:confirm="Sicuro di voler eliminare la soglia?"
      />
    </div>
  @endcan

  <div class="flex flex-col md:flex-row md:items-end gap-x-5">
    <div class="grow md:max-w-[66%]">
      <x-input wire:model="name" class="input-sm"/>
    </div>
    <div class="pb-1 ps-1">{{ $cutoff->well_formed_target }}, {{ $cutoff->well_form_target_for_female }}</div>
  </div>
</div>
