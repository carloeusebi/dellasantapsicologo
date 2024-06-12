<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email</title>
  <style>
    body {
      font-family: 'sans', serif;
      background-color: transparent;
    }

    figure {
      display: block;
      margin-left: auto;
      max-width: 100%;
    }

    img {
      display: block;
      max-width: 300px;
      width: 100%;
      margin: 0 auto;
    }

    .container {
      background-color: white;
      max-width: 800px;
      margin: 0 auto;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 1px 5px 0 rgb(0 0 0 / 0.05)
    }

    .link {
      display: block;
      background-color: #6ecc84;
      padding-top: .5rem;
      padding-bottom: .5rem;
      text-align: center;
    }

    .link p {
      text-align: justify;
    }

    a {
      color: white;
    }

    a:hover, a:active {
      color: blue;
      opacity: .76;
    }
  </style>
</head>

<body style="background-color: #f8f8f8">
<div class="container">
  <figure class="logo">
    <img src="https://www.dellasantapsicologo.it/images/Logo.png" alt="logo">
  </figure>

  <p style="text-align: justify">{{ $body }}</p>

  <a class="link" href="{{ $link }}">
    <div>Vai al questionario</div>
  </a>

</div>
</body>

</html>
