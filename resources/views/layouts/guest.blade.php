<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white gap-2">
        <div>
            <a href="/" wire:navigate>
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <a href="{{ route('google-login') }}"
            class="px-4 py-2 border text-sm flex justify-center gap-2 rounded w-[85%] md:w-[30%]">
            <img class="w-5 h-5" src="{{ asset('google.svg') }}" loading="lazy"
                alt="google logo">
            <span>Lanjutkan Dengan Google</span>
        </a>

        <div class="w-full sm:max-w-md px-6 py-4 bg-white overflow-hidden sm:rounded-lg mt-2">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
