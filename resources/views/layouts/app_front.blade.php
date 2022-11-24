<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/ishopbox_small.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Thesis') }}</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/front/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/sweetalert2.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>    
    <script src="{{ asset('js/front/easing.min.js') }}"></script>
    <script src="{{ asset('js/front/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/front/counterup.min.js') }}"></script>
    <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/front/main.js') }}"></script>
    <script src="{{ asset('js/front/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/front/sweetalert2.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
