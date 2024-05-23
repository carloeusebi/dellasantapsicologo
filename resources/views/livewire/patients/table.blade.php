<div>
  <div class="md:flex gap-2 space-y-2 md:space-y-0 mb-5">
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
  </div>
  <div class="overflow-x-auto">
    <div class="my-2">
      {{ $patients->links() }}
    </div>
    <div class="divider !my-2"></div>
    <div class="h-5 ">
      <span class="loading loading-spinner loading-sm opacity-50" wire:loading></span>
    </div>
    <table class="table table-zebra">
      <!-- head -->
      <thead>
      <tr>
        <x-table-heading
            wire:click="sort('first_name')" sortable
            :direction="$column === 'first_name' ? $direction : null"
        >
          Nome
        </x-table-heading>
        <x-table-heading
            wire:click="sort('last_name')"
            :direction="$column === 'last_name' ? $direction : null"
            responsive
            sortable
        >
          Cognome
        </x-table-heading>
        <x-table-heading
            wire:click="sort('birth_date')"
            :direction="$column === 'birth_date' ? $direction : null"
            sortable
            responsive
        >
          Età
        </x-table-heading>
        <x-table-heading responsive>
          Email
        </x-table-heading>
        <x-table-heading
            wire:click="sort('therapy_start_date')"
            :direction="$column === 'therapy_start_date' ? $direction : null"
            sortable
        >
          Inizio Terapia
        </x-table-heading>
      </tr>
      </thead>
      <tbody>
      <!-- row 1 -->
      @forelse($patients as $patient)
        <tr
            class="hover cursor-pointer @if($patient->isArchived()) !bg-error !bg-opacity-15 hover:!bg-opacity-25 @endif"
            @click="Livewire.navigate('{{ route('patients.show', $patient) }}')"
        >
          <td>{{ $patient->first_name }}</td>
          <td class="hidden md:table-cell">{{ $patient->last_name }}</td>
          <td class="hidden md:table-cell">{{ $patient->age }}</td>
          <td class="hidden md:table-cell">{{ $patient->email }}</td>
          <td>
            {{ $patient->therapy_start_date->diffForHumans() }} <span class="text-xs">({{ $patient->therapy_start_date->translatedFormat('d F Y') }})</span>
          </td>
        </tr>
      @empty
        @teleport('#alert-target')
        <div role="alert" class="alert">
          <svg
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              class="stroke-current shrink-0 w-6 h-6"
          >
            <path
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
          <span>Nessun Paziente trovato.</span>
        </div>
        @endteleport
      @endforelse
      </tbody>
    </table>
    <div id="alert-target"/>
    <div class="my-2">
      {{ $patients->links() }}
    </div>
  </div>
</div>
