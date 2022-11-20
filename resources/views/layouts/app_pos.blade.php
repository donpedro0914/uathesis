<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/ishopbox_small.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iPOS Concept') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/pos/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_grid-framework.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/webfont.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pos/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/pos/jquery.min.js') }}"></script>
    <script src="{{ asset('js/pos/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/pos/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/pos/select2.min.js') }}"></script>
    <script src="{{ asset('js/pos/switchery.min.js') }}"></script>
    <script src="{{ asset('js/pos/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/pos/custom.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.rowsGroup.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/printThis.js') }}"></script>
    <script src="{{ asset('js/pos/jquery.core.js') }}"></script>
    <script src="{{ asset('js/pos/jquery.app.js') }}"></script>
    @stack('scripts')
</body>
</html>
