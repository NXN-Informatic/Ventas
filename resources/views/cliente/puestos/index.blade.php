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
                                        <div class="col mt-0">
                                            <h5 class="card-title">Puesto Nº {{ $usuarios_puesto->puesto_id }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h1 class="display-5 mt-2 mb-4">{{ $usuarios_puesto->puesto->name }}</h1>
                                        <label style="font-size:20px; color:#F0C908">
                                        @for ($i = 0; $i < $usuarios_puesto->puesto->calification; $i++)   
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @for ($i = 0; $i < (5 - $usuarios_puesto->puesto->calification); $i++)
                                            <i class="far fa-star text-dark"></i> 
                                        @endfor
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com/puesto/{{ $usuarios_puesto->puesto->id }}/detail">
                                                <button class="btn mb-1 btn-facebook btn-lg"><i class="align-left fab fa-facebook" title="Compartir"></i>{{ __(' Compartir mi tienda ') }}</button>
                                            </a>
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
