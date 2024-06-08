@guest()
  <script>
    window.location.href = "{{ route('login') }}";
  </script>
@endguest

<x-layouts.app title="Pagina non Trovata">
  <h1 class="text-3xl font-bold mb-2">
    Errore 403
  </h1>
  <div>
    <p>Sembra che tu non abbia l'accesso per visualizzare questa pagina.
    </p>
    <p>Se ritieni che si sia stato un errore, per favore
      <button
          class="link" @click="alert('Funzionalità in costruzione')"
      >
        clicca qui.
      </button>
    </p>
  </div>
</x-layouts.app>
