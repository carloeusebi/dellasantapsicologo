<div>
    <div class="mb-4">
        <span class="label label-text font-semibold">Risposte</span>
        @can('update', $questionnaire)
            <span class="text-xs text-base-content/75">Lasciare vuoto se ogni domanda ha il suo set di risposte.</span>
        @endcan
    </div>
    <div class="space-y-1">
        @forelse($questionnaire?->choices ?? [] as $choice)
            <livewire:questionnaires.choice-component
                :choice="$choice" :key="'choice'.$choice->id"
                :can-edit-text="auth()->user()->can('updateText', $questionnaire)"
                :can-edit-structure="auth()->user()->can('updateStructure', $questionnaire)"
                :is-first="$loop->first"
            />
        @empty
            <div class="my-5 text-center text-base-content/50 italic">Nessuna Risposta</div>
        @endforelse
        @can('updateStructure', $questionnaire)
            <x-divider/>
            <div class="flex gap-2 md:gap-4">
                <div class="w-[50px] lg:w-[130px]">
                    <x-input
                        wire:model.live.debounce="newChoicePoints" class="input-sm" placeholder="Punti" first-error-only
                        wire:keyup.enter="addChoice" type="number" autofocus
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

    <x-hr/>
    <div>
        <div class="mb-4">
            <div class="label label-text font-semibold">Domande</div>
            @can('update', $questionnaire)
                <span class="text-xs text-base-content/75">Spuntare la casella per assegnare alla domanda un punteggio invertito.</span>
            @endcan
        </div>
        <div class="space-y-2" wire:sortable="updateQuestionsOrder" wire:sortable.options="{ animation: 250 }">
            @forelse($questionnaire?->questions ?? [] as $question)
                <div
                    class="flex items-start border-t border-base-content/10 py-3 @if($loop->last) border-b @endif"
                    wire:sortable.item="{{ $question->id }}" wire:key="question{{ $question->id }}"
                >
                    @can('updateStructure', $questionnaire)
                        <x-button
                            class="btn btn-xs !h-[31px] cursor-grab btn-ghost" type="button" wire:sortable.handle
                            icon="o-bars-3"
                        />
                    @else
                        <input type="hidden" wire:sortable.handle/>
                    @endcan
                    <div class="grow">
                        <livewire:questionnaires.question-component
                            :$questionnaire
                            :question="$question"
                            :key="$questionnaire->choices->count().'-'.$question->id . '-' . $question->order"
                            :can-edit-text="auth()->user()->can('updateText', $questionnaire)"
                            :can-edit-structure="auth()->user()->can('updateStructure', $questionnaire)"
                        />
                    </div>
                </div>
            @empty
                <div class="my-5 text-center text-base-content/50 italic">Nessuna Domanda</div>
            @endforelse
        </div>
        @can('updateStructure', $questionnaire)
            <x-divider/>
            <div class="flex items-start gap-2 md:gap-4 mb-28">
                <div class="grow">
                    <x-input
                        wire:model="newQuestionText" class="input-sm grow" placeholder="Testo" first-error-only
                        x-on:keyup.enter="$wire.addQuestion; window.scrollBy(0, 98)"
                    />
                </div>
                <x-button
                    class="btn-sm btn-info" wire:click="addQuestion" spinner="addQuestion" label="Aggiungi domanda"
                    icon="o-plus" responsive
                />
            </div>
        @endcan
    </div>
</div>
