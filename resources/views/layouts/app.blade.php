<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- Deixa a cor Bootstrap mais forte -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    
 
</head>
<body>
    <div id="wrapper"> <!-- tecnica wrapper importante -->
        <nav class="navbar navbar-light" style="background-color: #f2f2f2;">
            <a href="#menu-toggle" class="navbar-brand" id="menu-toggle"><span class="fas fa-chevron-left"></span></a>
            <!-- Left Side Of Navbar -->
            <div class="collapse navbar-collapse"></div>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <!-- Fora do sistema -->
                @else
                    <li class="nav-item"><a class="nav-link" href="">{{ Auth::user()->name }}</a></li>
                @endguest
            </ul>

        </nav>

        @include('layouts.sidebar')

        <div id="page-content-wrapper">
            
            <div class="container-fluid">
                <br>
                @if(Session::has('message')) <!-- has verifica se existe elemento -->
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{Session::get('message')}}
                    </div>
                @endif
                
                @yield('content')

            </div>
            
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(this).find('span').toggleClass('fas fa-chevron-right').toggleClass('fas fa-chevron-left');
    });
    </script>

    @yield('scripts')

</body>
</html>
