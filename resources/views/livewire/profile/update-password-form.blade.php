<x-card title="Modifica la Password" shadow>
  <x-form wire:submit="updatePassword">
    <div class="space-y-2 max-w-2xl">
      <x-input
          type="password" autocomplete="current-password" label="Password Corrente" wire:model="current_password"
      />
      <x-input type="password" autocomplete="new-password" label="Nuova Password" wire:model="password"/>
      <x-input
          type="password" autocomplete="new-password" label="Conferma Password" wire:model="password_confirmation"
      />
    </div>
    <x-slot:actions>
      <x-button class="w-full md:btn-wide" type="submit" spinner="updatePassword">Salva</x-button>
    </x-slot:actions>
  </x-form>
</x-card>
