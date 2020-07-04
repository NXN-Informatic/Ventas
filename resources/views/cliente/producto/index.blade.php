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
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-primary btn-lg" style="margin-bottom: 4px"><span style="margin-left:10px; margin-right:10px">Ver Mi Tienda</span></button></a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:10px; margin-right:10px">{{ __('Compartir') }}</span></button>
                        </a>
                    </div>
                </div>
            </nav>
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
            <h2>Cree categorías y añada sus productos.</h2>
            <div class="col-sm-12">
                    <a href="{{ url('producto/creargrupo') }}" class="btn btn-primary btn-lg mt-2">
                        <i class="fa fa-star"></i>  <span style="margin-left:20px; margin-right:20px">{{ __('    Crear Categorías    ') }}</span>
                    </a>
                    <a href="{{ url('categoria/editar') }}" class="btn btn-info btn-lg mt-2">
                        <i class="fa fa-edit"></i>  <span style="margin-left:20px; margin-right:20px">{{ __('    Editar Categorías    ') }}</span>
                    </a>
                    <a href="{{ url('producto/add')  }}" class="btn btn-secondary btn-lg mt-2 ">
                        <i class="fa fa-plus"></i> <span style="margin-left:20px; margin-right:20px">{{ __('    Añadir Productos    ') }}</span> 
                    </a>
            </div>
            <hr>
            <div class="col-lg-12 col-sm-12" style="padding-top: 20px">
                @foreach($puestoSubcategorias as $puestoSubcategoria)
                    <div class="card">
                        <div class="card-header">
                            <h2>{{ $puestoSubcategoria->subcategoria->name }} </h2>
                            <ul class="nav nav-pills card-header-pills pull-right" role="tablist">
                                @foreach($puestoSubcategoria->grupos as $grupos)
                                    @if($puestoSubcategoria->grupos->first()->id == $grupos->id)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="{{'#tab-'.$grupos->id}}">{{ $grupos->name }}</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="{{'#tab-'.$grupos->id}}">{{ $grupos->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body" style="background: #f5f5f5">
                            <div class="tab-content">
                                @foreach($puestoSubcategoria->grupos as $grupos)
                                    @if($puestoSubcategoria->grupos->first()->id == $grupos->id)
                                        <div class="tab-pane fade show active" id="{{'tab-'.$grupos->id}}" role="tabpanel">
                                            <div class="row">
                                                @foreach($grupos->productos as $producto)
                                                    <div class="col-lg-6 col-sm-12" style="background: #fff">
                                                        <div class="row">
                                                            <div class="col-lg-5 col-sm-6">
                                                                @if(count($producto->imagen_productos) > 0)
                                                                    <div class="swiper-container">
                                                                        <div class="swiper-wrapper">
                                                                            @foreach($producto->imagen_productos as $imagenes)
                                                                                <div class="swiper-slide text-center">
                                                                                    <a href="#">
                                                                                        <img src="{{ asset('storage/'.$usuarioPuesto->puesto_id.'/'.$producto->id.'/'.$imagenes->imagen) }}" class="card-img-top mt-2" alt="Feria Tacna" style="width: 130px; height: 130px">
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-7 col-sm-12">
                                                                    <div class="col-lg-12 text-center">
                                                                        <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn mb-1 btn-secondary" style="margin-top: 7px; margin-left: 2px">
                                                                            <i class="fas fa-edit" title="Editar"></i><span style="margin-left: 7px; margin-right: 2px">Editar</span>
                                                                        </button></a>
                                                                        <a  href="javascript:void" onclick="$('{{'#delete-form'.$producto->id}}').submit();"><button type="button" class="btn btn-danger" style="margin-top: 3px; margin-left: 4px">
                                                                            <i class="fas fa-times" title="Eliminar"></i>
                                                                        </button></a>
                                                                    </div>
                                                                        
                                                                <div class="row">
                                                                    <table class="table table-sm my-2">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>Publicar</th>
                                                                                <td class="custom-control custom-switch">
                                                                                    <input id= "{{'prod'.$producto->id}}" data-id="{{$producto->id}}" onchange="myFunction({{$producto->id}})" value = {{$producto->activo}} class="custom-control-input" type="checkbox" {{ $producto->activo ? 'checked' : '' }}>
                                                                                    <label class="custom-control-label" for="{{'prod'.$producto->id}}" style="margin-left: 10px"></label>
                                                                                 </td>
                                                                            </tr>
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
                                                                </div>
                                                                <form id="{{'delete-form'.$producto->id}}" action="{{ url('/producto/'.$producto->id.'/delete') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->puesto_id }}">
                                                                </form>
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
                                                <div class="col-lg-6 col-sm-12" style="background: #fff">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-6">
                                                            @if(count($producto->imagen_productos) > 0)
                                                                <div class="swiper-container">
                                                                    <div class="swiper-wrapper">
                                                                        @foreach($producto->imagen_productos as $imagenes)
                                                                            <div class="swiper-slide text-center">
                                                                                <a href="#">
                                                                                    <img src="{{ asset('storage/'.$usuarioPuesto->puesto_id.'/'.$producto->id.'/'.$imagenes->imagen) }}" class="card-img-top mt-2" alt="Feria Tacna" style="width: 130px; height: 130px">
                                                                                </a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-7 col-sm-6">
                                                            <div class="col-12 text-right">
                                                                <div class="custom-control custom-switch">
                                                                    <input id= "{{'prod'.$producto->id}}" data-id="{{$producto->id}}" onchange="myFunction({{$producto->id}})" value = {{$producto->activo}} class="custom-control-input" type="checkbox" {{ $producto->activo ? 'checked' : '' }}>
                                                                    <label class="custom-control-label" for="{{'prod'.$producto->id}}">Publicar</label>
                                                                </div>
                                                                <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn mb-1 btn-secondary" style="margin-top: 7px">
                                                                    <i class="fas fa-edit" title="Editar"></i><span style="margin-left: 7px; margin-right: 2px">Editar</span>
                                                                </button></a>
                                                                <a  href="javascript:void" onclick="$('{{'#delete-form'.$producto->id}}').submit();"><button type="button" class="btn btn-danger" style="margin-top: 7px">
                                                                    <i class="fas fa-times" title="Eliminar"></i>
                                                                </button></a>
                                                            </div>
                                                            <div class="row">
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
                                                            </div>
                                                            <form id="{{'delete-form'.$producto->id}}" action="{{ url('/producto/'.$producto->id.'/delete') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->puesto_id }}">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
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