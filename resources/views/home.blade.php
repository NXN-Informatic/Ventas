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
                <div class="row">
                    <div class="col-6">
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-info btn-lg" ><span style="margin-left:20px; margin-right:20px">      Ver mi Tienda      </span></button></a>
                    </div>
                    <div class="col-6">
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Compartir   ') }}</span></button>
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
        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-lg-5 col-12">
                @foreach($usuarios_puestos as $usuarios_puesto)
                @endforeach
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>Bandeja de entrada</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <span>Gracias por formar parte de FeriaTacna. Siga nuestras recomendaciones para empezar.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>¿Quieres mejorar el comercio en Tacna?</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ $usuarios_puesto->puesto->id }}/detail">
                                        <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Unirse    ') }}</span></button>
                                    </a>
                                    <small class="form-text text-muted">{{ __('Unase a nuestro grupo cerrado en Facebook.') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>Amplía tu catálogo de 20 a 35 productos:</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <span style="margin-bottom: 7px" class="form-text text-muted">{{ __('Comparte FeriaTacna y etiqueta a 2 vendedores.') }}</span>
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com">
                                        <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Compartir    ') }}</span></button>
                                    </a>
                                    
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
                        <!--<h4>Prepárese para su primera venta! Siga nuestras recomendaciones:</h4>-->
                    </div>
                    <div class="card-body">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="#"><h5 style="margin-left:10px"><strong>  Cree su Cuenta</strong></h5> </a><small style="margin-left:30px" class="form-text text-muted">{{ __('    Completado') }}</small></div>
                                                Siga los siguientes pasos.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if ($productocompletado->isNotEmpty())
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('producto/lista') }}"><h5 style="margin-left:10px"><strong>  Añada sus productos o servicios</strong></h5> </a><small style="margin-left:30px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Cree sus primeras categorias y registre sus primeros productos, nombres e imágenes.
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('producto/lista') }}"><h5 style="margin-left:10px"><strong>  Añada sus productos o servicios</strong></h5> </a><small style="margin-left:30px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Cree sus primeras categorias y registre sus primeros productos, nombres e imágenes.
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if ($puestocompletado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/personalizar') }}"><h5 style="margin-left:10px"><strong>  Diseñe su Tienda</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Personalice su tienda para conseguir más ventas, con sus propios banners, la descripción de su negocio y de usted como emprendedor.
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/personalizar') }}"><h5 style="margin-left:10px"><strong>  Diseñe su Tienda</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('     Estimación: 5 min') }}</small></div>
                                                Personalice su tienda para conseguir más ventas, con sus propios banners, la descripción de su negocio y de usted como emprendedor.
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if($usercompletado->completado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" >
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('/user') }}"><h5 style="margin-left:10px"><strong>Ingrese sus datos de propietario</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 1 min') }}</small></div>
                                                Complete su identificación y genere mayor confianza en sus clientes.
                                            </div>
                                        </div>        
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('/user') }}"><h5 style="margin-left:10px"><strong>Ingrese sus datos de propietario</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 1 min') }}</small></div>
                                                Complete su identificación y genere mayor confianza en sus clientes.
                                            </div>
                                        </div>         
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if($fbconectado)
                                            <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <div class="row"><a href="{{url('puesto/canales') }}"><h5 style="margin-left:10px"><strong>Conecte su tienda a su página de facebook.</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 5 min') }}</small></div>
                                                    (Opcional) Sincronice su catálogo con su página de facebook automáticamente y expanda su negocio a más canales de venta.
                                                </div>
                                            </div>
                                        @else
                                            <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon" style="background-color: #999999">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <div class="row"><a href="{{url('puesto/canales') }}"><h5 style="margin-left:10px"><strong>Conecte su tienda a su página de facebook.</strong></h5> </a><small style="margin-left:20px" class="form-text text-muted">{{ __('Estimación: 5 min') }}</small></div>
                                                    (Opcional) Sincronice su catálogo con su página de facebook automáticamente y expanda su negocio a más canales de venta.
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if($productocompletado->isNotEmpty() and $puestocompletado and $usercompletado->completado and $fbconectado)
                                            <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <div class="row"><a href="#"><h5 style="margin-left:10px"><strong>¡Listo! Empiece a vender. Comparta su tienda con sus clientes.</strong></h5> </a></div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon" style="background-color: #999999">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <div class="row"><a href="#"><h5 style="margin-left:10px"><strong>¡Listo! Empiece a vender. Comparta su tienda con sus clientes.</strong></h5> </a></div>
                                                </div>
                                            </div>
                                        @endif
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
