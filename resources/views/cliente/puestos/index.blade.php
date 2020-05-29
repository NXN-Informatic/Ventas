@extends('layouts.app')
@section('title','Mis Puestos')
@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <a href="{{ url('') }}">
                <button class="btn btn-light">{{ __('Crear Puesto') }}</button>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-10 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($usuarios_puestos as $usuarios_puesto)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Puesto Nº {{ $usuarios_puesto->puesto_id }}</h5>
                                        </div>

                                    </div>
                                    <h1 class="display-5 mt-2 mb-4">{{ $usuarios_puesto->puesto->name }}</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Creado </span> {{ $usuarios_puesto->puesto->created_at }}
                                
                                        <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/add') }}"><button type="submit" class="btn btn-primary">{{ __('Añadir Productos') }}</button></a>
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/lista') }}"><button type="submit" class="btn btn-success">{{ __('Ver Productos') }}</button></a>
                                            <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/edit') }}"><button type="submit" class="btn btn-primary">{{ __('Editar Tienda') }}</button></a>
                                            <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                                            <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/fbcatalog') }}"><button type="submit" class="btn btn-success">{{ __('Enlazar con Facebook') }}</button></a>
                                            <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/detail') }}"><button class="btn btn-secondary"><i class="fas fa-globe-americas"></i> Compartir</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<hr>
@include('layouts.partials.footer')
@endsection
