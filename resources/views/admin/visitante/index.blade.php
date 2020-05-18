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
                    <li class="breadcrumb-item"><a href="#">Visitantes</a></li>
                </ol>
            </nav>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Visitantes</h5>
                        <h6 class="card-subtitle text-muted">Lista de Visitantes Disponibles.</h6>
                    </div>
                    <div class="card-body">
                        <table id="datatables-basic" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Ip</th>
                                    <th>Sessionid</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Useragent</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitantes as $visitante)
                                <tr>
                                    <td>{{ $visitante->id }}</td>
                                    <td>{{ $visitante->sessionid }}</td>
                                    <td>{{ $visitante->latitud }}</td>
                                    <td>{{ $visitante->longitud }}</td>
                                    <td>{{ $visitante->useragent }}</td>
                                    <td class="table-action">
                                        <a href="{{ url('visitante/'.$visitante->id.'/edit') }}"><i class="align-middle fas fa-fw fa-pen"></i></a>
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
