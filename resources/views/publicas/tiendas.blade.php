@extends('layouts.panel')

@section('styles')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('css/publicas/detailProduc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/extras.css') }}">
    <style type="text/css">
      .wsp:hover
      {
        -moz-box-shadow: 0 0 10px rgb(4, 182, 34);
        -webkit-box-shadow: 0 0 10px rgb(4, 182, 34);
        box-shadow: 0 0 10px rgb(4, 182, 34);
      }
      .shad2
      {
        -moz-box-shadow: 0 0 10px #c5c5c5;
        -webkit-box-shadow: 0 0 10px #c5c5c5;
        box-shadow: 0 0 10px #c5c5c5;
      }
      .ocultarFacebook{
          display:block;
      }
      .ocultarphone{
          display:none;
      }
      @media (max-width: 600px) {
        .ocultarFacebook {
            display:none;
        }
        .ocultarphone{
            display:block;
        }
      }
    </style>
@endsection

@section('content')
@include('layouts.components.navbar')
@section('title','Bienvenido')
<div id="fb-root"></div>
<!--Start Single Product-->
<div id="ocultar9" style="background: #F9F9F9" style="position: relative;z-index:1000">
    <div class="bannerBlog headermax shad imgb row" style="position: relative;background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%); padding:0px " >
    </div> 
</div>
    <div class="col-3">

    </div>
    <div class="col-9">
        <div class="singleProduct ajaxProduct featureProduct" style="background: #fff; border-radius: 20px; padding-top:0px">
            <div class="feature__filter container">
                <div class="tab__control dflex" style="margin-top: 0px;margin-bottom: 3px">
                    <div class="tab__item active bold12">Destacados</div>
                    @foreach ($categorias as $categoria)
                        <div class="tab__item bold12">{{$categoria->name}}</div>
                    @endforeach
                </div>
                <div class="tabs">
                    <ul class="featureSlider">
                        <li class="features__grid active">
                            @foreach ($destacados as $pst)
                                <div class="blog colw" style="background: #F9F9F9; margin-top: 30px; padding-top: 20px">
                                    <span class="bold16" style="color: #444; text-align:left">{{$pst->first()->puestosubcategorias->first()->subcategoria->categoria->name}}</span>
                                    <div class="feature__wrap " style="margin-top: -20px" >
                                        <div class="blog__wrap dflex" style="padding: 0px">
                                            <?php $paux = 0;?>
                                            @foreach($pst as $ps)
                                                @if ($paux < 4)
                                                    @if($ps->perfil != null)
                                                        @php
                                                            $puestosubcategorias = $ps->puestosubcategorias->random(1)->first();
                                                        @endphp
                                                        @if($puestosubcategorias != null)
                                                            @if(count($puestosubcategorias->grupos) > 0)
                                                                <?php $aux=0; ?>
                                                                <?php $paux = $paux + 1; ?>
                                                                <div class="blog__item col-lg-4 col-sm-4 col-6 tiendah shad" style="background:#fff; padding: 3px;border-radius:15px; margin-bottom:5px;margin-top:5px">
                                                                    <div class="blog__image" style="margin-left: 0px;">
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                                            <div style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%); width:100%; height:80px;border-radius:15px 15px 0px 0px"></div>   
                                                                            <!-- <img src="{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" width="100%" alt="" height="100px" style="position: relative; z-index: 5; top: 0px; border: 3px solid #fff" class="shad"> -->
                                                                        </a>
                                                                    </div>
                                                                    <div>
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                                            <img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="90px" width="90px" class="shad" style="position: relative; z-index: 6; top: -50px; border: 3px solid #fff; background: #fff; border-radius: 50%">
                                                                        </a>
                                                                    </div>
                                                                    <div class="blog__content" style="margin-top: -60px">
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank"><span class="regular13" style="color: #444; display: inline-block"><strong>{{ $ps->name}}</strong></span><br><br></a>
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
                                                                                                        <img src="{{ asset('storage/'.$ps->id.'/'.$gp->id.'/'.$imagen->imagen) }}" alt="" style="border: 2px solid #fff; margin: auto; border-radius: 10%" class="imgp shad">
                                                                                                    </a>
                                                                                                <?php $aux = $aux+1; ?>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                        <br>
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank"><span class="regular13" style="color: #ff1a00;">Ver tienda</span></a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                        @foreach ($categs as $pst)
                            <li class="features__grid">
                                <div class="blog colw" style="background: #F9F9F9; margin-top: 30px; padding-top: 20px">
                                    <div class="feature__wrap " style="margin-top: -20px" >
                                        <div class="blog__wrap dflex" id="{{$pst->first()->puestosubcategorias->first()->subcategoria->categoria->name}}" data-id=1 style="padding: 0px">
                                            <?php $paux = 0;?>
                                            @foreach($pst as $ps)
                                                @if ($paux < 4)
                                                    @if($ps->perfil != null)
                                                        @php
                                                            $puestosubcategorias = $ps->puestosubcategorias->random(1)->first();
                                                        @endphp
                                                        @if($puestosubcategorias != null)
                                                            @if(count($puestosubcategorias->grupos) > 0)
                                                                <?php $aux=0; ?>
                                                                <?php $paux = $paux + 1; ?>
                                                                <div class="blog__item col-lg-4 col-sm-4 col-6 tiendah shad" style="background:#fff; padding: 3px;border-radius:15px; margin-bottom:5px;margin-top:5px">
                                                                    <div class="blog__image" style="margin-left: 0px;">
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                                            <div style="background: linear-gradient(85deg, #8f33ac 0%, #ff1a00 100%); width:100%; height:80px;border-radius:15px 15px 0px 0px"></div>   
                                                                            <!-- <img src="{ url('storage/'.$ps->id.'/banner/'.$ps->banner) }}" width="100%" alt="" height="100px" style="position: relative; z-index: 5; top: 0px; border: 3px solid #fff" class="shad"> -->
                                                                        </a>
                                                                    </div>
                                                                    <div>
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank">
                                                                            <img src="{{ url('storage/'.$ps->id.'/logo/'.$ps->perfil) }}" alt="" height="90px" width="90px" class="shad" style="position: relative; z-index: 6; top: -50px; border: 3px solid #fff; background: #fff; border-radius: 50%">
                                                                        </a>
                                                                    </div>
                                                                    <div class="blog__content" style="margin-top: -60px">
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank"><span class="regular13" style="color: #444; display: inline-block"><strong>{{ $ps->name}}</strong></span><br><br></a>
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
                                                                                                        <img src="{{ asset('storage/'.$ps->id.'/'.$gp->id.'/'.$imagen->imagen) }}" alt="" style="border: 2px solid #fff; margin: auto; border-radius: 10%" class="imgp shad">
                                                                                                    </a>
                                                                                                <?php $aux = $aux+1; ?>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                        <br>
                                                                        <a href="{{ url('/puesto/'.$ps->id.'/detail') }}" target="_blank"><span class="regular13" style="color: #ff1a00;">Ver tienda</span></a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script>
    let nombre='';
    let pagina=2;
    
    window.onscroll=() =>{
        if(window.scrollY > (document.body.offsetHeight - window.outerHeight)){
            fetch(`/tiendas/${nombre}?page=${pagina}`,{
                method:'get'
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById(nombre).innerHTML += html
            })
            .catch(error => console.log(error))
            pagina++
            document.getElementById(nombre).setAttribute('data-id',pagina);
        }
    }
</script>
@endsection



