@extends('layouts.app')

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
@section('title','Panel de Administración')
    
<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('¡Saludos!') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                </ol>
                <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-info" ><span style="margin-left:20px; margin-right:20px">      Ver mi Tienda      </span></button></a>
                
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
        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-lg-5 col-12">
                @foreach($usuarios_puestos as $usuarios_puesto)
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>Comparta su Tienda con sus clientes</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ $usuarios_puesto->puesto->id }}/detail">
                                        <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Compartir    ') }}</span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>Únete a nuestra Comunidad y mejora tus ventas</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ $usuarios_puesto->puesto->id }}/detail">
                                        <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Unirse    ') }}</span></button>
                                    </a>
                                    <small class="form-text text-muted">{{ __('Unase a nuestro grupo cerrado en Facebook ""') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>¿Quieres hacernos una consulta?</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ $usuarios_puesto->puesto->id }}/detail">
                                        <button class="btn mb-1 btn-success btn-lg"><i class="align-left fab fa-whatsapp" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    948588436    ') }}</span></button>
                                    </a>
                                    <small class="form-text text-muted">{{ __('Estamos dispuestos a ayudarte') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
            <!-- End Formulario de Usuario -->
            
            <!-- Vista de Usuario -->
            <div class="col-lg-7 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Prepárese para su primera venta! Siga éstas recomendaciones:</h4>
                    </div>
                    <div class="card-body">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        @if ($productocompletado->isNotEmpty())
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('producto/lista') }}"><h5 style="margin-left:10px"><strong>  Añada sus productos o servicios</strong></h5> </a><small style="margin-left:30px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Cree sus primeras categorias y registre sus primeros productos, nombres e imágenes.
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('producto/lista') }}"><h5 style="margin-left:10px"><strong>  Añada sus productos o servicios</strong></h5> </a><small style="margin-left:30px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Cree sus primeras categorias y registre sus primeros productos, nombres e imágenes.
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        @if ($puestocompletado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/editar') }}"><h5 style="margin-left:10px"><strong>  Ingrese información de su Tienda</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('     Estimación: 1 min') }}</small></div>
                                                Complete datos importantes como su ubicación, métodos de envío, formas de pago y más.
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/editar') }}"><h5 style="margin-left:10px"><strong>  Ingrese información de su Tienda</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('     Estimación: 1 min') }}</small></div>
                                                Complete datos importantes como su ubicación, métodos de envío, formas de pago y más.
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        @if ($puestocompletado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/personalizar') }}"><h5 style="margin-left:10px"><strong>  Diseñe su Tienda</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Personalice su tienda para conseguir más ventas, con sus propios banners, la descripción de su negocio y de usted como emprendedor.
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/personalizar') }}"><h5 style="margin-left:10px"><strong>  Diseñe su Tienda</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Personalice su tienda para conseguir más ventas, con sus propios banners, la descripción de su negocio y de usted como emprendedor.
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        @if($usercompletado->completado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('/user') }}"><h5 style="margin-left:10px"><strong>Ingrese sus datos de propietario</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 1 min') }}</small></div>
                                                Complete su identificación y genere mayor confianza en sus clientes.
                                            </div>
                                        </div>        
                                        @else
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('/user') }}"><h5 style="margin-left:10px"><strong>Ingrese sus datos de propietario</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 1 min') }}</small></div>
                                                Complete su identificación y genere mayor confianza en sus clientes.
                                            </div>
                                        </div>         
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/fbcatalogo') }}"><h5 style="margin-left:10px"><strong>Conecte su tienda a su página de facebook.</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 5 min') }}</small></div>
                                                (Opcional) Sincronice su catálogo con su página de facebook automáticamente y expanda su negocio a más canales de venta.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="#"><h5 style="margin-left:10px"><strong>¡Listo! Empiece a vender. Comparta su tienda con sus clientes.</strong></h5> </a></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
            <!-- End Vista de Usuario -->
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection
