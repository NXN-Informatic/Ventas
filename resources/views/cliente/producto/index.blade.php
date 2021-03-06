@extends('layouts.app')
@section('title','Mis Productos')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
    
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
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="background-color:#fff;border: 6px solid #fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <span class="header-title bold16">
                        {{ auth()->user()->usuario_puestos->first()->puesto->name }}
                    </span>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span class="regular11" style="color: #ffffff70">{{'Miembro desde '.auth()->user()->usuario_puestos->first()->puesto->created_at->format('M, Y')}}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
		</div>
        @if (session('notification'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <i class="far fa-fw fa-bell"></i>
                </div>
                <div class="alert-message">
                    <strong>{{ session('notification') }}</strong>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-sm-12" style="padding-top: 0px">
                <div class="card">
                    <div class="card-header">
                        <span class="bold15">{{ __('Mis Productos') }}</span>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: -20px;">
                            <a href="{{ url('producto/add')  }}" class="btn btn-primary btn-pill">
                                <i class="fa fa-plus"></i> <span class="medium11">{{ __('NUEVO PRODUCTO') }}</span> 
                            </a>
                            <a href="{{ url('producto/creargrupo') }}" class="btn btn-info btn-pill" style="border: 1px solid #bf0000">
                                <span class="medium11" style="color: #bf0000;">{{ __('    CREAR CATEGORIA    ') }}</span>
                            </a>
                        </div>
                        <br>
                        <ul class="nav nav-pills card-header-pills pull-right" role="tablist">
                            @foreach($puestoSubcategorias as $puestoSubcategoria)
                                @foreach($puestoSubcategoria->grupos as $grupos)
                                    @if($puestoSubcategoria->grupos->first()->id == $grupos->id)
                                        <li class="nav-itemr">
                                            <a class="nav-link active medium11" data-toggle="tab" href="{{'#tab-'.$grupos->id}}">{{ $grupos->name }}</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link medium11" data-toggle="tab" href="{{'#tab-'.$grupos->id}}">{{ $grupos->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                            <a class="btn btn btn-outline-primary" style="margin-left:3px;border:0px" href="{{ url('categorias/editar') }}"><i class="fa fa-edit"></i></a>
                        </ul>
                        <br>
                        <div class="tab-content">
                            @foreach($puestoSubcategorias as $puestoSubcategoria)
                                @foreach($puestoSubcategoria->grupos as $grupos)
                                    @if($puestoSubcategoria->grupos->first()->id == $grupos->id)
                                        <div class="tab-pane fade show active" id="{{'tab-'.$grupos->id}}" role="tabpanel">
                                            <div class="row">
                                                @foreach($grupos->productos as $producto)
                                                    <div class="col-lg-4 col-sm-6 col-12" style="background: #fff;padding:20px;">
                                                        <div class="row shad" style="border-radius:10px">
                                                            <div class="col-lg-5 col-sm-12 col-12" style="padding-left: 5px;padding-right:5px">
                                                                @if(count($producto->imagen_productos) > 0)
                                                                    <div class="swiper-container">
                                                                        <div class="swiper-wrapper" >
                                                                            @foreach($producto->imagen_productos as $imagenes)
                                                                                <div class="swiper-slide text-center" style="width: 100%; height: 240px;">
                                                                                    <a href="#">
                                                                                        <img src="{{ asset('storage/'.$usuarioPuesto->puesto_id.'/'.$producto->id.'/'.$imagenes->imagen) }}" alt="Feria Tacna" width="auto" height="auto" style="border: 5px solid #fff;max-height: 100%;
                                                                                        max-width: 100%;
                                                                                        height: auto;
                                                                                        position: absolute;
                                                                                        top: 0;
                                                                                        bottom: 0;
                                                                                        left: 0;
                                                                                        right: 0;
                                                                                        margin: auto;">
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="custom-control custom-switch" style="position: absolute;
                                                                        top: 5%;
                                                                        right: 1%;
                                                                        border: none;
                                                                        cursor: pointer;
                                                                        text-align: center;z-index:12">
                                                                            <input id= "{{'prod'.$producto->id}}" data-id="{{$producto->id}}" onchange="myFunction({{$producto->id}})" value = {{$producto->activo}} class="custom-control-input" type="checkbox" {{ $producto->activo ? 'checked' : '' }}>
                                                                            <label class="custom-control-label" for="{{'prod'.$producto->id}}" style="margin-left: 10px"></label>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-7 col-sm-12 col-12" style="margin: auto">
                                                                <div class="col-lg-12 text-center">
                                                                    <p class="text-primary" style="font-size: 14px; margin-top:0px">{{$producto->name}}</p>
                                                                    <p class="text-primary" style="font-size: 18px; margin-top:-15px">S/. {{$producto->precio}}</p>
                                                                </div>
                                                                <div class="col-lg-12 text-center" style="margin-top:-15px;">
                                                                    <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn btn-secondary btn-pill" style="margin-top: 0px; margin-left: 2px">
                                                                        <i class="fas fa-pen" title="Editar"></i>
                                                                    </button></a>
                                                                    <a  href="javascript:void" onclick="$('{{'#delete-form'.$producto->id}}').submit();"><button type="button" class="btn btn-danger btn-pill" style="margin-top: 0px; margin-left: 4px">
                                                                        <i class="fas fa-times" title="Eliminar"></i>
                                                                    </button></a>
                                                                </div>
                                                                <form id="{{'delete-form'.$producto->id}}" action="{{ url('/producto/'.$producto->id.'/delete') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->puesto_id }}">
                                                                </form>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                    <div class="tab-pane fade" id="{{'tab-'.$grupos->id}}" role="tabpanel">
                                        <div class="row">
                                            @foreach($grupos->productos as $producto)
                                                <div class="col-lg-4 col-sm-6 col-12 " style="background: #fff;padding:20px;">
                                                    <div class="row shad" style="border-radius:10px">
                                                        <div class="col-lg-5 col-sm-12 col-12" style="padding-left: 5px;padding-right:5px">
                                                            @if(count($producto->imagen_productos) > 0)
                                                                <div class="swiper-container">
                                                                    <div class="swiper-wrapper" >
                                                                        @foreach($producto->imagen_productos as $imagenes)
                                                                            <div class="swiper-slide text-center" style="width: 100%; height: 240px;">
                                                                                <a href="#">
                                                                                    <img src="{{ asset('storage/'.$usuarioPuesto->puesto_id.'/'.$producto->id.'/'.$imagenes->imagen) }}" alt="Feria Tacna" width="auto" height="auto" style="border: 5px solid #fff;max-height: 100%;
                                                                                    max-width: 100%;
                                                                                    height: auto;
                                                                                    position: absolute;
                                                                                    top: 0;
                                                                                    bottom: 0;
                                                                                    left: 0;
                                                                                    right: 0;
                                                                                    margin: auto;">
                                                                                </a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="custom-control custom-switch" style="position: absolute;
                                                                    top: 5%;
                                                                    right: 1%;
                                                                    border: none;
                                                                    cursor: pointer;
                                                                    text-align: center;z-index:12">
                                                                        <input id= "{{'prod'.$producto->id}}" data-id="{{$producto->id}}" onchange="myFunction({{$producto->id}})" value = {{$producto->activo}} class="custom-control-input" type="checkbox" {{ $producto->activo ? 'checked' : '' }}>
                                                                        <label class="custom-control-label" for="{{'prod'.$producto->id}}" style="margin-left: 10px"></label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-7 col-sm-12 col-12" style="margin: auto">
                                                            <div class="col-lg-12 text-center">
                                                                <p class="text-primary" style="font-size: 14px; margin-top:0px">{{$producto->name}}</p>
                                                                <p class="text-primary" style="font-size: 18px; margin-top:-15px">S/. {{$producto->precio}}</p>
                                                            </div>
                                                            <div class="col-lg-12 text-center" style="margin-top:-15px;">
                                                                <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn btn-secondary btn-pill" style="margin-top: 0px; margin-left: 2px">
                                                                    <i class="fas fa-pen" title="Editar"></i>
                                                                </button></a>
                                                                <a  href="javascript:void" onclick="$('{{'#delete-form'.$producto->id}}').submit();"><button type="button" class="btn btn-danger btn-pill" style="margin-top: 0px; margin-left: 4px">
                                                                    <i class="fas fa-times" title="Eliminar"></i>
                                                                </button></a>
                                                            </div>
                                                            <form id="{{'delete-form'.$producto->id}}" action="{{ url('/producto/'.$producto->id.'/delete') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->puesto_id }}">
                                                            </form>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
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

<script>
    function myFunction(id) {
   
          var value = document.getElementById("prod" + id).value;
          if (value == 1){
              document.getElementById("prod" + id).value = 0;
          }
          if (value == 0){         
              document.getElementById("prod" + id).value = 1;
          }
      
          var producto_id = id;
          var activo = document.getElementById("prod" + id).value;
  
  
          $.ajax({
              method: 'POST', // Type of response and matches what we said in the route
              url: '/producto/switch/'+producto_id, // This is the url we gave in the route
              data: {
              'company_id' : producto_id, 
              'value' : activo,
              _token: '{{csrf_token()}}',
              
              },

              success: function(response){ 
                  console.log(response); 
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.log(JSON.stringify(jqXHR));
                  console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              }
          });
      }
  </script>
   
@endsection