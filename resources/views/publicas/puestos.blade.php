@extends('layouts.panel')

@section('title','Puestos')
@section('ogTitle'){{ $puesto->name }}@endsection
@section('ogUrl'){{ 'http://feriatacna.com/puesto/'.$puesto->id.'/detail' }}@endsection
@section('ogDesc'){{ $puesto->description }}@endsection
@section('ogImage'){{ 'http://feriatacna.com/storage/'.$puesto->id.'/banner/'.$puesto->banner }}@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <style>
    .swiper-button-prev,
    .swiper-button-next {
        display: none !important;
    }
    
    .swiper-container:hover .swiper-button-prev,
    .swiper-container:hover .swiper-button-next {
        display: flex !important;
    }
    </style>
@endsection

@section('content')
@include('layouts.components.navbar')
<!--Start Banner Slide-->
<div class="banner" id="tiendas">
    <div class="banner__control">
        <div class="circle dflex"><span class="active" data-slide="0"></span><span data-slide="1"></span><span data-slide="2"></span></div>
        <div class="button buttonLeft dflex"><i class="fas fa-angle-left"></i></div>
        <div class="button buttonRight dflex"><i class="fas fa-angle-right"></i></div>
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
                </div>
            </li>
        </ul>
        @else
        <ul class="slider dflex">
            <li class="slider__item col-12 dflex firstSlide active">
                <div class="image col-lg-12 col-12">
                    <img class="switchImage" src="{{ asset('img/banner 11.jpg')}}" alt="">
                </div>
            </li>
        </ul>
        @endif
    @endif
</div>
<!--End Banner Slide-->
<!--Start Single Product-->
<div class="singleProduct" id="ocultar5">
  <div class="singleProduct__wrap container">
    <div class="signleProduct__content">
      <h1 class="title" style="font-size: 30px">{{ $puesto->name }}</h1><br><br>
      <div class="product dflex">
          <div class="col-lg-6 col-12">
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
                    <br><br>
                    <i class="fas fa-phone-volume"></i> Llamar {{ $puesto->phone2 }}
                    @endif
                </label><br><br>
                <br>
                <label style="font-size: 20px">Tipos de pago</label>
                    @foreach($puesto->pago_puestos as $pago_puestos)
                        <p style="font-size: 15px">{{ $pago_puestos->pago->name }}</p>
                    @endforeach
          </div>
        
          <div class="content col-lg-6 col-12">
              <div class="col-lg-12 col-12">
                  
                  <p style="font-size: 15px">{{ $puesto->description }}</p>
              </div>
          </div>

      </div>
    </div>
  </div>
</div>

<!--Start Featured Products-->
<div class="featureProduct" id="ocultar1">
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider container">
            <li class="grid features__grid">
                @foreach($puesto->puestosubcategorias as $puestosubcategorias)
                    @foreach($puestosubcategorias->grupos as $grupos)
                        @foreach($grupos->productos as $productos)
                        <?php $imagen = null; ?>
                        @foreach($productos->imagen_productos as $imagen) @endforeach
                        @if($imagen != null)
                        <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                            <div class="features__image desk"><a href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black"><img src="{{ asset('storage/'.$puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"  width="200px" height="300px" alt=""></a>
                                <div class="image__overlay">
                                    <div class="color">
                                        <div class="image" data-image="{{ asset('storage/'.$puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"  width="200px" height="300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="features__content"><a class="link" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">{{$productos->name}}</a>
                                <p class="price">S./ ${{$productos->precio}}</p>
                                <div class="content__overlay">
                                    <p>{{ $productos->description }}</p>
                                    <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">Ver Producto</a><a ><i class="fas fa-search"></i></a></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                            <div class="features__image desk">
                                <a href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black"><img src="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px" alt=""></a>a
                                <div class="image__overlay">
                                    <div class="color">
                                        <div class="image" data-image="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="features__content"><a class="link" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">{{$productos->name}}</a>
                                <p class="price">S./ ${{$productos->precio}}</p>
                                <div class="content__overlay">
                                    <p>{{ $productos->description }}</p>
                                    <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/'. $productos->id.'/detailProd') }}"><i class="fas fa-search"></i></a></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    @endforeach
                @endforeach
            </li>
        </ul>
    </div>
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
      <div class="product dflex">
          <div class="col-lg-6 col-12">
              <label style="font-size: 20px">Sobre Nosotros</label><br><br>
                <p style="font-size:18px">{{ $puesto->nosotros }}</p>
          </div>
        
          <div class="content col-lg-6 col-12">
              <div class="col-lg-12 col-12">
                  <label style="font-size: 20px">¿Porque Elegirnos?</label><br><br>
                <p style="font-size:18px">{{ $puesto->elegirnos }}</p>
              </div>
          </div>

      </div>
    </div>
  </div>
</div>


  <div id="map" style="height: 500px;"></div>
<br><br>

@include('layouts.components.footer')
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script src="{{ asset('js/publicas/detailProduc.js') }}"></script>
  <script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>),
        });

        marker = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>)
        });
    }
    //initMap(); Esto es innecesario porque en el callback de la URL lo estás llamando.
  </script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK7XD3i3cgtPV9SKcDff2IJc0O-WpNoNY&callback=initMap" async defer></script> 
  <script>
    <script>
        (function() { // DON'T EDIT BELOW THIS LINE
        setTimeout(cargar, 1000);
        function cargar() {    
            var d = document, s = d.createElement('script');
            s.src = 'https://feriatacna.disqus.com/embed.js';
            s.setAttribute('data-timestamp', new Date());
            (d.head || d.body).appendChild(s);
        }
        })();
    </script>
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
      $ocultar5 = $('#ocultar5');
      $ocultar2 = $('#tiendas');
      $resultado = $('#resultado');
      $mostrar = $('#mostrar');

      $resultado.hide();
      $mostrarcategoria.hide();
      
      $('ul#tags li').click( function() {
        const cateogiraId = $(this).attr('value');
        if(cateogiraId == 0) {

          $mostrarcategoria.hide();
          $ocultar1.show();
          $ocultar5.show();
          $ocultar2.show();
        }else {
          $mostrarcategoria.show();
          $ocultar1.hide();
          $ocultar2.hide();
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
          $ocultar2.show();
          $ocultar5.hide();
          $mostrar.hide();
        }else {

          $ocultar1.hide();
          $ocultar2.hide();
          $ocultar5.hide();
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


