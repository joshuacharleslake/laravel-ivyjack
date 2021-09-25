<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/21d11f3326.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">

    <section class="min-h-screen bg-gray-50" x-data="{ open: false }">
        @include('layouts.navigation')
        <div class="ml-0 transition md:ml-60">
            <!-- Page Heading -->
            <header class="bg-gray-100 border-b border-gray-200">
                <div class="max-w-full   mx-auto py-5 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </section>
</html>
