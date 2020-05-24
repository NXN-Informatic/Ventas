@extends('layouts.app')
@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Usuario') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Perfil de Usuario') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('MI PERFIL DE USUARIO') }}</h5>
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
                        <form action="{{ url('user/update/'.auth()->user()->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre de Usuario</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sur_name">Apellido de Usuario</label>
                                <input type="text" class="form-control" name="sur_name" value="{{ old('sur_name', auth()->user()->sur_name) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="dni">Tipo de Documento</label>
                                <div class="mb-3">
								<select class="form-control" id="identidad_id" name="identidad_id" required>
                                    <optgroup label="Documentos Disponibles">
                                    @foreach($tipoDocuments as $document)
                                        <option value="{{ $document->id }}" 
                                            @if(auth()->user()->identidad_id == $document->id ) selected @endif >{{ $document->name }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="ndocumento">Número de Documento</label>
                                <input type="text" class="form-control" name="ndocumento" value="{{ old('ndocumento', auth()->user()->ndocumento) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email de Usuario</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Actualizar Contraseña de Usuario</label>
                                <input type="text" class="form-control" name="password" value="{{ old('address') }}">
                                <small class="form-text text-muted">{{ __('Si no quiere actualizarla no escriba nada.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="distrito_id">Seleecione su distrito</label>
                                <div class="mb-3">
								<select class="form-control select2" id="distrito_id" name="distrito_id" data-toggle="select2">
                                    <optgroup label="Filtre por Nombre de País , Ciudad , Provincia , Distrito">
                                    <option value=""></option>
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->id }}" 
                                            @if(auth()->user()->distrito_id == $distrito->id ) selected @endif >{{ $distrito->nombre }} - {{ $distrito->provincia->region->nombre }} - {{ $distrito->provincia->region->pais->nombre }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="latitud">Latitud</label>
                                <input type="text" class="form-control" id="latitud" name="latitud" value="{{ old('latitud', auth()->user()->latitud) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="longitud">Longitud</label>
                                <input type="text" class="form-control" id="longitud" name="longitud" value="{{ old('longitud', auth()->user()->longitud) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="address">Dirección de Usuario</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address', auth()->user()->address) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a id="find_btn" class="btn btn-dark" style="color:#fff">Mi ubicación</a>
                            
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Usuario -->
            
            <!-- Vista de Usuario -->
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-sm-12 col-xl-12 col-xxl-12 text-center">
                                <img src="{{ asset('img/user.png') }}" width="140" height="140" class="rounded-circle mt-2" alt="Angelica Ramos">
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm my-2">
                            <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>Apellido</th>
                                    <td>{{ auth()->user()->sur_name }}</td>
                                </tr>
                                <tr>
                                    <th>Número de Documento</th>
                                    <td>{{ auth()->user()->ndocumento }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ auth()->user()->role }}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    @if(auth()->user()->status == 'activo')
                                        <td><span class="badge badge-success">Activado</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Desactivado</span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Vista de Usuario -->
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

        $("#find_btn").click(function () { //user clicks button
            if ("geolocation" in navigator){ //check geolocation available 
                //try to get user current location using getCurrentPosition() method
                navigator.geolocation.getCurrentPosition(function(position){ 
                    $("#latitud").val(position.coords.latitude);
                    $("#longitud").val(position.coords.longitude);
                    
                    });
            }else{
                console.log("Browser doesn't support geolocation!");
            }
        });
    });

</script>
@endsection
