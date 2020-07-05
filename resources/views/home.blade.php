@extends('layouts.app')

@section('content')
@include('layouts.partials.fbchat')
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
                    <div class="col-12">
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-primary btn-lg" style="margin-bottom: 4px"><span>Ver Mi Tienda</span></button></a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" title="Compartir"></i><span>{{ __('Compartir') }}</span></button>
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
            <div class="col-lg-7 col-12">
                <div class="card" style="height: 460px">
                    <div class="card-body">
                        <div class="col-12 text-center mt-2">
                            <h5>¡Tutorial de inicio en 3 minutos!</h5>
                        </div>
                        <div class="col-12" style="margin-top: 15px">
                            <div class="col-12 text-center mt-2">
                                <video id="myVideo" height="400px" controls>
                                    <source src="{{ asset('img/tutorial.mp4') }}" type="video/mp4">
                                    <source src="{{ asset('img/tutorial.mp4') }}" type="video/ogg">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Prepárese para su primera venta! Siga los siguientes pasos</h4>
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
                                                <div class="row"><a href="#"><h5 style="margin-left:10px"><strong> Cree su Cuenta</strong></h5></a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if ($productocompletado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('producto/lista') }}"><h5 style="margin-left:10px"><strong>  Añada sus productos</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                                Ir a <strong><a href="{{url('producto/lista') }}" style="color: #0645AD">Mi catálogo</a></strong>
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('producto/lista') }}"><h5 style="margin-left:10px"><strong>  Añada sus productos</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                                Ir a <strong><a href="{{url('producto/lista') }}" style="color: #0645AD">Mi catálogo</a></strong>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if ($personalizado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/personalizar') }}"><h5 style="margin-left:10px"><strong>  Diseñe su Tienda</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('2 min') }}</small></div>
                                                Ir a <strong><a href="{{url('puesto/personalizar') }}" style="color: #0645AD">Personalizar</a></strong>
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/personalizar') }}"><h5 style="margin-left:10px"><strong>  Diseñe su Tienda</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('2 min') }}</small></div>
                                                Ir a <strong><a href="{{url('puesto/personalizar') }}" style="color: #0645AD">Personalizar</a></strong>
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
                                                <div class="row"><a href="{{url('puesto/editar') }}"><h5 style="margin-left:10px"><strong>  Configure su Tienda</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                                Ir a <strong><a href="{{url('puesto/editar') }}" style="color: #0645AD">Configuración</a></strong>
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('puesto/editar') }}"><h5 style="margin-left:10px"><strong>  Configure su Tienda</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                                Ir a <strong><a href="{{url('puesto/editar') }}" style="color: #0645AD">Configuración</a></strong>
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
                                                <div class="row"><a href="{{url('/user') }}"><h5 style="margin-left:10px;"><strong>Complete sus Datos</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                                Ir a <strong><a href="{{url('/user') }}" style="color: #0645AD">Mi Perfil</a></strong>
                                            </div>
                                        </div>        
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message">
                                                <div class="row"><a href="{{url('/user') }}"><h5 style="margin-left:10px;"><strong>Complete sus Datos</strong></h5> </a><small style="margin-left:10px; margin-top: 0px" class="form-text text-muted">{{ __('1 min') }}</small></div>
                                                Ir a <strong><a href="{{url('/user') }}" style="color: #0645AD">Mi Perfil</a></strong>
                                            </div>
                                        </div>         
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem 1.25rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if($productocompletado and $puestocompletado and $usercompletado->completado and $personalizado)
                                            <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <div class="row"><a href="#"><h5 style="margin-left:10px"><strong>¡Listo! Empiece a vender</strong></h5> </a></div>
                                                    Ir a <strong><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" style="color: #0645AD">Ver mi Tienda</a></strong>
                                                </div>
                                            </div>
                                        @else
                                            <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon" style="background-color: #999999">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message">
                                                    <div class="row"><a href="#"><h5 style="margin-left:10px"><strong>¡Listo! Empiece a vender.</strong></h5> </a></div>
                                                    Ir a <strong><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" style="color: #0645AD">Ver mi Tienda</a></strong>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
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
                                    <div class="fb-group text-center" 
                                        data-href="https://web.facebook.com/groups/ferialocal" 
                                        data-width="280px" 
                                        data-show-social-context="true" 
                                        data-show-metadata="false">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center mt-2">
                                <h5>Amplía tu catálogo de 10 a 20 productos:</h5>
                            </div>
                            <div class="col-12" style="margin-top: 15px">
                                <div class="col-12 text-center mt-2">
                                    <span style="margin-bottom: 7px" class="form-text text-muted">{{ __('Comparte FeriaTacna a 2 vendedores.') }}</span>
                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/register">
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
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=51948588436&text=Hola%20FeriaTacna!%20Tengo%20la%20siguiente consulta...">
                                        <button class="btn mb-1 btn-success btn-lg"><i class="align-left fab fa-whatsapp" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Feria Tacna    ') }}</span></button>
                                    </a>
                                    <small class="form-text text-muted">{{ __('Estamos dispuestos a ayudarte') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Formulario de Usuario -->
            
            <!-- Vista de Usuario -->
            
            <!-- End Vista de Usuario -->
        </div>
    </div>
    
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0&appId=275883813530902&autoLogAppEvents=1" nonce="GmREFXbv"></script>

    
@endsection
