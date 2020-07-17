@extends('layouts.app')

@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
@section('title','Panel de Administración')
  
<main class="content">
    <div class="container-fluid">
        <div class="header">
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-4">
                    @if(auth()->user()->usuario_puestos->first()->puesto->perfil)
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2 shad" style="border: 6px solid #fff; background-color:#fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <span class="bold16" style="color: #fff">
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
            <div class="row">
                <div class="col-12" style="margin-top: 3px">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-pill btn-primary" style="margin-bottom: 0px"><strong><span class="medium11">MI TIENDA</span></strong></button></a>
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                        <button class="btn btn-pill btn-info" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" style="color: #bf0000" title="Compartir"></i><strong><span class="medium11" style="margin-left:3px;color: #bf0000">{{ __('COMPARTIR') }}</span></strong></button>
                    </a>
                </div>
            </div>
		</div>
        @if (session('notification'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-icon">
                    <i class="far fa-fw fa-bell"></i>
                </div>
                <div class="alert-message">
                    <strong class="light10">{{ session('notification') }}</strong>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="row" >
            <div class="col-lg-7 col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="bold12">NUESTRAS RECOMENDACIONES</span>
                    </div>
                    <div class="card-body" style="padding-top: 0px">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="padding: .2rem; border: 0px solid rgba(155, 80, 80, 0.125)">
                                        @if ($productocompletado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px;"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message"  style="padding: 3px;">
                                                <div class="row "><a href="{{url('producto/lista') }}"><span class="medium11" style="margin-left:20px; color:#000">!Suba sus primeros productos!</span> </a></div>
                                                <span class="light11" style="margin-left:10px">Puede ir al menú <a href="{{url('producto/lista') }}" style="color: #4447ff">Mis Productos</a> para agregar o editar sus productos.</span>
                                                <a href="{{url('producto/lista') }}"><span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #ff1a00"><i class="fas fa-fw fa-caret-right"></i></span></a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message"  style="padding: 3px;">
                                                <div class="row "><a href="{{url('producto/lista') }}"><span class="medium11" style="margin-left:20px; color:#000">!Suba sus primeros productos!</span> </a></div>
                                                <span class="light11" style="margin-left:10px">Puede ir al menú <a href="{{url('producto/lista') }}" style="color: #4447ff">Mis Productos</a> para agregar o editar sus productos.</span>
                                                <a href="{{url('producto/lista') }}"><span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #999999"><i class="fas fa-fw fa-caret-right"></i></span></a>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if ($personalizado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message"  style="padding: 3px;">
                                                <div class="row "><a href="{{url('puesto/personalizar') }}"><span class="medium11" style="margin-left:20px; color:#000">!Suba su logo!</span> </a></div>
                                                <span class="light11" style="margin-left:10px">Puede ir al menú <a href="{{url('puesto/personalizar') }}" style="color: #4447ff">Personalizar</a> y subir su logo y portada.</span>
                                                <a href="{{url('puesto/personalizar') }}"><span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #ff1a00"><i class="fas fa-fw fa-caret-right"></i></span></a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px"  role="alert">
                                            <div class="alert-icon" style="background-color: #999999">
                                                <i class="fas fa-fw fa-check"></i>
                                            </div>
                                            <div class="alert-message"  style="padding: 3px;">
                                                <div class="row "><a href="{{url('puesto/personalizar') }}"><span class="medium11" style="margin-left:20px; color:#000">!Suba su logo!</span> </a></div>
                                                <span class="light11" style="margin-left:10px">Puede ir al menú <a href="{{url('puesto/personalizar') }}" style="color: #4447ff">Personalizar</a> y subir su logo y portada.</span>
                                                <a href="{{url('puesto/personalizar') }}"><span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #999999"><i class="fas fa-fw fa-caret-right"></i></span></a>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    <li class="list-group-item" style="padding: .2rem; border: 0px solid rgba(0, 0, 0, .125);">
                                        @if($productocompletado and $personalizado)
                                            <div class="alert alert-success alert-outline-coloured alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message"  style="padding: 3px;">
                                                    <div class="row "><a href="{{url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail') }}"><span class="medium11" style="margin-left:20px; color:#000">!Listo!</span> </a></div>
                                                    <span class="light11" style="margin-left:10px">Ya puede <a href="{{url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail') }}" style="color: #4447ff">ver su tienda</a>, ¡Compártalo con sus clientes!</span>
                                                    <a href="{{url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail') }}"><span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #ff1a00"><i class="fas fa-fw fa-caret-right"></i></span></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="alert alert-warning alert-outline alert-dismissible" style="margin-top: 0px; margin-bottom: 0px" role="alert">
                                                <div class="alert-icon" style="background-color: #999999">
                                                    <i class="fas fa-fw fa-check"></i>
                                                </div>
                                                <div class="alert-message"  style="padding: 3px;">
                                                    <div class="row "><a href="{{url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail') }}"><span class="medium11" style="margin-left:20px; color:#000">!Listo!</span> </a></div>
                                                    <span class="light11" style="margin-left:10px">Ya puede <a href="{{url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail') }}" style="color: #4447ff">ver su tienda</a>, ¡Compártalo con sus clientes!</span>
                                                    <a href="{{url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail') }}"><span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #999999"><i class="fas fa-fw fa-caret-right"></i></span></a>
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
                            <span class="bold12">BANDEJA DE ENTRADA</span>
                        </div>
                        <div class="col-12" style="margin-top: 15px">
                            <div class="col-12 text-center mt-2">
                                <span class="regular12">Gracias por formar parte de FeriaTacna. Siga nuestras recomendaciones para empezar.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 text-center mt-2">
                            <span class="bold12">¿QUIERES MEJORAR EL COMERCIO EN TACNA?</span>
                        </div>
                        <div class="col-12" style="margin-top: 15px">
                            <div class="col-12 text-center mt-2">
                                <div class="fb-group text-center" 
                                    data-href="https://web.facebook.com/groups/ferialocal" 
                                    data-width="200px" 
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
                            <span class="bold12">AMPLÍA TU CATÁLOGO DE 10 A 15 PRODUCTOS</span>
                        </div>
                        <div class="col-12" style="margin-top: 15px">
                            <div class="col-12 text-center mt-2">
                                <span style="margin-bottom: 7px" class="light12">{{ __('Comparte FeriaTacna a 2 vendedores.') }}</span>
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/register">
                                    <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span class="medium11" style="margin-left:20px; margin-right:20px">{{ __('    Compartir    ') }}</span></button>
                                </a>
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
