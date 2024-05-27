@php use App\Models\Patient; @endphp
@php
  /** @var Patient $patient */

    $headers = [
      ['key' => 'first_name', 'label' => 'Nome'],
      ['key' => 'last_name', 'label' => 'Cognome', 'class' => 'hidden md:table-cell'],
      ['key' => 'birth_date', 'label' => 'Età', 'class' => 'hidden md:table-cell'],
      ['key' => 'email', 'label' => 'Email', 'sortable' => false, 'class' => 'hidden xl:table-cell'],
      ['key' => 'therapy_start_date', 'label' => 'Inizio Terapia'],
    ];

    if ($state !== 'attivi') {
    $headers[] = ['key' => 'archived_at', 'label' => 'Fine Terapia', 'class' => 'hidden xl:table-cell'];
    }

    if (auth()->user()->isAdmin()) {
      $headers[] = ['key' => 'user.name', 'label' => 'Dottore', 'class' => 'hidden xl:table-cell', 'sortable' => false];
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
        class="w-full select-sm md:w-[320px]"
        wire:model.live.debounce="state"
        :options="[
            ['id' => 'attivi', 'name' => 'Attivi'],
            ['id' => 'tutti', 'name' => 'Tutti'],
            ['id' => 'archiviati', 'name' => 'Solo Archiviati'],
        ]"
    />
    @if(auth()->user()->isAdmin())
      <div class="hidden xl:block">
        <x-select
            class="w-full select-sm md:w-[320px]" wire:model.live.debounce="user_id"
            label="Dottore"
            placeholder="Tutti"
            :options="$this->doctors"
        />
      </div>
    @endif
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow input-sm  w-full" placeholder="Cerca" wire:model.live.debounce="search"
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
      <div class="hidden sm:flex gap-2">
        <x-button class="btn-xs" icon="o-list-bullet" :link="route('surveys.create', ['patient_id' => $patient->id])"/>
      </div>
      @endscope
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessun Paziente trovato"/>
  @endif
</x-custom.table>
