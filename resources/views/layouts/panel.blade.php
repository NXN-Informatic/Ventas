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

</head>
<body>
    
<body>
  <div id="onTop"></div>

  @yield('load')

  <!--Start Elements Page-->
  <a class="onTop dflex" href="#onTop"><i class="fas fa-angle-up"></i></a>
  <a class="onTop dflex" href="/"><div class="buy dflex"><span>FERIA<strong>TACNA</strong></span></div></a> 
  <!--End Elements Page-->

  <!--Start Header-->
  <header style="background:#153d77">
    <div class="header__wrap container dflex">
        <ul class="header__item dflex left">
            <li class="header__list"><span>CATEGORIAS</span><i class="fas fa-angle-down"></i>
                <ul class="sub" id="tags">
                    <li value="0"><span>TODOS</span></li>
                    @foreach($categorias as $categoria)
                    <li value="{{ $categoria->id }}"><span>{{ $categoria->name }}</span></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <input type="text" id="buscar" name="buscar" style="width:400px;background:#fff" placeholder="Busque su Producto...">
        <ul class="header__item dflex right">
            <li class="header__list"><span><a href="{{ url('login') }}" style="color:#fff">LOGIN</a></span></li>
            <li class="header__list"><span><a href="{{ url('register') }}" style="color:#fff">REGISTRAR TIENDA</a></span></li>
        </ul>
    </div>
  </header>
  <div class="nav" id="ocultarBanner">
      <div class="nav__wrap container dflex">
          <div class="nav__button"><i class="fas fa-bars"></i>MENU</div>
          <a class="nav__logo" href="/">
            <img src="{{ asset('/img/logoFeria.jpg') }}" alt="" style="height:40px; width:70px">

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
