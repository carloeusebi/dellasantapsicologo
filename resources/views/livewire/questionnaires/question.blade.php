<div class="px-2 gap-2 md:gap-4">
  <div class="[&_*]:font-normal flex justify-between gap-2 xl:gap-4">
    <div class="grow">
      <x-input
          class="input-sm !rounded-s-none" wire:model="text" wire:keyup.enter="update"
          :disabled="!auth()->user()->can('updateText', $questionnaire)"
      >
        <x-slot:prepend>
          <span class="hidden md:block w-[29px] text-center">{{ $question->order }}</span>
        </x-slot:prepend>
        @can('updateText', $questionnaire)
          <x-slot:append>
            <div class="[&_*]:font-bold">
              <x-button
                  class="btn-sm rounded-s-none" icon="o-check" wire:click="update" spinner="update"
                  label="Salva" responsive
              />
            </div>
          </x-slot:append>
        @endcan
      </x-input>
    </div>

    @can('updateStructure', $questionnaire)
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
    @endcan
  </div>
  <div class="text-sm mt-2 [&_*]:font-normal !text-base-content/75 flex flex-wrap items-center gap-4 select-none">
    <x-checkbox wire:model="reversed" wire:change="update" label="Punteggio invertito"/>
    <x-button
        class="btn-xs" wire:click="toggleExpanded" :label="$expanded ? 'Nascondi risposte' : 'Mostra risposte'"
        spinner="toggleExpanded"
    />
    @if($questionnaire->choices->isEmpty() && $question->choices->isEmpty())
      <div class="flex items-center text-warning gap-2">
        <x-icon name="o-exclamation-triangle"/>
        <span>Questa domanda non ha nessuna risposta!</span>
      </div>
    @endif
  </div>
  @if($expanded)
    <div class="p-1 m-1 md:p-5 md:m-5 border border-base-content/5 relative">
      <x-button class="btn-xs absolute right-2 top-2" wire:click="toggleExpanded" label="-"/>
      @forelse($question->choices as $choice)
        <livewire:questionnaires.choice
            :choice="$choice"
            :key="'question'.$question->id.'choice'.$choice->id"
            :can-edit-text="auth()->user()->can('updateText', $questionnaire)"
            :can-edit-structure="auth()->user()->can('updateStructure', $questionnaire)"
            :is-first="$loop->first"
        />
        @if($loop->last)
          <x-divider/>
        @endif
      @empty
        <div class="my-2 text-center text-xs text-base-content/50 italic">
          Nessuna Risposta - Lasciando vuoto questo campo verranno usate le risposte del questionario
        </div>
      @endforelse
      @can('updateStructure', $question->questionnaire)
        <div class="flex gap-2 md:gap-4">
          <div class="w-[50px] lg:w-[130px]">
            <x-input
                wire:model.live.debounce="newChoicePoints" class="input-sm" placeholder="Punti" first-error-only
                wire:keyup.enter="addChoice" autofocus
            />
          </div>
          <div class="grow">
            <x-input
                wire:model="newChoiceText" class="input-sm grow" placeholder="Testo" first-error-only
                wire:keyup.enter="addChoice"
            />
          </div>
          <x-button
              class="btn-sm btn-info" wire:click="addChoice" spinner="addChoice" label="Aggiungi risposta"
              icon="o-plus" responsive
          />
        </div>
      @endcan
    </div>
  @endif
</div>
