<div>
  <div class="flex flex-col md:flex-row items-end gap-2 mb-4">
    <div class="w-full">
      <x-input
          wire:model="name" :disabled="auth()->user()->cannot('updateText', $questionnaire)"
          placeholder="Nome Variabile" label="Nome Variable"
      />
    </div>
    <x-button
        class="w-full md:w-fit" label="Gestisci le domande" wire:click="openQuestionsModal" spinner="openQuestionsModal"
    />
    @can('updateStructure', $questionnaire)
      <x-button class="btn-error" icon="o-trash" x-on:click="$wire.deleteModal = true"/>
    @endcan
  </div>
  <div>
    <x-checkbox
        label="Le soglie variano in base al sesso del paziente" wire:model="genderBased" wire:change="update"
        :disabled="auth()->user()->cannot('updateStructure', $questionnaire)"
    />
  </div>
  <div class="ps-3 xl:ps-6 label label-text font-bold">Soglie</div>
  <div class="m-2 !mt-2 xl:m-5 border border-base-content/5 space-y-2">
    @can('updateStructure', $questionnaire)
      <div class="flex justify-end mb-5 p-2">
        <x-button class="w-full md:btn-wide" x-on:click="$wire.newCutoffModal = true">Crea Soglia</x-button>
      </div>
    @endcan
    @forelse($variable->cutoffs as $cutoff)
      <div class="border-t border-base-content/5 py-2 p-2 xl:p-5 @if($loop->last) border-b @endif">
        <livewire:questionnaires.cutoff :$questionnaire :$variable :$cutoff :key="'cutoff'.$cutoff->id"/>
      </div>
    @empty
      <div class="text-center text-base-content/50 py-5">Nessun cutoff presente</div>
    @endforelse
  </div>


  @can('updateStructure', $questionnaire)
    <x-modal wire:model="deleteModal" title="Elimina Variabile" class="backdrop-blur">
      <p>Sicuro di voler eliminare la variabile, e tutti i cutoffs associati?</p>
      <x-slot:actions>
        <x-button x-on:click="$wire.deleteModal = false">Annulla</x-button>
        <x-button class="btn-error" wire:click="delete" spinner="delete">Elimina</x-button>
      </x-slot:actions>
    </x-modal>

    <x-modal wire:model="newCutoffModal" title="Crea Soglia" class="backdrop-blur" persistent>
      <x-form wire:submit="storeCutoff">
        <x-cutoffs.form :form="$form" :variable="$variable"/>
        <x-slot:actions>
          <x-button wire:click="closeNewCutoffModal">Annulla</x-button>
          <x-button class="md:btn-wide" type="submit" spinner="storeCutoff">Salva</x-button>
        </x-slot:actions>
      </x-form>
    </x-modal>
  @endcan


  @if($questionsModal)
    <div class="full-width-modal">
      <x-modal
          wire:model="questionsModal" :title="'Gestisci le domande di '. $variable->name" separator
          class="backdrop-blur" persistent
      >
        @can('updateStructure', $questionnaire)
          <div class="flex my-5 gap-4">
            <x-button class="btn-sm grow" label="Seleziona Tutte" wire:click="selectAll" spinner="selectAll"/>
            <x-button class="btn-sm grow" label="Seleziona Nessuna" wire:click="selectNone" spinner="selectNone"/>
          </div>
        @endcan
        <x-form class="space-y-1">
          @foreach($questionnaire->questions as $question)
            <x-checkbox
                wire:model="selectedQuestions" :value="$question->id"
                :label="$question->order. '. '. $question->text"
                :disabled="auth()->user()->cannot('updateStructure', $questionnaire)"
            />
          @endforeach
        </x-form>
        <x-slot:actions>
          <x-button wire:click="closeQuestionsModal">
            @can('updateStructure', $questionnaire)
              Annulla
            @else
              Chiudi
            @endcan
          </x-button>
          @can('updateStructure', $questionnaire)
            <x-button wire:click="syncQuestions" spinner="syncQuestions" label="Salva"/>
          @endcan
        </x-slot:actions>
      </x-modal>
    </div>
  @endif
</div>
