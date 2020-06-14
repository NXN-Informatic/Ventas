@extends('layouts.app')
@section('title','Editar Puesto')
@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('Mi Tienda') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="_blank">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contacto</li>
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
        <form action="{{ url('/puesto/contacto/update/'.$puesto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Formulario de Usuario -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Información de Contacto de tu Tienda') }}</h4>
                        </div>
                        
                        <div class="col text-right">
                            <a href="{{ url('home') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>{{ $errors->first() }}</strong>
                                </div>
                            </div>
                            @endif
                            @if (session('notification'))
                            <div class="alert alert-primary alert-dismissible" role="alert">
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
                            
                            <div class="form-group">
                                <strong><label class="form-label" for="contacto">¿A qué número(s) llamarán tus clientes?</label></strong>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Celular 1') }}</small>
                                        <input type="text" class="form-control form-control-lg" name="phone" value="{{ old('phone', $puesto->phone) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Celular 2') }}</small>
                                        <input type="text" class="form-control form-control-lg" name="phone2" value="{{ old('phone2', $puesto->phone2) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label" for="contacto">¿A qué número te contactarán por WhatsApp?</label></strong>
                                <input type="text" class="form-control form-control-lg" name="wsp" value="{{ old('wsp', $puesto->wsp) }}">
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label">Página de Facebook</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Ingrese la dirección url de su Página de Facebook. (Ej. https://www.facebook.com/FeriaTacnaOficial)') }}</small>
                                <input style="margin-top:7px" type="text" class="form-control form-control-lg" name="fbpage" value="{{ old('fbpageid', $puesto->fbpage) }}">
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label">¿Mostrar chat de Facebook?</label></strong>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sizedModalSm">
                                    Activar
                                </button>
                                <div class="modal fade" id="sizedModalSm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Active el Chat de Messenger en solo 2 pasos!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <div class="form-group">
                                                    @if($puesto->fbpage)
                                                        <label class="form-label">Paso 1: Visita éste <a href="{{url($puesto->fbpage.'/settings/?tab=messenger_platform')}}" target="_blank"><span style="font-size: 18px"><u>enlace</u></span></a> y en <strong>"Dominios Admitidos"</strong> agrega <strong>"https://www.feriatacna.com"</strong></label>
                                                    @else
                                                        <label class="form-label">Paso 1: Ingresa como Administrador a tu página de FB. Ve a <strong><i>Configuración de Página / Mensajería avanzada</i></strong> y en <strong><i>"Dominios Admitidos"</i></strong> agrega <strong>"https://www.feriatacna.com" (sin comillas)</strong></label>
                                                    @endif
                                                    <br>
                                                    <label class="form-label">Paso 2: Ingresa tu Page-Id de Facebook. Si no lo tienes, consíguelo <strong><a href="https://www.bufa.es/id-pagina-facebook/" target="_blank">AQUÍ</a></strong></label>
                                                    <input style="margin-top:7px" type="text" class="form-control form-control-lg" name="fbpageid" value="{{ old('fbpageid', $puesto->fbpageid) }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Formulario de Usuario -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 83px; margin-right: 83px">Guardar datos</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')

@endsection
