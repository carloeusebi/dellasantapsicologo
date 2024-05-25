<div x-data="{ confirmedDelete: false }">
  <x-slot:title>{{ $patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold"><a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a></li>
    <li>{{ $patient->full_name }}</li>
  </x-slot:breadcrumb>


  <x-header :title="$patient->full_name" size="text-xl" separator class="mb-5">
    <x-slot:actions>
      <livewire:patients.files :$patient/>
      <a href="{{ route('patients.edit', $patient) }}" wire:navigate.hover>
        <x-button class="btn-info" label="Modifica" icon="o-pencil-square" responsive/>
      </a>
      <x-button class="btn-error" label="Elimina" icon="o-trash" responsive x-on:click="$wire.deleteModal = true"/>
    </x-slot:actions>
  </x-header>

  <div class="grid lg:grid-cols-2 lg:gap-20 items-center">
    <div class="md:flex gap-2 items-center relative">
      <x-radio
          wire:model="archived" wire:change.debounce="changeState"
          :options="[
               [ 'id' => 0, 'name' => 'Attuale'],
               ['id' => 1, 'name' => 'Archiviato']
            ]"
      />
      <x-loading wire:loading wire:target="changeState" class="text-primary"/>
    </div>
    <x-header size="text-lg" class="!mb-0">
      <x-slot:title>
        <div class="hidden lg:block">Test di valutazione</div>
      </x-slot:title>
      <x-slot:actions>
        <a href="{{ route('surveys.create', ['patient_id' => $patient->id]) }}" wire:navigate.hover>
          <x-button class="btn-ghost" label="Aggiungi test di valutazione" icon="o-plus-circle"/>
        </a>
      </x-slot:actions>
    </x-header>
  </div>

  <x-divider/>

  <div class="grid lg:grid-cols-2 gap-8">
    <div>
      <ul>
        @if(auth()->user()->isAdmin())
          <li>
            <span class="font-bold">Dottore</span>:
            <span>{{ $patient->user->name }}</span>
          </li>
        @endif
        <li>
          <span class="font-bold">Creato:</span>
          {!! get_formatted_date($patient->created_at) !!}
        </li>
        @unless($patient->created_at->isSameSecond($patient->updated_at))
          <li>
            <span class="font-bold">Ultima modifica:</span>
            {!! get_formatted_date($patient->updated_at) !!}
          </li>
        @endunless
        @if($patient->therapy_start_date)
          <li>
            <span class="font-bold">Data di inizio terapia</span>:
            {!! get_formatted_date($patient->therapy_start_date) !!}
          </li>
        @endif
        @if ($patient->isArchived())
          <li>
            <span class="font-bold">Data di fine Terapia:</span>
            {!! get_formatted_date($patient->archived_at) !!}
          </li>
        @endif
        @if($patient->gender)
          <li>
            <span class="font-bold">Genere</span>:
            <span>{{ $patient->gender }}</span>
          </li>
        @endif
        @if($patient->age)
          <li>
            <span class="font-bold">Età</span>:
            <span>{{ $patient->age }}</span>
          </li>
        @endif
        @if($patient->birth_date)
          <li>
            <span class="font-bold">Data di nascita</span>:
            <span>{{ $patient->birth_date->translatedFormat('d F Y') }}</span>
          </li>
        @endif
        @if($patient->birth_date)
          <li>
            <span class="font-bold">Luogo di nascita</span>:
            <span>{{ $patient->birth_place }}</span>
          </li>
        @endif
        @if($patient->address)
          <li>
            <span class="font-bold">Indirizzo</span>:
            <span>{{ $patient->address }}</span>
          </li>
        @endif
        @if($patient->codice_fiscale)
          <li>
            <span class="font-bold">Codice Fiscale</span>:
            <span>{{ $patient->codice_fiscale }}</span>
          </li>
        @endif
        @if($patient->email)
          <li>
            <span class="font-bold">Email</span>:
            <span>{{ $patient->email }}</span>
          </li>
        @endif
        @if($patient->phone)
          <li>
            <span class="font-bold">Numero di telefono</span>:
            <span>{{ $patient->phone}}</span>
          </li>
        @endif
        @if($patient->weight)
          <li>
            <span class="font-bold">Peso</span>:
            <span>{{ $patient->weight }}kg</span>
          </li>
        @endif
        @if($patient->height)
          <li>
            <span class="font-bold">Altezza</span>:
            <span>{{ $patient->height }}cm</span>
          </li>
        @endif
        @if($patient->qualification)
          <li>
            <span class="font-bold">Titolo di studio</span>:
            <span>{{ $patient->qualification }}</span>
          </li>
        @endif
        @if($patient->job)
          <li>
            <span class="font-bold">Occupazione</span>:
            <span>{{ $patient->job }}</span>
          </li>
        @endif
        @if($patient->cohabitants)
          <li>
            <span class="font-bold">Conviventi</span>:
            <span>{{ $patient->cohabitants }}</span>
          </li>
        @endif
        @if($patient->drugs)
          <li>
            <span class="font-bold">Farmaci</span>:
            <span>{{ $patient->drugs }}</span>
          </li>
        @endif
      </ul>
    </div>

    <div>
      <livewire:surveys.table :$patient/>
    </div>
  </div>


  <x-modal wire:model="deleteModal" title="Elimina Paziente" separator class="backdrop-blur">
    <div class="space-y-1 select-none">
      <p>Sei sicuro di voler eliminare <span class="italic">{{ $patient->full_name }}</span>?</p>
      <p class="font-bold">Questa azione non è reversibile.</p>
      <x-checkbox :label="'Elimina ' . $patient->full_name.'.'" x-on:change="confirmedDelete = !confirmedDelete"/>
    </div>
    <x-slot:actions>
      <x-button label="Annulla" x-on:click="$wire.deleteModal = false"/>
      <x-button
          label="Elimina" icon="o-trash" class="btn-error" x-bind:disabled="!confirmedDelete" spinner="delete"
          wire:click="delete"
      />
    </x-slot:actions>
  </x-modal>
</div>
