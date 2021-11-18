<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{ url('/') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <div id="app"></div>
    </body>
</html>
