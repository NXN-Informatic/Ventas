@extends('layouts.panel')

@section('title','Puestos')
@section('ogTitle'){{ $puesto->name }}@endsection
@section('ogUrl'){{ 'http://feriatacna.com/puesto/'.$puesto->id.'/detail' }}@endsection
@section('ogDesc'){{ $puesto->description }}@endsection
@section('ogImage'){{ 'http://feriatacna.com/storage/'.$puesto->id.'/banner/'.$puesto->banner }}@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
<link rel="stylesheet" href="/css/extras.css">
@endsection

@section('content')
@include('layouts.components.navbar')

<div id="ocultar9" style="background: #F3F3F3" style="position: relative;">
    @if($puesto->banner != null)
        <div class="bannerBlog headermax shad imgb row" style="position: relative;background: linear-gradient(85deg, rgba(143,51,172,1) 0%, #ff1a00 100%); padding:0px " >
            <div class="col-lg-5 col-sm-4 col-4">
                <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" class="logo" style="border: 4px solid #fff;max-height: 100%;
                    max-width: 100%;
                    height: auto;
                    top: 0;
                    position: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    margin: 10px 50px;">
            </div>
            <div class="col-lg-7 col-sm-8 col-8" style="position: relative">
                <div class="divnombre" style="margin-left:10px; position: absolute">
                    <span class="nombre" style="color: {{$puesto->colornombre}}">{{ ($puesto->nombrebanner) ? $puesto->name : '' }}</span>
                </div>
                <div class="row" style="bottom: 0; right:15%; position: absolute">
                    <a href="{{ url('https://api.whatsapp.com/send?phone=51'.$puesto->wsp.'&text=Hola!%20Pasé%20por%20tu%20tienda%20y%20tengo%20una%20consulta:%20') }}" target="_blank" class="btn btnb" style="background-color: #25d366; border-color: #25d366; "><i class="fas icofont-brand-whatsapp icono" style="color: #fff"></i></a>
                    <a href="{{ url('#') }}" target="_blank" class="btn btnb" style="background-color: #0084ff; border-color: #0084ff;"><i class="fas icofont-facebook-messenger icono" style="color: #fff"></i></a>
                    <a href="{{ $puesto->fbpage ? $puesto->fbpage:'#'}}" target="_blank" class="btn btnb" style="background-color: #3b5998; border-color: #3b5998;"><i class="fas icofont-facebook icono" style="color: #fff"></i></a>
                </div>
            </div>
        </div>
    @endif    
</div>
<div class="blog infobanner shad3" style="padding: 0px;">
    <div class="feature__wrap " style="margin-top: 0px" >
        <div style="margin-top: 0px; padding-left: 0px; padding-right: 0px">
            <div class="row" style="border: 1px; background: #fff">
                <div class="col-lg-4 col-sm-7 col-7" style="padding-top: 5px">
                    <i class="fas fa-map-marker-alt" style="color: #ff1a00; font-size: 18px"></i><span style="margin-left: 5px; font-size: 14px;color:#000; font-weight: bold">{{$puesto->direccion}}</span>
                </div>
                <div class="col-lg-8 col-sm-5 col-5" style="padding-top: 5px">
                    <i class="fas fa-mobile-alt" style="color: #ff1a00; font-size: 18px"></i><span style="margin-left: 5px; font-size: 14px;color:#000; font-weight: bold">{{$puesto->phone}}</span><br>
                    <span style="margin-left: 15px; font-size: 14px;color:#000;font-weight: bold">{{$puesto->phone2}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="singleProduct" id="ocultar1" style="background-color: #f3f3f3; padding:0px; margin-bottom:0px; margin-top:-100px">
    <div class="singleProduct__wrap container">
        <div class="signleProduct__content">
            <div class="product dflex">
                <div class="col-lg-4 col-12 infotienda" style="z-index:100 ;left:0;margin-top: 20px ">
                    <div class="shad3" style="background-color: #fff; border-radius: 20px">
                        <br>
                        <div class="col-lg-12 col-sm-12 col-12" style="padding-left: 10px">
                            <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" class="shad" width="160px" height="160px" style="border: 4px solid #fff;max-height: 100%;
                            max-width: 100%;
                            height: auto;
                            position: relative;
                            top: 0;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            border-radius: 50%">
                        </div>
                        <div class="col-lg-12" style="padding-left: 10px"><br>
                            <h1 style="font-size: 20px; color: #000; padding-left: 10px; text-align: left">{{ $puesto->name }} <a href="{{ url('puesto/'.$puesto->id.'/detail')}}"></a></h1>  
                            <div class="row" style="padding-left: 30px; margin-top: 0px; margin-bottom: 10px">
                                @for ($i = 0; $i < $puesto->calification; $i++)   
                                    <i class="fas fa-star" style="color: #ff1a00"></i>
                                @endfor
                                @for ($i = 0; $i < (5 - $puesto->calification); $i++)
                                    <i class="far fa-star text-dark" style="color: #ff1a00"></i> 
                                @endfor
                            </div>
                        </div>
                        <div class="col-12">
                            <h1 style="font-size: 15px; color: #000;text-align:left; margin: 10px"><i class="fas fa-store" style="color: #ff1a00"></i>  Descripción</h1>
                            <p class="text-left" style="font-size: 14px; color: #000; margin:10px">{{$puesto->description}}</p>
                            <br>
                        </div>
                        <hr style="color: #f2f2f2"> 
                        <div class="col-lg-12" style="padding-left: 10px">
                            <h1 style="font-size: 15px; color: #000;text-align:left; margin: 10px"><i class="fas fa-phone" style="color: #ff1a00"></i>  Contacto</h1>
                            @if($puesto->phone)
                                <span style="color: #000; font-size: 16px"><i class="fas icofont-smart-phone" style="font-size: 16px; padding: 10px; color: #ff1a00"></i> {{ $puesto->phone }}</span>
                            @endif
                            <br>
                            @if($puesto->phone2)
                                <span style="color: #000; font-size: 16px"><i class="fas icofont-smart-phone" style="font-size: 16px; padding: 10px; color: #ff1a00"></i> {{ $puesto->phone2 }}</span>
                            @endif
                        </div>
                        <hr style="color: #f2f2f2"> 
                        <div class="col-12">
                            <h1 style="font-size: 15px; color: #000; margin: 10px; text-align:left"><i class="fas fa-truck" style="color: #ff1a00"></i>  Formas de entrega</h1>
                            @foreach($puesto->entrega_puestos as $entrega_puestos)
                                <button href="#" target="_blank" class="btn" style="background-color: #fff; border-radius: 10%; border-color: #ff1a00; border 1px solid; padding:5px"><span style="color: #000; margin: auto">{{ $entrega_puestos->entrega->name }}</span></button>
                            @endforeach
                        </div>
                        <hr style="margin-top: 15px; color: #f2f2f2">
                        <div class="col-12">
                          <h1 class="text-left" style="font-size: 15px; color: #000; margin:10px; text-align:left"><i class="fas fa-dollar-sign" style="color: #ff1a00"></i>  Métodos de pago aceptado</h1>
                          @foreach($puesto->pago_puestos as $pago_puestos)
                              <button href="#" target="_blank" class="btn" style="background-color: #fff; border-radius: 10%; border-color: #ff1a00; border 1px solid; padding:5px"><span style="color: #000; margin: auto">{{ $pago_puestos->pago->name }}</span></button>
                          @endforeach
                        </div>
                        <hr style="margin-top: 15px; color: #f2f2f2">
                        <div class="col-12">
                            <h1 style="font-size: 15px; color: #000;text-align:left; margin: 10px"><i class="fas fa-map-marker-alt" style="color: #ff1a00"></i>  Dirección</h1>
                            <span class="text-left" style="font-size: 14px; color: #000; margin:10px">{{$puesto->direccion}}</span><br><br>
                            <input type="hidden" id="latitud" name="latitud" value="{{ auth()->user()->latitud }}">
                            <input type="hidden" id="longitud" name="longitud" value="{{ auth()->user()->longitud }}">
                            <div id="map" style="height: 300px;border-radius: 20px"></div>
                            <br>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-8 col-12 shad3" style="background-color: #fff; border-radius: 20px;margin-top: 120px">
                    <div id="prod" style="background: #fff; padding-top: 20px; border-radius: 20px">
                        <div class="singleProduct ajaxProduct featureProduct section6" style="background: #fff; border-radius: 20px; padding-top:0px">
                            <div class="feature__filter container">
                                <h4 class="title" style="margin-bottom: 3px">Nuestros Productos</h4>
                                <div class="tab__control dflex" style="margin-top: 0px;margin-bottom: 3px">
                                    <?php $gaux=1; ?>
                                    @foreach($puesto->puestosubcategorias as $puestosubcategorias)
                                        @foreach($puestosubcategorias->grupos as $grupos)
                                            @if ($gaux != 1)
                                                <div class="tab__item">{{$grupos->name}}</div>
                                            @else
                                                <div class="tab__item active">{{$grupos->name}}</div>
                                                <?php $gaux=0; ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="tabs">
                                    <ul class="featureSlider">
                                        <?php $gaux=1; ?>
                                        @foreach($puesto->puestosubcategorias as $puestosubcategorias)
                                            @foreach($puestosubcategorias->grupos as $grupos)
                                                @if ($gaux != 1)
                                                    <li class="features__grid">
                                                        @foreach($grupos->productos as $producto)
                                                            @if ($producto->activo)
                                                                <?php $imagen = null; ?>
                                                                <?php $imagen = $producto->imagen_productos->first(); //solo una imagen x producto?>
                                                                @if($imagen != null)
                                                                        <div class="features__item col-lg-4 col-sm-4 col-6 shad" style="margin:auto">
                                                                            <div class="features__image">
                                                                                <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                                                                                <img class="imgh shad" src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="100%" alt="" style="border: 5px solid #fff">
                                                                                </a>
                                                                                <div class="image__tools">
                                                                                    <i class="far fa-heart"></i>
                                                                                    <i class="fas fa-cart-plus"></i>
                                                                                    <i class="fas fa-search"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="features__content">
                                                                                <span style="font-size: 16px; color:#ff1a00"><strong>S/. {{$producto->precio}}</strong></span>
                                                                                <p class="fontn" style="color: #000">{{$producto->name }}</p>
                                                                                <div class="content__overlay" style="margin-top: -20px; margin-bottom: 0px">
                                                                                <p class="fontn" style="color: #000">{{$producto->name }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                @else
                                                    <li class="features__grid active">
                                                        @foreach($grupos->productos as $producto)
                                                            @if ($producto->activo)
                                                                <?php $imagen = null; ?>
                                                                <?php $imagen = $producto->imagen_productos->first(); //solo una imagen x producto?>
                                                                @if($imagen != null)
                                                                    <div class="features__item col-lg-4 col-sm-4 col-6 shad" style="margin:auto">
                                                                        <div class="features__image">
                                                                            <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                                                                            <img class="imgh" src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="100%" alt="" style="border: 5px solid #fff">
                                                                            </a>
                                                                            <div class="image__tools">
                                                                                <i class="far fa-heart"></i>
                                                                                <i class="fas fa-cart-plus"></i>
                                                                                <i class="fas fa-search"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="features__content">
                                                                            <span style="font-size: 16px; color:#ff1a00"><strong>S/. {{$producto->precio}}</strong></span>
                                                                            <p class="fontn" style="color: #000; text-align:left">{{$producto->name }}</p>
                                                                            <div class="content__overlay" style="margin-top: -20px; margin-bottom: 0px">
                                                                            <p class="fontn" style="color: #000; text-align:left">{{$producto->name }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    <?php $gaux=0; ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct" style="background: #f3f3f3">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
</div>

<!-- No se Encontraron Productos -->
<div class="shopProduct" id="resultado" style="background: #f3f3f3">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <div class="conatiner" style="background:#FF1643;text-align: center;padding:5px">
                <h1 style="color:#fff; text-align: center;">{{ __('No se encontraron resultados') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct" style="background: #f3f3f3">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <ul class="filterProduct gridRow" id="mostrar">     
            </ul>
        </div>
    </div>
</div>

<!--Start Single Product-->
<div class="singleProduct" style="position: relative; padding-top:0px" id="ocultar1">
  <div class="singleProduct__wrap container">
    <div class="signleProduct__content">
      <div class="product dflex" >
          <div class="col-lg-8 col-12">
                <label style="font-size: 18px; font-weight: bold;">¿Porque Elegirnos?</label><br><br>
                @if( strlen($puesto->elegirnos) > 0)
                    <p class="fontn">{{ $puesto->elegirnos }}</p>
                @else
                <p class="fontn">Porque Somos una Tienda Mejor que otra</p>
                @endif`
                <br><br><br><br><br>
                <div class="row">
                    <div class="col-lg-8 col-12">
                      <label style="font-size: 18px; font-weight: bold;">Sobre Nosotros</label><br><br>
                      @foreach($puesto->usuario_puestos as $usuario_puesto) @endforeach
                      <p class="fontn">{{ $puesto->nosotros }}</p>
                    </div>
                    <div class="col-lg-4 col-12" style="text-align: center;margin-top: 3%">
                      <img src="{{ asset('/storage/usuarios/'.$usuario_puesto->user->id.'/'.$usuario_puesto->user->imagen) }}" style="border-radius: 50%" width="150px"><br><br>
                      <h2 class="fontn">{{ $usuario_puesto->user->name }}</h2>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!--
<div class="featureProduct" id="ocultar1" style="margin-top: -8%">
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider container">
          <h1 class="title" style="font-size: 25px">Contacto</h1><br><br>
          <div class="row">
            <div class="col-lg-6 col-12">  
              <div id="map" style="height: 400px;"></div>
            </div>
            <div class="col-lg-6 col-12">
                <div style="text-align: left;">
                    <br><br>
                    <h1>Dirección</h1>
                    <br>
                    <h1 style="font-weight: normal;">{{ $puesto->direccion }}</h1>  
                    <br><br><br>
                    <h1 class="title" style="font-size: 20px">Número de Contacto</h1>
                    <br>
                    <h1 class="title" style="font-size:20px;font-weight: normal;"><i class="fab fa-phone" style="margin-right: 8px"></i>{{ $puesto->phone }}</h1>  
                    <br><br>
                    @if(count($puesto->pago_puestos) > 0)
                        <label style="font-size: 20px; font-weight: bold;">Tipos de pago</label><br><br>
                        <p style="font-size: 20px ; margin-left: 5px; color: #545353">
                            @foreach($puesto->pago_puestos as $pago_puestos)
                                {{ $pago_puestos->pago->name.' ' }} 
                            @endforeach  
                        </p>
                    <br>
                    @endif
                </div>
            </div>
          </div>
        </ul>
    </div>
</div>-->

<!--Start Footer-->
<div class="footer" style="background:#F5F5F5;color:#000; border: 1px solid #ccc; padding: 0px;margin: 0px;" >
    <div class="footer__wrap dflex">

        <div class="footer__item col-lg-1 col-sm-6 col-12"></div>
        <div class="footer__item col-lg-5 col-sm-6 col-12">
            <h2 style="font-size: 20px">Contacto</h2><br>
            <p style="color:#000;font-size: 17px">
            feriaTacna@gmail.com</p>
            <p style="color:#000">
                Tacna, Perú</p>
            
            <li class="social" style="list-style: none;">
                <a href="#" style="color:#000; font-size:20px"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="color:#000; font-size:20px; margin-left:5px"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color:#000; font-size:20px; margin-left:5px"><i class="fas fa-envelope"></i></a>
            </li>
        </div>
        <div class="footer__item col-lg-1 col-sm-6 col-12">
            
        </div>
        <div class="footer__item col-lg-5 col-sm-6 col-12">
            <br>    
            <img src="{{ asset('/img/logo.png') }}" alt="" style="display:block;width: 200px;margin:auto">
            <br>    
            <h2 style="text-align: center;">
            © Comercio Local, todos los derechos reservados.
            </h2>
        </div>
    </div>
</div>
<!--End Footer-->

@endsection

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
    //initMap(); Esto es innecesario porque en el callback de la URL lo estás llamando.
  </script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK7XD3i3cgtPV9SKcDff2IJc0O-WpNoNY&callback=initMap" async defer></script> 
    

    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            loopFillGroupWithBlank: true,

            autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            },

            // Si se desea agregar la paginacion 
            // pagination: {
            // el: '.swiper-pagination',
            // clickable: true,
            // },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>
      $(function() {
        // Variables Define
        $mostrarcategoria = $('#categoria');
        $ocultar1 = $('#ocultar1');
        $ocultar9 = $('#ocultar9');
        $ocultar5 = $('#ocultar5');
        $ocultar2 = $('#tiendas');
        $ocultar99 = $('#prod');
        $resultado = $('#resultado');
        $mostrar = $('#mostrar');

        $resultado.hide();
        $mostrarcategoria.hide();

        $('#boton').click( function() {
            window.scroll(0,100000)
        } );
        
        $('ul#tags li').click( function() {
          const cateogiraId = $(this).attr('value');
          if(cateogiraId == 0) {

            $mostrarcategoria.hide();
            $ocultar1.show();
            $ocultar99.show();
            $ocultar9.show();
            $ocultar5.show();
            $resultado.hide();
            $ocultar2.show();
          }else {
            $mostrarcategoria.show();
            $ocultar1.hide();
            $ocultar2.hide();
            $ocultar99.hide();
            $ocultar9.hide();
            $resultado.hide();
            $ocultar5.hide();
            const url = `/categoria/${cateogiraId}/apiProductosCategoria`;
            $.getJSON(url, onProducCateg);
          }
        });

        $("#buscar").on("keyup", function() {

          valor = $(this).val();
          if(valor.length === 0) {

            $mostrarcategoria.hide();
            $ocultar1.show();
            $resultado.hide();
            $ocultar2.show();
            $ocultar99.show();
            $ocultar9.show();
            $ocultar5.hide();
            $mostrar.hide();
          }else {

            $ocultar1.hide();
            $resultado.hide();
            $ocultar2.hide();
            $ocultar99.hide();
            $ocultar5.hide();
            $ocultar9.hide();
            $mostrar.show();
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
              if(productos.image != null){
                  htmlOptions += 
                  `<li class="product__item">`+
                      `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt=""></a>`+
                          `<div class="image__tools"><i class="fas fa-search"></i>`+
                              `<i class="fas fa-random"></i>`+
                              `<i class="far fa-heart"></i>`+
                          `</div>`+
                      `</div>`+
                      `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black" style="font-size:30px">${productos.name}</a>`+
                          `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                          `<div class="color"></div>`+
                          `<p style="font-size:15px">${ productos.description }</p><a class="btn active" target="black" href="{{ url('/producto/${productos.id}/detailProd') }}">Ver Producto</a>`+
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
                      `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                          `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                          `<div class="color"></div>`+
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
          if(productos.image != null){
            htmlOptions += 
            `<li class="product__item">`+
                `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt=""></a>`+
                    `<div class="image__tools"><i class="fas fa-search"></i>`+
                        `<i class="fas fa-random"></i>`+
                        `<i class="far fa-heart"></i>`+
                    `</div>`+
                `</div>`+
                `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                    `<p class="price">$${productos.precio}</p>`+
                    `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                    `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                `</div>`+
            `</li>`;
          }else{
              `<li class="product__item">`+
                `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('img/defaultProducto.jpg') }}" alt=""></a>`+
                    `<div class="image__tools"><i class="fas fa-search"></i>`+
                        `<i class="fas fa-random"></i>`+
                        `<i class="far fa-heart"></i>`+
                    `</div>`+
                `</div>`+
                `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                    `<p class="price">$${productos.precio}</p>`+
                    `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                    `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                `</div>`+
            `</li>`;
          }
          });
          $mostrarcategoria.html(htmlOptions);
        }
      });
    </script>
@endsection


