<!doctype html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
  >
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test Di Valutazione | Dellasanta Psicologo</title>

  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">
  @livewireStyles
  @livewireScripts
  @vite(['resources/css/app.css', 'resources/css/evaluation.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-black min-h-screen">
<header>
  <div class="bg-white border-b-8 border-brand-secondary relative z-10">
    <img
        class="mx-auto py-4 h-20 md:py-8 md:h-44"
        src="{{ asset('images/Logo.png') }}"
        alt="logo"
    />
  </div>
</header>
<main class="container p-5 mx-auto h-full">
  {{ $slot }}
</main>
</body>
</html>
