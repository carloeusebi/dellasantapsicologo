<x-layouts.app page-title="Verifica email" card-title="Verifica email">
  <div class="h-dvh flex flex-col justify-center items-center gap-y-5" x-data="{ loading: false }">
    <x-card class="w-full sm:w-[500px] spacey-5 lg:px-10" shadow>
      <figure class="mb-10">
        <img src="{{ asset('images/Logo.webp') }}" alt="Logo" class="pe-5 max-w-[250px]"/>
      </figure>
      <p class="text-justify text-sm">
        Prima di iniziare, puoi verificare il tuo indirizzo email cliccando sul link che ti abbiamo appena inviato per
        email.
        Se non hai ricevuto nessuna email, possiamo inviartene un'altra. Premi il pulsante qui sotto per richiederne
        un'altra.
      </p>

      @if (session('status') == 'verification-link-sent')
        <div class="my-4 font-medium text-sm text-success">
          Ti è stata inviata una nuova mail.
        </div>
      @endif

      <div class="space-y-2 mt-5 justify-between items-center">
        <form
            method="POST" action="{{ route('verification.send') }}" x-data="{ loading:false }"
            x-on:submit="loading = true"
        >
          @csrf
          <button type="submit" class="btn btn-sm btn-primary w-full">
            <x-loading x-show="loading"/>
            Invia email per la verifica
          </button>
        </form>
        <form method="POST" action="/logout" x-data="{ loading: false }" x-on:submit="loading = true">
          @csrf
          <button class="btn w-full btn-sm">
            <x-loading x-show="loading"/>
            Esci
          </button>
        </form>
      </div>
    </x-card>
  </div>
</x-layouts.app>
