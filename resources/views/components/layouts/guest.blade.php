<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @laravelPWA

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlo Eusebi">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }} | Dellasanta Psicologo</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/ico">

    @livewireStyles
    @livewireScripts

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="bg-base-200/50 px-1">
<div class="h-dvh flex flex-col justify-center items-center gap-y-5" x-data="{ loading: false }">

    <div class="fixed right-5 top-5 lg:right-10 lg:top-10 z-50">
        <x-theme-toggle/>
    </div>

    <x-card class="w-full sm:w-[500px] spacey-5 lg:px-10" shadow>
        <figure class="mb-10">
            <img src="{{ asset('images/Logo.webp') }}" alt="Logo" class="pe-5 max-w-[250px]"/>
        </figure>

        @isset($cardTitle)
            <h1 class="text-xl font-bold text-center my-5">{{ $cardTitle }}</h1>
        @endisset

        <div class="my-5">
            {{ $slot }}
        </div>

    </x-card>

</div>
</body>
</html>

