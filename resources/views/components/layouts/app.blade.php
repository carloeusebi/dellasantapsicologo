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
<div class="drawer xl:drawer-open sticky">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
  <div class="drawer-content flex flex-col items-center h-full">
    <div class="navbar bg-base-100 shadow-xl px-2 xl:pe-10 justify-between sticky top-0 z-10">
      <div class="flex flex-shrink overflow-x-scroll">
        <div>
          <label for="my-drawer-2" class="btn drawer-button xl:hidden">
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
          <x-dropdown class="btn-sm" icon="o-ellipsis-vertical">
            <x-menu-item :title="auth()->user()->email" class="btn-disabled opacity-50 italic py-0" @click.stop/>
            <x-menu-item :title="auth()->user()->role->label" class="btn-disabled opacity-50 italic py-0" @click.stop/>
            <hr/>
            <x-menu-item title="Impostazioni" icon="o-cog-6-tooth"/>
            <x-menu-item icon="o-arrow-right-end-on-rectangle">
              <x-slot:title>
                <form
                    method="POST" action="{{ route('logout') }}" x-data="{loading: false}" x-on:submit="loading = true"
                >
                  @csrf
                  <button type="submit" class="w-full flex items-center justify-between" @click.stop>
                    <span>Esci</span>
                    <x-loading x-show="loading" class="loading-xs"/>
                  </button>
                </form>
              </x-slot:title>
            </x-menu-item>
          </x-dropdown>
        @endauth
      </div>
    </div>

    <main class="max-w-[1400px] h-full w-full px-2 md:px-6 my-5">
      {{$slot}}
    </main>
  </div>

  <div class="drawer-side shadow-xl">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu disabled p-4 w-80 md:w-64 xl:w-80 min-h-full bg-base-200 text-base-content pt-20 xl:pt-4">
      <div class="mb-5">
        <img src="{{ asset('images/Logo.webp') }}" alt="logo" class="pe-3"/>
      </div>
      <!-- Sidebar content here -->
      @auth()
        <x-menu activate-by-route>
          <x-menu-sub title="Pazienti" icon="o-user-group">
            <x-menu-item title="Pazienti" link="{{ route('patients.index') }}" route="patients.index"/>
            <x-menu-item title="Nuovo" link="{{ route('patients.create') }}" route="patients.create"/>
          </x-menu-sub>
          <x-menu-separator/>
          <x-menu-sub title="Valutazioni" icon="o-list-bullet">
            <x-menu-item title="Valutazioni" link="{{ route('surveys.index') }} " route="surveys.index"/>
            <x-menu-item title="Nuova" link="{{ route('surveys.create') }}" route="surveys.create"/>
            <x-menu-item title="Templates"/>
          </x-menu-sub>
          <x-menu-separator/>
          <x-menu-sub title="Questionari" icon="o-document-chart-bar">
            <x-menu-item title="Questionari" link="{{ route('questionnaires.index') }}" route="questionnaires.index"/>
            <x-menu-item title="Nuovo" link=" {{ route('questionnaires.create') }}" route="questionnaires.create"/>
            <x-menu-item title="Tags"/>
          </x-menu-sub>
        </x-menu>
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

<x-toast/>
@livewireScripts
@vite('resources/js/app.js')
</body>
</html>
