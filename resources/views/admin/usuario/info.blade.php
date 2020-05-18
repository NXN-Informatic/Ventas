@extends('layouts.app')

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Administración') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Información del Usuario</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-xl-12 col-xxl-12 text-center">
                            <img src="{{ asset('img/user.png') }}" width="140" height="140" class="rounded-circle mt-2" alt="Angelica Ramos">
                        </div>
                    </div>
                    <br>
                    <table class="table table-sm my-2">
                        <tbody id="data">
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
            </div>
            <div class="col-xxl-8">
                <div class="card">
                    <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title mb-0">{{ __('Usuario') }}</h5>
                        </div>
                        <div class="col text-right">
                            <a href="{{ url('usuarios') }}"><button type="button" class="btn btn-github mt-2" >
                                Volver
                            </button></a>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-sm my-2">
                        <tbody>
                            <tr>
                                <th>Id : </th>
                                <td>{{ $usuario->id }}</td>
                            </tr>
                            <tr>
                            @if($usuario->identidad)
                                <th>Tipo de Documento : </th>
                                <td id="type">{{ $usuario->identidad->name }}</td>
                            @endif
                            </tr>
                            <tr>
                                <th>Número de Documento</th>
                                <td id="num">{{ $usuario->ndocumento }}</td>
                            </tr>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <td>{{ $usuario->sur_name }} , {{ $usuario->name }}</td>
                            </tr>
                            <tr>
                                <th>Correo</th>
                                <td>{{ $usuario->email }}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{ $usuario->address }}</td>
                            </tr>
                            <tr>
                                <th>Número de Puestos</th>
                                <td>{{ $usuario->maxpuestos }}</td>
                            </tr>
                            <tr>
                                <th>Distrito</th>
                                @if($usuario->distrito)
                                <td>{{ $usuario->distrito->nombre }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Provincia</th>
                                @if($usuario->distrito)
                                <td>{{ $usuario->distrito->provincia->nombre }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Ciudad</th>
                                @if($usuario->distrito)
                                <td>{{ $usuario->distrito->provincia->region->nombre }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>País</th>
                                @if($usuario->distrito)
                                <td>{{ $usuario->distrito->provincia->region->pais->nombre }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Completado</th>
                                <td>{{ $usuario->completado }}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                @if($usuario->status)
                                    <td><span class="badge badge-primary">Activado</span></td>
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
</main>

@include('layouts.partials.footer')
@endsection

@section('scripts')
<script>
    $(function() {
        $type = "<?php echo ($usuario->identidad != null)? $usuario->identidad->name: ''; ?>";
        $num = "<?php echo $usuario->ndocumento; ?>";
        $data = $('#data');
        if($type === 'DNI'){
            const url = `https://dniruc.apisperu.com/api/v1/dni/${ $num }?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFfbmFjZXJvbUB1bmpiZy5lZHUucGUifQ.NcV9aUSUuJ0Wul85yvonhMfhzfBcvw7zuXdXZCD6P0A`;
            $.getJSON(url, ondatosUserdni);
        }else if($type === 'RUC'){
            const url = `https://dniruc.apisperu.com/api/v1/ruc/${ $num }?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFfbmFjZXJvbUB1bmpiZy5lZHUucGUifQ.NcV9aUSUuJ0Wul85yvonhMfhzfBcvw7zuXdXZCD6P0A`;
            $.getJSON(url, ondatosUserruc);
        }

        function ondatosUserdni(data) {
            let htmlData = '';
            htmlData += `<tr><th>DNI : </th><td>${ data.dni }</td></tr>`;
            htmlData += `<tr><th>Código : </th><td>${ data.codVerifica }</td></tr>`;
            htmlData += `<tr><th>Apellido Paterno : </th><td>${ data.apellidoPaterno }</td></tr>`;
            htmlData += `<tr><th>Apellido Materno : </th><td>${ data.apellidoMaterno }</td></tr>`;
            htmlData += `<tr><th>Nombres : </th><td>${ data.nombres }</td></tr>`;
            $data.html(htmlData);
        }

        function ondatosUserruc(data) {
            let htmlData = '';
            htmlData += `<tr><th>RUC : </th><td>${ data.ruc }</td></tr>`;
            htmlData += `<tr><th>Nombre : </th><td>${ data.razonSocial }</td></tr>`;
            htmlData += `<tr><th>Profesión : </th><td>${ data.profesion }</td></tr>`;
            htmlData += `<tr><th>Tipo de Persona : </th><td>${ data.tipo }</td></tr>`;
            htmlData += `<tr><th>Sistema : </th><td>${ data.sistContabilidad }</td></tr>`;
            htmlData += `<tr><th>Emisión : </th><td>${ data.sistEmsion }</td></tr>`;
            htmlData += `<tr><th>Estado : </th><td>${ data.estado }</td></tr>`;
            $data.html(htmlData);
        }
    });
</script>
@endsection