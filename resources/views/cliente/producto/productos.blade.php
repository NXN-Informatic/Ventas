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
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-4">
                    @if(auth()->user()->usuario_puestos->first()->puesto->perfil)
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="border: 6px solid #fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <h1 style="font-size: 20px" class="header-title">
                        {{ auth()->user()->usuario_puestos->first()->puesto->name }}
                    </h1>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span style="color: #ffffff70">{{'Miembro desde '.auth()->user()->usuario_puestos->first()->puesto->created_at->format('M, Y')}}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
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
