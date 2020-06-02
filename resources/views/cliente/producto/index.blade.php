@extends('layouts.app')
@section('title','Mis Productos')
@section('content')
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
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-10 d-flex">
                <div class="w-100">
                <div class="row">
                <div class="col-sm-12">
                    @foreach($puestoSubcategorias as $puestoSubcategoria)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">{{ $puestoSubcategoria->subcategoria->name }} </h5>
                                </div>
                            </div>
                        </div>
                            @foreach($puestoSubcategoria->grupos as $grupos)
                            <div class="card shadow-sm bg-white">
                                <div class="card-body">
                                    <div class="col mt-0">
                                        <h5 class="card-title">{{ $grupos->name }} </h5>
                                        <div class="row align-items-center">
                                            @foreach($grupos->productos as $producto)
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
                </div>
            </div>
        </div>
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