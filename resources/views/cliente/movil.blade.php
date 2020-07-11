@extends('layouts.app')

@section('content')
@include('layouts.partials.fbchat')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')
@section('title','Panel de Administración')
    
<main class="content">
    <div class="container-fluid">

        <div class="header">
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-4">
                    @if(auth()->user()->usuario_puestos->first()->puesto->perfil)
                        <img src="{{ asset('storage/'.auth()->user()->usuario_puestos->first()->puesto_id.'/logo/'.auth()->user()->usuario_puestos->first()->puesto->perfil)  }}" width="100" height="100" class="img-fluid rounded-circle mb-2" style="border: 6px solid #fff">
                    @else
                        <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="100" height="100" class="rounded-circle mt-2" style="border: 6px solid #fff">
                    @endif
                </div>
                <div class="col-lg-10 col-sm-10 col-8">
                    <a href="{{ url('puesto/'.auth()->user()->usuario_puestos->first()->puesto_id.'/detail')}}" target="black">
                    <h1 style="font-size: 20px" class="header-title">
                        {{ auth()->user()->usuario_puestos->first()->puesto->name }}
                    </h1>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span style="color: #ffffff70">{{'Miembro desde '.auth()->user()->usuario_puestos->first()->puesto->created_at->format('M, Y')}}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
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
