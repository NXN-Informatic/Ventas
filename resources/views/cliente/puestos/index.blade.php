@extends('layouts.app')
@section('title','Mis Puestos')
@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <a href="{{ url('') }}">
                <button class="btn btn-light">{{ __('Nuevo Puesto') }}</button>
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
                                            <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                                <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/edit') }}">
                                                    <button class="btn btn-primary"><i class="fas fa-edit" title="Editar"></i></button>
                                                </a>
                                                <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/detail') }}">
                                                    <button class="btn btn-secondary"><i class="fas fa-globe-americas" title="Compartir"></i></button>
                                                </a>
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-times" title="Eliminar"></i></button>
                                            </div>
                                    </div>
                                    <h1 class="display-5 mt-2 mb-4">{{ $usuarios_puesto->puesto->name }}</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Creado </span> {{ $usuarios_puesto->puesto->created_at }}
                                
                                        <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/grupo') }}" class="btn btn-secondary mt-2">Registrar Grupo</a>
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/add') }}"><button type="submit" class="btn btn-primary">{{ __('Añadir Productos') }}</button></a>
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/lista') }}"><button type="submit" class="btn btn-success">{{ __('Ver Productos') }}</button></a>
                                            <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/fbcatalog') }}"><button type="submit" class="btn btn-success">{{ __('Enlazar con Facebook') }}</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Vista de Usuario -->
            
            
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-sm my-2">
                                    <tbody>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $puesto->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Productos Disponibles</th>
                                            <td>{{ $puesto->maxproductos }}</td>
                                        </tr>
                                        <tr>
                                            <th>Calificación</th>
                                            <td>{{ $puesto->calification }} / 5</td>
                                        </tr>
                                        <tr>
                                            <th>Celular 1</th>
                                            <td>{{ $puesto->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Celular 2</th>
                                            <td>{{ $puesto->phone2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estado</th>
                                            @if(auth()->user()->status)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<hr>
@include('layouts.partials.footer')
@endsection
