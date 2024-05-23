<x-table :rows="$patients">
  <x-slot:filters>
    <select class="select select-bordered w-full md:max-w-xs select-sm" wire:model.live="state">
      <option selected value="tutti">Tutti</option>
      <option value="attivi">Attivi</option>
      <option value="archiviati">Archiviati</option>
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

  <x-slot:legend>
    <div class="flex items-center gap-2">
      <button class="inline-block h-4 w-4 table-error border border-base-300" disabled></button>
      <span>Batterie non completate</span>
    </div>
  </x-slot:legend>

  <x-slot:headers>
    <x-table-heading
        wire:click="sort('first_name')" sortable
        :direction="$column === 'first_name' ? $direction : null"
    >Nome
    </x-table-heading>
    <x-table-heading
        wire:click="sort('last_name')"
        :direction="$column === 'last_name' ? $direction : null"
        responsive
        sortable
    >Cognome
    </x-table-heading>
    <x-table-heading
        wire:click="sort('birth_date')"
        :direction="$column === 'birth_date' ? $direction : null"
        sortable
        responsive
    >Età
    </x-table-heading>
    <x-table-heading responsive>Email</x-table-heading>
    <x-table-heading
        wire:click="sort('therapy_start_date')"
        :direction="$column === 'therapy_start_date' ? $direction : null"
        sortable
    >Inizio Terapia
    </x-table-heading>
    <x-table-heading></x-table-heading>
  </x-slot:headers>

  <x-slot:body>
    @forelse($patients as $patient)
      <x-table-row
          :disabled="$patient->isArchived()" :error="$patient->has_pending_surveys"
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
</x-table>
