<x-layouts.guest page-title="Verifica email" card-title="Verifica email">
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
        method="POST" action="{{ route('verification.send') }}" x-data="{ loading:false }" x-on:submit="loading = true"
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
</x-layouts.guest>