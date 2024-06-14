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

  @laravelPWA

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
      {{ $title }} |
    @endisset
    Dellasanta Psicologo
  </title>

  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/ico">

  @livewireStyles
  @vite('resources/css/app.css')

</head>

<body class="font-sans antialiased min-h-screen bg-base-200/50">

{{-- The navbar with `sticky` and `full-width` --}}
<x-nav
    sticky full-width
    class="shadow-lg h-[73px] [&>div]:!py-0 [&>div]:h-full [&>div]:max-w-full max-w-screen"
>

  <x-slot:brand>
    {{-- Drawer toggle for "main-drawer" --}}
    <label for="main-drawer" class="lg:hidden mr-3">
      <x-icon name="o-bars-3" class="cursor-pointer"/>
    </label>

    {{-- Brand --}}
    <div>
      <img class="hidden xl:block h-14" src="{{ asset('images/Logo.webp') }}" alt="logo"/>
      <img class="hidden md:block xl:hidden h-12" src="{{ asset('favicon.ico') }}" alt="logo"/>
    </div>

    @isset($breadcrumb)
      <div
          class="md:ms-6 lg:ms-12 text-xs md:text-sm breadcrumbs overflow-x-auto me-3"
          style="max-width: calc(100vw - 130px)"
      >
        <ul>
          {{ $breadcrumb }}
        </ul>
      </div>
    @endisset
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
  <x-slot:sidebar drawer="main-drawer" collapsible collapse-text="Chiudi" class="bg-base-200 shadow-2xl">

    {{-- User --}}
    @if($user = auth()->user())
      <x-list-item :item="$user" value="name" sub-value="role.label" no-separator no-hover class="pt-2">
        <x-slot:actions>
          <div class="flex gap-2 items-end">
            <x-button
                icon="o-cog-6-tooth" class="btn-circle btn-ghost btn-xs" tooltip-left="Profilo"
                :link="route('profile')"
            />
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-button
                  type="submit"
                  icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="Esci" no-wire-navigate
              />
            </form>
          </div>
        </x-slot:actions>
      </x-list-item>

      <x-menu-separator :title="null"/>
    @endif

    {{-- Activates the menu item when a route matches the `link` property --}}
    @auth()
      <x-menu :title="null" activate-by-route>
        <x-custom-menu-sub title="Pazienti" icon="o-user-group" route="patients.*">
          <x-menu-item title="Pazienti" :link="route('patients.index')" route="patients.index"/>
          <x-menu-item title="Nuovo" :link="route('patients.create')" route="patients.create"/>
        </x-custom-menu-sub>
        <x-custom-menu-sub title="Valutazioni" icon="o-list-bullet" route="surveys.*">
          <x-menu-item title="Valutazioni" :link="route('surveys.index')" route="surveys.index"/>
          <x-menu-item title="Nuovo" :link="route('surveys.create')" route="surveys.create"/>
          <x-menu-item title="Templates" :link="route('surveys.templates.index')" route="surveys.templates.index"/>
        </x-custom-menu-sub>
        <x-custom-menu-sub title="Questionari" icon="o-document-chart-bar" route="questionnaires.*">
          <x-menu-item title="Questionari" :link="route('questionnaires.index')" route="questionnaires.index"/>
          <x-menu-item title="Nuovo" :link="route('questionnaires.create')" route="questionnaires.create"/>
          <x-menu-item title="Tags" :link="route('tags.index')" route="tags.index"/>
        </x-custom-menu-sub>
      </x-menu>
    @endauth
  </x-slot:sidebar>

  {{-- The `$slot` goes here --}}
  <x-slot:content>
    <div class="mb-5 md:px-2 lg:px-4 xl:px-8">
      {{ $slot }}
    </div>
  </x-slot:content>
</x-main>

<x-scroll-top-button/>

{{--  TOAST area --}}
<x-toast/>

@livewireScripts
@vite('resources/js/app.js')
@stack('scripts')
</body>
