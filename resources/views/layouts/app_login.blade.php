<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('teste/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('teste/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('teste/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('teste/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('teste/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('teste/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('teste/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('teste/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('teste/js/main.js') }}"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('teste/images/icons/favicon.ico') }}" rel="icon" type="image/png">
    <link href="{{ asset('teste/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/vendor/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/vendor/animsition/css/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/vendor/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('teste/css/main.css') }}" rel="stylesheet">
    
 
</head>
<body>
    
    @yield('content')

</body>
</html>
