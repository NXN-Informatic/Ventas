@extends('layouts.app')
@section('title','Crear categoria')
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
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="background-color:#fff;border: 6px solid #fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <span class="header-title bold16">
                        {{ auth()->user()->usuario_puestos->first()->puesto->name }}
                    </span>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span class="regular11" style="color: #ffffff70">{{'Miembro desde '.auth()->user()->usuario_puestos->first()->puesto->created_at->format('M, Y')}}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
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
                            <div class="col-lg-8 col-sm-9 col-8">
                                <span class="bold15">{{ __('Crear categoría') }}</span>
                            </div>
                            <div class="col-lg-4 col-sm-3 col-4 text-right">
                                <a href="{{ url('categoria/editar') }}" class="btn btn-info btn-lg" style="border: 1px solid #ff1a00; text-align:center">
                                    <i class="fa fa-edit" style="color: #ff1a00"></i>  <span class="medium11" style="color: #ff1a00;">Editar Categorias</span>
                                </a>
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

