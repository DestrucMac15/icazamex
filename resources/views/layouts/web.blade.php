<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{ url('/') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        @stack('styles')

        
    </head>
    <body>
        @include('web.fragments.nav')
        @yield('content')
        @include('web.fragments.footer')
        <!-- JQuery -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <!-- Font Awesome -->
        <script src="{{ asset('js/fontawsome.js') }}" crossorigin="anonymous"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        
        @stack('scripts')
        
    </body>
</html>
