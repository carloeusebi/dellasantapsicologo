@php use App\Models\Patient; @endphp
<div>
  <x-slot:title>Crea Test di Valutazione</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Valutazioni</a></li>
    <li>Crea</li>
  </x-slot:breadcrumb>

  <x-steps wire:model="step" class="border my-5 p-5">
    <x-step step="1" text="Paziente">
      <x-select
          wire:model.live="patientId"
          label="Scegli il Paziente"
          :options="$this->patients"
          option-value="id"
          option-label="full_name"
          :disabled="$queryStringPatientId"
          icon="o-user"
      />
    </x-step>
    <x-step step="2" text="Questionari">
      <div>
        <span class="font-bold">Paziente: {{ Patient::find($patientId)?->full_name }} </span>
      </div>
    </x-step>
    <x-step step="3" text="Conferma">
      Conferma
    </x-step>
  </x-steps>

  <x-button wire:click="prev" x-bind:disabled="$wire.step === 1">Torna Indietro</x-button>
  <x-button wire:click="next">Prosegui</x-button>
</div>
