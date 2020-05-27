@extends('layouts.panel')

@section('content')

@section('title','Bienvenido')
@include('layouts.components.navbar')

<!--Start Product-->
<div class="shopProduct">
    <div class="shopProduct__wrap dflex container">
        <div class="product__item col-lg-12 col-12">
            <ul class="filterProduct gridRow" id="mostrar">
            @foreach($puestos as $puesto)               
            <li class="product__item">
                <div class="product__image">
                    @if($puesto->perfil)
                        <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" alt="" 
                        style="width: 240px; height: 220px; display: flex;margin: auto;">
                    @else
                        <img src="{{ asset('img/logo.jpg') }}" alt="" 
                        style="width: 240px; height: 220px; display: flex;margin: auto;">
                    @endif
                    <div class="image__tools"><i class="fas fa-search"></i>
                        <i class="fas fa-random"></i>
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="product__content"><a class="link-title" href="#">{{ $puesto->name}}</a>
                    <label style="font-size:20px; color:#F0C908">
                        @for ($i = 0; $i < $puesto->calification; $i++)   
                            <i class="fas fa-star"></i>
                        @endfor
                        @for ($i = 0; $i < (5 - $puesto->calification); $i++)
                            <i class="far fa-star text-dark"></i> 
                        @endfor
                    </label><br><br>
                    <h2 style="font-size: 20px"><i class="fas fa-phone-volume"></i> Llamar {{ $puesto->phone }}</h2><br>
                    <p style="text-transform: capitalize;">{{ $puesto->description }}</p>
                    
                    <a class="btn active" href="{{ url('/puesto/'.$puesto->id.'/detail') }}">Ver Tienda</a>
                </div>
            </li>
            @endforeach
            </ul>
            
        </div>
    </div>
</div>


@include('layouts.components.footer')

@endsection



