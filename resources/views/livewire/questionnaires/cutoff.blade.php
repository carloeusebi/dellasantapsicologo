<div class="flex flex-col md:flex-row md:items-end gap-x-5">
  @can('updateStructure', $questionnaire)
    <div>
      
    </div>
  @endcan

  <div class="grow md:max-w-[66%]">
    <x-input wire:model="name" class="input-sm"/>
  </div>
  <div class="pb-1 ps-1">{{ $cutoff->well_formed_target }}, {{ $cutoff->well_form_target_for_female }}</div>
</div>
