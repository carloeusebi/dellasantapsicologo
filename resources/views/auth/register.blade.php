<x-layouts.guest page-title="Registrati" card-title="Registra un nuovo account">

  <form
      class="space-y-2 mb-5" method="POST" action="{{ route('register') }}" x-data="{ loading: false }"
      x-on:submit="loading = true"
  >
    @csrf
    <x-input
        class="input-sm" name="name" type="text" label="Nome" icon="o-user" error-field="name" value="{{ old('name') }}"
        placeholder="Nome e Cognome" autofocus
    />
    <x-input
        class="input-sm" name="email" type="email" label="Email" icon="o-envelope" error-field="email"
        value="{{ old('email') }}" placeholder="Indirizzo Email"
    />
    <x-input
        class="input-sm" name="password" type="password" label="Password" icon="o-eye" error-field="password"
        placeholder="Password"
    />
    <x-input
        class="input-sm" name="password_confirmation" type="password" label="Conferma Password" icon="o-eye"
        error-field="password-confirmation" placeholder="Ripeti la Password"
    />
    <hr class="!my-5"/>
    <button class="btn btn-sm btn-primary w-full">
      <x-loading x-show="loading"/>
      Registrati
    </button>
  </form>
  <a href="{{ route('login') }}" class="hover:underline" wire:navigate.hover>
    <div class="text-center text-xs">Ho già un account, accedi.</div>
  </a>
</x-layouts.guest>
