<x-layouts.guest page-title="Password Reset">
  <h1 class="text-xl font-bold text-center my-10">Password dimenticata</h1>
  <form
      class="space-y-2" method="POST" action="/reset-password" x-data="{ loading: false }"
      x-on:submit="loading = true"
  >
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <x-input
        class="input-sm" name="email" type="email" label="Email" icon="o-envelope" error-field="email"
        value="{{ old('email', $request->email) }}"
    />
    <x-input class="input-sm" name="password" type="password" label="Password" icon="o-eye" error-field="password"/>
    <x-input
        class="input-sm" name="password_confirmation" type="password" label="Conferma Password" icon="o-eye"
        error-field="password-confirmation"
    />
    <hr class="!my-5"/>
    <button class="btn btn-sm btn-primary w-full">
      <x-loading x-show="loading"/>
      Modifica Password
    </button>
  </form>
</x-layouts.guest>
