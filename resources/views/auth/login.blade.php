<!doctype html>
<html lang="en">
<head>
  <script async crossorigin="anonymous">
    const selectedTheme = localStorage.getItem("theme");
    if (selectedTheme) {
      document.documentElement.setAttribute("data-theme", selectedTheme);
    }
  </script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Carlo Eusebi">
  <meta
      name="description"
      content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza."
  >

  <title>Login | Dellasanta Psicologo</title>

  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-base-200/50 px-1">
<div class="h-screen flex flex-col justify-center items-center gap-y-5" x-data="{ loading: false }">

  <div class="fixed right-5 top-5 lg:right-10 lg:top-10 z-50">
    <x-theme-changer/>
  </div>

  <x-card class="w-full sm:w-[500px] spacey-5 lg:px-10" shadow>
    <figure>
      <img src="{{ asset('images/Logo.webp') }}" alt="Logo" class="pe-5 max-w-[250px]"/>
    </figure>

    <h1 class="text-xl font-bold text-center my-10">Accedi al tuo account</h1>

    <form
        id="login-form" action="{{ route('login') }}" method="post" class="flex flex-col gap-y-5"
        x-on:submit="loading = true"
    >
      @csrf
      <x-input
          class="input-sm" type="email" name="email" placeholder="Email" label="Email" icon="o-envelope"
      />
      <x-input
          class="input-sm" type="password" name="password" placeholder="Password" label="Password" icon="o-eye"
      />
      <x-checkbox class="checkbox-sm" label="Ricordati" name="remember"/>
    </form>
    @error('login')
    <div class="text-error flex items-center gap-1 my-5">
      <x-icon name="o-exclamation-triangle" class="w-6 h-6"/>
      <span>{{ $message }}</span>
    </div>
    @enderror
    <div class="my-5">
      <x-button
          form="login-form" type="submit" class="btn-primary btn-sm w-full relative"
          x-bind:disabled="loading"
      >
        <x-loading class="loading-sm absolute left-5" x-show="loading"/>
        Login
      </x-button>
      <x-button class="mt-2 btn-outline w-full btn-secondary btn-sm">Torna alla Homepage</x-button>
    </div>
  </x-card>

</div>
@livewireScripts
</body>
</html>

