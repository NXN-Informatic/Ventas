@extends('layouts.corporativa')

@section('content')


    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Encuentra el plan adecuado para ti</h2>
                    <p class="p-heading p-large">Enpieza a vender en feria Tacna, y se parte del futuro de las ventas locales libres.</p>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">GRATIS</div>
                            <div class="card-subtitle">Comienza a vender en tu localidad</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency">S/</span><span class="value">0</span>
                                <div class="frequency">gratis de por vida</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body"><b>Hasta 15 productos</b></div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Sin comisiones de por venta</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Vende en FeriaTacna</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i>
                                    <div class="media-body">Múltiples usuarios</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i>
                                    <div class="media-body">Vende en facebook</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="{{ url('/register') }}" target="black">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">EMPRENDE</div>
                            <div class="card-subtitle">Establece tu negocio</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency">S/</span><span class="value">29</span>
                                <div class="frequency">mensualmente</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body"><b>Hasta 50 productos</b></div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Sin comisiones de por venta</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Vende en FeriaTacna</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Múltiples usuarios</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i>
                                    <div class="media-body">Vende en facebook</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="{{ url('/register') }}" target="black">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="label">
                            <p class="best-value">MAS VENDIDO</p>
                        </div>
                        <div class="card-body">
                            <div class="card-title">EMPRESA</div>
                            <div class="card-subtitle">Genera ventas ilimitadas</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency">S/</span><span class="value">55</span>
                                <div class="frequency">mensualmente</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body"><b>Productos ilimitados</b></div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Sin comisiones de por venta</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Vende en FeriaTacna</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Múltiples usuarios</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Vende en facebook</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="{{ url('/register') }}" target="black">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->
                    <!-- end of card -->

                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of cards-2 -->
    <!-- end of pricing -->


    <!-- Request -->
    <div id="request" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h3>¿Deseas algún plan pago? <br> Te atenderemos gustosos</h3>
                        <p>Feria Tacna es la mejor forma de vender en linea en tu localidad, te proporcionamos un canal mas de venta que nadie te ofrece.Descubre que podemos hacer por tu negocio.</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Sin comisiones.</strong> Trata directamente con tus clientes </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Nuevo canal de venta.</strong> Vende más y mejor. </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Tu catálogo siempre en linea </strong> Compartelo a tus clientes </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Plan gratuito de por vida</strong> No es solo una prueba, es para siempre </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of col -->
                <div class="col-lg-6">

                    <!-- Request Form -->
                    <div class="form-container">
                        <form id="requestForm" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="rname" name="rname" required>
                                <label class="label-control" for="rname">Nombre completo</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="remail" name="remail" required>
                                <label class="label-control" for="remail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="rphone" name="rphone" required>
                                <label class="label-control" for="rphone">Teléfono</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="rphone" name="rphone" required>
                                <label class="label-control" for="rphone">Interesados en.</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Solicitar</button>
                            </div>
                            <div class="form-message">
                                <div id="rmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div>
                    <!-- end of form-container -->
                    <!-- end of request form -->

                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of form-1 -->
    <!-- end of request -->

@endsection