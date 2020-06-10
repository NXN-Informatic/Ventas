@extends('layouts.app')
@section('title', 'Mi puesto')
@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('Mis Datos') }}
            </h1>
            <div class="col text-right">
                <a href="{{ url('home') }}" class="btn btn-secondary">Regresar</a>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="_blank">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mis datos</li>
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
