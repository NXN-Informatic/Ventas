@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/detailProduc.css') }}">
    <style type="text/css">
      .wsp:hover
      {
        -moz-box-shadow: 0 0 10px rgb(4, 182, 34);
        -webkit-box-shadow: 0 0 10px rgb(4, 182, 34);
        box-shadow: 0 0 10px rgb(4, 182, 34);
      }
      .shad2
      {
        -moz-box-shadow: 0 0 10px #c5c5c5;
        -webkit-box-shadow: 0 0 10px #c5c5c5;
        box-shadow: 0 0 10px #c5c5c5;
      }
    </style>
@endsection

@section('content')
@include('layouts.components.navbar')
@section('title','Bienvenido')
<div id="fb-root"></div>
<!--Start Single Product-->
<div class="singleProduct" id="ocultar1" style="background-color: #f3f3f3">
    <div class="singleProduct__wrap container">
        <div class="signleProduct__content">
            <div class="product dflex">
                <div class="col-lg-7 col-12">
                    <div class="swiper-container shad2" style="background-color: #fff">
                        <div class="swiper-wrapper">
                            <!-- Imagen Productos -->
                            @foreach($producto->imagen_productos as $imagenes)
                              <div class="swiper-slide" style="width: 100%; height: 500px;">
                                  <a href="#">
                                      <img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagenes->imagen) }}" width="auto" height="auto" style="border: 5px solid #fff;max-height: 100%;
                                      max-width: 100%;
                                      height: auto;
                                      position: absolute;
                                      top: 0;
                                      bottom: 0;
                                      left: 0;
                                      right: 0;
                                      margin: auto;">
                                  </a>
                              </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <!-- Productos Descripción -->
                    <div class="shad2" style="background-color: #fff">
                        <h2 style="text-align: left;font-size: 20px; padding: 10px">{{ __('Descripción') }}</h2><br>
                        <p style="color: #0e0e0ebe; font-size: 16px; margin: 10px">{!! $producto->description !!}
                        <br>
                    </div>
                    <div class="shad2" style="background-color: #fff">
                        <div class="fb-comments" data-href="{{ $producto->producto_url}}" data-numposts="5" data-width="100%" style="margin: 7px"></div>
                    </div>
                    
                </div>
                <div class="content col-lg-5 col-12">
                    <div class="shad2" style="background-color: #fff">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <!-- Productos Precio -->
                                    <div class="precio color" style="padding: 10px; color: #bf0000">S/.{{ $producto->precio }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12" style="text-align: right">
                                    <!-- Productos Creación -->
                                    <a href="#"><i class="far fa-heart" style="font-size: 3rem; padding: 10px"></i></a>
                                </div>
                            </div>
                            <h1 class="text-left" style="font-size: 24px; color: #000; padding: 10px">{{ $producto->name }}</h1>  
                        </div>
                        <hr style="color: #f2f2f2"> 
                        <div class="col-lg-12 text-center" style="padding-left: 10px">
                            <h1 class="text-left" style="font-size: 24px; color: #000; padding-left: 10px">{{ $usuario_puestos->puesto->name }} <a href="{{ url('puesto/'.$usuario_puestos->puesto->id.'/detail')}}"><span style="color: #bf0000; font-size: 16px; margin-left: 10px">Visitar ></span></a></h1>  
                                <div class="row" style="padding-left: 20px; margin-top: -20px; margin-bottom: 10px">
                                    @for ($i = 0; $i < $usuario_puestos->puesto->calification; $i++)   
                                        <i class="fas fa-star" style="color: #bf0000"></i>
                                    @endfor
                                    @for ($i = 0; $i < (5 - $usuario_puestos->puesto->calification); $i++)
                                        <i class="far fa-star text-dark" style="color: #bf0000"></i> 
                                    @endfor
                                </div>
                            @if($usuario_puestos->puesto->wsp)
                                <button href="{{ url('https://api.whatsapp.com/send?phone=51'.$usuario_puestos->puesto->wsp.'&text=Hola!%20Me%20interesa%20este%20producto:%20'.$producto->producto_url.'%20¿Está disponible?') }}" target="_blank" class="btn btn-primary" style="background-color: #000; border-radius: 5%; border-color: #bf0000; border 2px solid; margin-bottom: 10px"><i class="fas icofont-brand-whatsapp" style="font-size: 2rem; color: #fff"></i><span style="color: #fff; margin-left: 10px">Enviar un mensaje</span></button>
                            @endif
                            @if($usuario_puestos->puesto->phone)
                                <h1 style="color: #000; font-size: 24px"><i class="fas icofont-smart-phone" style="font-size: 24px; padding: 10px; color: #000"></i> {{ $usuario_puestos->puesto->phone }}</span>
                            @endif
                            <br>
                            @if($usuario_puestos->puesto->phone2)
                                <h1 style="color: #000; font-size: 24px"><i class="fas icofont-smart-phone" style="font-size: 24px; padding: 10px; color: #000"></i> {{ $usuario_puestos->puesto->phone2 }}</span>
                            @endif
                        </div>
                        <hr style="color: #f2f2f2"> 
                        <div class="col-12">
                            <h1 class="text-left" style="font-size: 24px; color: #000; padding-left: 10px">Formas de entrega</h1>
                            @foreach($usuario_puestos->puesto->entrega_puestos as $entrega_puestos)
                                <button href="#" target="_blank" class="btn btn-primary" style="background-color: #fff; border-radius: 5%; border-color: #000; border 3px solid"><span style="color: #000; margin: auto">{{ $entrega_puestos->entrega->name }}</span></button>
                            @endforeach
                        </div>
                        <hr style="margin-top: 15px; color: #f2f2f2">
                        <div class="col-12">
                          <h1 class="text-left" style="font-size: 24px; color: #000; padding-left: 10px">Métodos de pago aceptado</h1>
                          @foreach($usuario_puestos->puesto->pago_puestos as $pago_puestos)
                              <button href="#" target="_blank" class="btn btn-primary" style="background-color: #fff; border-radius: 5%; border-color: #000; border 3px solid"><span style="color: #000; margin: auto">{{ $pago_puestos->pago->name }}</span></button>
                          @endforeach
                        </div>
                        <hr style="margin-top: 15px; color: #f2f2f2">
                        <div class="col-12">
                            <h1 class="text-left" style="font-size: 24px; color: #000; padding-left: 10px">Ubicación</h1>
                            <span class="text-left" style="font-size: 18px; color: #000; padding-left: 10px">{{$usuario_puestos->puesto->direccion}}</span>
                            <input type="hidden" id="latitud" name="latitud" value="{{ $usuario_puestos->user->latitud }}">
                            <input type="hidden" id="longitud" name="longitud" value="{{ $usuario_puestos->user->longitud }}">
                            <div id="map" style="height: 300px;"></div>
                            
                        <div class="fb-comments" data-href="{{ $producto->producto_url}}" data-numposts="5" data-width="100%" style="margin: 7px"></div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Start Featured Products-->
<div class="featureProduct singleProduct" id="ocultarProd" style="background-color: #f3f3f3; padding: 10px">
    <div class="feature__wrap container">
        <h4 class="title">Otros Productos de esta tienda<a href="{{url('/puesto/'.$usuario_puestos->puesto->id.'/detail')}}" style="margin-left:10px">{{ __('Mostrar Más') }}</a></h4>
        <div class="feature__filter">
            <div class="featureSlider">
                <div class="sliderButton left"><i class="fas fa-angle-left"></i></div>
                <div class="sliderButton right"><i class="fas fa-angle-right"></i></div>
                <ul class="features__grid" id="wrap">
                    @foreach($producto->grupo->puestosubcategoria->puesto->puestosubcategorias as $puestosubcategoria)
                        @foreach($puestosubcategoria->grupos as $grupo)
                            @foreach($grupo->productos as $productos)
                                <?php $imagen = null; ?>
                                @foreach($productos->imagen_productos as $imagen) @endforeach
                                @if($imagen)
                                <a href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="_blank">
                                    <li class="element-item  features__item col-lg-3 col-sm-6 col-12 shad2" style="position: relative; height: 302px;">
                                        <div class="features__image desk">
                                            <img src="{{ asset('/storage/'.$puestosubcategoria->puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"  width="180px" height="220px" alt="" style="border: 5px solid #fff">
                                        </div>
                                        <div class="features__content">
                                            <span style="font-size: 20px; color:#bf0000"><strong>S/. {{$productos->precio}}</strong></span>
                                            <div class="content__overlay" style="margin-top: -20px; margin-bottom: 0px">
                                            <p style="color: #000">{{$productos->name }}</p>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- btn Mostrar Tienda -->
         
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct" style="background-color: #f3f3f3">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
</div>

<!-- No se Encontraron Productos -->
<div class="shopProduct" id="resultado" style="background-color: #f3f3f3">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <div class="conatiner" style="background:#FF1643;text-align: center;padding:5px">
                <h1 style="color:#fff; text-align: center;">{{ __('No se encontraron resultados') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct" style="background-color: #f3f3f3">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <ul class="filterProduct gridRow" id="mostrar">     
            </ul>
        </div>
    </div>
</div>




@if ($usuario_puestos->puesto->fbpageid)
  <div class="fb-customerchat"
      attribution=setup_tool
      page_id="{{ $usuario_puestos->puesto->fbpageid }}"
      theme_color="#bf0000"
      ref="hhhhhhhh"
      logged_in_greeting="¡Hola!, ¿Tienes una consulta?"
      logged_out_greeting="¡Hola!, ¿Tienes una consulta?">
  </div>
@endif
@include('layouts.components.footer')
@endsection
@if($usuario_puestos->puesto->wsp)
  <a style="position: fixed; right: 25px; bottom: 90px; width: 60px; z-index: 1000" href="{{ url('https://api.whatsapp.com/send?phone=51'.$usuario_puestos->puesto->wsp.'&text=Hola!%20Me%20interesa%20este%20producto:%20'.$producto->producto_url.'%20¿Está disponible?') }}" target="_blank">
  <img class="wsp" src="{{ asset('img/wsp.png') }}" style="width: 60px; hight: auto; border-radius:50%" alt="whatsapp">
  </a>
@endif

@section('scripts')
  
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
  <script src="{{ asset('js/publicas/detailProduc.js') }}"></script>
  <script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: new google.maps.LatLng(<?php echo ($latitud != null )? $latitud : '-18.0146500'; ?>, <?php echo ($longitud)? $longitud : '-70.2536200'; ?>),
        });

        marker = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(<?php echo ($latitud != null )? $latitud : '-18.0146500'; ?>, <?php echo ($longitud)? $longitud : '-70.2536200'; ?>)
        });
    }
  </script>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK7XD3i3cgtPV9SKcDff2IJc0O-WpNoNY&callback=initMap" async defer>
  </script> 
  
  <script>
    $(function() {
      // Variables Define
      $mostrarcategoria = $('#categoria');
      $ocultar1 = $('#ocultar1');
      $ocultar2 = $('#tiendas');
      $ocultarProd = $('#ocultarProd');
      $resultado = $('#resultado');
      $mostrar = $('#mostrar');

      $resultado.hide();
      $mostrar.hide();function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            position: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>)
        });

        var markerx = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>),
            map: map,
            title: response[i].sucursal
        });
    }
    //initMap(); Esto es innecesario porque en el callback de la URL lo estás llamando.
      $mostrarcategoria.hide();
      
      $('ul#tags li').click( function() {
        const cateogiraId = $(this).attr('value');
        if(cateogiraId == 0) {

          $mostrarcategoria.hide();
          $ocultar1.show();
          $ocultar2.show();
          $resultado.hide();
          $ocultarProd.show();
        }else {
          $ocultarProd.hide();
          $mostrarcategoria.show();
          $ocultar1.hide();
          $ocultar2.hide();
          $resultado.hide();
          const url = `/categoria/${cateogiraId}/apiProductosCategoria`;
          $.getJSON(url, onProducCateg);
        }
      });

      $("#buscar").on("keyup", function() {

        valor = $(this).val();
        if(valor.length === 0) {
          
          $ocultarProd.show();
          $mostrarcategoria.hide();
          $ocultarProd.show();
          $ocultar1.show();
          $ocultar2.show();
          $mostrar.hide();
          $resultado.hide();
        }else {
          $ocultarProd.hide();
          $ocultar1.hide();
          $ocultar2.hide();
          $mostrar.show();
          $resultado.hide();
          const url = `/productos/${valor}/all`;
          $.getJSON(url, onMostrar);
        }
      });

      function onMostrar(data) {
          let htmlOptions = '';

          if(data.length === 0) {
            $resultado.show();
          }
          else {
            $resultado.hide();
          }

          data.forEach(productos => {
            if(productos.image != null) {
              htmlOptions += 
              `<li class="product__item">`+
                  `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt=""></a>`+
                      `<div class="image__tools"><i class="fas fa-search"></i>`+
                          `<i class="fas fa-random"></i>`+
                          `<i class="far fa-heart"></i>`+
                      `</div>`+
                  `</div>`+
                  `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black" style="font-size:30px">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                      `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                      `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                      `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                  `</div>`+
              `</li>`;
            }else{
              htmlOptions += 
              `<li class="product__item">`+
                  `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('img/defaultProducto.jpg') }}" alt=""></a>`+
                      `<div class="image__tools"><i class="fas fa-search"></i>`+
                          `<i class="fas fa-random"></i>`+
                          `<i class="far fa-heart"></i>`+
                      `</div>`+
                  `</div>`+
                  `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black" style="font-size:30px">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                      `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                      `<div class="color"><span style="background: #f0deba" data-image="{{ asset('img/defaultProducto.jpg') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                      `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                  `</div>`+
              `</li>`;
            }
        });
        $mostrar.html(htmlOptions);
      }

      function onProducCateg(data) {
        let htmlOptions = '';
        
        if(data.length === 0) {
          $resultado.show();
        }
        else {
          $resultado.hide();
        }

        data.forEach(productos => {
          if(productos.image != null) {
            htmlOptions += 
            `<li class="product__item">`+
                `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt=""></a>`+
                    `<div class="image__tools"><i class="fas fa-search"></i>`+
                        `<i class="fas fa-random"></i>`+
                        `<i class="far fa-heart"></i>`+
                    `</div>`+
                `</div>`+
                `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black" style="font-size:30px">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                    `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                    `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                    `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                `</div>`+
            `</li>`;
          }else{
            htmlOptions += 
            `<li class="product__item">`+
                `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="img/defaultProducto.jpg" alt=""></a>`+
                    `<div class="image__tools"><i class="fas fa-search"></i>`+
                        `<i class="fas fa-random"></i>`+
                        `<i class="far fa-heart"></i>`+
                    `</div>`+
                `</div>`+
                `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black" style="font-size:30px">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                    `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                    `<div class="color"><span style="background: #f0deba" data-image="{{ asset('img/defaultProducto.jpg') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                    `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                `</div>`+
            `</li>`;
          }
        });
        $mostrarcategoria.html(htmlOptions);
      }
    });
  </script>
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
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0" nonce="JAdLXQvG">
  </script>
@endsection



