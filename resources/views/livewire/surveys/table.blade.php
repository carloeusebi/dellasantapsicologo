<x-table :rows="$surveys">
  <x-slot:filters>
    <select class="select select-bordered w-full md:max-w-xs select-sm" wire:model.live="state">
      <option selected value="tutti">Tutti</option>
      <option value="completati">Completati</option>
      <option value="non_completati">Non Completati</option>
    </select>
    <label class="input input-sm input-bordered flex items-center gap-2 w-full">
      <x-heroicon-o-magnifying-glass class="w-4 h-4"/>
      <input
          type="text" class="grow" placeholder="Cerca" wire:model.live.debounce="search" wire:keyup.esc="clearSearch"
      />
      <x-heroicon-o-x-mark
          x-show="$wire.search" class="w-4 h-4 cursor-pointer" x-on:click="$wire.search = ''; $wire.$refresh()"
      />
    </label>
  </x-slot:filters>
  <x-slot:headers>
    <x-table-heading sortable :$column :$direction key="title">Titolo
    </x-table-heading>
    <x-table-heading>Paziente</x-table-heading>
    <x-table-heading sortable :$column :$direction key="created_at">Creato</x-table-heading>
    <x-table-heading sortable :$column :$direction key="updated_at">Ultima modifica</x-table-heading>
  </x-slot:headers>

  <x-slot:legend>
    <div class="select-none flex">
      <div class="flex items-center gap-2 me-2">
        <button class="inline-block h-4 w-4 table-success border border-base-300" disabled></button>
        <span>Completato</span>
      </div>
      <div class="flex items-center gap-2">
        <button class="inline-block h-4 w-4 table-error border border-base-300" disabled></button>
        <span>Non completato</span>
      </div>
    </div>
  </x-slot:legend>

  <x-slot:body>
    @forelse($surveys as $survey)

      <x-table-row
          :error="!$survey->completed"
          :success="$survey->completed"
          :destination="route('surveys.show', $survey)"
      >
        <x-table-cell>{{ $survey->title }}</x-table-cell>
        <x-table-cell>{{ $survey->patient?->full_name }}</x-table-cell>
        <x-table-cell responsive>
          <span>{{ $survey->created_at->diffForHumans() }}</span>
          <span class="text-xs">({{ $survey->created_at->translatedFormat('d F Y') }})</span>
        </x-table-cell>
        <x-table-cell responsive>
          <span>{{ $survey->updated_at->diffForHumans() }}</span>
          <span class="text-xs">({{ $survey->updated_at->translatedFormat('d F Y H:i') }})</span>
        </x-table-cell>
      </x-table-row>
    @empty
    @endforelse
  </x-slot:body>
</x-table>
