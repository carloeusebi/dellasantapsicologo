<div>
  <section
      id="landing-page"
      class="py-5 md:max-w-5xl mx-auto"
  >
    <h1 class="text-center text-4xl font-bold uppercase mb-5">QUESTIONARI PER LA VALUTAZIONE PSICOLOGICA</h1>
    <p class="text-justify">
      Le verranno proposti una serie di questionari appositamente selezionati per esplorare alcuni aspetti del
      funzionamento psicologico che potrebbero influire sul Suo benessere. La prego di compilare ogni questionario in
      tutte le sue parti, anche nel caso in cui qualche domanda possa risultarLe poco chiara o non pertinente (in tal
      caso La invito a lasciare un commento, così da poter ricontrollare la domanda in seduta). La compilazione di tutti
      i questionari può richiedere del tempo, quindi, nel caso si dovesse sentire particolarmente affaticata/o, può
      effettuare una o più interruzioni. Da ogni questionario verrà ricavato un punteggio che darà delle indicazioni sul
      suo stato. Questi dati permetteranno di integrare quanto emerso nei colloqui con informazioni che potranno servire
      per impostare un trattamento più adeguato al suo problema e alla sua personalità.
    </p>
    <div class="flex justify-center my-6">
      <a href="{{ route('evaluation.patient', $survey) }}" wire:navigate.hover>
        <button class="bg-brand px-12 py-3 rounded-lg font-bold text-white hover:opacity-70 active:opacity-70">
          Inizia
        </button>
      </a>
    </div>
  </section>
</div>
