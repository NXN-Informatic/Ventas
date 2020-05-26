@extends('layouts.app')

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
@section('title','Panel de Administración')
    
<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Administración') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Feria_Tacna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lista de Tareas Pendientes</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-6 col-lg-4">
							<div class="card">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
                                        @if($usercompletado->completado)
                                        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
                                                
												<i class="far fa-fw fa-heart"></i>
											</div>
											<div class="alert-message">
												<strong>Completa tu registro:</strong> Ve a "Mis Datos" y completa la información de tu cuenta. Esto habilitará algunas funcionalidades.
											</div>
										</div>            
                                        @else
                                        <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
                                                
												<i class="far fa-fw fa-hourglass"></i>
											</div>
											<div class="alert-message">
												<strong>Completa tu registro:</strong> Ve a "Mis Datos" y completa la información de tu cuenta. Esto habilitará algunas funcionalidades.
											</div>
										</div>            
                                        @endif
                                        
                                    </li>
									<li class="list-group-item">
                                        <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-hourglass"></i>
											</div>
											<div class="alert-message">
												<strong>Crea tu puesto:</strong> Ve a "Mis Puestos > Crear Puesto" registra tu tienda y escoge el plan a tu medida.
											</div>
										</div>
                                    </li>
									<li class="list-group-item">
                                        <div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-hourglass"></i>
											</div>
											<div class="alert-message">
												<strong>Sube tus productos:</strong> Ve a "Mis Puestos > Lista de Puestos" y añade productos a tu puesto virtual. 
											</div>
										</div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="alert alert-info alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-hourglass"></i>
											</div>
											<div class="alert-message">
												<strong>Enlaza con FB:</strong> Ve a "Mis Puestos > Lista de Puestos" y sincroniza tu puesto con una página de Facebook. 
											</div>
										</div>
                                    </li>
								</ul>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@include('layouts.partials.footer')
@endsection
