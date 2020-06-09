@extends('layouts.panel')

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
    <div class="feature__wrap container" style="margin-top: 15px; padding-left: 50px; padding-right: 50px">
        <div class="row" style="border: 1px solid; padding: 14px; border-color:#c5c5c5">
            <div class="col-lg-4 col-12">
                <h3 style="color: #bf0000; font-size: 16px">BUSCA</h3>
                <span style="margin-top: 1px; font-size: 14px; color:#000">Productos y tiendas de tacna, ahorra tiempo y dinero</span>
            </div>
            <div class="col-lg-4 col-12">
                <h3 style="color: #bf0000; font-size: 16px">COMPARA</h3>
                <span style="margin-top: 1px; font-size: 14px; color:#000">Precios y caracteristicas, de tus tiendas locales de siempre</span>
            </div>
            <div class="col-lg-4 col-12">
                <h3 style="color: #bf0000; font-size: 16px">COMPRA</h3>
                <span style="margin-top: 1px; font-size: 14px; color:#000">Sin comisiones ni tarjetas, trato directo con tiendas</span>
            </div>
        </div>
    </div>
</div>

<!--Start Feature Product-->

<div class="blog">
    <h4 class="title">Tiendas Recomendadas <a href="{{ url('puestos/all') }}"> Ver tiendas</a></h4>
        <div class="blog__wrap dflex">
        @foreach($pst as $ps)
        <div class="blog__item col-lg-3">
            <div class="blog__image"><img src="{{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" alt="" height="120px">
                
            </div>
            <div><img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="100px" width="100px">
                
            </div>
            <div class="blog__content"><a class="heading" href="#">{{ $ps->name}}</a>
            
            <p>{{ $ps->description}}</p><a class="link active" href="{{ url('/puesto/'.$ps->id.'/detail') }}"><strong><span style="color: #bf0000; font-size:14px">Visitar</span></strong></a>
            </div>
        </div>
        @endforeach
</div>
<!--End Feature Product-->

<!--Start Featured Products-->
<div class="featureProduct singleProduct" id="prod">
    <div class="feature__wrap container">
        <h4 class="title">Productos para ti <a href="{{ url('all/productos') }}"> Ver productos</a></h4> 
        <div class="feature__filter">
            <div class="button-group filters-button-group feature__buttons">
            </div>
            <ul class="featureSlider container">
                <li class="grid features__grid">
                @foreach($productos as $producto)
                    @foreach($producto->imagen_productos as $imagen) @endforeach
                    @if($imagen)
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image desk">
                            <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="black"><img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="200px" height="300px" alt=""></a>
                            <div class="image__overlay">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="200px" height="300px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="black">{{$producto->name}}</a>
                            <p class="price">S./ ${{$producto->precio}}</p>
                            <div class="content__overlay">
                                <p>{!! $producto->description !!}</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/'. $producto->id.'/detailProd') }}"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image desk">
                            <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="black"><img src="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px" alt=""></a>
                            <div class="image__overlay">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">{{$producto->name}}</a>
                            <p class="price">S./ {{$producto->precio}}</p>
                            <div class="content__overlay">
                                <p>{!! $producto->description !!}</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/'. $producto->id.'/detailProd') }}"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                </li>
            </ul>
        </div>
    </div>
    
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
<!-- <div class="featureProduct" style="margin-top:-6%">
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
</section> -->
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
                $('#prod').show();
                $('#categoria').hide();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                $('#categoria').show();
                $('#ocultarBanner2').hide();
                $tiendas.hide();
                $('#prod').hide();
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
                    `<div class="product__content" style="width:100%"><a class="link-title" href="#" style="font-size:30px">${productos.name}</a><a class="sub-link" href="#">Accessories, Clocks</a>`+
                        `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                        `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #000" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
                        `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
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
                if(puestos.banner != null) {
                    htmlOptions += 
                    `<li class="features__item col-lg-3 col-sm-6 col-12">`+
                        `<div class="features__image wood light5"><img src="{{ url('storage/${puestos.id}/banner/${puestos.banner}') }}" width="200px" height="200px">`+
                            `<div class="image__tools"><i class="far fa-heart"></i>`+
                                `<i class="fas fa-cart-plus"></i>`+
                                `<i class="fas fa-search"></i>`+
                            `</div>`+
                        `</div>`+
                        `<div class="features__content" style="width:100%"><a class="link" href="{{ url('/puesto/${puestos.id}/detail') }}" target="black"><strong>${puestos.name}</strong></a>`+
                        `</div>`+
                    `</li>`;
                }else {
                    htmlOptions += 
                    `<li class="features__item col-lg-3 col-sm-6 col-12">`+
                        `<div class="features__image wood light5"><img src="{{ url('img/defaultPuesto.jpg') }}" width="200px" height="200px">`+
                            `<div class="image__tools"><i class="far fa-heart"></i>`+
                                `<i class="fas fa-cart-plus"></i>`+
                                `<i class="fas fa-search"></i>`+
                            `</div>`+
                        `</div>`+
                        `<div class="features__content" style="width:100%"><a class="link" href="{{ url('/puesto/${puestos.id}/detail') }}" target="black"><strong>${puestos.name}</strong></a>`+
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
                    `<div class="product__image"><a href="{{ url('/producto/${productos.id}/detailProd') }}" target="black"><img src="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}" alt=""></a>`+
                        `<div class="image__tools"><i class="fas fa-search"></i>`+
                            `<i class="fas fa-random"></i>`+
                            `<i class="far fa-heart"></i>`+
                        `</div>`+
                    `</div>`+
                    `<div class="product__content" style="width:100%"><a class="link-title" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black" style="font-size:30px">${productos.name}</a>`+
                        `<p class="price" style="font-size:25px">S./${productos.precio}</p>`+
                        `<div class="color"></div>`+
                        `<p style="font-size:15px">${ productos.description }</p><a class="btn active" href="{{ url('/producto/${productos.id}/detailProd') }}" target="black">Ver Producto</a>`+
                    `</div>`+
                `</li>`;
            });
            $mostrar.html(htmlOptions);
        }
            
    });
</script>
@endsection


