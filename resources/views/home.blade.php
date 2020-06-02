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

        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-xxl-6">
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
            </div>
            <!-- End Formulario de Usuario -->
            
            <!-- Vista de Usuario -->
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Prepárese para su primera venta! Siga éstas recomendaciones:</h5>
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
            <!-- End Vista de Usuario -->
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection
