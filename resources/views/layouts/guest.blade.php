<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100">
    <section class="md:flex md:items-center md:justify-center min-h-screen">
        <div class="px-4 py-20 mx-auto w-full">
            <a href="{{ route('login') }}"
               title="{{ env('APP_NAME') }}"
               class="flex items-center justify-center">
                {!! file_get_contents('images/ivyjack-logo.svg') !!}
            </a>
            {{ $slot }}
        </div>
    </section>
    </body>
</html>
