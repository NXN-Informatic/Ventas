@foreach ($productos as $producto)
    <?php $imagen = null; ?>
    <?php $imagen = $producto->imagen_productos->first(); //solo una imagen x producto?>
        @php
            $ps = $producto->grupo->puestosubcategoria->puesto_id;
        @endphp
        <div class="features__item col-lg-3 col-sm-4 col-6 shad" style="margin:auto; margin-bottom: 10px; border-radius: 15px">
            <div class="features__image" style="border-radius: 15px">
                <a href="{{ url('/producto/'.$producto->id.'/detailProd') }}" target="_blank">
                    @if ($imagen != null)
                        <img class="imgh" src="{{ asset('storage/'.$ps.'/'.$producto->id.'/'.$imagen->imagen) }}"  width="100%" alt="" style="border: 5px solid #fff; border-radius: 15px">
                    @else
                        <img class="imgh" src="{{ asset('img/nodisponible.png') }}"  width="100%" alt="" style="border: 5px solid #fff; border-radius: 15px">
                    @endif
                </a>
                <div class="precio1" style="padding:5px;position: absolute; bottom:0;right:0px;background-color:#fff">
                    <span class="bold15" style="color:#ff1a00"><strong>S/. {{$producto->precio}}</strong></span>
                </div>
            </div>
            <div class="features__content contenido">
                <div class="row">
                    <span class="light11" style="color: #000; text-align:left;margin-left:15px">{{$producto->grupo->name}}</span>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-12">
                        <p class="fontn bold12" style="color: #333333; text-align:left">{{$producto->name }}</p>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-12 precio" style="padding:5px;">
                        <span class="bold15" style="color:#ff1a00"><strong>S/. {{$producto->precio}}</strong></span>
                    </div>
                </div>
                <div class="control dflex" style="position:absolute;bottom: 3%; left: 0; right: 0">
                    <a href="#"><i class="far fa-heart"></i></a>
                    <a class="btn active" style="border-radius:3px; padding: 5px" href="{{ url('/puesto/'.$ps.'/detail') }}"><span class="bold10">Visitar Tienda</span></a>
                    <a href="#"><i class="fas fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
@endforeach