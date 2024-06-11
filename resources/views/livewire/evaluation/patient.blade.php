<div class="max-w-5xl mx-auto">
  <h2 class="text-center text-3xl mb-5">Inserisci prima delle informazioni su di te</h2>

  <x-form wire:submit="save" class="[&_label]:!pb-0 !gap-2">

    <div class="grid md:grid-cols-2 gap-x-4">
      <x-input
          class="input-sm bg-white" icon="o-user"
          label=" Nome"
          wire:model.live="form.first_name"
      />
      <x-input
          icon="o-user"
          class="input-sm bg-white" label="Cognome" wire:model.live="form.last_name"
      />
    </div>

    <div class="grid md:grid-cols-2 gap-x-4">
      <x-input
          class="input-sm bg-white"
          label="Telefono" wire:model.live.debounce="form.phone" icon="o-phone"
          first-error-only
      />
      <x-input
          class="input-sm bg-white"
          label="Email" wire:model.live.debounce="form.email" icon="o-envelope"
          first-error-only
      />
    </div>

    <div class="grid lg:grid-cols-6 gap-x-4">
      <div class="lg:col-span-2">
        <x-datepicker
            class="input-sm bg-white"
            label="Data di nascita" wire:model.live.debounce="form.birth_date" :config="['altFormat' => 'd F Y']"
            icon="o-cake"
        />
      </div>
      <div class="lg:col-span-3">
        <x-input
            class="input-sm bg-white" label="Nato a" wire:model="form.birth_place"
            icon="o-map-pin"
        />
      </div>
      <div class="col-span-1">
        <x-select
            class="select-sm bg-white"
            label="Sesso" wire:model="form.gender" :options="[
              ['id' => null, 'name' => ''],
              ['id' => 'Maschio', 'name' => 'Maschio'],
              ['id' => 'Femmina', 'name' => 'Femmina'],
              ['id' => 'Altro', 'name' => 'Altro'],
            ]"
        />
      </div>
    </div>

    <div class="grid">
      <x-input
          class="input-sm bg-white" label="Indirizzo" wire:model="form.address"
          icon="o-map-pin"
      />
    </div>

    <div class="grid lg:grid-cols-2 gap-x-4">
      <x-input
          class="input-sm bg-white"
          label="Codice Fiscale" wire:model.live="form.codice_fiscale" icon="o-identification"
          first-error-only x-mask="aaaaaa99a99a999a"
          x-on:input="$wire.form.codice_fiscale = $wire.form.codice_fiscale.toUpperCase()"
      />
      <x-input
          class="input-sm bg-white" label="Lavoro" wire:model.="form.job"
          icon="o-briefcase"
      />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-4">
      <div class="grid sm:grid-cols-2 gap-x-4">
        <div class="col-span-1">
          <x-input class="input-sm bg-white" label="Peso" wire:model.live.debounce="form.weight" first-error-only>
            <x-slot:append>
              <span class="w-10 text-center">kg</span>
            </x-slot:append>
          </x-input>
        </div>
        <div class="col-span-1">
          <x-input class="input-sm bg-white" label="Altezza" wire:model.live.debounce="form.height" first-error-only>
            <x-slot:append>
              <span class="w-10 text-center">cm</span>
            </x-slot:append>
          </x-input>
        </div>
      </div>
      <x-input
          class="input-sm bg-white"
          label="Titolo di studio" wire:model.live.debounce="form.qualification" icon="o-academic-cap"
      />
    </div>

    <div class="grid lg:grid-cols-2 gap-x-4">
      <x-input
          class="input-sm bg-white"
          label="Conviventi" wire:model.live.debounce="form.cohabitants" icon="o-users"
      />
      <x-input
          class="input-sm bg-white" label="Farmaci" wire:model.live.debounce="form.drugs" icon="o-beaker"
      />
    </div>

    <x-slot:actions>
      <div class="grow flex flex-col sm:flex-row sm:justify-end items-stretch gap-2">
        <button
            class="flex justify-center items-center gap-2 bg-gray-300 px-4 py-1 rounded-lg font-bold text-white hover:opacity-70 active:opacity-70"
            type="button"
            wire:click="resetForm"
        >
          <x-loading class="loading-xs" wire:loading wire:target="resetForm"/>
          <span>Reset</span>
        </button>
        <button
            class="flex justify-center items-center gap-2 bg-brand px-12 py-1 rounded-lg font-bold text-white hover:opacity-70 active:opacity-70 btn-wide"
            type="submit" spinner="save"
        >
          <x-loading class="loading-xs" wire:loading wire:target="save"/>
          <span>Salva</span>
        </button>
      </div>
    </x-slot:actions>
  </x-form>

  <x-errors class="mt-5"/>
</div>
