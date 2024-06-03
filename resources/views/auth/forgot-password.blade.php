<x-layouts.guest page-title="Password Reset">
  <div class="space-y-4">
    <p class="text-justify">
      Password dimenticata? Inserisci la tua email e ti spediremo un link per permetterti di scegliere una nuova
      password.
    </p>
    @if($errors->any())
      <div class="mb-4 font-medium text-sm text-error">
        {{ $errors->first() }}
      </div>
    @endif
    @if (session('status'))
      <div class="mb-4 font-medium text-sm text-success">
        {{ session('status') }}
      </div>
    @endif
    <form
        class="space-y-4" method="POST" action="/forgot-password"
        x-data=" { loading: false }" x-on:submit="loading = true"
    >
      @csrf
      <x-input
          class="input w-full input-sm" placeholder="Inserisci il tuo indirizzo email" label="Email" icon="o-envelope"
          autofocus name="email"
      />
      <button class="btn btn-primary w-full btn-sm">
        <x-loading x-show="loading"/>
        Invia email
      </button>
    </form>
  </div>
</x-layouts.guest>
