@extends('layouts.app')
@section('title',"Planes especiales")
@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')


<main class="content">
    <div class="container-fluid">

        <div class="row mt-n3">
            <div class="col-md-11 col-lg- col-xl-12 col-xxl-8 mx-auto">
                <h1 class="text-center header-title">¡Renueve su plan hoy!</h1>
                <p class="lead text-center mb-4 header-subtitle">Whether you're a business or an individual, 14-day trial no credit card required.
                </p>

                <div class="row justify-content-center mt-3 mb-2">
                    <div class="col-auto">
                        <nav class="nav btn-group">
                            <a href="#monthly" class="btn btn-primary active" data-toggle="tab">Mensual</a>
                            <a href="#annual" class="btn btn-light" data-toggle="tab">Anual</a>
                        </nav>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="monthly">
                        <div class="row py-4">
                            <div class="col-md-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Gratuito</h5>
                                            <span class="display-4">S/.0</span><br>
                                            <span class="text-small4">Para siempre GRATIS</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                Hasta 35 productos
                                            </li>
                                        </ul>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                Sin Comisiones
                                            </li>
                                            <li class="mb-2">
                                                Vende en FeriaTacna y Facebook
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                        <button type="button" class="btn btn-lg btn-success" name="p1" id="p1">Elegido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Inicia</h5>
                                            <span class="display-4">S/.29</span>
                                            <span>/mes</span><br>
                                            <span class="text-small4">S/. 25 en Plan anual</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                100 productos
                                            </li>
                                        </ul>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                Sin Comisiones
                                            </li>
                                            <li class="mb-2">
                                                Vende en FeriaTacna y Facebook
                                            </li>
                                            <li class="mb-2">
                                                Configura descuentos a productos
                                            </li>
                                            <li class="mb-2">
                                                Pagos virtuales
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-success" name="p2" id="p2">Elegir Plan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Emprende</h5>
                                            <span class="display-4">S/.59</span>
                                            <span>/mes</span><br>
                                            <span class="text-small4">S/. 55 en Plan anual</span>
                                        </div>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                productos ilimitados
                                            </li>
                                            <li class="mb-2">
                                                5 puestos
                                            </li>
                                            <li class="mb-2">
                                                1 oferta/día
                                            </li>
                                            <li class="mb-2">
                                                Posicionamiento
                                            </li>
                                            <li class="mb-2">
                                                Enlace Tienda FB
                                            </li>
                                            <li class="mb-2">
                                                Ventas 100% online
                                            </li>
                                            <li class="mb-2">
                                                Asesoria Comercial
                                            </li>
                                            <li class="mb-2">
                                                Google Analytics
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-success" name="p3" id="p3">50% 1er Mes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Premium</h5>
                                            <span class="display-4">S/.99</span>
                                            <span>/mes</span><br>
                                            <span class="text-small4">S/. 120 en Plan anual</span>
                                        </div>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                productos ilimitados
                                            </li>
                                            <li class="mb-2">
                                                5 puestos
                                            </li>
                                            <li class="mb-2">
                                                1 oferta/día
                                            </li>
                                            <li class="mb-2">
                                                Posicionamiento
                                            </li>
                                            <li class="mb-2">
                                                Enlace Tienda FB
                                            </li>
                                            <li class="mb-2">
                                                Ventas 100% online
                                            </li>
                                            <li class="mb-2">
                                                Asesoria Comercial
                                            </li>
                                            <li class="mb-2">
                                                Google Analytics
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p4" id="p4">60% 1er mes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="annual">
                        <div class="row py-4">
                            <div class="col-sm-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Gratuito</h5>
                                            <span class="display-4">$0</span><br>
                                            <span class="text-small4">Para siempre GRATIS</span>
                                        </div>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                10 productos
                                            </li>
                                            <li class="mb-2">
                                                1 puesto
                                            </li>
                                            <li class="mb-2">
                                                1 oferta/mes
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p5" id="p5">Elegir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Inicia</h5>
                                            <span class="display-4">S/.300</span>
                                            <span class="text-small4">/año</span><br>
                                            <span class="text-small4">S/. 25 mes</span>
                                        </div>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                50 productos
                                            </li>
                                            <li class="mb-2">
                                                2 puestos
                                            </li>
                                            <li class="mb-2">
                                                1 oferta/sem
                                            </li>
                                            <li class="mb-2">
                                                Enlace Tienda FB
                                            </li>
                                            <li class="mb-2">
                                                Pagos virtuales
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p6" id="p6">10% dscto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Emprende</h5>
                                            <span class="display-4">S/.660</span>
                                            <span class="text-small4">/año</span><br>
                                            <span class="text-small4">S/.55 mes </span>
                                        </div>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                productos ilimitados
                                            </li>
                                            <li class="mb-2">
                                                5 puestos
                                            </li>
                                            <li class="mb-2">
                                                1 oferta/día
                                            </li>
                                            <li class="mb-2">
                                                Posicionamiento
                                            </li>
                                            <li class="mb-2">
                                                Enlace Tienda FB
                                            </li>
                                            <li class="mb-2">
                                                Ventas 100% online
                                            </li>
                                            <li class="mb-2">
                                                Asesoria Comercial
                                            </li>
                                            <li class="mb-2">
                                                Google Analytics
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p7" id="p7">20% dscto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 mb-md-0">
                                <div class="card text-center h-100">
                                    <div class="card-body d-flex flex-column">
                                        <div class="mb-4">
                                            <h5>Premium</h5>
                                            <span class="display-4">S/.1440</span>
                                            <span class="text-small4">/año</span><br>
                                            <span class="text-small4">S/.120 mes</span>
                                        </div>
                                        <h6>Incluye:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                productos ilimitados
                                            </li>
                                            <li class="mb-2">
                                                5 puestos
                                            </li>
                                            <li class="mb-2">
                                                1 oferta/día
                                            </li>
                                            <li class="mb-2">
                                                Posicionamiento
                                            </li>
                                            <li class="mb-2">
                                                Enlace Tienda FB
                                            </li>
                                            <li class="mb-2">
                                                Ventas 100% online
                                            </li>
                                            <li class="mb-2">
                                                Asesoria Comercial
                                            </li>
                                            <li class="mb-2">
                                                Google Analytics
                                            </li>
                                        </ul>
                                        <div class="mt-auto">
                                            <button type="button" class="btn btn-lg btn-outline-primary" name="p8" id="p8">30% dscto</button>
                                        </div>
                                    </div>
                                </div>
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
