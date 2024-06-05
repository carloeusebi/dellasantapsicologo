<div>
  <p class="text-base-content/50">
    Puoi spostare i questionari trascinandoli, oppure cliccando sulle frecce.
  </p>
  <div
      wire:sortable-group="updateSelectedQuestionnaires"
      class="flex flex-col lg:flex-row justify-between gap-x-14 lg:gap-x-20 gap-y-5 text-xs lg:text-sm select-none"
  >
    <div class="basis-1/2 " wire:sortable.item="questionnaires">
      <x-input
          icon-right="o-magnifying-glass" class="input input-xs lg:input-sm my-2" placeholder="Cerca Questionario o tag"
          wire:model.live.debounce="search" clearable x-on:keyup.esc="$wire.search = ''; $wire.$refresh()"
      />
      <div
          wire:sortable-group.item-group="questionnaires"
          wire:sortable-group.options="{ animation: 200, delay: 75 }"
          class="relative bg-base-300 p-2 rounded-xl shadow-inner h-56 lg:h-96 overflow-y-auto"
      >
        <x-loading class="absolute top-2 right-2 text-primary" wire:loading.delay wire:target.except="selectQ,removeQ"/>
        @forelse($nonSelectedQuestionnaires as $questionnaire)
          <div
              x-data="{ show: true }"
              x-show="show"
              wire:sortable-group.handle
              wire:sortable-group.item="{{ $questionnaire->id }}"
              wire:key="questionnaire-{{ $questionnaire->title }}"
              class="flex items-center justify-between p-2 bg-base-100 border border-base-100/50 rounded-lg shadow-sm mb-2 cursor-grab active:cursor-grabbing"
          >
            <div class="flex w-full gap-2 items-center">
              <div>
                <span class="select-none">{{ $questionnaire->title }}</span>
                <div>
                  @foreach($questionnaire->tags as $tag)
                    <x-questionnaires.tag :$tag/>
                  @endforeach
                </div>
              </div>
              <div class="grow"></div>
              <x-button
                  class="btn-sm" icon="o-chevron-right" wire:click="selectQ({{ $questionnaire->id }})"
                  spinner="selectQ({{ $questionnaire->id }})" x-on:click="show = false"
              />
            </div>
          </div>
        @empty
          <div class=" text-center text-base-content/50 italic my-5">Nessun questionario trovato/rimasto</div>
        @endforelse
      </div>
    </div>

    <div wire:sortable.item="selectedQuestionnaires" class="basis-1/2">
      <div class="flex justify-between items-center gap-2">
        <div class="flex items-center gap-2">
          <h3 class="text-base h-6 lg:h-8 my-2 flex items-center">
            Selezionati: {{ $selectedQuestionnaires->count() }}</h3>
          <x-loading
              class="loading-xs text-primary" wire:loading.delay
              wire:target="updateSelectedQuestionnaires,selectQ,removeQ,removeAll"
          />
        </div>
        <x-button class="btn-xs lg:btn-sm" wire:click="removeAll" spinner="removeAll">Svuota tutti</x-button>
      </div>
      <div
          wire:sortable-group.item-group="selectedQuestionnaires"
          wire:sortable-group.options="{ animation: 200, delay: 75 }"
          class="bg-base-300 p-2 rounded-xl shadow-inner h-56 lg:h-96 overflow-y-auto"
      >
        @forelse($selectedQuestionnaires as $questionnaire)
          <div
              x-data="{ show: true}"
              x-show="show"
              wire:sortable-group.handle
              wire:sortable-group.item="{{ $questionnaire->id }}"
              wire:key="selected-questionnaire-{{ $questionnaire?->id }}"
              class="flex items-center justify-between p-2 bg-base-100 border border-base-100/50 rounded-lg shadow-sm mb-2 cursor-grab active:cursor-grabbing"
          >
            <div class="flex gap-2 items-center">
              <x-button
                  icon="o-chevron-left" class="btn-sm" wire:click="removeQ({{ $questionnaire?->id }})"
                  spinner="removeQ({{ $questionnaire?->id }})" x-on:click="show = false"
              />
              <div class="grow"></div>
              <div>
                <span class="select-none">{{ $questionnaire?->title }}</span>
                <div class="!text-xs">
                  @foreach($questionnaire->tags as $tag)
                    <x-questionnaires.tag :$tag/>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="text-center text-base-content/50 italic my-5">Nessun questionario Selezionato</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
