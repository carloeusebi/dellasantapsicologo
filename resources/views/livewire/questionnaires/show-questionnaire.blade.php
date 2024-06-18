<div>
    <x-slot:title>Crea Questionario</x-slot:title>
    <x-slot:breadcrumb>
        <li class="font-bold">
            <a href="{{ route('questionnaires.index') }}" wire:navigate.hover>Questionari</a>
        </li>
        <li>{{ $questionnaire->title }}</li>
    </x-slot:breadcrumb>

    <x-header :title="$questionnaire->title" size="text-xl" class="[&_.flex.items-center.gap-3]:!w-full">
        <x-slot:subtitle>
            @if ($questionnaire->user)
                Caricato da: {{ $questionnaire->user->name }}
                , {{ $questionnaire->created_at->translatedFormat('d F Y') }}
                @unless ($questionnaire->created_at->eq($questionnaire->updated_at))
                    (ultima modifica {{ $questionnaire->updated_at->translatedFormat('d F Y') }})
                @endunless
            @endif
            <div>Utilizzato in {{ $questionnaire->surveys_count }} valutazioni</div>
        </x-slot:subtitle>
        <x-slot:actions>
            <div class="flex flex-col md:flex-row gap-4 w-full justify-end">
                <x-button
                    label="Crea una copia del questionario" spinner="replicate"
                    icon="o-clipboard-document-list" wire:click="replicate"
                />
                @can('delete', $questionnaire)
                    <x-button icon="o-archive-box" label="Archivia" onclick="archiveModal.showModal()"/>
                    <x-modal id="archiveModal" title="Archivia Questionario" class="backdrop-blur">
                        <div class="space-y-3">
                            <p>
                                Questo questionario è utilizzato in uno o più test di valutazione.
                            </p>
                            <p>
                                Non è quindi possibile eliminarlo, ma puoi archiviarlo per nasconderlo dalla lista.
                            </p>
                            <x-checkbox
                                wire:model="copyBeforeArchive"
                                label="Crea una copia del questionario prima di archiviarlo."
                            />
                        </div>
                        <x-slot:actions>
                            <x-button onclick="archiveModal.close()" label="Annulla"/>
                            <x-button
                                class="btn-error" icon="o-archive-box" wire:click="delete" spinner="delete"
                                label="Archivia"
                            />
                        </x-slot:actions>
                    </x-modal>
                @endcan
                @can('forceDelete', $questionnaire)
                    <x-button icon="o-trash" label="Elimina" x-on:click="$wire.forceDeleteModal = true"/>
                    <x-modal wire:model="forceDeleteModal" title="Elimina Questionario" class="backdrop-blur">
                        <p>Sei sicuro di voler eliminare il questionario?</p>
                        <x-slot:actions>
                            <x-button x-on:click="$wire.forceDeleteModal = false" label="Annulla"/>
                            <x-button
                                class="btn-error" icon="o-trash" wire:click="forceDelete" spinner="forceDelete"
                                label="Elimina"
                            />
                        </x-slot:actions>
                    </x-modal>
                @endcan
            </div>
        </x-slot:actions>
    </x-header>

    <x-tabs wire:model="selectedTab">
        <x-tab :name="self::$TITLE" label="Titolo e Descrizione">
            <livewire:questionnaires.tabs.title-tab :$questionnaire lazy/>
        </x-tab>

        <x-tab :name="self::$QUESTIONS" label="Domande">
            <livewire:questionnaires.tabs.questions-tab :$questionnaire lazy/>
        </x-tab>

        <x-tab :name="self::$VARIABLES" label="Variabili">
            <livewire:questionnaires.tabs.variables-tab :$questionnaire lazy/>
        </x-tab>
    </x-tabs>
</div>
