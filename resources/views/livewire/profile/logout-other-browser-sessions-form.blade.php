<div>
  <x-card title="Sessioni" shadow>
    <x-form>
      <div class="max-w-2xl text-sm text-base-content/60">
        Se necessario, puoi disconnetterti da tutte le altre sessioni del browser su tutti i tuoi dispositivi. Alcune
        delle tue sessioni recenti sono elencate di seguito; tuttavia, questo elenco potrebbe non essere esaustivo. Se
        ritieni che il tuo account sia stato compromesso, dovresti anche aggiornare la tua password.
      </div>
      @if (count($this->sessions) > 0)
        <div class="mt-5 space-y-6">
          <!-- Other Browser Sessions -->
          @foreach ($this->sessions as $session)
            <div class="flex items-center">
              <div>
                @if ($session->agent->isDesktop())
                  <svg
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-8 h-8 text-base-content/50"
                  >
                    <path
                        stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                    />
                  </svg>
                @else
                  <svg
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-8 h-8 text-base-content/50"
                  >
                    <path
                        stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                    />
                  </svg>
                @endif
              </div>

              <div class="ms-3">
                <div class="text-sm text-base-content/60">
                  {{ $session->agent->platform() ? $session->agent->platform() : 'Sconosciuto' }}
                  - {{ $session->agent->browser() ? $session->agent->browser() : 'Sconosciuto' }}
                </div>

                <div>
                  <div class="text-xs text-base-content/50">
                    {{ $session->ip_address }},

                    @if ($session->is_current_device)
                      <span class="text-success font-semibold">Questo dispositivo</span>
                    @else
                      Ultimo attivo {{ $session->last_active }}
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <x-slot:actions>
          <x-button class="w-full md:btn-wide" wire:click="confirmLogout">
            Disconnetti altre Sessioni
          </x-button>
        </x-slot:actions>
      @endif
    </x-form>
  </x-card>

  <x-modal wire:model="confirmingLogout" title="Disconnetti altre Sessioni" class="backdrop-blur">
    <div
        x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)"
    >
      <div class="mb-4">Per favore, inserisci la tua password per confermare che desideri disconnetterti dalle altre
        sessioni del browser su tutti i tuoi dispositivi
      </div>
      <x-input
          type="password" wire:model.defer="password" placeholder="Password" autocomplete="current-password"
          x-ref="password" wire:keydown.enter="logoutOtherBrowserSessions"
      />
    </div>
    <x-slot:actions>
      <x-button wire:click="$toggle('confirmingLogout')" variant="white">Annulla</x-button>
      <x-button wire:click="logoutOtherBrowserSessions" spinner="logoutOtherBrowserSessions">
        Disconnetti le altre Sessioni
      </x-button>
    </x-slot:actions>
  </x-modal>
</div>
