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

        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-5">
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
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Prepárese para su primera venta! Siga éstas recomendaciones:</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        @if ($productocompletado->isNotEmpty())
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Sube tus productos:</strong> Ve a "Mis Puestos > Lista de Puestos" y añade productos a tu puesto virtual. 
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Sube tus productos:</strong> Ve a "Mis Puestos > Lista de Puestos" y añade productos a tu puesto virtual. 
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
                                                <strong>Crea tu puesto:</strong> Ve a "Mis Puestos > Crear Puesto" registra tu tienda y escoge el plan a tu medida.
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Crea tu puesto:</strong> Ve a "Mis Puestos > Crear Puesto" registra tu tienda y escoge el plan a tu medida.
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Crea tu puesto:</strong> Ve a "Mis Puestos > Crear Puesto" registra tu tienda y escoge el plan a tu medida.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        @if($usercompletado->completado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                
                                                <i class="far fa-fw fa-heart"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Completa tu registro:</strong> Ve a "Mis Datos" y completa la información de tu cuenta. Esto habilitará algunas funcionalidades.
                                            </div>
                                        </div>            
                                        @else
                                        <div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Completa tu registro:</strong> Ve a "Mis Datos" y completa la información de tu cuenta. Esto habilitará algunas funcionalidades.
                                            </div>
                                        </div>            
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <div class="alert alert-info alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Enlaza con FB:</strong> Ve a "Mis Puestos > Lista de Puestos" y sincroniza tu puesto con una página de Facebook. 
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="alert alert-info alert-outline-coloured alert-dismissible" role="alert">
                                            <div class="alert-icon">
                                                <i class="far fa-fw fa-hourglass"></i>
                                            </div>
                                            <div class="alert-message">
                                                <strong>Enlaza con FB:</strong> Ve a "Mis Puestos > Lista de Puestos" y sincroniza tu puesto con una página de Facebook. 
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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
