@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/detailProduc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/extras.css') }}">
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
      .ocultarFacebook{
          display:block;
      }
      .ocultarphone{
          display:none;
      }
      @media (max-width: 600px) {
        .ocultarFacebook {
            display:none;
        }
        .ocultarphone{
            display:block;
        }
      }
    </style>
@endsection

@section('content')
@include('layouts.components.navbar')
@section('title','Bienvenido')
<div id="fb-root"></div>
<!--Start Single Product-->
<div id="ocultar9" style="background: #F9F9F9" style="position: relative;">
    @if($puesto->banner != null)
        <div class="bannerBlog headermax shad imgb row" style="position: relative;background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%); padding:0px " >
            <div class="container">
                <span class="bold20 leftnameprod" style="color: #fff; position:absolute; bottom:43%">{{ $producto->name }}</span>
            </div>
            <div style="position: absolute; right:10%;bottom:43%">
                <a href="{{ url('puesto/'.$usuario_puestos->puesto->id.'/detail') }}">
                    <button class="btn" style="background:#ffffff2f; border-radius:10px; font-weight: bold; border-color:#ffffff70"><strong class="medium11">Visitar tienda</strong></button>  
                </a>
            </div>
        </div>
    @endif    
</div>
<div class="singleProduct container ontop" style="background-color: #f9f9f9 ;padding:0px">
    <div class="singleProduct__wrap">
        <div class="signleProduct__content">
            <div class="product dflex">
                <div class="col-lg-8 col-12 colw">
                    <div class="swiper-container shad2" style="background-color: #fff;border-radius:20px;">
                        <div class="swiper-wrapper">
                            <!-- Imagen Productos -->
                            @foreach($producto->imagen_productos as $imagenes)
                              <div class="swiper-slide prodh" style="width: 100%;">
                                  <a href="#">
                                      <img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagenes->imagen) }}" width="auto" height="auto" style="border: 5px solid #fff;max-height: 100%;
                                      max-width: 100%;
                                      height: auto;
                                      position: absolute;
                                      top: 0;
                                      bottom: 0;
                                      left: 0;
                                      right: 0;
                                      margin: auto;
                                      border-radius:15px;">
                                  </a>
                              </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <!-- Productos Descripción -->
                    <div class="shad2" style="background-color: #fff ; border-radius: 20px">
                        <h1 class="bold12" style="text-align: left; padding: 10px"><i class="fas fa-clipboard-check" style="color: #ff1a00"></i>{{ __(' Características') }}</h1><br>
                        <div class="desc" style="margin: 10px">{!! $producto->description !!}
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="shad2 ocultarFacebook" style="background-color: #fff; border-radius: 20px" >
                        <div class="fb-comments" data-href="{{ $producto->producto_url}}" data-numposts="5" data-width="100%" style="margin: 7px"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 tiendainfo colw">
                    <div class="shad3" style="background-color: #fff; border-radius: 20px">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <!-- Productos Precio -->
                                    <div class="bold20" style="text-align: left;padding: 10px; color: #ff1a00">S/.{{ $producto->precio }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6" style="text-align: right">
                                    <!-- Productos Creación -->
                                    <a href="#"><i class="far fa-heart" style="font-size: 2rem; padding: 10px"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr style="color: #f9f9f9">
                        <div class="col-lg-12" style="padding-left: 10px"><br>
                            <h1 class="bold12" style=" color: #000;text-align:left; margin: 10px"><i class="fas fa-store" style="color: #ff1a00"></i> Tienda</h1>
                            <div class="row" style="padding-left:5px">
                                <div class="col-lg-3 col-sm-4 col-4" style="padding:10px">
                                    <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" class="shad" style="border: 4px solid #fff;max-height: 100%;
                                        max-width: 100%;
                                        height: auto;
                                        position: relative;
                                        top: 0;
                                        bottom: 0;
                                        left: 0;
                                        right: 0;
                                        border-radius: 50%">
                                </div>
                                <div class="col-lg-9 col-sm-8 col-8" style="padding-left:0px">
                                    <br><br>
                                    <div class="row" style="margin-left:2px">
                                        <h1 class="bold12" style="color: #000; text-align: left">{{ $puesto->name }} <a href="{{ url('puesto/'.$puesto->id.'/detail')}}"></a></h1>  
                                    </div>
                                    <div class="row" style="margin-left:2px">
                                        <span class="xlight11" style="color: rgb(126, 126, 126)">{{'Miembro desde '.$puesto->created_at->format('M, Y')}}</span>       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="color: #f9f9f9"> 
                        <div class="col-lg-12" style="padding-left: 10px">
                            <h1 class="bold12" style=" color: #000;text-align:left; margin: 10px"><i class="fas fa-phone" style="color: #ff1a00"></i>  Contacto</h1>
                            <div class="row" style="align-items: center">
                                <div class="col text-center">
                                    <a href="{{ url('https://api.whatsapp.com/send?phone=51'.$puesto->wsp.'&text=Hola!%20Pasé%20por%20tu%20tienda%20y%20tengo%20una%20consulta:%20') }}" target="_blank" class="btn btnb" style="background-color: #25d366; border-color: #25d366;margin:5px;width:60px; height:35px; padding:5px;"><i class="fas icofont-brand-whatsapp icono1" style="color: #fff"></i></a>
                                    <a href="{{ url('#') }}" target="_blank" class="btn btnb" style="background-color: #0084ff; border-color: #0084ff; margin:5px;width:60px; height:35px; padding:5px"><i class="fas icofont-facebook-messenger icono1" style="color: #fff"></i></a>
                                    <a href="{{ $puesto->fbpage ? $puesto->fbpage:'#'}}" target="_blank" class="btn btnb" style="background-color: #3b5998; border-color: #3b5998; margin: 5px;width:60px; height:35px; padding:5px"><i class="fas icofont-facebook icono1" style="color: #fff"></i></a>
                                </div>
                            </div>
                            @if($puesto->phone)
                                <span class="regular13" style="color: #000;"><i class="fas icofont-smart-phone" style="font-size: 16px; padding: 10px; color: #ff1a00"></i> {{ $puesto->phone }}</span>
                            @endif
                            <br>
                            @if($puesto->phone2)
                                <span class="regular13" style="color: #000;"><i class="fas icofont-smart-phone" style="font-size: 16px; padding: 10px; color: #ff1a00"></i> {{ $puesto->phone2 }}</span>
                            @endif
                        </div>
                        <hr style="color: #f9f9f9"> 
                        <div class="col-12">
                            <h1 class="bold12" style=" color: #000; margin: 10px; text-align:left"><i class="fas fa-truck" style="color: #ff1a00"></i>  Formas de entrega</h1>
                            @foreach($puesto->entrega_puestos as $entrega_puestos)
                                <button href="#" target="_blank" class="btn" style="background-color: #fff; border-radius: 10%; border-color: #ff1a00; border 1px solid; padding:5px"><span class="xlight11" style="color: #000; margin: auto">{{ $entrega_puestos->entrega->name }}</span></button>
                            @endforeach
                        </div>
                        <hr style="margin-top: 15px; color: #f9f9f9">
                        <div class="col-12">
                          <h1 class="text-left bold12" style="color: #000; margin:10px; text-align:left"><i class="fas fa-dollar-sign" style="color: #ff1a00"></i>  Métodos de pago</h1>
                          @foreach($puesto->pago_puestos as $pago_puestos)
                              <button href="#" target="_blank" class="btn" style="background-color: #fff; border-radius: 10%; border-color: #ff1a00; border 1px solid; padding:5px"><span class="xlight11" style="color: #000; margin: auto">{{ $pago_puestos->pago->name }}</span></button>
                          @endforeach
                        </div>
                        <hr style="margin-top: 15px; color: #f9f9f9">
                        <div class="col-12">
                            <h1 class="bold12" style=" color: #000;text-align:left; margin: 10px"><i class="fas fa-map-marker-alt" style="color: #ff1a00"></i>  Ubicación</h1>
                            <span class="text-left regular12" style=" color: #000; margin:10px">{{$puesto->direccion}}</span><br><br>
                            <input type="hidden" id="latitud" name="latitud" value="{{ $puesto->usuario_puestos->first()->user->latitud }}">
                            <input type="hidden" id="longitud" name="longitud" value="{{ $puesto->usuario_puestos->first()->user->longitud }}">
                            <div id="map" style="height: 250px;border-radius: 20px"></div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Start Featured Products-->
<div class="featureProduct singleProduct container" id="ocultarProd" style="background-color: #f9f9f9; padding: 10px">
    <div class="feature__wrap ">
        <span class="bold15" style="color: #000">Otros Productos de esta tienda<a class="xlight11" href="{{url('/puesto/'.$usuario_puestos->puesto->id.'/detail')}}" style="margin-left:10px">Ver más</a></span>
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
                                    <div class="features__item col-lg-3 col-sm-4 col-6 shad" style="margin:auto; margin-bottom: 10px; border-radius: 10%">
                                        <div class="features__image">
                                            <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                                            <img class="imgh" src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="100%" alt="" style="border: 5px solid #fff; border-radius: 10%">
                                            </a>
                                            <div class="image__tools">
                                                <i class="far fa-heart"></i>
                                                <i class="fas fa-cart-plus"></i>
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <div class="features__content">
                                            <span class="bold15" style="color:#ff1a00">S/. {{$producto->precio}}</span>
                                            <p class="fontn medium11" style="color: #000">{{$producto->name }}</p>
                                            <div class="content__overlay" style="margin-top: -20px; margin-bottom: 0px">
                                            <p class="fontn medium11" style="color: #000">{{$producto->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct" style="background-color: #f9f9f9">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
</div>

<!-- No se Encontraron Productos -->
<div class="shopProduct" id="resultado" style="background-color: #f9f9f9">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <div class="conatiner" style="background:#FF1643;text-align: center;padding:5px">
                <h1 style="color:#fff; text-align: center;">{{ __('No se encontraron resultados') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct" style="background-color: #f9f9f9">
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
@endsection
@if($usuario_puestos->puesto->wsp)
  <a style="position: fixed; right: 25px; bottom: 90px; width: 60px; z-index: 1000" href="{{ url('https://api.whatsapp.com/send?phone=51'.$usuario_puestos->puesto->wsp.'&text=Hola!%20Me%20interesa%20este%20producto:%20'.$producto->producto_url.'%20¿Está disponible?') }}" target="_blank">
  <img class="wsp" src="{{ asset('img/wsp.png') }}" style="width: 60px; hight: auto; border-radius:50%" alt="whatsapp">
  </a>
@endif

@section('scripts')
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
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
      $mostrar.hide();
        function initMap() {
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



