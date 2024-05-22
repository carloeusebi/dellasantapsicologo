<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Carlo Eusebi">
  <meta
      name="description"
      content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza."
  >
  <title>
    @isset($title)
      {{ $title }}
    @else
      Dellasanta Psicologo
    @endisset
  </title>

  <!-- icon -->
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">

  @livewireStyles
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body class="bg-gray-50">
<main class="container max-w-7xl mx-auto my-5">
  {{ $slot }}
</main>
</body>

@wireUiScripts
@livewireScripts
</html>
