@extends('layouts.app')
@section('title','Editar Puesto')
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
                    <div class="card">
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 83px; margin-right: 83px">Guardar datos</span></button>
                        </div>
                    </div>
                </div>
                <!-- End Formulario de Usuario -->
            </div>
        </form>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')

@endsection
