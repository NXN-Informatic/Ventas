@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/welcome.css') }}">
    
@endsection

@section('content')
@section('title','Bienvenido')

<div class="featureProduct" id="prod" style="background: #F3F3F3;padding:10px">
    <div class="feature__wrap container">
        <div class="feature__filter">
            <div class="button-group filters-button-group feature__buttons">
            </div>
            <ul class="featureSlider container">
                <li class="grid features__grid" >
                    
                    @foreach($centroComerciales->puestos as $puestos)
                        @foreach($puestos as $ps)
                            @if($ps->banner != null and $ps->perfil != null)
                                <div class="blog__item col-lg-3" style="margin: auto; background:#fff">
                                    
                                    <div class="blog__image">
                                        <img src="{{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" alt="" height="100px" style="position: relative; z-index: 5; top: 0px">
                                    </div>
                                    <div>
                                        <img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="80px" width="80px" style="position: relative; z-index: 6; top: -50px">
                                    </div>
                                    <div class="blog__content" style="margin-top: -60px">
                                        <a class="heading" href="#">{{ $ps->name}}</a><br><br>
                                        <div class="row">
                                            @if ($ps->puestosubcategorias->first())
                                                @foreach ($ps->puestosubcategorias->first()->grupos as $grupos)
                                                <?php $imagen = null; ?>
                                                <?php $imagen = $grupos->productos->random(1)->first()->imagen_productos->first(); //solo una imagen x producto?>
                                                <img src="{{ asset('storage/'.$ps->id.'/'.$grupos->productos->first()->id.'/'.$imagen->imagen) }}" alt="" height="60px" style="margin: auto">
                                                @endforeach
                                            @endif
                                            
                                        </div>
                                        <!--<p> substr($ps->description,0,60)}...</p> -->
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection