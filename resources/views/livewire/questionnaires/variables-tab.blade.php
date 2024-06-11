<div class="my-5">
  @can('updateStructure', $questionnaire)
    <div class="flex justify-end mb-5">
      <x-button class="w-full md:btn-wide" x-on:click="$wire.newVariableModal = true">Crea Variabile</x-button>
    </div>
  @endcan
  @forelse($questionnaire->variables as $variable)
    <div
        wire:key="variable{{ $variable->id }}"
        class="py-5 px-1 md:px-5 border-t border-base-content/10 @if($loop->last) border-b @endif"
    >
      <livewire:questionnaires.variable-component :$questionnaire :$variable :key="'variable'.$variable->id"/>
    </div>
  @empty
    <div class="text-center text-base-content/50 py-5">Nessuna variabile presente</div>
  @endforelse

  <x-modal wire:model="newVariableModal" title="Nuova Variabile" class="backdrop-blur" persistent>
    <x-form wire:submit.prevent="createVariable">
      <x-input wire:model="name" label="Nome" placeholder="Nome della Variabile" required/>
      <x-checkbox wire:model="genderBased" label="I cutoffs variano in base al sesso del paziente"/>
      <x-slot:actions>
        <x-button wire:click="closeVariableModal">Annulla</x-button>
        <x-button type="submit" spinner="createVariable">Crea</x-button>
      </x-slot:actions>
    </x-form>
  </x-modal>
</div>
