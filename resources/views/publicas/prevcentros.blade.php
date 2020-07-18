@foreach($centros as $cc)
    <div class="feature__item" style="border-radius: 15px"><a href="{{ url('/centrocomercial/'.$cc->id) }}">
        <img src="{{ asset('storage/cc/'.$cc->id.'/'.$cc->logo) }}" style="width: 98%; height: 160px; border: 5px solid #fff;border-radius: 15px" class="shad"> 
        </a>
        <div class="feature__content">
        <a href="{{ url('/centrocomercial/'.$cc->id) }}"><h3 style="color: #fff; text-shadow: 0px 0px 15px #FFF; font-size: 12px">{{ $cc->nombre }}</h3></a><span class="light11" style="color: #fff; text-shadow: 0px 0px 30px #FFF">{{$cc->cantidad}} Tiendas</span>
        </div>
    </div>
@endforeach   