<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - FeriaTacna</title>

    <meta property="og:title" content="@yield('ogTitle', 'FERIA TACNA.')"/>
    <meta property="og:site_name" content="FERIA TACNA"/>
    <meta property="og:url" content="@yield('ogUrl', 'http://feriatacna.com/')"/>
    <meta property="og:description" content="@yield('ogDesc', 'La única feria online en Tacna 2020 , encuentre sus productos que usted requiera.')"/>
    <meta property="og:type" content="@yield('ogType', 'website')"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="@yield('ogImage', 'http://feriatacna.com/img/banner/banner.jpg')"/>
    <meta property="fb:app_id" content="xxxxxxxxx"/>
	
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @yield('styles')
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('css/fonts/fontawesome/css/all.min.css') }}">
    <!--Icon Font-->
    <link rel="stylesheet" href="{{ asset('css/fonts/icofont/icofont.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style type="text/css">
    .nav__search{flex:2;margin:0 20px;border:2px solid rgba(129,129,129,.2)}@media (max-width:991px){.nav .nav__wrap .nav__search{display:none}}.nav .nav__wrap .nav__search input,.nav .nav__wrap .nav__search select{color:#777;border:0}.nav .nav__wrap .nav__search input{border-right:1px solid rgba(129,129,129,.2)}.nav .nav__wrap .nav__search a{width:50px;color:#777;text-align:center;padding:10px 15px;font-size:18px;border-left:1px solid rgba(129,129,129,.2)}
    </style>

      <style>
      .ocultar{
          display: block;
      }
      .ocultarimg{
        display: block;
      }
      .style{
        height: 300px !important;
      }
      .ocultarimg2{
        display: none;
      }
    @media (max-width: 600px) {
      .ocultar {
          display: : none;
      }
      .ocultarimg2{
        display: block;
      }
      .ocultarimg{
        display: none;
      }
      .style{
        height: 140px !important;
      }
    }
    </style>

</head>
    
<body background="#f3f3f3">
  <div id="onTop"></div>

  @yield('load')

  <!--Start Elements Page
  <a class="onTop dflex" href="#onTop"><i class="fas fa-angle-up"></i></a>
  <a class="onTop dflex" href="/" style="background-color: #c5c5c5"><div class="buy dflex"><span style="color: #bf0000"><strong>FeriaTacna</strong></span></div></a> 
  --><!--End Elements Page-->

  <!--Start Header-->
  <header style="background: #fff">
    <div class="header__wrap container dflex">
        <ul class="header__item dflex left">
          <div class="ocultar">
            <a href="/">
              <img src="{{ asset('img/logo.png') }}" class="ocultarimg" style="width: 120px; margin-right: 20px">    
              <img src="{{ asset('img/logoenJPG.jpg') }}" class="ocultarimg2" style="width: 40px;">  
            </a>
          </div>
            <li class="header__list"><span style="color: #000">CATEGORIAS</span><i class="fas fa-angle-down"></i>
                <ul class="sub" id="tags">
                    <li value="0"><span>TODOS</span></li>
                    @foreach($categorias as $categoria)
                    <li value="{{ $categoria->id }}"><span>{{ $categoria->name }}</span></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="nav__search dflex">
            <input type="text" id="buscar" name="buscar" placeholder="Busque su producto" style="border: 1px"/>
            <a><i class="fas fa-search" style="margin-left: 10px; margin-right:10px"></i></a>
          </div>
        <ul class="header__item dflex right">
            <li class="header__list"><span><a href="{{ url('login') }}" style="color:#000">LOGIN</a></span></li>
            <li class="header__list"><i style="color: #000" class="fa fa-heart" aria-hidden="true"></i></li>
            <li class="header__list"><i style="color: #000" class="fa fa-user" aria-hidden="true"></i></li>
        </ul>
    </div>
  </header>
  <div class="nav" id="ocultarBanner">
      <div style="text-align: right; margin-top: -5px; margin-bottom:-20px">    
        <a href="{{ url('register') }}">
            <button class="btn" style="background:#bf0000; border-radius:10px; font-weight: bold; border-color:#bf0000"><strong>Crea tu tienda GRATUITA</strong></button>  
        </a>
      </div>
      <div class="nav__wrap container dflex">
          <div class="nav__button"><i class="fas fa-bars"></i>MENU</div>
          <a class="nav__logo" href="/">
          </a>

      </div>
  </div>
	@yield('content')
	<!--Isotope-->
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <!--JavaScript-->
  <script src="{{ asset('js/main.js') }}"></script>
  @yield('scripts')
</body>
</html>
