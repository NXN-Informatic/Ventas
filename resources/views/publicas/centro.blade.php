@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/welcome.css') }}">
    
@endsection

@section('content')
@section('title','Bienvenido')
<div id="ocultar9">
    @if($centrocomercial->banner != null)
        <div class="bannerBlog headermax" style="background-image: url('{{ asset('storage/cc/'.$centrocomercial->id.'/'.$centrocomercial->banner)}}')">
            <h1 class="title" style="margin-top:7%; text-shadow: 0px 0px 30px #000">{{ $centrocomercial->nombre }}</h1>
        </div>
    @else
        <div class="bannerBlog headermax" style="background-image: url('{{ asset('img/registro.jpg')}}');height:400px">
            <h1 class="title" style="margin-top:7%; text-shadow: 0px 0px 30px #000">{{ $centrocomercial->nombre }}</h1>
        </div>
    @endif    
</div>
<div class="feature" style="background: #F3F3F3;padding:10px">
    <h4 class="title"></h4>
    <div class="feature__wrap container">
        @foreach($categorias as $categoria)
            <div class="feature__item">
            <a href="{{'#'.$categoria->name}}"><img src="{{ asset('img/categorias/'.$categoria->name.'.jpg') }}" style="width: 98%; height: 160px; border: 5px solid #fff" class="shad"> 
                </a>
                <div class="feature__content">
                    <h3 style="color: #fff; text-shadow: 0px 0px 15px #000; font-size: 18px">{{ $categoria->name }}</h3><span style="color: #000; font-size: 1px">.</span>
                </div>
            </div>
        @endforeach    
    </div>
  </div>
<h1 style="font-size: 28px; text-align: center; background-color: #f3f3f3; padding-top: 20px">Tiendas Recomendadas</h1>

@foreach ($categorias as $categoria)
    <?php $paux = 0; ?>
<div class="blog" style="background: #F3F3F3; margin-top: 0px; padding-top: 20px" id="{{$categoria->name}}">
        <h4 class="title" style="text-align: left; margin-left: 140px">{{$categoria->name}} <a href="{{ url('puestos/all') }}"> Ver Más</a></h4>
        <div class="feature__wrap container" style="margin-top: -20px" >
            <div class="blog__wrap dflex">
                @foreach ($puestos as $ps)
                    @if ($paux < 4)
                        @if ($ps->puestosubcategorias->first()->subcategoria->categoria_id == $categoria->id)
                            @if($ps->banner != null and $ps->perfil != null)
                                <?php $puestosubcategorias = $ps->puestosubcategorias->random(1)->first(); ?>
                                @if($puestosubcategorias != null)
                                    @if(count($puestosubcategorias->grupos) > 0)
                                        <?php $aux=0; ?>
                                        <?php $paux = $paux + 1; ?>
                                        <div class="blog__item col-lg-3" style="background:#fff; height: 350px; padding: 0px">
                                            <div class="blog__image" style="margin-left: 0px;">
                                                <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                    <img src="{{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" width="100%" alt="" height="120px" style="position: relative; z-index: 5; top: 0px; border: 3px solid #fff" class="shad">
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                    <img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="90px" width="90px" class="shad" style="position: relative; z-index: 6; top: -50px; border: 3px solid #fff; background: #fff; border-radius: 5%">
                                                </a>
                                            </div>
                                            <div class="blog__content" style="margin-top: -60px">
                                                <h1 style="color: #bf0000">{{ $ps->name}}</h1><br><br>
                                                <div class="row">
                                                    @foreach ($puestosubcategorias->grupos as $grupos)
                                                        @if (count($grupos->productos) > 0)
                                                            @if($aux < 3)  
                                                                <?php $imagen = null; 
                                                                $gp = $grupos->productos->random(1)->first();?>
                                                                @if ($gp->activo)
                                                                    <?php $imagen = $gp->imagen_productos->first(); //solo una imagen x producto?>
                                                                    @if($imagen != null)
                                                                            <a href="{{ url('producto/'.$gp->id.'/detailProd')}}" style="margin:auto">                                       
                                                                                <img src="{{ asset('storage/'.$ps->id.'/'.$gp->id.'/'.$imagen->imagen) }}" alt="" height="100px" width="75px" style="border: 3px solid #fff; margin: auto; border-radius: 10%" class="shad">
                                                                            </a>
                                                                        <?php $aux = $aux+1; ?>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <!--<p> substr($ps->description,0,60)}...</p> -->
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endforeach


@endsection