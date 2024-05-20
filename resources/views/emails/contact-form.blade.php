<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
<h1>Hai ricevuto una nuova email</h1>
<div>Da: {{ $name }}</div>
<div>Numero di telefono: {{ $phone }}</div>
<div>Email: {{ $email }}</div>
<div>Messaggio:</div>
<p>{{ $body }}</p>
</body>

</html>
