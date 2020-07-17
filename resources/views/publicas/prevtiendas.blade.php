<?php $paux = 0;?>
@foreach($tiendas as $ps)
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