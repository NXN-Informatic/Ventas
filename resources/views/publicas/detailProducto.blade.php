@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/detailProduc.css') }}">
@endsection

@section('content')
@include('layouts.components.navbar')
@section('title','Bienvenido')

<!--Start Single Product-->
<div class="singleProduct container" id="ocultar1">
  <div class="singleProduct__wrap container">
    <div class="signleProduct__content">
      <div class="product dflex">
          <div class="col-lg-7 col-12">
            <div class="swiper-container" >
              <div class="swiper-wrapper">
              <!-- Imagen Productos -->
              @foreach($producto->imagen_productos as $imagenes)
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagenes->imagen) }}" 
                        class="card-img-top" alt="" height="400px" width="400px">
                    </a>
                </div>
              @endforeach
              @if(count($producto->imagen_productos) < 1)
                  <div class="swiper-slide">
                    <a href="#">
                        <img src="{{ asset('/img/defaultProducto.jpg') }}" 
                        class="card-img-top" alt="" height="400px" width="400px">
                    </a>
                </div>
              @endif 
              </div>
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
              </div>
              <br>
              <!-- Productos Descripción -->
              <div>
                <h2 style="text-align: left;font-size: 20px" class="color">{{ __('Descripción') }}</h2><br>
                <h2>{!! $producto->description !!}</h2>
              </div>
        </div>
        
        <div class="content col-lg-5 col-12">
          <div style="border-style: ridge;padding:5px">
            <div class="row">
                <div class="col-lg-6 col-12">
                <!-- Productos Precio -->
                <div class="precio color" style="color: #bf0000">S/.{{ $producto->precio }}</div>
                </div>
                <div class="col-lg-6 col-12">
                  <!-- Productos Creación -->
                  <p style="text-align:right">{{ $producto->created_at }}</p>
                </div>
            </div>
            <!-- Productos Name -->
            <h1 class="text-left" style="font-size: 20px; color: #000; font-weight: normal;">{{ $producto->name }}</h1>  
            
          </div>
          <br>
          <div style="border-style: ridge;padding:5px">
            <!-- Descripción Vendedor -->
            <h2 class="precio color" style="font-size:25px">{{ __('Tienda') }}</h2>
            <br>
            @foreach($producto->grupo->puestosubcategoria->puesto->usuario_puestos as $usuario_puestos)
              <!-- Imagen Vendedor -->
              <img src="{{ asset('/img/user.png') }}" style="float: left;margin-right: 10px" width="50px"><br>
              <!-- Nombre Vendedor -->
              <h3 style="text-align: left;font-size: 20px; font-weight: bold">{{ $usuario_puestos->puesto->name }}</h3>
              <input type="hidden" id="latitud" name="latitud" value="{{ $usuario_puestos->user->latitud }}">
              <input type="hidden" id="longitud" name="longitud" value="{{ $usuario_puestos->user->longitud }}">
              <!-- Email Vendedor -->
              <!-- <label style="font-size:20px; color:#F0C908">
                  @for ($i = 0; $i < $usuario_puestos->puesto->calification; $i++)   
                      <i class="fas fa-star"></i>
                  @endfor
                  @for ($i = 0; $i < (5 - $usuario_puestos->puesto->calification); $i++)
                      <i class="far fa-star text-dark"></i> 
                  @endfor
              </label><br><br> -->
              <!-- Fecha Vendedor -->
              <!-- <p style="text-align: right;"><span style="font-size: 15px; color:#000">{{ __('Miembro desde:') }} </span> {{ $usuario_puestos->user->created_at }}</p> -->
              <!-- Chatea con el  Vendedor -->
              <br>
              <a href="{{ url('/puesto/'.$usuario_puestos->puesto->id.'/detail') }}" target="black">
                <button class="btn btn-primary" style="background:#000">{{ __('Chatea con el Vendedor') }}</button>
              </a><br><br>
              @if($usuario_puestos->puesto->phone)
                <!-- Phone Vendedor -->
                <h2 style="font-size: 20px"><i class="fas fa-phone-volume"></i> {{ $usuario_puestos->puesto->phone }}</h2>
              @endif
              <br>
              @if($usuario_puestos->puesto->phone2)
                <!-- Phone 2 Vendedor -->
                <h2 style="font-size: 20px"><i class="fas fa-phone-volume"></i> {{ $usuario_puestos->puesto->phone2 }}</h2>
              @endif

              <br>
             
            @endforeach
          </div>
          <br>
          <div style="border-style: ridge;padding:5px">
            <!-- Productos Precio -->
            <h2 class="precio color" style="font-size:18px">{{ __('Tipo de Entrega') }}</h2>
            @foreach($usuario_puestos->puesto->entrega_puestos as $entrega_puestos)
              <h2 style="font-size: 20px"> {{ $entrega_puestos->entrega->name }} </h2>
            @endforeach
          </div>
          <br>
          <div style="border-style: ridge;padding:5px">
            <!-- Lugar de Publicación -->
            <h2 style="text-align: left;font-size: 20px" class="color">{{ __('Publicado en...') }}</h2>
            <br>
              <!-- Mapa -->
             <div id="map" style="height: 300px;"></div>
             <br>
             <!-- Visitar Tiendas -->
             <div style="background:#000">
                <br>
                <a href="{{ url('/puesto/'.$usuario_puestos->puesto->id.'/detail') }}" 
                    target="black" style="color: #fff; font-size: 20px;">{{ __('Visitar Tienda') }}</a>
                <br><br>
             </div>
          </div>
          <br>
          <br>
          <!-- Redes Sociales -->
          <div class="share dflex">
            <i class="fab fa-facebook-f" style="font-size: 25px"></i>
            <i class="fab fa-twitter" style="font-size: 25px"></i>
            <i class="fab fa-pinterest" style="font-size: 25px"></i>
            <i class="fab fa-linkedin-in" style="font-size: 25px"></i>
            <i class="fas fa-paper-plane" style="font-size: 25px"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Start Featured Products-->
<div class="featureProduct" id="ocultarProd">
    <h4 class="title">Otros Productos de esta tienda<a href="" style="margin-left:10px">{{ __('Mostrar Más') }}</a></h4>
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider container">
            <li class="grid features__grid" id="prod">
            @foreach($producto->grupo->puestosubcategoria->puesto->puestosubcategorias as $puestosubcategoria)
              @foreach($puestosubcategoria->grupos as $grupo)
                @foreach($grupo->productos as $productos)
                  <?php $imagen = null; ?>
                  @foreach($productos->imagen_productos as $imagen) @endforeach

                  @if($imagen)
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image desk">
                        <a href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black"><img src="{{ asset('/storage/'.$puestosubcategoria->puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"
                            width="200px" height="200px"></a>
                            <div class="image__overlay">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('/storage/'.$puestosubcategoria->puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"  width="200px" height="300px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">{{$productos->name}}</a>
                            <p class="price">{{$productos->precio}}</p>
                            <div class="content__overlay">
                                <p>{!! $productos->description !!}</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/${ productos.id }/detailProd') }}"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image desk">
                            <a href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black"><img src="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px" alt=""></a>
                            <div class="image__overlay">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">{{$productos->name}}</a>
                            <p class="price">{{$productos->precio}}</p>
                            <div class="content__overlay">
                                <p>{!! $productos->description !!}</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/${ productos.id }/detailProd') }}"><i class="fas fa-search"></i></a></div>
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
    <!-- btn Mostrar Tienda -->
    <a href="{{ url('/all/productos') }}">
      <button type="submit" style="background:#153d77">{{ __('VER PRODUCTOS') }}</button>
    </a> 
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

<section class="disqus container">
    <h2>Comparte tu Opinión</h2>
    <div id="disqus_thread"></div>
    <br><br><br>
</section>
    
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
@endsection



