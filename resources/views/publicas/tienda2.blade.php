@extends('layouts.app')
@section('title','Registro')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('content')
<main class="main h-200 w-100">
    <div class="container h-200">
        <div class="row h-200">
            <div class="col-lg-4 col-sm-12 col-12">
                <div class="card top100" >
                    <img class="card-img-top" src="img/photos/unsplash-1.jpg" alt="Unsplash">
                    <div class="card-header">
                        <h4 class="bold16">Complete el registro</h4><span style="color: #ff1a00" class="bold12">paso 2 de 2</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text medium12">Vamos a ultimar los detalles para preparar su tienda para un lanzamiento rápido.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-12 mx-auto d-table h-200">
                <div class="d-table-cell align-middle">
                    <div class="card shad top50">
                        <div class="card-header">
                            <span class="bold16">Añada información sobre su tienda</span>
                        </div>
                        <div class="card-body">
                            <div class="m-sm-4">
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>{{ $errors->first() }}</strong>
                                </div>
                            </div>
                            @endif
                                <form role="form" action="{{ url('/puesto/update/'.$puesto) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="form-group">
                                        <strong><label class="form-label" for="contacto">¿A qué número contactarán tus clientes?</label></strong>
                                        <small class="form-text text-muted" style="margin-bottom: 7px" >{{ __('Puede cambiarlo en cualquier momento.') }}</small>
                                        <input type="text" class="form-control form-control-lg" name="phone" value="" placeholder="Celular">
                                    </div>
                                    <div class="form-group">
                                        <strong><label class="form-label" for="direccion">¿Su tienda es sólo virtual o tambien física?</label></strong><br>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inline-radios-example" value="option1" checked onclick="$('#dir').disabled=false">
                                            <span class="form-check-label">Virtual y física</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inline-radios-example" value="option2" onclick="$('#dir').disabled=true">
                                            <span class="form-check-label">Sólo virtual</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <strong><label class="form-label" for="direccion">Dirección Física </label></strong>
                                        <input style="margin-top: 7px" type="text" class="form-control form-control-lg" id="dir" name="direccion" value="" placeholder="Dirección de la tienda">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary" style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%)"><span class="bold12">Finalizar y seguir al tablero</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
