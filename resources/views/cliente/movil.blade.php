@extends('layouts.app')

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
@section('title','Panel de Administración')
    
<main class="content">
    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                {{ __('Móvil app manager') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-default.html">Feria_Tacna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Móvil app</li>
                </ol>
            </nav>
		</div>

        <div class="row" >
            <!-- Formulario de Usuario -->
            <div class="col-xxl-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title"></h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <h3 class="text-center">Descarge nuestra aplicación para celular , para administrar su tienda de manera sencilla.</h3>
                                <p class="text-center" style="font-size:20px">Disponible para el plan Empresa a más</p>
                                <div class="text-center">
                                    <a href="{{ url('/price') }}" class="btn mb-1 btn-success" style="font-size:20px">Ver Planes</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End Formulario de Usuario -->
        
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection
