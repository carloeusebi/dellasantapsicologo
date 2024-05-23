@guest()
  <x-layouts.main>
    <div class="text-align-center mt-20">
      <h1 class="p-20">404 - PAGINA NON TROVATA</h1>
      <a class='btn' href="{{ route('home') }}">torna alla homepage</a>
    </div>
  </x-layouts.main>
@endguest
@auth()
  <x-layouts.app>
    <h1 class="text-3xl font-bold mb-2">
      <x-heroicon-o-exclamation-triangle class="w-10 h-10 inline"/>
      Pagina non trovata
    </h1>
    <div>
      <span>Sembra che questa pagina non sia più disponibile.</span>
    </div>
  </x-layouts.app>
@endauth
