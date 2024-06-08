<div class="flex flex-col md:flex-row md:items-end gap-x-5">
  <div class="grow md:max-w-[66%]">
    <x-input wire:model="name" class="input-sm"/>
  </div>
  <div class="pb-1 ps-1">{{ $cutoff->well_formed_target }}</div>
</div>
