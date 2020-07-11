@extends('layouts.app')
@section('title', 'Mi puesto')
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
        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-xxl-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Configuración de Acceso') }}</h4>
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
                        <form action="{{ url('/acceso/update/'.auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <strong><label class="form-label" for="name">Email</label></strong>
                                <input type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label" for="new">Nueva Contraseña</label></strong>
                                <small class="form-text text-muted">{{ __('Ingrese su nueva contraseña. Mín 8 caracteres') }}</small>
                                <input type="password" class="form-control" name="new1">
                                <small class="form-text text-muted">{{ __('Repita su nueva contraseña.') }}</small>
                                <input type="password" class="form-control" name="new2">
                            </div>
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sizedModalSm">
                                    Actualizar datos
                                </button>
                            </div>
                            
                       <div class="modal fade" id="sizedModalSm" tabindex="-1" role="dialog" aria-hidden="true">
                           <div class="modal-dialog modal-sm" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title">Confirmar cambio</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body m-3">
                                    <strong><label class="form-label" for="mapa">Contraseña actual</label></strong>
                                        <input type="password" class="form-control" name="actual">
                                   </div>
                                   <div class="modal-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 10px; margin-right: 10px">Cambiar contraseña</span></button>
                                   </div>
                               </div>
                           </div>
                       </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection

@section('scripts')
@endsection
