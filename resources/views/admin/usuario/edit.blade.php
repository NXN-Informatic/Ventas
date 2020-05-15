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
                        <h5 class="card-title mb-0">{{ __('Editar Usuario') }} - {{ $usuario->name }}</h5>
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
                        <form action="{{ url('usuarios/'.$usuario->id.'/update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre de Usuario</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $usuario->name) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sur_name">Apellido de Usuario</label>
                                <input type="text" class="form-control" name="sur_name" value="{{ old('sur_name', $usuario->sur_name) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email de Usuario</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $usuario->email) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="maxpuestos">Número de Puestos</label>
                                <input type="number" class="form-control" name="maxpuestos" value="{{ old('maxpuestos', $usuario->maxpuestos) }}">
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione su Rol</label>
                               <div class="mb-3">
								<select class="form-control" id="role" name="role" required>
                                    <optgroup label="Paises Disponibles">
                                    <option value="Cliente" 
                                        @if($usuario->role == "Cliente") selected @endif>{{ __('Cliente') }}</option>
                                    <option value="Admin" 
                                        @if($usuario->role == "Admin") selected @endif>{{ __('Admin') }}</option>
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione su Tipo de Identificación</label>
                               <div class="mb-3">
								<select class="form-control select2" id="identidad_id" name="identidad_id" data-toggle="select2" required>
                                    <optgroup label="Paises Disponibles">
                                    @foreach($identidades as $identidad)
                                        <option value="{{ $identidad->id }}" 
                                            @if($usuario->identidad_id == $identidad->id) selected @endif>{{ $identidad->name }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="ndocumento">Número de Documento</label>
                                <input type="number" class="form-control" name="ndocumento" value="{{ old('ndocumento', $usuario->ndocumento) }}">
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="address">Dirección del Usuario</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address', $usuario->address) }}">
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

@section('scripts')
<script>
    $(function() {
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select value",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
@endsection

