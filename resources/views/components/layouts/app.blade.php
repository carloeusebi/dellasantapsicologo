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

<body class="font-sans antialiased">

{{-- The navbar with `sticky` and `full-width` --}}
<x-nav sticky full-width class="shadow-lg h-[73px] [&>div]:!py-0 [&>div]:h-full">

  <x-slot:brand>
    {{-- Drawer toggle for "main-drawer" --}}
    <label for="main-drawer" class="lg:hidden mr-3">
      <x-icon name="o-bars-3" class="cursor-pointer"/>
    </label>

    {{-- Brand --}}
    <div class="hidden lg:block">
      <img src="{{ asset('images/Logo.webp') }}" alt="logo" class="h-14"/>
    </div>

    <div class="lg:ms-12 text-xs md:text-sm breadcrumbs">
      <ul>
        {{ $breadcrumb }}
      </ul>
    </div>
  </x-slot:brand>

  {{-- Right side actions --}}
  <x-slot:actions>
    <x-theme-changer/>
    {{--    <x-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive/>--}}
    {{--    <x-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive/>--}}
  </x-slot:actions>
</x-nav>

{{-- The main content with `full-width` --}}
<x-main with-nav full-width>

  {{-- This is a sidebar that works also as a drawer on small screens --}}
  {{-- Notice the `main-drawer` reference here --}}
  <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200 shadow-2xl">

    {{-- User --}}
    @if($user = auth()->user())
      <x-list-item :item="$user" value="name" sub-value="role.label" no-separator no-hover class="pt-2">
        <x-slot:actions>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button
                type="submit"
                icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate
            />
          </form>
        </x-slot:actions>
      </x-list-item>

      <x-menu-separator :title="null"/>
    @endif

    {{-- Activates the menu item when a route matches the `link` property --}}
    @auth()
      <x-menu :title="null" activate-by-route>
        <x-menu-sub title="Pazienti" icon="o-user-group">
          <x-menu-item title="Pazienti" link="{{ route('patients.index') }}" route="patients.*"/>
          <x-menu-item title="Nuovo" link="{{ route('patients.create') }}" route="patients.create"/>
        </x-menu-sub>
        <x-menu-sub title="Valutazioni" icon="o-list-bullet">
          <x-menu-item title="Valutazioni" link="{{ route('surveys.index') }} " route="surveys.*"/>
          <x-menu-item title="Nuovo" link="{{ route('surveys.create') }}" route="surveys.create"/>
          <x-menu-item title="Templates"/>
        </x-menu-sub>
        <x-menu-sub title="Questionari" icon="o-document-chart-bar">
          <x-menu-item title="Questionari" link="{{ route('questionnaires.index') }}" route="questionnaires.*"/>
          <x-menu-item title="Nuovo" link=" {{ route('questionnaires.create') }}" route="questionnaires.create"/>
          <x-menu-item title="Tags"/>
        </x-menu-sub>
      </x-menu>
    @endauth
    @guest()
      <x-menu title="Ti sei perso?">
        <x-menu-item link="{{ route('home') }}" title="Home"/>
        <x-menu-item link="{{ route('chi-sono') }}" title="Chi sono"/>
        <x-menu-item link="{{ route('cosa-aspettarsi') }}" title="Cosa aspettarsi dalla Terapia"/>
        <x-menu-item link="{{ route('di-cosa-mi-occupo') }}" title="Di cosa mi Occupo"/>
        <x-menu-item link="{{ route('contatti') }}" title="Contatti"/>
      </x-menu>
    @endguest
  </x-slot:sidebar>

  {{-- The `$slot` goes here --}}
  <x-slot:content>
    {{ $slot }}
  </x-slot:content>
</x-main>

{{--  TOAST area --}}
<x-toast/>
@livewireScripts
@vite('resources/js/app.js')
</body>
