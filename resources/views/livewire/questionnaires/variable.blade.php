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
  </div>
  <div class="ps-3 xl:ps-6 label label-text font-bold">Cutoffs</div>
  <div class="m-2 !mt-2 xl:m-5 border border-base-content/5 space-y-2">
    @foreach($variable->cutoffs as $cutoff)
      <div class="border-t border-base-content/5 py-2 p-2 xl:p-5 @if($loop->last) border-b @endif">
        <livewire:questionnaires.cutoff :$questionnaire :$variable :$cutoff :key="'cutoff'.$cutoff->id"/>
      </div>
    @endforeach
  </div>


  @if($questionsModal)
    <div class="full-width-modal">
      <x-modal
          wire:model="questionsModal" :title="'Gestisci le domande di '. $variable->name" separator
          class="backdrop-blur"
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
                :disabled="auth()->user()->cannot('updateStructure', $question)"
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
