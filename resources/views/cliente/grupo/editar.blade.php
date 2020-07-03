@extends('layouts.app')
@section('title','Nuevo Grupo')
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
                    <li class="breadcrumb-item active" aria-current="page">Editar Categorías</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4>{{ __('Editar categoría') }}</h4>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('producto/lista') }}" class="btn btn-secondary">Regresar</a>
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
                        <form action="{{ url('categoria/update') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Seleccione la categoria</label>
                                <div class="mb-3">
								<select class="form-control select2" name="grupo" data-toggle="select2">
                                <optgroup label="Grupos disponibles">
                                    @foreach($puestoSubcategorias as $subcategorias)
                                        @foreach ($subcategorias->grupos as $grupo)
                                        <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                        @endforeach
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="name">Nuevo nombre</label>
                                <input id="nombre" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group custom-control custom-switch">
                                <input id="mostrargrupo" name="activo" data-id="{{$grupo->activo}}" onclick="$(this).attr('value',$(this).val()? 0 : 1)" value = "{{$grupo->activo}}"  class="custom-control-input" type="checkbox" {{ $grupo->activo ? 'checked' : '' }}>
                                <label class="custom-control-label" for="mostrargrupo" style="margin-left: 10px">Publicar en mi Tienda (Si/No)</label>
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

