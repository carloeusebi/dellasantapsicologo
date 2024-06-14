<div>
  <x-card title="Informazioni Profilo" shadow>
    <x-form wire:submit="updateProfileInformation">
      <div class="space-y-2 max-w-2xl">
        <x-input label="Nome" wire:model="name" required autocomplete="name"/>
        <x-input label="Email" wire:model="email" type="email" required autocomplete="username"/>
      </div>
      <x-slot:actions>
        <x-button class="w-full md:btn-wide" type="submit" spinner="updateProfileInformation">
          Salva
        </x-button>
      </x-slot:actions>
    </x-form>
  </x-card>
</div>
