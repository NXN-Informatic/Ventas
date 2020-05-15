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
                    <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                </ol>
            </nav>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Usuarios</h5>
                        <h6 class="card-subtitle text-muted">Lista de Usuarios Disponibles.</h6>
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
                        <table id="datatables-basic" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Identificación</th>
                                    <th>Nº Puestos</th>
                                    <th>Estado</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->identidad->name }} : {{ $user->ndocumento }}</td>
                                    <td class="text-center">{{ $user->maxpuestos }}</td>
                                    <td>
                                        @if($user->status == 'activo')
                                            <span class="badge badge-primary">Activado</span>
                                        @else
                                            <span class="badge badge-danger">Desactivado</span>
                                        @endif
                                    </td>
                                    <td class="table-action">
                                        <a href="{{ url('/usuarios/'.$user->id.'/info') }}"><i class="align-middle mr-2 fas fa-fw fa-user-check"></i></a>
                                        <a href="{{ url('/usuarios/'.$user->id.'/active') }}"><i class="align-middle mr-2 fas fa-fw fa-check-circle"></i></a>
                                        <a href="{{ url('/usuarios/'.$user->id.'/desactivado') }}"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                        <a href="{{ url('/usuarios/'.$user->id.'/edit') }}"><i class="align-middle fas fa-fw fa-pen"></i></a>
                                    </td>
                                </tr>
                                @endforeach
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
			// Datatables basic
			$('#datatables-basic').DataTable({
				responsive: true
			});
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
</script>
@endsection
