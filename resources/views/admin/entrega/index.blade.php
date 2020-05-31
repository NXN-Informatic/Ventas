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
                    <li class="breadcrumb-item"><a href="#">Paises</a></li>
                </ol>
            </nav>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Entregas</h5>
                        <h6 class="card-subtitle text-muted">Lista de Entregas.</h6>
                    </div>
                    <div class="card-body">
                        <table id="datatables-basic" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Actualizada</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entregas as $entrega)
                                <tr>
                                    <td>{{ $entrega->id }}</td>
                                    <td>{{ $entrega->name }}</td>
                                    <td>{{ $entrega->created_at }}</td>
                                    <td>{{ $entrega->updated_at }}</td>
                                    <td class="table-action">
                                        <a href="{{ url('entregas/'.$entrega->id.'/edit') }}"><i class="align-middle fas fa-fw fa-pen"></i></a>
                                        <a href="#"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
