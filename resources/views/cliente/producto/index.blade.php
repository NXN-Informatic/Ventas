@extends('layouts.app')
@section('title','Mis Productos')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
@endsection

@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('Catálogo') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                </ol>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-info btn-lg" style="margin-bottom: 4px"><span style="margin-left:20px; margin-right:20px">Ver mi Tienda</span></button></a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('Compartir') }}</span></button>
                        </a>
                    </div>
                </div>
            </nav>
		</div>
        <div class="row">
            <h2>Cree categorías y añada sus productos.</h2>
            <div class="col-sm-12">
                    <a href="{{ url('producto/creargrupo') }}" class="btn btn-primary btn-lg mt-2">
                        <i class="fa fa-star"></i>  <span style="margin-left:20px; margin-right:20px">{{ __('    Crear Categorías    ') }}</span>
                    </a>
                    <a href="{{ url('producto/add')  }}" class="btn btn-secondary btn-lg mt-2 ">
                        <i class="fa fa-plus"></i> <span style="margin-left:20px; margin-right:20px">{{ __('    Añadir Productos    ') }}</span> 
                    </a>
            </div>
            <hr>
            <div style="margin-top: 20px" class="col-xl-12 col-xxl-10 d-flex">
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
                            @foreach($puestoSubcategoria->grupos as $grupos)
                            <div class="card shadow-sm bg-white">
                                <div class="card-body">
                                    <div class="col mt-0">
                                        <h5 class="card-title">{{ $grupos->name }} </h5>
                                        <div class="row align-items-center">
                                            @foreach($grupos->productos as $producto)
                                                <div class="col-12" >
                                                    <div class="row" style="border: 1px; border-color: #c5c5c5">
                                                        <div class="col-lg-3 col-12">
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
                                                        <div class="col-lg-9 col-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                                                            <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn mb-1 btn-secondary">
                                                                                <i class="fas fa-edit" title="Editar"></i><span style="margin-left: 7px; margin-right: 2px">Editar</span>
                                                                            </button></a>
                                                                            <a  href="javascript:void" onclick="$('{{'#delete-form'.$producto->id}}').submit();"><button type="button" class="btn btn-danger">
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
                                                                        </tbody>
                                                                    </table>
                                                                    <form id="{{'delete-form'.$producto->id}}" action="{{ url('/producto/'.$producto->id.'/delete') }}" method="POST" style="display: none;">
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