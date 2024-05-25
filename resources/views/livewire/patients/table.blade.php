<x-custom.table :rows="$patients">
  <x-slot:filters>
    <x-select
        class="select-sm w-full md:w-[320px]"
        wire:model.live.debounce="state"
        :options="[
      ['id' => 'attivi', 'name' => 'Attivi'],
      ['id' => 'tutti', 'name' => 'Tutti'],
      ['id' => 'archiviati', 'name' => 'Solo Archiviati'],
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

  <x-slot:legend>
    <div class="flex items-center gap-2 select-none">
      <button class="inline-block h-4 w-4 table-error border border-base-300" disabled></button>
      <span>Batterie non completate</span>
    </div>
  </x-slot:legend>

  <x-slot:headers>
    <x-table-heading
        :$direction :$column sortable key="first_name"
    >Nome
    </x-table-heading>
    <x-table-heading
        :$direction :$column sortable key="last_name"
        responsive
        sortable
    >Cognome
    </x-table-heading>
    <x-table-heading
        :$direction :$column sortable key="birth_date"
        sortable
        responsive
    >Età
    </x-table-heading>
    <x-table-heading responsive>Email</x-table-heading>
    <x-table-heading
        :$direction :$column sortable key="therapy_start_date"
        sortable
    >Inizio Terapia
    </x-table-heading>
    <x-table-heading></x-table-heading>
  </x-slot:headers>

  <x-slot:body>
    @forelse($patients as $patient)
      <x-table-row
          :disabled="$patient->isArchived()" :error="$patient->pending_surveys > 0"
          :destination="route('patients.show', $patient)"
      >
        <x-table-cell>{{ $patient->first_name }}</x-table-cell>
        <x-table-cell responsive>{{ $patient->last_name }}</x-table-cell>
        <x-table-cell responsive>{{ $patient->age }}</x-table-cell>
        <x-table-cell responsive>{{ $patient->email }}</x-table-cell>
        <x-table-cell>
          {{ $patient->therapy_start_date->diffForHumans() }} <span class="text-xs">({{ $patient->therapy_start_date->translatedFormat('d F Y') }})</span>
        </x-table-cell>
        <x-table-cell>
        </x-table-cell>
      </x-table-row>
    @empty
      <tr>
        <td colspan="5">
          <div class="w-full text-center my-2 opacity-50">Nessun Paziente trovato</div>
        </td>
      </tr>
    @endforelse
  </x-slot:body>
</x-custom.table>
