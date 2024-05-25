<x-custom.table :rows="$surveys">
  <x-slot:filters>
    <x-select
        class="select-sm w-full flex-shrink"
        wire:model.live.debounce="state"
        :options="[
      ['id' => 'tutti', 'name' => 'Tutti'],
      ['id' => 'completati', 'name' => 'Completati'],
      ['id' => 'non_completati', 'name' => 'Non Completati'],
]"
    />
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow input-sm w-full" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass"
          wire:keyup.esc="clearSearch"
          clearable
      />
    </div>
  </x-slot:filters>

  <x-slot:headers>
    <x-table-heading sortable :$column :$direction key="title">Titolo
    </x-table-heading>
    @unless($patient)
      <x-table-heading>Paziente</x-table-heading>
    @endunless
    <x-table-heading sortable :$column :$direction key="created_at" responsive>Creato</x-table-heading>
    <x-table-heading sortable :$column :$direction key="updated_at" responsive>Ultima modifica</x-table-heading>
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
        @unless($patient)
          <x-table-cell>{{ $survey->patient?->full_name }}</x-table-cell>
        @endunless
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
      <tr>
        <td colspan="5">
          <div class="w-full text-center my-2 opacity-50">Nessuna Batteria trovata</div>
        </td>
      </tr>
    @endforelse
  </x-slot:body>
</x-custom.table>
