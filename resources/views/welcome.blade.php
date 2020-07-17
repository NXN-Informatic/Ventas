@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/extras.css') }}">

@endsection

@section('content')
@section('title','Feria Tacna')
@include('layouts.components.navbar')


<div class="clients shad" style="background: #fff; position:relative">
    <div class="clients__wrap dflex" id="wrap">
        <div class="client__item" style="margin-left: 10px"><span class="bold15 subcategoria">Tiendas</span></div>
        @foreach ($subcategorias as $subcat)
            <div class="client__item" style="margin-left: 10px"><span class="bold12 subcategoria">{{$subcat->name}}</span></div>
        @endforeach
    </div>
  </div>
  <br>
  <br>
@include('layouts.components.banner')

<div class="singleProduct ajaxProduct featureProduct section6" style="background: #fff; border-radius: 20px; margin-top: 40px; padding-top: 10px">
    <div class="feature__filter container colw">
        <div class="col-12" style="height:50px; background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);padding: 15px; border-radius:7px">
            <span class="bold20" style="color: rgb(255, 255, 255)187, 187, 187); text-align:left">Productos destacados<a class="xlight12" style="color: #ffffff" href="{{ url('puestos/all') }}"> Ver productos</a></span>
        </div>
        <br>
        <br>
        <br>
        <div class="tabs">
            <ul class="featureSlider">
                <li class="features__grid active">
                    @foreach ($productos as $producto)
                        <?php $imagen = null; ?>
                        <?php $imagen = $producto->imagen_productos->first(); //solo una imagen x producto?>
                        @if($imagen != null)
                            @php
                                $ps = $producto->grupo->puestosubcategoria->puesto_id;
                            @endphp
                            <div class="features__item col-lg-3 col-sm-4 col-6 shad" style="margin:auto; margin-bottom: 10px; border-radius: 15px">
                                <div class="features__image" style="border-radius: 15px">
                                    <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                                    <img class="imgh" src="{{ asset('storage/'.$ps.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="100%" alt="" style="border: 5px solid #fff; border-radius: 15px">
                                    </a>
                                    <div class="precio1" style="padding:5px;position: absolute; bottom:0;right:0px;background-color:#fff">
                                        <span class="bold15" style="color:#ff1a00"><strong>S/. {{$producto->precio}}</strong></span>
                                    </div>
                                </div>
                                <div class="features__content contenido">
                                    <div class="row">
                                        <div class="col-lg-9 col-sm-9 col-12">
                                            <p class="fontn medium12" style="color: #333333; text-align:left">{{$producto->name }}</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-12 precio" style="padding:5px;">
                                            <span class="bold15" style="color:#ff1a00"><strong>S/. {{$producto->precio}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="control dflex" style="position:absolute;bottom: 3%; left: 0; right: 0">
                                        <a href="#"><i class="far fa-heart"></i></a>
                                        <a class="btn active" style="border-radius:3px; padding: 5px" href="{{ url('/puesto/'.$ps.'/detail') }}"><span class="bold10">Visitar Tienda</span></a>
                                        <a href="#"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>
        <div style="position:absolute; left:0; right:0">    
            <a href="{{ url('register') }}">
                <button class="btn" style="background:#fff; border-radius:10px; font-weight: bold; border-color:#8f33ac"><strong class="medium11" style="color: #8f33ac">Ver más productos</strong></button>  
            </a>
        </div>
    </div>
</div>

<div class="blog container colw" style="background: #FFF; margin-top: 60px; padding:10px" id="ocultar89">
    <div class="col-12" style="height:50px; background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);padding: 15px; border-radius:7px">
        <span class="bold20" style="color: #FFF; text-align:left">Tiendas Destacadas<a class="xlight12" style="color: #FFF" href="{{ url('/tiendas') }}"> Ver tiendas</a></span>
    </div>
    <div class="feature__wrap" style="margin-bottom: 30px" >
        <div class="blog__wrap dflex" style="padding: 0px">
                <?php $paux = 0;?>
                @foreach($pst as $ps)
                    @if ($paux < 4)
                        @if($ps->perfil != null)
                            <?php $puestosubcategorias = $ps->puestosubcategorias->random(1)->first(); ?>
                                @if($puestosubcategorias != null)
                                    @if(count($puestosubcategorias->grupos) > 0)
                                        <?php $aux=0; ?>
                                        <?php $paux = $paux + 1; ?>
                                        <div class="blog__item col-lg-3 col-sm-4 col-6 tiendah shad" style="background:#fff; padding: 3px;border-radius:15px; margin-bottom:5px;margin-top:5px">
                                            <div class="blog__image" style="margin-left: 0px;">
                                                <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                    <div style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%); width:100%; height:80px;border-radius:15px 15px 0px 0px"></div>   
                                                    <!-- <img src="{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" width="100%" alt="" height="100px" style="position: relative; z-index: 5; top: 0px; border: 3px solid #fff" class="shad"> -->
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                    <img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="90px" width="90px" class="shad" style="position: relative; z-index: 6; top: -50px; border: 3px solid #fff; background: #fff; border-radius: 50%">
                                                </a>
                                            </div>
                                            <div class="blog__content" style="margin-top: -60px">
                                                <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank"><span class="regular13" style="color: #333333; display: inline-block"><strong>{{ $ps->name}}</strong></span><br><br></a>
                                                <div class="row">
                                                    @foreach ($puestosubcategorias->grupos as $grupos)
                                                        @if (count($grupos->productos) > 0)
                                                            @if($aux < 3)  
                                                                <?php $imagen = null; 
                                                                $gp = $grupos->productos->random(1)->first();?>
                                                                @if ($gp->activo)
                                                                    <?php $imagen = $gp->imagen_productos->first(); //solo una imagen x producto?>
                                                                    @if($imagen != null)
                                                                            <a href="{{ url('producto/'.$gp->id.'/detailProd')}}" style="margin:auto">                                       
                                                                                <img src="{{ asset('storage/'.$ps->id.'/'.$gp->id.'/'.$imagen->imagen) }}" alt="" style="border: 2px solid #fff; margin: auto; border-radius: 10%" class="imgp shad">
                                                                            </a>
                                                                        <?php $aux = $aux+1; ?>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <br>
                                                <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank"><span class="regular13" style="color: #ff1a00;">Ver tienda</span></a>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                        @endif
                    @endif
                @endforeach
        </div>
    </div>
    <div style="position:absolute; left:0; right:0">    
        <a href="{{ url('register') }}">
            <button class="btn" style="background:#fff; border-radius:10px; font-weight: bold; border-color:#8f33ac"><strong class="medium11" style="color: #8f33ac">Ver más tiendas</strong></button>  
        </a>
    </div>
</div>

<div class="feature container colw" style="background: #FFF;padding:10px; margin-top: 60px" id="ella">
    <div class="col-12" style="height:50px; background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);padding: 15px; border-radius:7px">
        <span class="bold20" style="color: #FFF; text-align:left">Centros Comerciales<a class="xlight12" style="color: #FFF" href="{{ url('centroscomerciales/all') }}"> Ver todos</a></span>
    </div>
    <div class="feature__wrap" style="border-radius: 15px; margin-bottom: 30px">
        @foreach($cccc as $cc)
            <div class="feature__item" style="border-radius: 15px"><a href="{{ url('/centrocomercial/'.$cc->id) }}">
                <img src="{{ asset('storage/cc/'.$cc->id.'/'.$cc->logo) }}" style="width: 98%; height: 160px; border: 5px solid #fff;border-radius: 15px" class="shad"> 
                </a>
                <div class="feature__content">
                <a href="{{ url('/centrocomercial/'.$cc->id) }}"><h3 style="color: #fff; text-shadow: 0px 0px 15px #FFF; font-size: 12px">{{ $cc->nombre }}</h3></a><span class="light11" style="color: #fff; text-shadow: 0px 0px 30px #FFF">{{$cc->cantidad}} Tiendas</span>
                </div>
            </div>
        @endforeach    
    </div>
    <div style="position:absolute; left:0; right:0">    
        <a href="{{ url('register') }}">
            <button class="btn" style="background:#fff; border-radius:10px; font-weight: bold; border-color:#8f33ac"><strong class="medium11" style="color: #8f33ac">Ver más centros comerciales</strong></button>  
        </a>
    </div>
  </div>
<!-- start centros comerciales OJO "cccc=centros comerciales"-->
<!-- end centros comerciales -->
<!--Start Product-->
<div class="shopProduct" style="background: #FFF;z-index: -1">
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
<div class="shopProduct" style="background: #FFF;z-index: -1">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">

            <ul class="filterProduct gridRow" id="categoria">
                
            </ul>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
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
        $ella = $('#ella');
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
                $('#ocultar89').show();
                $('#oculto56').show();
                $tiendas.show();
                $tiendas2.show();
                $ella.show();
                $('#prod').show();
                $('#categoria').hide();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                $('#categoria').show();
                $('#ocultarBanner2').hide();
                $tiendas.hide();
                $tiendas2.hide();
                $ella.hide();
                $('#prod').hide();
                $('#ocultarBanner3').hide();
                $('#ocultar89').hide();
                $('#oculto56').hide();
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
                $('#oculto56').show();
                $('#ocultarBanner3').show();
                $('#ocultar89').show();
                $('#ocultarBanner4').show();
                $tiendas.show();
                $ella.show();
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
                $('#ocultar89').hide();
                $('#ocultarBanner3').hide();
                $('#oculto56').hide();
                $('#ocultarBanner4').hide();
                $('#categoria').hide();
                $('#prod').hide();
                $ella.hide();
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
                        `<div class="color"><span style="background: #f0deba" data-image="{{ asset('storage/${productos.puesto}/${productos.id}/${productos.image}') }}"></span><span style="background: #FFF" data-image="./images/shop/product/watch-black.jpg"></span></div>`+
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


