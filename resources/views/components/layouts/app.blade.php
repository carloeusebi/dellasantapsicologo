@php use Illuminate\Support\Facades\Route; @endphp
    <!DOCTYPE html>
<html lang="it">
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
  <title>
    @isset($title)
      {{ $title }}
    @else
      Dellasanta Psicologo
    @endisset
  </title>

  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">

  @livewireStyles
  @vite('resources/css/app.css')
</head>

<body class="min-h-screen h-full">
<div class="drawer lg:drawer-open sticky">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
  <div class="drawer-content flex flex-col items-center h-full">
    <div class="navbar bg-base-100 shadow-xl px-2 lg:pe-10 justify-between sticky top-0 z-10">
      <div class="flex flex-shrink overflow-x-scroll">
        <div>
          <label for="my-drawer-2" class="btn drawer-button lg:hidden">
            <svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-5 h-5 stroke-current"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </label>
        </div>
        <div class="flex-shrink mx-2 overflow-x-scroll">
          @isset($breadcrumb)
            <slot name="breadcrumb">
              <div class="text-sm breadcrumbs overflow-x-hidden">
                <ul>
                  {{ $breadcrumb }}
                </ul>
              </div>
            </slot>
          @endisset
        </div>
      </div>
      <div class="flex-shrink-0 space-x-3">
        <x-theme-changer/>
        @auth()
          <div class="dropdown-end dropdown">
            <button class="btn btn-square btn-sm btn-ghost">
              <svg
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  class="inline-block w-5 h-5 stroke-current"
              >
                <path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                ></path>
              </svg>
            </button>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
              <li>
                <form method="POST" action="{{ route('logout') }}" class="flex p-0">
                  @csrf
                  <button type="submit" class="flex-grow text-start px-4 py-2">Esci</button>
                </form>
              </li>
            </ul>
          </div>
        @endauth
      </div>
    </div>

    <main class="max-w-[1400px] h-full w-full px-2 md:px-6 my-5">
      {{$slot}}
    </main>
  </div>

  <div class="drawer-side shadow-xl">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu disabled p-4 w-80 md:w-64 xl:w-80 min-h-full bg-base-200 text-base-content pt-20 lg:pt-4">
      <div class="mb-5">
        <img src="{{ asset('images/Logo.webp') }}" alt="logo" class="pe-3"/>
      </div>
      <!-- Sidebar content here -->
      @auth()
        <li>
          <a
              href="{{ route('patients.index') }}"
              class="@if(Route::is('patients.*') && !Route::is('patients.create')) active @endif"
              wire:navigate.hover
          >
            Pazienti
          </a>
          <ul>
            <li>
              <a
                  href="{{ route('patients.create') }}" class="@if(Route::is('patients.create')) active @endif"
                  wire:navigate.hover
              >Nuovo</a>
            </li>
          </ul>
        </li>
        <li>
          <a
              href="{{ route('surveys.index') }}"
              class="@if(Route::is('surveys.index') && !Route::is('surveys.create')) active @endif"
              wire:navigate.hover
          >Batterie</a>
          <ul>
            <li>
              <a
                  href="{{ route('surveys.create') }}" class="@if(Route::is('surveys.create')) active @endif"
                  wire:navigate.hover
              >Nuovo</a>
            </li>
            <li><a>Templates</a></li>
          </ul>
        </li>
        <li><a>Questionari</a></li>
      @endauth
      @guest()
        <li>
          <h3 class="menu-title">Ti sei perso?</h3>
          <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('chi-sono') }}">Chi sono</a></li>
            <li><a href="{{ route('cosa-aspettarsi') }}">Cosa aspettarsi dalla Terapia</a></li>
            <li><a href="{{ route('di-cosa-mi-occupo') }}">Di cosa mi Occupo</a></li>
            <li><a href="{{ route('contatti') }}">Contatti</a></li>
          </ul>
        </li>
      @endguest
    </ul>
  </div>
</div>

@livewireScripts
@vite('resources/js/app.js')
</body>
</html>
