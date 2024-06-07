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

  <!-- PWA  -->
  <meta name="theme-color" content="#6ecc84"/>
  <link rel="apple-touch-icon" href="{{ asset('images/logo-without-text.png') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">

  <title>{{ $pageTitle }} | Dellasanta Psicologo</title>

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/ico">

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-base-200/50 px-1">
<div class="h-screen flex flex-col justify-center items-center gap-y-5" x-data="{ loading: false }">

  <div class="fixed right-5 top-5 lg:right-10 lg:top-10 z-50">
    <x-theme-changer/>
  </div>

  <x-card class="w-full sm:w-[500px] spacey-5 lg:px-10" shadow>
    <figure class="mb-10">
      <img src="{{ asset('images/Logo.webp') }}" alt="Logo" class="pe-5 max-w-[250px]"/>
    </figure>

    @isset($cardTitle)
      <h1 class="text-xl font-bold text-center my-5">{{ $cardTitle }}</h1>
    @endisset

    <div class="my-5">
      {{ $slot }}
    </div>

  </x-card>

</div>
@livewireScripts
<script src="{{ asset('/sw.js') }}"></script>
<script>
  if ("serviceWorker" in navigator) {
    // Register a service worker hosted at the root of the
    // site using the default scope.
    navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
        console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
        console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
    console.error("Service workers are not supported.");
  }
</script>
</body>
</html>

