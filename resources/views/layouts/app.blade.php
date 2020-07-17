<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo2.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo2.jpg">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="{{ asset('css/modern.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/extras.css') }}" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    @yield('styles')
    <style>

        .moblie-navBottom {
            display: none;
            height:60px;
            position: fixed;
            z-index: 998;
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 0 9px rgba(0, 0, 0, .12);
            padding: 7px 15px;
            text-align: center;
            background: #fff;
            justify-content: space-between
        }

        @media (max-width:991px) {
            .moblie-navBottom {
                display: flex
            }
        }

        .moblie-navBottom .link i,
        .moblie-navBottom .link p {
            color: #333;
            transition: .3s ease-out;
            text-transform: capitalize
        }

        .moblie-navBottom .link p {
            font-size: 11px
        }

        .moblie-navBottom .link:hover i,
        .moblie-navBottom .link:hover p {
            color: #bf0000
        }
    </style>
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/882059baa9.js" crossorigin="anonymous"></script>

</head>
<body>
    
<body class="theme-blue">
	<div class="splash active">
		<div class="splash-icon"></div>
    </div>
	@yield('content')

    <svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
        <path
            d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
        </path>
        </symbol>
    </defs>
    </svg>

@if(auth()->user())
    <div class="moblie-navBottom dflex" style="position: fixed">
        <a class="link" href="{{ url('/home') }}"><i class="fas fa-home" style="font-size: 20px"></i><p>Inicio</p></a>
        <a class="link" href="{{ url('#') }}"><i class="fas fa-heart" style="font-size: 20px"></i><p>Favoritos</p></a>
        <a class="link sidebar-toggle">
            <i class="fas fa-bars" style="font-size: 20px"></i><p>Menú</p>
        </a>
        @if(auth()->user()->usuario_puestos->first())
            <a class="link" href="{{ url('/puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}"><i class="fas fa-store" style="font-size: 20px"></i><p>Mi Tienda</p></a>
        @else
            <a class="link" href="#"><i class="fas fa-store" style="font-size: 20px"></i><p>Mi Tienda</p></a>
        @endif
    </div>
@else
    <div class="moblie-navBottom dflex" style="position: fixed">
        <a class="link" href="{{ url('/') }}"><i class="fas fa-home" style="font-size: 20px"></i><p>Inicio</p></a>
        <a class="link" href="{{ url('#') }}"><i class="fas fa-heart" style="font-size: 20px"></i><p>Favoritos</p></a>
        <a class="link nav">
            <div class="nav__button"><i class="fas fa-bars" style="font-size: 20px"></i><p>Menú</p>
            </div>
        </a>
        <a class="link" href="{{url('/login')}}"><i class="fas fa-store" style="font-size: 20px"></i><p>Mi Tienda</p></a>
    </div>
@endif
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script>
        window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v7.0'
        });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    @yield('scripts')
</body>
</html>
