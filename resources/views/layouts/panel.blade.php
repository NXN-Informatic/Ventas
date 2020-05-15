<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @yield('styles')
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('css/fonts/fontawesome/css/all.min.css') }}">
    <!--Icon Font-->
    <link rel="stylesheet" href="{{ asset('css/fonts/icofont/icofont.min.css') }}">

</head>
<body>
    
<body>
  <div id="onTop"></div>

  @yield('load')

  <!--Start Elements Page-->
  <a class="onTop dflex" href="#onTop"><i class="fas fa-angle-up"></i></a>
  <div class="buy dflex"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 415.441 415.441" fill="#81b441" xml:space="preserve"> <path d="M324.63,22.533C135.173,226.428,80.309,371.638,80.309,371.638c41.149,47.743,111.28,43.72,111.28,43.72 			c73.921,2.31,119.192-43.522,119.192-43.522c91.861-92.516,80.549-355.302,80.549-355.302 			C372.769-23.891,324.63,22.533,324.63,22.533z"></path> <path d="M32.369,181.983c0,0-28.983,57.964,18.859,155.495L178.367,58.01C176.916,58.538,63.691,98.037,32.369,181.983z"></path> </svg><span>Buy<strong>WoodMart</strong></span></div>
  <!--End Elements Page-->

  <!--Start Header-->
  <header>
    <div class="header__wrap container dflex">
        <ul class="header__item dflex left">
            <li class="header__list"><span>English</span><i class="fas fa-angle-down"></i>
                <ul class="sub">
                    <li><span>Deutsch</span></li>
                    <li><span>French</span></li>
                    <li><span>Requires WPML plugin</span></li>
                </ul>
            </li>
            <li class="header__list"><span>Country</span><i class="fas fa-angle-down"></i>
                <ul class="sub">
                    <li><span>United States (USD)</span></li>
                    <li><span>Deutschland (EUR)</span></li>
                    <li><span>Japan (JPY)</span></li>
                </ul>
            </li>
            <li class="header__list"><span>Free Shipping For All Order Of $150</span></li>
        </ul>
        <ul class="header__item dflex right">
            <li class="header__list social dflex"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fas fa-envelope"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </li>
            <li class="header__list"><i class="far fa-envelope"></i><span>Newsletter</span></li>
            <li class="header__list"><span>Contact Us</span></li>
            <li class="header__list"><span>Faqs</span></li>
        </ul>
    </div>
  </header>
  <div class="nav">
      <div class="nav__wrap container dflex">
          <div class="nav__button"><i class="fas fa-bars"></i>MENU</div>
          <a class="nav__logo" href="index.html"><img src="{{ asset('img/images/logo/wood-logo-dark.svg') }}" alt=""></a>
          <div class="nav__search dflex">
              <input type="text" placeholder="Search for Products">
              <select name="search">
          <option value="Select Category">Select Category</option>
          <option value="Accessories">Accessories</option>
          <option value="Clocks">Clocks</option>
          <option value="Cooking">Cooking</option>
          <option value="Furniture">Furniture</option>
          <option value="Lighting">Lighting</option>
          <option value="Toys">Toys</option>
          <option value="Uncategorized">Uncategorized</option>
        </select><a href="#"><i class="fas fa-search"></i></a>
          </div>
          <div class="nav__notify dflex">
              <a class="link" href="{{ url('login') }}">Login</a>
              <a class="link" href="{{ url('register') }}">Register</a>
              <div class="icon"><i class="far fa-heart"></i></div>
              <div class="icon" data-notify="0"><i class="fas fa-random"></i></div>
              <div class="icon reponsive" data-notify="0"><i class="fas fa-shopping-bag"></i></div><span>$0.00</span>
          </div>
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
