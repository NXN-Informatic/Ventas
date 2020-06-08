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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="_blank">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mis datos</li>
                </ol>
                <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-info" ><span style="margin-left:20px; margin-right:20px">      Ver mi Tienda      </span></button></a>
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                    <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:20px; margin-right:20px">{{ __('    Compartir    ') }}</span></button>
                </a>
            </nav>
		</div>
        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-xxl-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Datos de propietario') }}</h4>
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
                        
                        <form action="{{ url('user/update/'.auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                           
                            <div class="form-group">
                                <strong><label class="form-label" for="name">Nombres completos</label></strong>
                                <input type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label" for="sur_name">Apellidos completos</label></strong>
                                <input type="text" class="form-control" name="sur_name" value="{{ old('sur_name', auth()->user()->sur_name) }}">
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <!-- <div class="form-group">
                                <strong><label class="form-label" for="email">Correo de Usuario</label></strong>
                                <input type="hidden" class="form-control" name="email" value="old('email', auth()->user()->email)">
                            </div>-->
                            <div class="form-group">
                                <strong><label class="form-label" for="dni">Tipo de documento</label></strong>
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
                            </div>
                            <div class="form-group">
                                <strong><label class="form-label" for="name">Número de documento</label></strong>
                                <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Con este dato validaremos su identidad. Esta información no será pública.') }}</small>
                                <input type="text" class="form-control" name="ndocumento" value="{{ old('ndocumento', auth()->user()->ndocumento) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                            <strong><label class="form-label">Foto de Perfil</label></strong>
                            <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Con esto aumentará la confianza de sus clientes.') }}</small>
                                <input type="file" class="form-control-file" name="imagen">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 83px; margin-right: 83px">Guardar datos</span></button>
                            </div>
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
                            @if(auth()->user()->imagen)
                                <img src="{{ asset('storage/usuarios/'.auth()->user()->id.'/'.auth()->user()->imagen) }}" width="140" height="140" class="rounded-circle mt-2" alt="Angelica Ramos">
                            @else
                                <img src="{{ asset('default\perfil.png') }}" width="140" height="140" class="rounded-circle mt-2" alt="Angelica Ramos">
                            @endif
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
                                    <td>Propietario</td>
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
        $("#smartwizard-default-primary").smartWizard({
            theme: "default",
            showStepURLhash: false
        });
        $("#smartwizard-default-success").smartWizard({
            theme: "default",
            showStepURLhash: false
        });
        $("#smartwizard-default-danger").smartWizard({
            theme: "default",
            showStepURLhash: false
        });
        $("#smartwizard-default-warning").smartWizard({
            theme: "default",
            showStepURLhash: false
        });
        $("#smartwizard-arrows-primary").smartWizard({
            theme: "arrows",
            showStepURLhash: false
        });
        $("#smartwizard-arrows-success").smartWizard({
            theme: "arrows",
            showStepURLhash: false
        });
        $("#smartwizard-arrows-danger").smartWizard({
            theme: "arrows",
            showStepURLhash: false
        });
        $("#smartwizard-arrows-warning").smartWizard({
            theme: "arrows",
            showStepURLhash: false
        });
        // Validation
        var $validationForm = $("#smartwizard-validation");
        $validationForm.validate({
            errorPlacement: function errorPlacement(error, element) {
                $(element).parents(".form-group").append(
                    error.addClass("invalid-feedback small d-block")
                )
            },
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            },
            rules: {
                "wizard-confirm": {
                    equalTo: "input[name=\"wizard-password\"]"
                }
            }
        });
        $validationForm
            .smartWizard({
                autoAdjustHeight: false,
                backButtonSupport: false,
                useURLhash: false,
                showStepURLhash: false,
                toolbarSettings: {
                    toolbarExtraButtons: [$("<button class=\"btn btn-submit btn-primary\" type=\"button\">Finish</button>")]
                }
            })
            .on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                if (stepDirection === "forward") {
                    return $validationForm.valid();
                }
                return true;
            });
        $validationForm.find(".btn-submit").on("click", function() {
            if (!$validationForm.valid()) {
                return;
            }
            alert("Great! The form is valid and ready to submit.");
            return false;
        });
    });
</script>

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

        /*$("#find_btn").click(function () { //user clicks button
            if ("geolocation" in navigator){ //check geolocation available 
                //try to get user current location using getCurrentPosition() method
                navigator.geolocation.getCurrentPosition(function(position){ 
                    $("#latitud").val(position.coords.latitude);
                    $("#longitud").val(position.coords.longitude);
                    
                    });
            }else{
                console.log("Browser doesn't support geolocation!");
            }
        });*/
    });

</script>
@endsection
