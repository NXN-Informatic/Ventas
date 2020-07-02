@extends('layouts.panel')

@section('title','Puestos')
@section('ogTitle'){{ $puesto->name }}@endsection
@section('ogUrl'){{ 'http://feriatacna.com/puesto/'.$puesto->id.'/detail' }}@endsection
@section('ogDesc'){{ $puesto->description }}@endsection
@section('ogImage'){{ 'http://feriatacna.com/storage/'.$puesto->id.'/banner/'.$puesto->banner }}@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <style>
    .shad {
    -moz-box-shadow: 0 2px 5px rgb(139, 139, 139);
    -webkit-box-shadow: 0 0 5px rgb(139, 139, 139);
    box-shadow: 0 2 5px rgb(139, 139, 139);
    }
    .swiper-button-prev,
    .swiper-button-next {
        display: none !important;
    }
    
    .swiper-container:hover .swiper-button-prev,
    .swiper-container:hover .swiper-button-next {
        display: flex !important;
    }
    a:hover {
    color: orange;
    }
    .headermax{
        height: 400px;
    }
    @media (max-width: 600px) {
    .headermax {
        height: 250px;
    }
    }
    </style>
@endsection

@section('content')
@include('layouts.components.navbar')
<!--Start Banner Slide-->
<!-- <div class="banner" id="tiendas">
    <div class="banner__control">
    </div>
    @if($puesto->banner == "banner1.jpg" | $puesto->banner == "banner2.jpg" | $puesto->banner == "banner3.jpg")
    <ul class="slider dflex">
        <li class="slider__item col-12 dflex firstSlide active">
            <div class="image col-lg-12 col-12">
                <img class="switchImage" src="{{ asset('img/'.$puesto->banner)}}" alt="">
            </div>
        </li>
    </ul>
    @else 
        @if($puesto->banner != null)
        <ul class="slider dflex">
            <li class="slider__item col-12 dflex firstSlide active">
                <div class="image col-lg-12 col-12">
                    <img class="switchImage" src="{{ asset('storage/'.$puesto->id.'/banner/'.$puesto->banner)}}" alt="">
                    
                    <h1 class="title">Woodmart Blog</h1>
                </div>
            </li>
        </ul>
        @else
        <ul class="slider dflex">
            <li class="slider__item col-12 dflex firstSlide active">
                <div class="image col-lg-12 col-12">
                    <img class="switchImage" src="{{ asset('img/banner 11.jpg')}}" alt="">
                    
      <h1 class="title">Woodmart Blog</h1>
                </div>
            </li>
        </ul>
        @endif
    @endif
</div> -->
<div id="ocultar9">
    @if($puesto->banner != null)
    <div class="bannerBlog headermax shad" style="background-image: url('{{ asset('storage/'.$puesto->id.'/banner/'.$puesto->banner)}}')">
        <h1 class="title" style="font-size:18px; text-align:right; margin-top:-5%; margin-right:10px"><i class="fab fa-whatsapp" style="margin-right: 8px"></i> {{ $puesto->phone }} </h1>
        <h1 class="title" style="color: {{$puesto->colornombre}}; margin-top:7%">{{ ($puesto->nombrebanner) ? $puesto->name : '' }}</h1>
        <div style="text-align:center;">
        <br>
        <a id="boton" class="title clases btn btn-primary" style="background:#000;"><h1 class="title" style="font-size:15px">Comprar</h1></a>
        </div>
    </div>
    @else
    <div class="bannerBlog" style="background-image: url('{{ asset('img/banner/fondo.jpg')}}');height:400px">
        <h1 class="title" style="font-size:25px; text-align:right; margin-top:-5%; margin-right:10px"><i class="fab fa-whatsapp" style="margin-right: 8px"></i> {{ $puesto->phone }} </h1>
        <br><br><br><br><br>
    <h1 class="title" style="color: {{$puesto->colornombre}}">{{ ($puesto->nombrebanner) ? $puesto->name : '' }}</h1>
        <div style="text-align:center;">
        <br>
        <a id="boton" class="title clases btn btn-primary" style="background:#000;"><h1 class="title" style="font-size:15px">Comprar</h1></a>
        
        </div>
    </div>
    @endif    
</div>

<!--End Banner Slide-->
<!--Start Single Product-->
<!-- <div class="singleProduct" id="ocultar5">
  <div class="singleProduct__wrap container">
    <div class="signleProduct__content">
      <div class="product dflex">
          <div class="col-lg-3 col-12" style="text-align: center;">
                <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" style="width: 200px; height: 200px">
          </div>
        
          <div class="content col-lg-9 col-12">
              <div class="col-lg-12 col-12">
                  <label style="font-size:20px; color:#F0C908">
                    @for ($i = 0; $i < $puesto->calification; $i++)   
                        <i class="fas fa-star"></i>
                    @endfor
                    @for ($i = 0; $i < (5 - $puesto->calification); $i++)
                        <i class="far fa-star text-dark"></i> 
                    @endfor
                </label><br><br>
                <label style="font-size:20px">
                    <i class="fas fa-phone-volume"></i> Llamar {{ $puesto->phone }} 
                    @if($puesto->phone2)
                      - {{ $puesto->phone2 }}
                    @endif
                </label><br><br>
                <br>
                @if(count($puesto->pago_puestos) > 0)
                <label style="font-size: 20px">Tipos de pago</label><br><br>
                <p style="font-size: 15px ; margin-left: 5px; color: #545353">
                    @foreach($puesto->pago_puestos as $pago_puestos)
                        {{ $pago_puestos->pago->name }} - 
                    @endforeach  
                  </p>
                  <br>
                @endif
                  <p style="font-size: 15px">{{ $puesto->description }}</p>
              </div>
          </div>

      </div>
    </div>
  </div>
</div> -->
<div id="prod">
    @foreach($puesto->puestosubcategorias as $puestosubcategorias)
        @foreach($puestosubcategorias->grupos as $grupos)
            @if(count($grupos->productos))
                <div class="feature" style="background: #F3F3F3;padding:10px">
                    <h4 class="title">{{ $grupos->name }}</h4>
                    <div class="feature__wrap container">
                        @foreach($grupos->productos as $producto)
                            @if ($producto->activo)
                                <?php $imagen = null; ?>
                                <?php $imagen = $producto->imagen_productos->first(); //solo una imagen x producto?>
                                @if($imagen != null)
                                    <div class="feature__item"><a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                                        <a class="btn btn-primary" href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank" style="height: 30px; width:80px; background-color:#bf0000; margin-left:180px; margin-top:10px; position:absolute"><h3 style="color: #fff; font-size: 18px; margin-top:-10px; margin-left:-20px; margin-right:-20px; z-index:100;">S/. {{$producto->precio}}</h3></a>
                                        <img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="180px" height="220px" alt="" style="border: 5px solid #fff">
                                        </a>
                                        <div class="feature__content">
                                            <span style="background-color:#00000050;text-shadow: 0px 0px 15px #000;color: #fff; font-size: 20px">{{$producto->name }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
</div>

<!-- Mostrar Productos -->
<div class="shopProduct">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
</div>

<!-- No se Encontraron Productos -->
<div class="shopProduct" id="resultado">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <div class="conatiner" style="background:#FF1643;text-align: center;padding:5px">
                <h1 style="color:#fff; text-align: center;">{{ __('No se encontraron resultados') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Mostrar Productos -->
<div class="shopProduct">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <ul class="filterProduct gridRow" id="mostrar">     
            </ul>
        </div>
    </div>
</div>

<!--Start Single Product-->
<div class="singleProduct" style="margin-top: -5%" id="ocultar1">
  <div class="singleProduct__wrap container">
    <div class="signleProduct__content">
      <div class="product dflex" >
          <div class="col-lg-8 col-12">
                <label style="font-size: 25px; font-weight: bold;">¿Porque Elegirnos?</label><br><br>
                @if( strlen($puesto->elegirnos) > 0)
                    <p style="font-size:18px">{{ $puesto->elegirnos }}</p>
                @else
                <p style="font-size:18px">Porque Somos una Tienda Mejor que otra</p>
                @endif`
                <br><br><br><br><br>
                <div class="row">
                    <div class="col-lg-8 col-12">
                      <label style="font-size: 25px; font-weight: bold;">Sobre Nosotros</label><br><br>
                      @foreach($puesto->usuario_puestos as $usuario_puesto) @endforeach
                      <p style="font-size:18px">{{ $puesto->nosotros }}</p>
                    </div>
                    <div class="col-lg-4 col-12" style="text-align: center;margin-top: 3%">
                      <img src="{{ asset('/storage/usuarios/'.$usuario_puesto->user->id.'/'.$usuario_puesto->user->imagen) }}" style="border-radius: 50%" width="150px"><br><br>
                      <h2>{{ $usuario_puesto->user->name }}</h2>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="featureProduct" id="ocultar1" style="margin-top: -8%">
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider container">
          <h1 class="title" style="font-size: 25px">Contacto</h1><br><br>
          <div class="row">
            <div class="col-lg-6 col-12">  
              <!-- Mapa -->
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
                    <h1 class="title" style="font-size:25px;font-weight: normal;"><i class="fab fa-whatsapp" style="margin-right: 8px"></i>{{ $puesto->phone }}</h1>  
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
</div>

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


