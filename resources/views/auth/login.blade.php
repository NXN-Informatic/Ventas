@extends('layouts.app')
@section('title','Ingresar')
@section('content')
<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
                <h1 class="h2">{{ __('Acceda a su cuenta de FeriaTacna') }}</h1>
                <br>
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
                        <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
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
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('     Ingresa     ') }}</button>
                            </div>
                        </form>
                        <br>
                        <label>
                            <a href="{{ route('register') }}">
                            <u><h5 style="text-align:right">
                                {{ __('Crea una nueva cuenta en FeriaTacna?') }}
                            </h5>
                            </u>
                            </a>
                        </label>  
                        <br>
                        <hr>  
                        <label>
                            {{ __('O iniciar sesión con: ') }}
                        </label>
                        <br>
                        <div class="text-center mt-3">    
                            <!-- <a href="{{ route('social_auth' , ['driver' => 'facebook']) }}" class="btn btn-facebook btn-lg mt-2">
                                {{ __("Facebook") }} <i class="align-middle mr-2 fab fa-fw fa-facebook"></i>
                            </a> -->
                            <a href="{{ route('social_auth' , ['driver' => 'google']) }}" class="btn btn-google btn-lg mt-2 btn-block">
                                {{ __("Google") }} <i class="fa fa-google"></i>
                            </a>
                            <a href="{{ route('social_auth' , ['driver' => 'twitter']) }}" class="btn btn-twitter btn-lg mt-2 btn-block">
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
