<!doctype html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
  >
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Valutazione completata</title>
</head>
<body>
<p>
  {{ $patientName }} ha completato la valutazione {{ $surveyName }} in
  data {{ $completedAt->translatedFormat('d F Y H:i') }}.
</p>
<a href="{{ route('surveys.show', $surveyId) }}">Vai alla valutazione</a>

</body>
</html>
