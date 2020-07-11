@extends('layouts.app')
@section('title','Editar categoria')
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
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="border: 6px solid #fff">
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

