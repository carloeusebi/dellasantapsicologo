<x-input wire:model="form.name" label="Nome" placeholder="Nome del Cutoff" requiredfirst-error-only/>
<x-radio wire:model.live.debounce="form.type" label="Tipologia" :options="$form->cutoffTypes" first-error-only/>
<x-input wire:model.live.debounce="form.from" label="Da" type="number" placeholder="Da" first-error-only/>
@if($form->type === 'range')
  <x-input wire:model.live.debounce="form.to" label="A" type="number" placeholder="A" first-error-only/>
@endif
@if($variable->gender_based)
  <x-input
      wire:model.live.debounce="form.fem_from" type="number" label=" Da femminile"
      placeholder="Da femminile" first-error-only
  />
  @if($form->type === 'range')
    <x-input
        wire:model.live.debounce="form.fem_to" type="number" label=" A femminile" placeholder="A femminile"
        first-error-only
    />
  @endif
@endif
