<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Carlo Eusebi">
  <meta
      name="description"
      content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza."
  >

  <title>Risultati di {{ $survey->patient->full_name }}</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .bg-brand {
      background-color: #6ecc84;
    }

    .page-break {
      page-break-after: always;
    }
  </style>

</head>
<body class="bg-white min-h-screen text-black text-xs">
<div class="container max-w-6xl mx-auto p-6">
  <header class="mb-8">
    <figure class="flex justify-end">
      <img
          class="w-72" alt="Logo"
          src="data:image/png; base64, {{ base64_encode(file_get_contents(public_path('images/Logo.png'))) }}"
      />
      {{--      <img class="w-72" src="{{ asset('images/Logo.webp') }}" alt="Logo"/>--}}
    </figure>
    <h1 class="md:text-3xl font-bold my-4">{{ $survey->title }}</h1>
    <section id="patient" class="border-b pb-2 mb-5">
      <div class="space-y-2">
        <h2 class="mb-3 text-xl font-bold">Paziente:</h2>
        <strong>Nome e cognome: </strong><span>{{ $survey->patient->full_name }}</span>
        <div>
          <strong>Sesso: </strong>{{ $survey->patient->gender ?? '____' }}
          |
          <strong>Età: </strong>{{ $survey->patient->age ?? '____'}}
          |
          <strong>Peso: </strong>{{ $survey->patient->weight ?? '____'}} kg
          |
          <strong>Altezza: </strong>{{ $survey->patient->height ?? '____' }} cm
        </div>
        <div><strong>Professione: </strong>{{ $survey->patient->job ?? '___________________________' }}</div>
        <div><strong>Vive con: </strong>{{ $survey->patient->cohabitants ?? '_______________________________' }}</div>
      </div>
    </section>
  </header>

  <main>
    @foreach($survey->questionnaireSurveys as $questionnaireSurvey)
      <section class="pt-5">
        <div class="flex items-center gap-3 mb-5">
          <h2 class="text-xl font-bold">{{ $questionnaireSurvey->questionnaire->title }}</h2>
        </div>
        <p class="mb-5">{{ $questionnaireSurvey->questionnaire->description }}</p>
        @unless($questionnaireSurvey->questionnaire->choices->isEmpty())
          <div
              class="border border-black my-5 p-2 grid grid-flow-col gap-2"
              style="grid-template-rows: repeat({{ $questionnaireSurvey->questionnaire->choices->count() % 2 === 0
                ? $questionnaireSurvey->questionnaire->choices->count() / 2
                : intval($questionnaireSurvey->questionnaire->choices->count() / 2) + 1
              }}, minmax(0, 1fr))"
          >
            @foreach($questionnaireSurvey->questionnaire->choices as $choice)
              <div class="flex items-center">
                {{ $choice->points }} - {{ $choice->text }}
              </div>
            @endforeach
          </div>
        @endunless

        @foreach($questionnaireSurvey->questionnaire->questions as $question)
          @php $answer = $question->answers->first(); @endphp
          <div class="py-0 border border-black flex justify-between text-xs h-fit min-h-8">
            <span class="m-2 @if(!$question->text) shrink min-w-10 @endif">
            {{ $question->order }}. {{ $question->text }}
            </span>
            <div class="flex @if(!$question->text) grow @endif">
              @foreach($question->choices->isNotEmpty() ? $question->choices : $questionnaireSurvey->questionnaire->choices as $choice)
                <span
                    class="border-l border-black h-full flex justify-center items-center w-fit text-wrap max-w-44 px-2 @if($answer && $answer->choice?->is($choice)) bg-brand @endif"
                >
                  {{ $choice->questionable->is($question) ? $choice->text : $choice->points }}
                </span>
              @endforeach
            </div>
          </div>
        @endforeach
      </section>
      <div class="page-break"></div>
    @endforeach
  </main>
</div>
</body>
</html>

