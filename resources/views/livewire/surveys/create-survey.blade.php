<div>
    <x-slot:title>Crea Test di Valutazione</x-slot:title>
    <x-slot:breadcrumb>
        <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Valutazioni</a></li>
        <li>Crea</li>
    </x-slot:breadcrumb>

    <x-steps wire:model="step" class="border my-5 p-5 [&>div]:!overflow-visible">

        {{-- STEP 1--}}
        <x-step step="{{ self::CHOOSE_PATIENT }}" text="Paziente">
            <x-choices
                wire:model.live="patientId"
                label="Scegli il Paziente"
                :options="$searchablePatients"
                search-function="searchPatients"
                option-label="full_name"
                placeholder="Seleziona un Paziente"
                :disabled="$queryStringPatientId != null"
                icon="o-user"
                no-result-text="Nessun paziente trovato."
                min-chars="2"
                debounce="300ms"
                searchable
                single
                clearable
                required
            >
                @scope('selection', $patient)
                <span>{{ $patient->full_name }}</span>
                @endscope
            </x-choices>
        </x-step>

        {{-- STEP 2 --}}
        <x-step step="{{ self::CHOOSE_QUESTIONNAIRES }}" text="Questionari" class="min-h-56 overflow-hidden">
            <div x-data="{ view: 'templates' }">
                <div class="mb-5 lg:flex justify-between items-center">
                    <h2 class="font-bold mb-4">Paziente: {{ $patient?->full_name }} </h2>
                    <x-button
                        x-on:click="view = view === 'picker' ? 'templates' : 'picker'"
                        x-text="view === 'picker' ? 'Scegli un template' : 'Scegli i questionari'"
                    />
                </div>

                <div x-show="view === 'picker'">
                    <div class="-mx-4 md:mx-0">
                        <livewire:components.questionnaire-picker lazy/>
                    </div>
                </div>

                <div x-show="view === 'templates'">
                    <livewire:surveys.components.templates-table lazy/>
                </div>
            </div>
        </x-step>

        {{-- STEP 3 --}}
        <x-step step="{{ self::CONFIRM }}" text="Conferma">
            <div class="space-y-3">
                <x-input label="Titolo" placeholder="Dai un nome alla Valutazione" wire:model.live="title" required/>
                @if ($patient?->email)
                    <x-checkbox
                        wire:model="sendEmail"
                        label="Invia anche un'email al Paziente (potrai comunque inviarla in un secondo momento)."
                    />
                @endif
                <div><span class="font-bold">Paziente: </span>{{ $patient?->full_name }}</div>
                <div class="font-bold">Questionari:</div>
                <ul>
                    @foreach(collect($selectedQuestionnaires) as $questionnaire)
                        <li class="flex justify-between items-center p-2 bg-base-100 rounded-lg my-2">
                            {{ $loop->index +1 }}. {{ $questionnaire['title'] }}
                        </li>
                    @endforeach
                </ul>
                @unless($usingTemplate)
                    <div class="flex gap-1 justify-start">
                        <x-checkbox label="Crea un template con questi questionari" wire:model.live="createTemplate"/>
                        <x-loading class="loading-sm" wire:loading.delay wire:target="createTemplate"/>
                    </div>
                    @if($createTemplate)
                        <x-forms.template-form/>
                    @endif
                @endunless
            </div>
        </x-step>
    </x-steps>

    {{-- BUTTONS --}}
    <div class="flex justify-end gap-2 items-center">
        @unless($step === self::CHOOSE_PATIENT)
            <x-button
                wire:click="prev" x-bind:disabled="$wire.step === 1" spinner="prev" wire:loading.attr="disabled"
                wire:target="prev,next,updateSelectedQuestionnaires,selectQ,removeQ"
            >Torna Indietro
            </x-button>
        @endif
        @if ($step === self::CONFIRM)
            <x-button
                wire:click="store" spinner="store" wire:loading.attr="disabled"
                wire:target="prev,next,updateSelectedQuestionnaires,selectQ,removeQ"
                x-bind:disabled="!$wire.title || $wire.selectedQuestionnaires.length === 0"
                class="btn-primary"
            >Crea
            </x-button>
        @else
            <x-button
                wire:click="next" spinner="next" wire:loading.attr="disabled"
                wire:target="prev,next,updateSelectedQuestionnaires,selectQ,removeQ"
                x-bind:disabled="
            $wire.step === {{ self::CHOOSE_PATIENT }} && ! $wire.patientId ||
            $wire.step === {{ self::CHOOSE_QUESTIONNAIRES }} && $wire.selectedQuestionnaires.length === 0
          "
            >Prosegui
            </x-button>
        @endif

    </div>
</div>
