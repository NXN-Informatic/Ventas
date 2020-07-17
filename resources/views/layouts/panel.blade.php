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
    <meta property="og:url" content="@yield('ogUrl', 'https://feriatacna.com/')"/>
    <meta property="og:description" content="@yield('ogDesc', 'Digitalizando el comercio de Tacna. Centros comerciales, Tiendas, Productos y más!')"/>
    <meta property="og:type" content="@yield('ogType', 'website')"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="@yield('ogImage', 'https://feriatacna.com/img/banner45.png')"/>
    <meta property="fb:app_id" content="xxxxxxxxx"/>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo2.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo2.jpg">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @yield('styles')
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('css/fonts/fontawesome/css/all.min.css') }}">
    <!--Icon Font-->
    <link rel="stylesheet" href="{{ asset('css/fonts/icofont/icofont.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style type="text/css">
    .nav__search{flex:2;margin:0 20px;border:1px solid rgba(95, 95, 95, 0.2)}@media (max-width:991px){.nav .nav__wrap .nav__search{display:none}}.nav .nav__wrap .nav__search input,.nav .nav__wrap .nav__search select{color:#777;border:0}.nav .nav__wrap .nav__search input{border-right:1px solid rgba(129,129,129,.2)}.nav .nav__wrap .nav__search a{width:50px;color:#777;text-align:center;padding:10px 15px;font-size:18px;border-left:1px solid rgba(129,129,129,.2)}
    </style>

      <style>
      .ocultar{
          display: block;
      }
      .ocultar1{
          display: block;
      }
      .ocultar10{
          display: none;
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
      .ocultar1{
          display: none;
      }
      .ocultar10{
          display: block;
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

    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '729072751242183');
      fbq('track', 'PageView');
    </script>

    <noscript>
      <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=729072751242183&ev=PageView&noscript=1"
    />
    </noscript>
    <!-- End Facebook Pixel Code -->

</head>
    
<body style="background-color:#fff">
  <div id="onTop"></div>

  @yield('load')

  <!--Start Elements Page
  <a class="onTop dflex" href="#onTop"><i class="fas fa-angle-up"></i></a>
  <a class="onTop dflex" href="/" style="background-color: #c5c5c5"><div class="buy dflex"><span style="color: #bf0000"><strong>FeriaTacna</strong></span></div></a> 
  --><!--End Elements Page-->

  <!--Start Header-->
  <header style="padding-left: 5px; background-color:#fff "><br>
    <div class="header__wrap dflex" style="height:40px; background-color:#fff; margin-left:10px;">
        <ul class="header__item dflex left">
          <div class="ocultar">
            <a href="/">
              <img src="{{ asset('img/logo.png') }}" class="ocultarimg" style="width: 120px; margin-right: 5px">    
              <img src="{{ asset('img/logoenJPG.jpg') }}" class="ocultarimg2" style="width: 40px;margin-left:5px">  
            </a>
          </div>
            <li class="header__list"><span class="regular11" style="color: #000">CATEGORIAS</span><i class="fas fa-angle-down"></i>
                <ul class="sub" id="tags">
                    <li value="0"><span class="regular10">TODOS</span></li>
                    @foreach($categorias as $categoria)
                    <li value="{{ $categoria->id }}"><span class="regular10">{{ $categoria->name }}</span></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="nav__search dflex" style="border-radius:10px; margin:0px 5px">
            <input type="text" id="buscar" name="buscar" class="xlight12" placeholder="Busque productos en Tacna" style="border: 1px; "/>
            <a><i class="fas fa-search" style="margin-right:3px"></i></a>
        </div>
        <ul class="header__item dflex right">
              <li class="header__list"><a href="{{ url('login') }}" style="color:#000"><span class="regular11" style="color: #000">Ingresar</span></a></li>
        </ul>
        <div class="ocultar1" style="text-align: right;">    
          <a href="{{ url('register') }}">
              <button class="btn" style="background:#ff1a00; border-radius:10px; font-weight: bold; border-color:#bf0000"><strong class="medium11">Crea tu tienda</strong></button>  
          </a>
        </div>
        <div class="ocultar10" style="text-align: right;">    
          <a href="{{ url('register') }}">
              <button class="btn" style="background:#ff1a00; border-radius:10px;margin-left:3px; font-weight: bold; border-color:#bf0000;padding: 1rem 1rem"><strong class="regular10">Crear<br>tienda</strong></button>  
          </a>
      </div>

    </div>
    <br>
  </header>

	@yield('content')
	<!--Isotope-->
	<script src=""></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

  <!--JavaScript-->
  <script src="{{ asset('js/main.js') }}"></script>
  @yield('scripts')
</body>
</html>
