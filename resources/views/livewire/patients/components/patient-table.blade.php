@php use App\Models\Patient; @endphp
@php
  /** @var Patient $patient */

    $headers = [
      ['key' => 'first_name', 'label' => 'Nome'],
      ['key' => 'last_name', 'label' => 'Cognome'],
      ['key' => 'birth_date', 'label' => 'Età'],
      ['key' => 'email', 'label' => 'Email', 'sortable' => false],
      ['key' => 'therapy_start_date', 'label' => 'Inizio Terapia'],
    ];

    if ($state !== 'attivi') {
    $headers[] = ['key' => 'archived_at', 'label' => 'Fine Terapia'];
    }

    if (auth()->user()->isAdmin()) {
      $headers[] = ['key' => 'user.name', 'label' => 'Dottore'];
    }

    $rowDecoration = [
        'table-error' => fn (Patient $patient) => $patient->pending_surveys > 0,
        'table-disabled' => fn (Patient $patient) => $patient->isArchived(),
    ]
@endphp


<x-custom.table :rows="$patients">
  <x-slot:filters>
    <x-select
        label="Stato"
        class="w-full md:w-[175] xl:w-[320px]"
        wire:model.live.debounce="state"
        :options="[
            ['id' => self::$activeState, 'name' => 'Attivi'],
            ['id' => self::$allState, 'name' => 'Tutti'],
            ['id' => self::$archivedState, 'name' => 'Solo Archiviati'],
        ]"
    />
    @if(auth()->user()->isAdmin())
      <x-select
          class="w-full md:w-[200px] xl:w-[320px]" wire:model.live.debounce="user_id"
          label="Dottore"
          placeholder="Tutti"
          :options="$this->doctors"
      />
    @endif
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow w-full" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass"
          wire:keyup.esc="clearSearch"
          clearable
      />
    </div>
  </x-slot:filters>

  <x-slot:legend>
    <div class="flex items-center gap-2 select-none">
      <button class="inline-block h-4 w-4 table-error border border-base-300" disabled></button>
      <span>Valutazioni non completate</span>
    </div>
  </x-slot:legend>

  @if($patients->count())
    <x-table :rows="$patients" :$headers :row-decoration="$rowDecoration" :$sortBy link="/pazienti/{id}">
      @scope('cell_birth_date', $patient)
      {{ $patient->age }}
      @endscope

      @scope('cell_therapy_start_date', $patient)
      {!! get_formatted_date($patient->therapy_start_date) !!}
      @endscope

      @scope('cell_archived_at', $patient)
      {!! get_formatted_date($patient->archived_at) !!}
      @endscope

      @scope('actions', $patient)
      @unless($patient->isArchived())
        <div class="hidden sm:flex gap-2">
          <x-button
              class="btn-xs" icon="o-list-bullet" :link="route('surveys.create', ['patient_id' => $patient->id])"
          />
        </div>
      @endif
      @endscope
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessun Paziente trovato"/>
  @endif
</x-custom.table>
