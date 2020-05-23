@extends('layouts.panel')

@section('content')

@section('title','Bienvenido')
@include('layouts.components.navbar')

@foreach($categorias as $categoria)
<div class="featureProduct singleProduct" id="tiendas">
    <div class="feature__wrap container">
    <h4 class="title">{{ $categoria->name }}<a href="" style="margin-left:10px">{{ __('Mostrar Más') }}</a></h4>
    <div class="feature__filter">
        <div class="featureSlider">
        <div class="sliderButton left"><i class="fas fa-angle-left"></i></div>
        <div class="sliderButton right"><i class="fas fa-angle-right"></i></div>
        <ul class="features__grid" id="wrap">
        @foreach($categoria->subcategorias as $subcategorias)
            @foreach($subcategorias->puestosubcategorias as $puestosubcategoria)
                @foreach($puestosubcategoria->grupos as $grupos)
                    @foreach($grupos->productos as $productos)
                    @if($productos->activo == 1)
                        @foreach($productos->imagen_productos as $imagen) @endforeach
                        <li class="features__item col-lg-3 col-sm-6 col-12">
                            <div class="features__image wood light5">
                            <img src="{{ asset('/storage/'.$puestosubcategoria->puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"> 
                                <div class="image__tools"><i class="far fa-heart"></i>
                                    <i class="fas fa-cart-plus"></i>
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <div class="features__content">
                                <a class="link" href="#"></a>
                                <a class="sub-link" href="{{ url('/producto/'.$productos->id.'/detailProd') }}">{{ $productos->name }}</a>
                            </div>
                        </li>
                    @endif
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
        </ul>
        </div>
    </div>
    </div>
</div>
@endforeach

@endsection



