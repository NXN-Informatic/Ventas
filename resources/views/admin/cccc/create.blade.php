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
                <li class="breadcrumb-item active" aria-current="page">{{ __('Regiones') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Crear Usuario') }}</h5>
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
                        <form action="{{ url('cccc/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre de CentroComercial</label>
                                <input type="text" class="form-control" name="nombre">
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="descripcion">Descripcion de centro comercial</label>
                                <textarea name="descripcion" data-provide="markdown" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="imagena">Banner</label>
                                <input type="file" class="form-control-file" name="imagena">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="imagenb">Logo</label>
                                <input type="file" class="form-control-file" name="imagenb">
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


