@extends('layouts.app')
@section('title','Mis Producto')
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
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Usuario') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mis Productos') }}</li>
                </ol>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-primary btn-lg" style="margin-bottom: 4px"><span style="margin-left:10px; margin-right:10px">Ver Mi Tienda</span></button></a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:10px; margin-right:10px">{{ __('Compartir') }}</span></button>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
        @foreach($productos as $producto)
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="col-sm-12 col-xl-12 col-xxl-12 text-center">
                            @if(count($producto->imagen_productos) > 0)
                            <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($producto->imagen_productos as $imagenes)
                                    <div class="swiper-slide">
                                        <a href="#">
                                            <img src="{{ asset('storage/'.$usuarioPuesto->puesto_id.'/'.$producto->id.'/'.$imagenes->imagen) }}" class="card-img-top mt-2" alt="Angelica Ramos">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                            @else
                                <img src="{{ asset('img/imagen.png') }}" class="card-img-top mt-2">
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                        <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn btn-primary">
                                            <i class="fas fa-edit" title="Editar"></i>
                                        </button></a>
                                        <a  href="javascript:void" onclick="$('#delete-form').submit();"><button type="button" class="btn btn-danger">
                                            <i class="fas fa-times" title="Eliminar"></i>
                                        </button></a>
                                    </div>
                                </div>
                                <table class="table table-sm my-2">
                                    <tbody>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $producto->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Precio</th>
                                            <td>{{ $producto->precio }}</td>
                                        </tr>
                                        <tr>
                                            <th>Stock</th>
                                            <td>{{ $producto->stock }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form id="delete-form" action="{{ url('/producto/'.$producto->id.'/delete') }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->puesto_id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
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
@endsection
