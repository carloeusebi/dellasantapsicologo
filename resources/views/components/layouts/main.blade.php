<!DOCTYPE html>
<html lang="it">

<head>
  <!-- Google Tag Manager -->

  <!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Carlo Eusebi">
  <meta
      name="description"
      content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza."
  >

  <title>Dellasanta Psicologo |
    @isset($title)
      {{ $title }}
    @else
      Pagina non Trovata
    @endisset
  </title>

  <!-- icon -->
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">

  @livewireStyles

  @vite('resources/css/my-library.css')
  @vite('resources/css/style.scss')
</head>


<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->

<header id="top-header" x-data="{open: false}">
  <div class="container d-flex justify-space-between align-center">
    <div id="hdr-logo">
      <a href="https://www.dellasantapsicologo.it" target="_blank">
        <img class="fluid-img" src="{{asset('/images/Logo_302x75.webp')}}" alt="logo del sito">
      </a>
    </div>
    <div id="hamburger-menu" class="m-20" :class="{ open }" @click="open = !open" style="user-select: none">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <nav id="top-navbar">
      <ul>
        <li>
          <a href="{{ route('home') }}" @if (Route::is('home')) class="active" @endif>
            Home
          </a>
        </li>
        <li>
          <a href="{{ route('chi-sono') }}" @if (Route::is('chi-sono')) class="active" @endif>
            Chi Sono
          </a>
        </li>
        <li>
          <a href="{{ route('cosa-aspettarsi') }}" @if (Route::is('cosa-aspettarsi')) class="active" @endif>
            Cosa aspettarsi dalla Terapia
          </a>
        </li>
        <li>
          <a
              href="{{ route('di-cosa-mi-occupo') }}"
              @if (Route::is('di-cosa-mi-occupo')) class="active" @endif>
            Di cosa mi Occupo
          </a>
        </li>
        <li>
          <a
              href="{{ route('contatti') }}"
              @if (Route::is('contatti')) class="active" @endif>
            Contatti
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<main>
  {{ $slot }}
</main>


<!-- # CONTATTAMI -->
<section id="contattami">
  <div class="container">

    <div class="d-flex-lg flex-gap20 align-end mb-20">
      <div class="col-33 mb-20">
        <h3>Hai bisogno di un consulto?</h3>
        <h2>Contattami</h2>
        <p class="mb-10">
          Scrivi le tue informazioni e ti ricontatterò per fissare un primo consulto.
        </p>
        <hr class="mb-30">
        <address>
          <ul class="fa-ul">
            <li><a
                  href="https://www.google.it/maps/place/Via+Roma,+33,+61032+Fano+PU/@43.8418365,13.0083214,16z/data=!3m1!4b1!4m6!3m5!1s0x132d105fe6f5f5e9:0x87a86e9f359693!8m2!3d43.8418327!4d13.0131923!16s%2Fg%2F11cskzpw67?entry=ttu"
                  target="_blank"
              >
                <span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
                Via Roma, 33 61032 Fano PU
              </a></li>
            <li><a href="mailto:dellasanta.federico@gmail.com ">
                <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                dellasanta.federico@gmail.com
              </a></li>
            <li><a href="tel:375-7345384">
                <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                375 7345384
              </a></li>
            <li class="mb-0"><a href="https://wa.me/0393757345384" target="_blank">
                <span class="fa-li"><i class="fa-brands fa-whatsapp"></i></span>
                Inviami un messaggio
              </a></li>
          </ul>
        </address>
      </div>

      <!-- # FORM -->
      <div class="col-66 mb-20">
        <livewire:contact-form/>
      </div>

    </div>

    <div id="email-alerts" style="height: 61px"></div>

  </div>
</section>


<!-- ! FOOTER -->
<footer>

  <!-- # CONTATTI -->

  <section id="contatti">
    <div class="container d-flex-md">
      <div class="col-50 tablet">
        <img src="{{asset('images/Logo_450x112.webp')}}" alt="Logo" loading="lazy" width="450px" height="111px">
      </div>
      <div class="col-50 d-flex-lg">
        <div class="col-50 mb-50">
          <h4 class="text-align-start">Link Utili</h4>
          <ul class="fa-ul underline-on-hover">
            <li>
              <span class="fa-li"><i class="fa-solid fa-caret-right"></i></span>
              <a href="{{route('home')}}">Home</a>
            </li>
            <li>
              <span class="fa-li"><i class="fa-solid fa-caret-right"></i></span>
              <a href="{{route('chi-sono')}}">
                Chi sono
              </a>
            </li>
            <li>
              <span class="fa-li"><i class="fa-solid fa-caret-right"></i></span>
              <a href="{{route('cosa-aspettarsi')}}">Cosa aspettarsi dalla Terapia</a>
            </li>
            <li>
              <span class="fa-li"><i class="fa-solid fa-caret-right"></i></span>
              <a href="{{route('di-cosa-mi-occupo')}}">Di cosa mi occupo</a>
            </li>
            <li>
                          <span class="fa-li"><i class="fa-solid fa-caret-right"></i>
                          </span><a href="{{route('contatti')}}">Contatti</a>
            </li>
          </ul>
        </div>
        <div class="col50">
          <h4 class="text-align-start">Contatti</h4>
          <address>
            <ul class="fa-ul">
              <li>
                <a
                    href="https://www.google.it/maps/place/Via+Roma,+33,+61032+Fano+PU/@43.8418365,13.0083214,16z/data=!3m1!4b1!4m6!3m5!1s0x132d105fe6f5f5e9:0x87a86e9f359693!8m2!3d43.8418327!4d13.0131923!16s%2Fg%2F11cskzpw67?entry=ttu"
                    target="_blank"
                >
                  <span class="fa-li"><i class="fa-solid fa-location-dot"></i></span>
                  Via Roma, 33 61032 Fano PU
                </a>
              </li>
              <li>
                <a href="mailto:dellasanta.federico@gmail.com ">
                  <span class="fa-li"><i class="fa-solid fa-envelope"></i></span>
                  dellasanta.federico@gmail.com
                </a>
              </li>
              <li><a href="tel:375-7345384">
                  <span class="fa-li"><i class="fa-solid fa-phone"></i></span>
                  375 7345384
                </a></li>
              <li>
                <span class="fa-li"><i class="fa-regular fa-clock"></i></span>
                Dalle 9:00 alle 19:00 <br>
                Lunedì - Venerdì
              </li>
            </ul>
          </address>
        </div>
      </div>
    </div>
  </section>

  <div class="ftr-bottom">
    <div class="container">
      <div class="copyright">Federico Dellasanta P.I. 02766970418 | © 2022 tutti i diritti riservati</div>
      <div class="copyright">Realizzato da <a
            href="https://carloeusebiwebdeveloper.it"
            target="_blank"
        >carloeusebiwebdeveloper.it</a></div>
    </div>
  </div>
</footer>

@livewireScripts
@vite('resources/js/app.js')


<!-- iubenda -->
<!--suppress ES6ConvertVarToLetConst -->
<script type="text/javascript">
    var _iub = _iub || [];
    _iub.csConfiguration = {
        "consentOnContinuedBrowsing": false,
        "cookiePolicyId": 29156312,
        "countryDetection": true,
        "floatingPreferencesButtonDisplay": "bottom-right",
        "gdprAppliesGlobally": false,
        "invalidateConsentWithoutLog": true,
        "perPurposeConsent": true,
        "siteId": 2614419,
        "whitelabel": false,
        "lang": "it",
        "banner": {
            "acceptButtonCaptionColor": "#FFFFFF",
            "acceptButtonColor": "#0073CE",
            "acceptButtonDisplay": true,
            "backgroundColor": "#FFFFFF",
            "closeButtonRejects": true,
            "customizeButtonCaptionColor": "#4D4D4D",
            "customizeButtonColor": "#DADADA",
            "customizeButtonDisplay": true,
            "explicitWithdrawal": true,
            "fontSize": "16px",
            "listPurposes": true,
            "logo": null,
            "position": "float-bottom-center",
            "textColor": "#000000",
            "content": "Noi e terze parti selezionate utilizziamo cookie o tecnologie simili per finalità tecniche come specificato nella cookie policy",
            "customizeButtonCaption": "Ulteriori informazioni"
        }
    };
</script>
<!--suppress HtmlUnknownAttribute -->
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8"  async></script>
