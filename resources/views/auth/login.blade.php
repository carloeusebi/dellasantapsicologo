<!doctype html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
  >
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
<main class="h-screen flex justify-center items-center">
  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <!-- LOGO -->
      <img
          class="mx-auto h-max w-3/12 md:w-auto"
          src="{{asset('images/logo-without-text.png')}}"
          alt="Della Santa Psicologo Logo"
          width="168"
          height="168"
      />
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Accedi al tuo account</h2>
    </div>

    <div class="relative mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <!-- FORM -->
      <form
          id="form"
          method="POST"
          action="{{ route('authenticate') }}"
          class="space-y-6 mb-5"
          novalidate
      >
        @csrf
        <!-- EMAIL -->
        <div>
          <label
              for="email"
              class="block text-sm font-medium leading-6 text-gray-900"
          >Email
          </label>
          <div class="mt-2">
            <input
                v-model="form.email"
                id="email"
                type="email"
                name="email"
                autocomplete="email"
                required
                class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"
            />
          </div>
        </div>
        <!-- PASSWORD -->
        <div>
          <div class="flex items-center justify-between">
            <label
                for="password"
                class="block text-sm font-medium leading-6 text-gray-900"
            >Password</label
            >
          </div>
          <div class="mt-2">
            <input
                v-model="form.password"
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                required
                class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"
            />
          </div>
        </div>

        <!-- BUTTON -->
        <div>
          <button
              id="submit-button"
              class="relative disabled:opacity-70 disabled:hover:bg-primary select-none flex w-full justify-center rounded-md bg-primary px-3 py-1.5 mb-4 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              type="submit"
          >
            <x-loading-icon class="absolute hidden left-3"/>
            Accedi
          </button>
          <a
              class="select-none flex w-full justify-center rounded-md border border-primary px-3 py-1.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-primary hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              href="https://dellasantapsicologo.it"
          >Torna alla homepage</a
          >
        </div>
      </form>

      @error('login')
      <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">Attenzione</p>
        <span>{{$message}}</span>
      </div>
      @enderror
    </div>
  </div>
</main>

<script>
    const form = document.getElementById('form');
    const loader = document.querySelector('.loader');
    const submitButton = document.getElementById('submit-button')

    form.addEventListener('submit', function () {
        loader.classList.remove('hidden');
        submitButton.setAttribute('disabled', 'true');
    });
</script>
</body>
</html>
