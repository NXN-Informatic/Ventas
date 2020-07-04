@extends('layouts.app')
@section('title','Crear categoria')
@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
    
<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 style="font-size: 50px" class="header-title">
                {{ __('Catálogo') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="_blank">Tablero</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Categorías</li>
                </ol>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black"><button class="btn btn-primary btn-lg" style="margin-bottom: 4px"><span style="margin-left:10px; margin-right:10px">Ver Mi Tienda</span></button></a>
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ auth()->user()->usuario_puestos->first()->puesto_id }}/detail">
                            <button class="btn mb-1 btn-facebook btn-lg" style="margin-bottom: 4px"><i class="align-left fab fa-facebook" title="Compartir"></i><span style="margin-left:10px; margin-right:10px">{{ __('Compartir') }}</span></button>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        @if (session('notification'))
            <div class="alert alert-success alert-dismissible" role="alert">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4>{{ __('Crear categoría') }}</h4>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('categoria/editar') }}" class="btn btn-info btn-lg mt-2">
                                    <i class="fa fa-edit"></i>  <span>{{ __('    Editar') }}</span>
                                </a>
                                <a href="{{ url('producto/lista') }}" class="btn btn-secondary btn-lg mt-2"><i class="fa fa-reply"></i> Regresar</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>{{ $errors->first() }}</strong>
                            </div>
                        </div>
                        @endif
                        <form action="{{ url('producto/grupo/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre de la categoría</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Incluir en</label>
                                <div class="mb-3">
								<select class="form-control select2" name="subcategoria_id" data-toggle="select2">
                                <optgroup label="Subcategorias Disponibles">
                                    @foreach($puestoSubcategorias as $subcategorias)
                                        <option value="{{ $subcategorias->id }}">{{ $subcategorias->subcategoria->name }}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type ="hidden" class="form-control" name="description" value="{{ old('description') }}">
                            </div>
                            <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->id }}">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg"><span style="margin-left: 83px; margin-right: 83px">Guardar</span></button>
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

