@guest()
  <x-layouts.main>
    <div class="text-align-center mt-20">
      <h1 class="p-20">500 - ERRORE DEL SERVER</h1>
      <a class='btn' href="{{ route('home') }}">torna alla homepage</a>
    </div>
  </x-layouts.main>
@endguest
@auth()
  <x-layouts.app>
    <h1 class="text-3xl font-bold mb-2">
      <x-heroicon-o-exclamation-triangle class="w-10 h-10 inline"/>
      Errore del server
    </h1>
    <div>
      <p>Hops! Qualcosa è andato storto.</p>
      <p>Se ritieni che si sia stato un errore, per favore <a class="link">clicca qui.</a>
        <span class="italic text-sm">Funzionalità ancora non presente <x-heroicon-o-face-smile class="h-5 w-5 inline"/></span>
      </p>
    </div>
  </x-layouts.app>
@endauth
