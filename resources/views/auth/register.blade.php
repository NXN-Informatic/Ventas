@extends('layouts.app')
@section('title','Registro')

@section('styles')
<style>
    .backgroundFeria{
        background: url('{{ asset('img/registro.jpg')}}');
        background-repeat: no-repeat;
        background-size: cover
    }
    .colorFeria{
        color: #fff;
    }
    .mostrar{
        display:none;
    }
    @media (max-width: 600px) {
        .backgroundFeria {
            background: #f3f3f3;
        }
        .colorFeria{
            color: #000;
        }
        .mostrar{
            display:block;
        }
    }
</style>
@endsection

@section('content')
<div style="background: #000" style="margin:0px;padding:0px">
<div class="backgroundFeria">
    <main class="main h-200 w-100">
        <div class="container h-200">
            <div class="row h-200">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="d-table-cell ">
                        <div class="text-center mostrar" style="margin:auto">
                            <img class="mt-2" src="{{ asset('img/logo.PNG') }}"  width="200px">
                        </div>
                        <div class="text-center mt-3">
                            <h1 class="h2 colorFeria">{{ __('Comience con una cuenta gratuita!') }}</h1>
                            <p class="lead colorFeria" >
                            {{ __('Cree su Tienda en línea') }}
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4" style="margin: 0px">
                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <div class="alert-message">
                                        <strong>{{ $errors->first() }}</strong>
                                    </div>
                                </div>
                                @endif
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="form-group">
                                            <label>{{ __('Email') }}</label>
                                            <input class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required />
                                            <small class="form-text text-muted">{{ __('Con este correo podrá iniciar sesión.') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Contraseña') }}</label>
                                            <input class="form-control form-control-lg" type="password" name="password" />
                                            <small class="form-text text-muted">{{ __('Su contraseña es personal.') }}</small>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">{{ __('Siguiente: configura tu Tienda') }}</button>
                                        </div>
                                    </form>
                                    <br>
                                    <label>
                                        <a href="{{ route('login') }}"><u>
                                        <h4 style="text-align:right" class="link">
                                            {{ __('Ya tienes una cuenta? Inicie Sesión') }}
                                        </h4>
                                        </u></a>
                                    </label>
                                
                                    <hr>
                                    <label>
                                        {{ __('O registrese con sus redes sociales') }}
                                    </label>
                                    <div class="text-center mt-3">    
                                        <!-- <a href="" class="btn btn-facebook btn-lg mt-2">
                                            {{ __("Facebook") }} <i class="align-middle mr-2 fab fa-fw fa-facebook"></i>
                                        </a> -->
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ route('social_auth' , ['driver' => 'facebook']) }}" class="btn btn-facebook btn-lg mt-2 btn-block">
                                                    {{ __("Facebook") }} <i class="align-middle mr-2 fab fa-fw fa-facebook"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('social_auth' , ['driver' => 'google']) }}" class="btn btn-google btn-lg mt-2 btn-block">
                                                    {{ __("Google") }} <i class="fa fa-google"></i>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ route('social_auth' , ['driver' => 'twitter']) }}" class="btn btn-twitter btn-lg mt-2 btn-block">
                                                    {{ __("Twitter") }} <i class="fa fa-twitter"></i>
                                                </a>
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
</div>
</div>
@endsection
