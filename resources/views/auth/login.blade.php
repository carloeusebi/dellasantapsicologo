<x-layouts.app>
  <x-slot name="breadcrumb">
    <ul>
      <li>Login</li>
    </ul>
  </x-slot>

  <div class="h-full flex flex-col justify-center items-center gap-y-5">
    <figure class="px-10 pt-10">
      <img src="{{ asset('images/logo-without-text.png') }}" alt="Logo" class="drop-shadow-2xl"/>
    </figure>

    <div class="card max-w-96 w-screen bg-base-300 shadow-xl">
      <div class="card-body items-center text-center">
        <h2 class="card-title">Accedi al tuo account</h2>
        <form
            method="POST"
            action="{{ route('authenticate') }}"
            class="space-y-5 w-full"
            x-data="{submitting: false}"
            x-on:submit="submitting = true"
        >
          @csrf
          <label class="input input-bordered flex items-center gap-2">
            <x-heroicon-c-envelope class="w-5 h-5"/>
            <input type="text" class="grow" placeholder="Email" name="email"/>
          </label>
          <label class="input input-bordered flex items-center gap-2">
            <x-heroicon-c-key class="w-5 h-5"/>
            <input type="password" class="grow" name="password" placeholder="Password"/>
          </label>

          @error('login')
          <div class="text-error flex items-center gap-1">
            <x-heroicon-o-exclamation-triangle class="w-6 h-6"/>
            <span>{{ $message }}</span>
          </div>
          @enderror
          <div class="card-actions">
            <button type="submit" class="btn btn-primary w-full relative" :disabled="submitting">
              <span x-show="submitting" class="loading loading-spinner loading-md absolute left-3"></span>
              Accedi
            </button>
            <a href="{{ route('home') }}" class="btn btn-secondary w-full btn-outline">Torna alla Homepage</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layouts.app>
