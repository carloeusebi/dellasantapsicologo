@php use App\Models\Survey; @endphp
<div x-data="{ confirmedDelete: false }">
  <x-slot:title>{{ $patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold"><a href="{{ route('patients.index') }}" wire:navigate>Pazienti</a></li>
    <li>{{ $patient->full_name }}</li>
  </x-slot:breadcrumb>


  <div class="grid grid-cols-1 xl:grid-cols-3 gap-y-8 xl:gap-x-8 items-start mb-8 xl:mb-4">
    <x-card :title="$patient->full_name" class="col-span-2" shadow>
      <x-forms.patient-form/>
    </x-card>

    <div class="space-y-8 xl:space-y-4 col-span-1">
      <x-card shadow>
        <div class="grid md:grid-cols-2 gap-2">
          <div class="flex flex-col gap-2 items-end md:order-1">
            <x-button class="w-full" label="Elimina" icon="o-trash" x-on:click="$wire.deleteModal = true"/>
            @if($patient->isArchived())
              <x-button
                  class="w-full" label="Ripristina" icon="o-arrow-path" wire:click="changeState"
                  spinner="changeState"
              />
            @else
              <x-button
                  class="w-full" label="Archivia" icon="o-archive-box" wire:click="changeState"
                  spinner="changeState"
              />
              <x-button class="w-full" link="{{ route('surveys.create', ['patient_id' => $patient->id]) }}">
                Nuova Valutazione
              </x-button>
            @endif
          </div>
          <div class="flex flex-wrap justify-between gap-3 md:flex-col text-sm">
            <div>
              <div class="font-bold">Creato</div>
              <div>{{ $patient->created_at->diffForHumans() }}</div>
            </div>
            <div>
              <div class="font-bold">Aggiornato</div>
              <div>{{ $patient->updated_at->diffForHumans() }}</div>
            </div>
            @if($patient->isArchived())
              <div>
                <div class="font-bold">Archiviato</div>
                <div>{{ $patient->archived_at->diffForHumans() }}</div>
              </div>
            @endif
          </div>

        </div>
      </x-card>

      <livewire:patients.surveys-table :$patient/>
    </div>
  </div>

  <div>
    <livewire:patients.patient-files :patient="$patient"/>
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
