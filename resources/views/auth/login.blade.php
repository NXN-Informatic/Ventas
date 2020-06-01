@extends('layouts.app')
@section('title','Ingresar')
@section('content')
<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
                <h1 class="h2">{{ __('INICIE SESIÓN') }}</h1>
                <p class="lead">
                {{ __('Ingrese a su panel de administración') }}
                </p>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="m-sm-4">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="alert-message">
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    </div>
                    @endif
                        
                        <div class="text-center">
                            <img src="{{ asset('img/user.png') }}" alt="Linda Miller" class="img-fluid rounded-circle" width="132" height="132" />
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label>{{ __('Correo Electrónico') }}</label>
                                <input class="form-control form-control-lg" type="email" name="email" 
                                value="{{ old('email') }}" required />
                                <small class="form-text text-muted">{{ __('Con este correo podrá iniciar sesión.') }}</small>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Contraseña') }}</label>
                                <input class="form-control form-control-lg" type="password" name="password" />
                                <small class="form-text text-muted">{{ __('Su contraseña es personal.') }}</small>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('INICIAR') }}</button>
                            </div>
                        </form>
                        <hr>
                        <label>
                            <a href="{{ route('register') }}">
                            <h4 style="text-align:right">
                                {{ __('Aún no te tienes cuentas ? ') }}
                            </h4>
                            </a>
                        </label>
                    
                        <hr>
                        
                        <label>
                            {{ __('O Inicia Sesión con Redes sociales') }}
                        </label>
                        <hr>
                        <div class="text-center mt-3">    
                            <!-- <a href="{{ route('social_auth' , ['driver' => 'facebook']) }}" class="btn btn-facebook btn-lg mt-2">
                                {{ __("Facebook") }} <i class="align-middle mr-2 fab fa-fw fa-facebook"></i>
                            </a> -->
                            <a href="{{ route('social_auth' , ['driver' => 'google']) }}" class="btn btn-google btn-lg mt-2">
                                {{ __("Google") }} <i class="fa fa-google"></i>
                            </a>
                            <a href="{{ route('social_auth' , ['driver' => 'twitter']) }}" class="btn btn-twitter btn-lg mt-2">
                                {{ __("Twitter") }} <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</main>
@endsection
