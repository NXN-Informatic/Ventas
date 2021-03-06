@extends('layouts.app')
@section('title','Registro')

@section('styles')
<style>
    .colorFeria{
        color: #000;
    }
    .mostrar{
        display:none;
    }
    @media (max-width: 600px) {
        
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
<div style="background: #fff" style="margin:0px;padding:0px">
    <main class="main h-200 w-100">
        <div class="container h-200">
            <div class="row h-200">
                <div class="col-lg-7 col-sm-6 col-12">
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-5 col-sm-12 col-12">
                            <div class="card top101 text-center" style="padding: 15px">
                                <img class="card-img-top logoregistro" src="{{ asset('img/logonuevotexto.png') }}" alt="Unsplash" style="margin:auto">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Venda online con FeriaTacna</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Crea tu tienda virtual gratuita en unos simples pasos. ¿Estás Listo?</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6 col-12">
                    <div class="col-lg-10 col-sm-12 col-12 formregistro">
                        <div class="col-lg-12 col-sm-12 col-12" >
                            <div class="card shad"  style="border-radius: 10px; padding:15px">
                                <div class="card-body" style="padding: 0px;">
                                    <br>
                                    <div class="text-center mt-2">
                                        <span class="h2 colorFeria bold15">¡Comience con una cuenta gratuita!</span>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 col-sm-12 col-12">
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
                                                <input class="form-control form-control-lg medium12" type="name" name="name" value="{{ old('name') }}" placeholder="Nombre completo" required />
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg medium12" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg medium12" type="password" name="password" placeholder="Contraseña" />
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary medium13" style="margin-top:10px;padding:10px;background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%)">{{ __('Siguiente: Configura tu Tienda') }}</button>
                                            </div>
                                        </form>
                                        <br>
                                        <div class="text-center mt-3">
                                            <div class="row" style="margin-top:-5%">
                                                <div class="col-12">
                                                    <a href="{{ route('social_auth' , ['driver' => 'facebook']) }}" class="btn mt-2 btn-block" style="border: 1px solid #000000af">
                                                        <i class="align-middle fab fa-fw fa-facebook" style="color: #000000af; font-size:20px"></i><span class="bold12" style="color: #000000af">{{ __(" Registrese con Facebook") }} </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="{{ route('social_auth' , ['driver' => 'google']) }}" class="btn mt-2 btn-block" style="border: 1px solid #000000af">
                                                        <i class="align-middle mr-2 fa fa-google" style="color: #000000af; font-size:20px"></i><span class="bold12">{{ __("  Registrese con Google") }} </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <br>
                                            <label>
                                                <a href="{{ route('login') }}">
                                                <u>
                                                    <p style="text-align:right;font-size:12px;margin-bottom:-10px" class="link">
                                                        {{ __('Ya tienes una cuenta? Inicie Sesión') }}
                                                    </p>
                                                </u></a>
                                            </label>
                                            
                                            <br>
                                            <br>
                                            <br>
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
@endsection
