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
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="border: 6px solid #fff; background-color:#fff">
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
                                <input type="file" accept="image/jpeg,image/png" capture="gallery" class="form-control-file" name="imagen">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%);"><span>Guardar cambios</span></button>
                            </div>
                            <br>
                        </form>
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
