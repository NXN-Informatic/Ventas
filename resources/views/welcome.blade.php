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
<div class="featureProduct singleProduct" id="tiendas" style="background: #F3F3F3">
    <div class="feature__wrap container" style="margin-top: 15px; padding-left: 50px; padding-right: 50px">
        <div class="row" style="border: 1px solid; padding: 14px; border-color:#c5c5c5; background: #fff">
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

<div class="blog" style="background: #F3F3F3">
    <h4 class="title">Tiendas Recomendadas <a href="{{ url('puestos/all') }}"> Ver tiendas</a></h4>
    <div class="feature__wrap container" >
        <div class="blog__wrap dflex">
            <div class="row">
                @foreach($pst as $ps)
                    @if($ps->banner != null and $ps->perfil != null)
                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                            <div class="blog__item col-lg-3" style="margin: auto; background:#fff">
                                <div class="blog__image">
                                    <img src="{{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" alt="" height="100px" style="position: relative; z-index: 5; top: 0px">
                                </div>
                                <div>
                                    <img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="80px" width="80px" style="position: relative; z-index: 6; top: -50px">
                                </div>
                                <div class="blog__content" style="margin-top: -60px">
                                    {{ $ps->name}}<br><br>
                                    <div class="row">
                                        @if ($ps->puestosubcategorias->first())
                                            @foreach ($ps->puestosubcategorias->first()->grupos as $grupos)
                                            <?php $imagen = null; ?>
                                            <?php $imagen = $grupos->productos->random(1)->first()->imagen_productos->first(); //solo una imagen x producto?>
                                            <img src="{{ asset('storage/'.$ps->id.'/'.$grupos->productos->first()->id.'/'.$imagen->imagen) }}" alt="" height="60px" style="margin: auto">
                                            @endforeach
                                        @endif
                                        
                                    </div>
                                    <!--<p> substr($ps->description,0,60)}...</p> -->
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--End Feature Product-->

<!--Start Featured Products-->
<div class="featureProduct" id="prod" style="background: #F3F3F3;padding:10px">
    <div class="feature__wrap container">
        <h4 class="title">Productos para ti <a href="{{ url('all/productos') }}"> Ver productos</a></h4> 
        <div class="feature__filter">
            <div class="button-group filters-button-group feature__buttons">
            </div>
            <ul class="featureSlider container">
                <li class="grid features__grid" >
                    
                    @foreach($productos as $producto)
                        @foreach($producto->imagen_productos as $imagen) @endforeach
                        @if($imagen)
                            <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                                <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                                    <div class="features__image desk">
                                        <img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="180px" height="220px" alt="">
                                        <div class="image__overlay">
                                            <div class="color">
                                                <div class="image" data-image="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="180px" height="220px"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="features__content">
                                        <span style="font-size: 20px; color:#bf0000"><strong>S/. {{$producto->precio}}</strong></span>
                                        <div class="content__overlay" style="margin-top: -15px; margin-bottom: 0px">
                                        <p style="color: #000">{{$producto->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach         
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- start centros comerciales OJO "cccc=centros comerciales"-->
<div class="featureProduct singleProduct" style="margin-top:-5px; padding-bottom:0px; background: #F3F3F3" >
    <div class="feature__wrap container" style="background: #F3F3F3">
        <h4 class="title">Centros Comerciales <a href="{{ url('centroscomerciales/all') }}"> Ver todos</a></h4>
    <div class="feature__filter">
        <div class="featureSlider">
        <div class="sliderButton left"><i class="fas fa-angle-left"></i></div>
        <div class="sliderButton right"><i class="fas fa-angle-right"></i></div>
        <ul class="features__grid" id="wrap">
            @foreach($cccc as $cc)
            <li class="features__item col-lg-3 col-sm-6 col-12">
                <div class="features__image wood light5">
                    <a href="{{ url('/Centropuestos/'.$cc->id) }}">
                    <img src="{{ asset('storage/'.$cc->id.'/'.$cc->banner) }}" style="width: 200px; height: 200px"> 
                    </a>
                </div>
                <div class="features__content">
                    <div class="content__overlay">
                        <a href="{{ url('/Centropuestos/'.$cc->id) }}"><span style="font-size: 16px; color:#000">{{ $cc->nombre }}</span></a>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
        </div>
    </div>
    </div>
</div>
<!-- end centros comerciales -->
<!--Start Product-->
<div class="shopProduct" style="background: #F3F3F3;z-index: -1">
    <div class="shopProduct__wrap dflex container" >
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="mostrar">
                
            </ul>
        </div>
    </div>
</div>

<!-- Sin Resultados -->
<div class="shopProduct" id="resultado" style="z-index: -1">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <div class="conatiner" style="background:#FF1643;text-align: center;padding:5px">
                <h1 style="color:#fff; text-align: center;">{{ __('No se encontraron resultados') }}</h1>
            </div>
        </div>
    </div>
</div>

<!--Start Categorias-->
<div class="shopProduct" style="background: #F3F3F3;z-index: -1">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
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
        $tiendas2 = $('#tiendas2');
        $addtienda = $('#wrap');
        $resultado = $('#resultado');
        
        $mostrarcategoria = $('#categoria');
        $resultado.hide();
        //onloadPuesto('feriaTacna');
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
                $tiendas2.show();
                $('#prod').show();
                $('#categoria').hide();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                $('#categoria').show();
                $('#ocultarBanner2').hide();
                $tiendas.hide();
                $tiendas2.hide();
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
                $tiendas2.show();
                $('#categoria').hide();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                mostrarload(valor);
                $tiendas.hide();
                $tiendas2.hide();
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


