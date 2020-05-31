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
			<div class="col-xl-7 col-xxl-10 d-flex">
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
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/add') }}"><button type="submit" class="btn btn-primary">{{ __('Añadir Productos') }}</button></a>
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/lista') }}"><button type="submit" class="btn btn-success">{{ __('Ver Productos') }}</button></a>
                                            <a href="{{ url('puesto/'.$usuarios_puesto->puesto->id.'/fbcatalog') }}"><button type="submit" class="btn btn-success">{{ __('Enlazar con Facebook') }}</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
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
										@if ($puestocompletado)
										<div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-heart"></i>
											</div>
											<div class="alert-message">
												<strong>Crea tu puesto:</strong> Ve a "Mis Puestos > Crear Puesto" registra tu tienda y escoge el plan a tu medida.
											</div>
										</div>
										@else
										<div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-hourglass"></i>
											</div>
											<div class="alert-message">
												<strong>Crea tu puesto:</strong> Ve a "Mis Puestos > Crear Puesto" registra tu tienda y escoge el plan a tu medida.
											</div>
										</div>
										@endif
                                        
                                    </li>
									<li class="list-group-item">
										@if ($productocompletado->isNotEmpty())
										<div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-heart"></i>
											</div>
											<div class="alert-message">
												<strong>Sube tus productos:</strong> Ve a "Mis Puestos > Lista de Puestos" y añade productos a tu puesto virtual. 
											</div>
										</div>
										@else
										<div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
											<div class="alert-icon">
												<i class="far fa-fw fa-hourglass"></i>
											</div>
											<div class="alert-message">
												<strong>Sube tus productos:</strong> Ve a "Mis Puestos > Lista de Puestos" y añade productos a tu puesto virtual. 
											</div>
										</div>
										@endif
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
