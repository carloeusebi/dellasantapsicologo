<div x-data="{ confirmedDelete: false }">
  <x-slot:title>{{ $patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold"><a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a></li>
    <li>{{ $patient->full_name }}</li>
  </x-slot:breadcrumb>


  <x-header :title="$patient->full_name" size="text-xl" separator>
    <x-slot:actions>
      <livewire:patients.files :$patient/>
      <a href="{{ route('surveys.create', ['patient_id' => $patient->id]) }}" wire:navigate.hover>
        <x-button class="btn-success" label="Aggiungi test di valutazione" icon="o-plus-circle" responsive/>
      </a>
      <a href="{{ route('patients.edit', $patient) }}" wire:navigate.hover>
        <x-button class="btn-info" label="Modifica" icon="o-pencil-square" responsive/>
      </a>
      <x-button class="btn-error" label="Elimina" icon="o-trash" responsive x-on:click="$wire.deleteModal = true"/>
    </x-slot:actions>
  </x-header>

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
