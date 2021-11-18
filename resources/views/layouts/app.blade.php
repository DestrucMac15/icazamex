<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{ url('/') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main id="app">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
