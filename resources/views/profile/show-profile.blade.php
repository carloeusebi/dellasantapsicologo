<x-layouts.app title="Profilo">
  <x-slot:breadcrumb>
    <li>Profilo</li>
  </x-slot:breadcrumb>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-y-8">
    <div>
      <h3 class="font-bold">Informazioni Profilo</h3>
      <p class="text-sm">Modifica le tue informazioni profilo o l'indirizzo email</p>
    </div>
    <div class="md:col-span-2">
      <livewire:profile.update-profile-information-form/>
    </div>

    <div>
      <h3 class="font-bold">Modifica la Password</h3>
      <p class="text-sm">Assicurati che il tuo account utilizzi una lunga password casuale per motivi di
        sicurezza.</p>
    </div>
    <div class="md:col-span-2">
      <livewire:profile.update-password-form/>
    </div>

    <div>
      <h3 class="font-bold">Sessioni</h3>
      <p class="text-sm">Gestisci ed elimina le tue sessioni attive in altri browser o dispositivi</p>
    </div>

    <div class="md:col-span-2">
      <livewire:profile.logout-other-browser-sessions-form/>
    </div>
  </div>
</x-layouts.app>
