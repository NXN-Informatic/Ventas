@extends('layouts.panel')

@section('load')
  <!--Start Page Loader-->
  <div class="loader dflex"><img src="{{ asset('img/images/logo/wood-logo-dark.svg') }}" alt="" >
    <div class="dflex"><span></span><span></span><span></span></div>
  </div>
  <!--End Page Loader-->
@endsection

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/welcome.css') }}">
@endsection

@section('content')
@section('title','Bienvenido')
@include('layouts.components.navbar')
@include('layouts.components.banner')

<!--Start Feature Product-->
<div class="featureProduct singleProduct" id="tiendas">
    <div class="feature__wrap container">
    <h4 class="title">TIENDAS DISPONIBLES</h4>
    <div class="feature__filter">
        <div class="featureSlider">
        <div class="sliderButton left"><i class="fas fa-angle-left"></i></div>
        <div class="sliderButton right"><i class="fas fa-angle-right"></i></div>
        <ul class="features__grid" id="wrap">
            
        </ul>
        </div>
    </div>
    </div>
    <a href="{{ url('puestos/all') }}">
        <button type="submit" style="background:#153d77">VER MAS TIENDAS</button>
    </a>
</div>
<!--End Feature Product-->

<!--Start Featured Products-->
<div class="featureProduct">
    <h4 class="title">Productos Disponibles</h4>
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider container">
            <li class="grid features__grid" id="prod">
            
            </li>
        </ul>
    </div>
    <a href="{{ url('all/productos') }}">
        <button type="submit" style="background:#153d77">VER MAS PRODUCTOS</button>
    </a>
</div>

<!--Start Product-->
<div class="shopProduct">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="mostrar">
                
            </ul>
        </div>
    </div>
</div>

<!-- Sin Resultados -->
<div class="shopProduct" id="resultado">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <div class="conatiner" style="background:#FF1643;text-align: center;padding:5px">
                <h1 style="color:#fff; text-align: center;">{{ __('No se encontraron resultados') }}</h1>
            </div>
        </div>
    </div>
</div>

<!--Start Categorias-->
<div class="shopProduct">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
</div>

<!--Start Contáctanos-->
<div class="featureProduct" style="margin-top:-6%">
    <h4 class="title">CONTÁCTANOS</h4>
    <section class="form_wrap">
    <section class="cantact_info">
        <section class="info_title">
            <span class="fa fa-user-circle"></span>
            <h2>INFORMACIÓN<br>DE CONTACTO</h2>
        </section>
        <section class="info_items">
            <p style="color: #fff"><span class="fa fa-envelope"></span> feriaTacna@gmail.com</p>
            <p style="color: #fff"><span class="fa fa-mobile"></span> (+51) 931-375941</p>
        </section>
    </section>

    <form action="" class="form_contact">
        <h2>Envianos un mensaje</h2>
        <div class="user_info">
            <label for="names" style="font-size: 15px; text-align: left;">Nombres *</label>
            <input type="text" id="names">

            <label for="phone" style="font-size: 15px; text-align: left;">Telefono / Celular</label>
            <input type="text" id="phone">

            <label for="email" style="font-size: 15px; text-align: left;">Correo electronico *</label>
            <input type="text" id="email">

            <label for="mensaje" style="font-size: 15px; text-align: left;">Mensaje *</label>
            <textarea id="mensaje"></textarea>

            <input type="button" value="Enviar Mensaje" id="btnSend">
        </div>
    </form>
</section>
</div>

@include('layouts.components.footer')

@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
    var mySwiper = new Swiper ('.swiper-container', {
      slidesPerView: 1,
      centeredSlides: true,
      spaceBetween: 0,
      loop: true,
      loopFillGroupWithBlank: true,

      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    $(function() {
        $producto_id = $('#prod');
        $mostrar = $('#mostrar');
        $tiendas = $('#tiendas');
        $addtienda = $('#wrap');
        $resultado = $('#resultado');
        
        $mostrarcategoria = $('#categoria');
        $resultado.hide();
        onloadPuesto('feriaTacna');
        onload('feriaTacna');
        $('#mostrar').hide();
        $('ul#tags li').click( function() {
            const cateogiraId = $(this).attr('value');
            if(cateogiraId == 0) {
                $resultado.hide();
                $('#ocultarBanner').show();
                $('#ocultarBanner2').show();
                $('#ocultarBanner3').show();
                $('#ocultarBanner4').show();
                $tiendas.show();
                $('#categoria').hide();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                $('#categoria').show();
                $('#ocultarBanner2').hide();
                $tiendas.hide();
                $('#ocultarBanner3').hide();
                $('#ocultarBanner4').hide();
                const url = `/categoria/${cateogiraId}/apiProductosCategoria`;
                $.getJSON(url, onProducCateg);
            }
        });
        $("#buscar").on("keyup", function() {
            valor=$(this).val();
            if(valor.length === 0) {
                $('#ocultarBanner').show();
                $('#ocultarBanner2').show();
                $('#ocultarBanner3').show();
                $('#ocultarBanner4').show();
                $tiendas.show();
                $('#categoria').hide();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                mostrarload(valor);
                $tiendas.hide();
                $('#ocultarBanner').hide();
                $('#ocultarBanner2').hide();
                $('#ocultarBanner3').hide();
                $('#ocultarBanner4').hide();
                $('#categoria').hide();
                $('#prod').hide();
                $('#mostrar').show();
            }
        });

        function onProducCateg(data) {
            let htmlOptions = '';
            if(data.length === 0) {
                $resultado.show();
            }else {
                $resultado.hide();
            }
            data.forEach(productos => {
                htmlOptions += 
                `<li class="product__item">`+
                    `<div class="product__image"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt="">`+
                        `<div class="image__tools"><i class="fas fa-search"></i>`+
                            `<i class="fas fa-random"></i>`+
                            `<i class="far fa-heart"></i>`+
                        `</div>`+
                    `</div>`+
                    `<div class="product__content"><a class="link-title" href="#">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                        `<p class="price">$${productos.precio}</p>`+
                        `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                        `<p>${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}">Ver Producto</a>`+
                    `</div>`+
                `</li>`;
            });
            $mostrarcategoria.html(htmlOptions);
        }

        function onload(name) {
            const url = `/productos/${name}/all`;
            $.getJSON(url, onProductos);
        }

        function onloadPuesto(name) {
            const url = `/tiendas/${name}/apiTiendas`;
            $.getJSON(url, onPuestos);    
        }

        function onPuestos(data) {
            
            let htmlOptions = '';
            data.forEach(puestos => {
                if(puestos.perfil != null) {
                    htmlOptions += 
                    `<li class="features__item col-lg-3 col-sm-6 col-12">`+
                        `<div class="features__image wood light5"><img src="{{ url('storage/${puestos.id}/logo/${puestos.perfil}') }}" width="200px" height="200px">`+
                            `<div class="image__tools"><i class="far fa-heart"></i>`+
                                `<i class="fas fa-cart-plus"></i>`+
                                `<i class="fas fa-search"></i>`+
                            `</div>`+
                        `</div>`+
                        `<div class="features__content"><a class="link" href="#">${puestos.name}</a><a class="sub-link" href="#">Lighting</a>`+
                        `</div>`+
                    `</li>`;
                }else {
                    htmlOptions += 
                    `<li class="features__item col-lg-3 col-sm-6 col-12">`+
                        `<div class="features__image wood light5"><img src="{{ url('img/default.png') }}" width="200px" height="200px">`+
                            `<div class="image__tools"><i class="far fa-heart"></i>`+
                                `<i class="fas fa-cart-plus"></i>`+
                                `<i class="fas fa-search"></i>`+
                            `</div>`+
                        `</div>`+
                        `<div class="features__content"><a class="link" href="#">${puestos.name}</a><a class="sub-link" href="#">Lighting</a>`+
                        `</div>`+
                    `</li>`;
                }
            });
            $addtienda.html(htmlOptions);
        }

        function mostrarload(name){
            const url = `/productos/${name}/all`;
            $.getJSON(url, onMostrar);
        }
        function onMostrar(data) {
            let htmlOptions = '';
            if(data.length === 0) {
                $resultado.show();
            }else {
                $resultado.hide();
            }
            data.forEach(productos => {
                htmlOptions += 
                `<li class="product__item">`+
                    `<div class="product__image"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt="">`+
                        `<div class="image__tools"><i class="fas fa-search"></i>`+
                            `<i class="fas fa-random"></i>`+
                            `<i class="far fa-heart"></i>`+
                        `</div>`+
                    `</div>`+
                    `<div class="product__content"><a class="link-title" href="#">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                        `<p class="price">$${productos.precio}</p>`+
                        `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                        `<p>${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}">Ver Producto</a>`+
                    `</div>`+
                `</li>`;
            });
            $mostrar.html(htmlOptions);
        }

        function onProductos(data) {
            let htmlOptions = '';
            if(data.length === 0) {
                $resultado.show();
            }else {
                $resultado.hide();
            }
            $("prod").remove();
            data.forEach(productos => {
                htmlOptions += 
                `<div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">`+
                    `<div class="features__image desk"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"  width="200px" height="300px" alt="">`+
                        `<div class="image__overlay">`+
                            `<div class="color">`+
                                `<div class="image" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"  width="200px" height="300px"></div>`+
                            `</div>`+
                        `</div>`+
                    `</div>`+
                    `<div class="features__content"><a class="link" href="#">${productos.name}</a>`+
                        `<p class="price">$${productos.precio}</p>`+
                        `<div class="content__overlay">`+
                            `<p>${ productos.description }</p>`+
                            `<div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}">Ver Producto</a><a href="{{ url('/producto/${ productos.id }/detailProd') }}"><i class="fas fa-search"></i></a></div>`+
                        `</div>`+
                    `</div>`+
                `</div>`;
            });
            $producto_id.html(htmlOptions);
        }
    });
</script>
@endsection


