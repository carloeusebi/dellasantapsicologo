@guest()
  <script>
    window.location.href = "{{ route('login') }}";
  </script>
@endguest

<x-layouts.app title="Pagina non Trovata">
  <h1 class="text-3xl font-bold mb-2">
    Pagina non trovata
  </h1>
  <div>
    <p>Sembra che questa pagina non sia più disponibile, oppure non hai le autorizzazioni necessarie per
      accedervi.</p>
    <p>Se ritieni che si sia stato un errore, per favore
      <button
          class="link" @click="alert('Funzionalità in costruzione')"
      >
        clicca qui.
      </button>
    </p>
  </div>
</x-layouts.app>
