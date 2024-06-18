@php
  use App\Models\Survey;
 /** @var Survey $survey */

  $headers = [
    ['key' => 'title', 'label' => 'Titolo'],
    ['key' => 'patient.full_name', 'label' => 'Paziente', 'sortable' => false],
    ['key' => 'created_at', 'label' => 'Creato'],
    ['key' => 'updated_at', 'label' => 'Ultima modifica'],
  ];

 $rowDecoration = [
     'table-success' => fn (Survey $survey) => $survey->completed,
     'table-error' => fn (Survey $survey) => !$survey->completed,
     'table-disabled' => fn (Survey $survey) => $survey->patient->isArchived(),
];

@endphp

<x-custom.table :rows="$surveys">
  <x-slot:filters>
    <x-select
        label="Completati"
        class="min-w-[150px] select w-full flex-shrink"
        wire:model.live.debounce="state"
        :options="[
            ['id' => self::$allState, 'name' => 'Tutti'],
            ['id' => self::$completedState, 'name' => 'Completati'],
            ['id' => self::$notCompletedState, 'name' => 'Non Completati'],
         ]"
    />
    <x-select
        label="Stato paziente"
        class="min-w-[150px] select w-full flex-shrink"
        wire:model.live="patientState"
        :options="[
            ['id' => self::$allState, 'name' => 'Tutti'],
            ['id' => self::$currentState, 'name' => 'Attuali'],
            ['id' => self::$archivedState, 'name' => 'Archiviati']
        ]"
    />
    <div class="[&>*]:!w-full grow">
      <x-input
          class="input" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass" wire:keyup.esc="clearSearch" clearable
      />
    </div>
  </x-slot:filters>

  <x-slot:legend>
    <div class="flex text-xs sm:text-base items-center gap-2 me-2">
      <button class="inline-block h-4 w-4 opacity-50 bg-base-200 border border-base-300" disabled></button>
      <span>Paziente archiviato</span>
    </div>
    <div class="flex text-xs sm:text-base items-center gap-2 me-2">
      <button class="inline-block h-4 w-4 table-success border border-base-300" disabled></button>
      <span>Completato</span>
    </div>
    <div class="flex text-xs sm:text-base items-center gap-2">
      <button class="inline-block h-4 w-4 table-error border border-base-300" disabled></button>
      <span>Non completato</span>
    </div>
  </x-slot:legend>


  @if ($surveys->count())
    <x-table :rows="$surveys" :$headers :row-decoration="$rowDecoration" :$sortBy link="/valutazioni/{id}">
      @scope('cell_created_at', $survey)
      {!! get_formatted_date($survey->created_at) !!}
      @endscope

      @scope('cell_updated_at', $survey)
      {!! get_formatted_date($survey->updated_at) !!}
      @endscope

      @scope('actions', $survey)
      <div class="hidden sm:flex gap-2">
        <x-button class="btn-xs" icon="o-user" :link="route('patients.show', $survey->patient)"/>
      </div>
      @endscope
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessuna Valutazione trovata"/>
  @endif

</x-custom.table>
