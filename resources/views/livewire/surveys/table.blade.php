<x-custom.table :rows="$surveys">
  <x-slot:filters>
    <x-select
        label="Completati"
        class="select-sm min-w-[150px] w-full flex-shrink"
        wire:model.live.debounce="state"
        :options="[
            ['id' => 'tutti', 'name' => 'Tutti'],
            ['id' => 'completati', 'name' => 'Completati'],
            ['id' => 'non_completati', 'name' => 'Non Completati'],
         ]"
    />
    @unless ($patient)
      <x-select
          label="Stato paziente"
          class="select-sm min-w-[150px] w-full flex-shrink"
          wire:model.live="patientState"
          :options="[
            ['id' => 'tutti', 'name' => 'Tutti'],
            ['id' => 'attuali', 'name' => 'Attuali'],
            ['id' => 'archiviati', 'name' => 'Archiviati']
        ]"
      />
    @endunless
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow input-sm w-full" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass"
          wire:keyup.esc="clearSearch"
          clearable
      />
    </div>
  </x-slot:filters>

  <x-slot:legend>
    <div class="flex text-xs sm:text-sm items-center gap-2 me-2">
      <button class="inline-block h-4 w-4 opacity-50 bg-base-200 border border-base-300" disabled></button>
      <span>Paziente archiviato</span>
    </div>
    <div class="flex text-xs sm:text-sm items-center gap-2 me-2">
      <button class="inline-block h-4 w-4 table-success border border-base-300" disabled></button>
      <span>Completato</span>
    </div>
    <div class="flex text-xs sm:text-sm items-center gap-2">
      <button class="inline-block h-4 w-4 table-error border border-base-300" disabled></button>
      <span>Non completato</span>
    </div>
  </x-slot:legend>

  <x-slot:headers>
    <x-table-heading sortable :$column :$direction key="title">Titolo
    </x-table-heading>
    @unless($patient)
      <x-table-heading>Paziente</x-table-heading>
    @endunless
    <x-table-heading sortable :$column :$direction key="created_at" responsive>Creato</x-table-heading>
    <x-table-heading sortable :$column :$direction key="updated_at" responsive>Ultima modifica</x-table-heading>
    @unless($patient)
      <x-table-heading class="text-end" responsive>Azioni Rapide</x-table-heading>
    @endunless
  </x-slot:headers>

  <x-slot:body>
    @forelse($surveys as $survey)

      <x-table-row
          :error="!$survey->completed"
          :success="$survey->completed"
          :destination="route('surveys.show', $survey)"
          :disabled="$survey->patient->isArchived()"
      >
        <x-table-cell>{{ $survey->title }}</x-table-cell>
        @unless($patient)
          <x-table-cell>{{ $survey->patient?->full_name }}</x-table-cell>
        @endunless
        <x-table-cell responsive>{!! get_formatted_date($survey->created_at) !!}</x-table-cell>
        <x-table-cell responsive>{!! get_formatted_date($survey->updated_at) !!}</x-table-cell>
        @unless($patient)
          <x-table-cell>
            <div class="flex justify-end">
              <a href="{{ route('patients.show', $survey->patient) }}" wire:navigate>
                <x-button class="btn-xs" icon="o-user" tooltip-left="Vai al Paziente" @click.stop/>
              </a>
            </div>
          </x-table-cell>
        @endunless
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
