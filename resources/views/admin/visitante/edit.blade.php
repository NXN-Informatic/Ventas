@extends('layouts.app')

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Administración') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mis Visitantes') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Editar Visitante') }} - {{ $visitante->ip }}</h5>
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
                        <form action="{{ url('visitante/'.$visitante->id.'/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="ip">Ip del visitante</label>
                                <input type="text" class="form-control" name="ip" value="{{ old('ip', $visitante->ip) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sessionid">Sesión ID del visitante</label>
                                <input type="text" class="form-control" name="sessionid" value="{{ old('sessionid', $visitante->sessionid) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="latitud">Latitud del visitante</label>
                                <input type="text" class="form-control" name="latitud" value="{{ old('latitud', $visitante->latitud) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="longitud">Longitud del visitante</label>
                                <input type="text" class="form-control" name="longitud" value="{{ old('longitud', $visitante->longitud) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="useragent">User Agente del visitante</label>
                                <input type="text" class="form-control" name="useragent" value="{{ old('useragent', $visitante->useragent) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Usuario -->
        </div>
    </div>
</main>

@include('layouts.partials.footer')
@endsection

