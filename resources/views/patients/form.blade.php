<x-form wire:submit="save">

  <div class="grid md:grid-cols-2 gap-4">
    <x-input
        label="Nome" wire:model.live.debounce="form.first_name" placeholder="Nome"
    />
    <x-input label="Cognome" wire:model.live.debounce="form.last_name" placeholder="Cognome"/>
  </div>

  <div class="grid md:grid-cols-2 gap-4">
    <x-input
        label="Telefono" wire:model.live.debounce="form.phone" placeholder="Telefono" icon="o-phone"
        first-error-only
    />
    <x-input
        label="Email" wire:model.live.debounce="form.email" placeholder="Email" icon="o-envelope"
        first-error-only
    />
  </div>

  <div class="grid lg:grid-cols-6 gap-4">
    <div class="lg:col-span-2">
      <x-datepicker
          label="Data di nascita" wire:model.live.debounce="form.birth_date" :config="['altFormat' => 'd F Y']"
          icon="o-cake" placeholder="Data di nascita"
      />
    </div>
    <div class="lg:col-span-3">
      <x-input label="Nato a" wire:model="form.birth_place" placeholder="Luogo di nascita" icon="o-map-pin"/>
    </div>
    <div class="col-span-1">
      <x-select
          label="Sesso" wire:model="form.gender" :options="[
              ['id' => null, 'name' => ''],
              ['id' => 'Maschio', 'name' => 'Maschio'],
              ['id' => 'Femmina', 'name' => 'Femmina'],
              ['id' => 'Altro', 'name' => 'Altro'],
            ]"
      />
    </div>
  </div>

  <div class="grid lg:grid-cols-3 gap-4">
    <div class="lg:col-span-1">
      <x-datepicker
          icon="o-calendar" :config="['altFormat' => 'd F Y']"
          label="Data di inizio di terapia" placeholder="Se non inserita è oggi"
          wire:model.live.debounce="form.therapy_start_date"
      />
    </div>
    <div class="lg:col-span-2">
      <x-input label="Indirizzo" wire:model="form.address" placeholder="Indirizzo attuale" icon="o-map-pin"/>
    </div>
  </div>

  <div class="grid lg:grid-cols-2 gap-4">
    <x-input
        label="Codice Fiscale" wire:model.live="form.codice_fiscale" icon="o-identification"
        placeholder="Codice Fiscale" first-error-only x-mask="aaaaaa99a99a999a"
        x-on:input="$wire.form.codice_fiscale = $wire.form.codice_fiscale.toUpperCase()"
    />
    <x-input label="Lavoro" wire:model.="form.job" placeholder="Lavoro attuale" icon="o-briefcase"/>
  </div>

  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
    <x-input
        label="Peso" wire:model.live.debounce="form.weight" placeholder="Peso in kg" suffix="kg" first-error-only
    />
    <x-input
        label="Altezza" wire:model.live.debounce="form.height" placeholder="Altezza in cm" suffix="cm"
        first-error-only
    />
    <div class="col-span-2">
      <x-input
          label="Titolo di studio" wire:model.live.debounce="form.qualification" icon="o-academic-cap"
          placeholder="Titolo di studio"
      />
    </div>
  </div>

  <div class="grid lg:grid-cols-2 gap-4">
    <x-input
        label="Conviventi" wire:model.live.debounce="form.cohabitants" icon="o-users"
        placeholder="Conviventi del pazienti"
    />
    <x-input label="Farmaci" wire:model.live.debounce="form.drugs" icon="o-beaker" placeholder="Farmaci assunti"/>
  </div>

  <x-slot:actions>
    <x-button label="Reset" class="btn-neutral" type="button" spinner="resetForm" wire:click="resetForm"/>
    <x-button label="Salva" class="btn-primary btn-wide" type="submit" spinner="save"/>
  </x-slot:actions>
</x-form>
