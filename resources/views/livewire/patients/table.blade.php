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
        label="Stato" inline
        class="w-full md:w-[320px]"
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
            class="w-full md:w-[320px]" wire:model.live.debounce="user_id"
            label="Dottore" inline
            placeholder="Tutti"
            :options="$this->doctors"
        />
      </div>
    @endif
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow h-[56px] w-full" placeholder="Cerca" wire:model.live.debounce="search"
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
      <div class="flex gap-2">
        <x-button class="btn-xs" icon="o-pencil" :link="route('patients.edit', $patient)"/>
        <x-button class="btn-xs" icon="o-list-bullet" :link="route('surveys.create', ['patient_id' => $patient->id])"/>
      </div>
      @endscope
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessun Paziente trovato"/>
  @endif


  {{--  <x-slot:headers>--}}
  {{--    <x-table-heading--}}
  {{--        :$direction :$column sortable key="first_name"--}}
  {{--    >Nome--}}
  {{--    </x-table-heading>--}}
  {{--    <x-table-heading--}}
  {{--        :$direction :$column sortable key="last_name"--}}
  {{--        responsive--}}
  {{--        sortable--}}
  {{--    >Cognome--}}
  {{--    </x-table-heading>--}}
  {{--    <x-table-heading--}}
  {{--        :$direction :$column sortable key="birth_date"--}}
  {{--        sortable--}}
  {{--        responsive--}}
  {{--    >Età--}}
  {{--    </x-table-heading>--}}
  {{--    <x-table-heading responsive>Email</x-table-heading>--}}
  {{--    <x-table-heading--}}
  {{--        :$direction :$column sortable key="therapy_start_date"--}}
  {{--        sortable--}}
  {{--    >Inizio Terapia--}}
  {{--    </x-table-heading>--}}
  {{--    @if(auth()->user()->isAdmin())--}}
  {{--      <x-table-heading responsive>--}}
  {{--        Dottore--}}
  {{--      </x-table-heading>--}}
  {{--    @endif--}}
  {{--    <x-table-heading class="text-end" responsive>Azioni Rapide</x-table-heading>--}}
  {{--  </x-slot:headers>--}}

  {{--  <x-slot:body>--}}
  {{--    @forelse($patients as $patient)--}}
  {{--      <x-table-row--}}
  {{--          :disabled="$patient->isArchived()" :error="$patient->pending_surveys > 0"--}}
  {{--          :destination="route('patients.show', $patient)"--}}
  {{--      >--}}
  {{--        <x-table-cell>{{ $patient->first_name }}</x-table-cell>--}}
  {{--        <x-table-cell responsive>{{ $patient->last_name }}</x-table-cell>--}}
  {{--        <x-table-cell responsive>{{ $patient->age }}</x-table-cell>--}}
  {{--        <x-table-cell responsive>{{ $patient->email }}</x-table-cell>--}}
  {{--        <x-table-cell>--}}
  {{--          {!! get_formatted_date($patient->therapy_start_date) !!}--}}
  {{--        </x-table-cell>--}}
  {{--        @if(auth()->user()->isAdmin())--}}
  {{--          <x-table-cell responsive>--}}
  {{--            {{ $patient->user->name }}--}}
  {{--          </x-table-cell>--}}
  {{--        @endif--}}
  {{--        <x-table-cell responsive>--}}
  {{--          <div class="flex justify-end gap-2">--}}
  {{--            <a href="{{ route('patients.edit', $patient) }}" wire:navigate>--}}
  {{--              <x-button class="btn-xs" icon="o-pencil" @click.stop tooltip="Modifica"/>--}}
  {{--            </a>--}}
  {{--            <a href="{{ route('surveys.create', ['patient_id' => $patient->id]) }}" wire:navigate>--}}
  {{--              <x-button class="btn-xs" icon="o-plus" @click.stop tooltip="Crea test"/>--}}
  {{--            </a>--}}
  {{--          </div>--}}
  {{--        </x-table-cell>--}}
  {{--      </x-table-row>--}}
  {{--    @empty--}}
  {{--      <tr>--}}
  {{--        <td colspan="{{ auth()->user()->isAdmin() ? 7 : 6 }}">--}}
  {{--          <div class="w-full text-center my-2 opacity-50">Nessun Paziente trovato</div>--}}
  {{--        </td>--}}
  {{--      </tr>--}}
  {{--    @endforelse--}}
  {{--  </x-slot:body>--}}
</x-custom.table>
