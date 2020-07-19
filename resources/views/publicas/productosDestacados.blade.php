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
        <div class="client__item" style="margin-left: 10px"><a href="{{ url('/tiendas/destacadas') }}"><span class="bold12 subcategoria">Tiendas</span></a></div>
        @foreach ($subcategorias as $subcat)
            <div class="client__item" style="margin-left: 10px"><a href="{{ url('/categoria/'.$subcat->name) }}"><span class="bold12 subcategoria">{{$subcat->name}}</span></a></div>
        @endforeach
    </div>
  </div>
  <br>
  <br>

<div class="singleProduct ajaxProduct featureProduct section6" style="background: #fff; border-radius: 20px; margin-top: 40px; padding-top: 10px">
    <div class="feature__filter container colw">
        <div class="col-12" style="height:50px; background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);padding: 15px; border-radius:7px">
            <span class="bold20" style="color: #fff; text-align:left">{{'Productos destacados ('.$cantidad.')'}}</span>
        </div>
        <br>
        <br>
        <br>
        <div class="tabs">
            <ul class="featureSlider">
                <li id="productos" class="features__grid active">
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
            <button id="masProductos" class="btn btn-primary" onclick="masProductos()" style="background:#fff; border-radius:10px; font-weight: bold; border-color:#8f33ac"><strong class="medium11" style="color: #8f33ac">Ver más productos</strong></button>  
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>

@endsection

@section('scripts')

<script>
    let pageProductos=2;
    function masProductos(){
        fetch(`/productos/destacados/mas?page=${pageProductos}`,{
                method:'get'
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('productos').innerHTML += html
        })
        .catch(error => console.log(error))
        pageProductos++
    }
</script>
@endsection


