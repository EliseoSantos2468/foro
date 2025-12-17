<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gradient-to-r from-slate-800 to-slate-900">

            <div class="bg-gradient-to-r from-slate-800 to-slate-900 h-2"></div>

            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                {{$slot}}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
