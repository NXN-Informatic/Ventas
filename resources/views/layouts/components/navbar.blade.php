
<!--Start Menu Moblie-->
<div class="closeMenu"></div>
<div class="mobile">
    <div class="search dflex">
        <input type="text" class="xlight12" placeholder="Buscar productos en Tacna"><i class="fas fa-search"></i>
    </div>
    <div style="text-align: right;">    
        <a href="{{ url('register') }}">
            <button class="btn" style="background:#bf0000; border-radius:10px; font-weight: bold; border-color:#bf0000"><strong class="medium11">Crear tienda</strong></button>  
        </a>
    </div>
    <div class="mobile__tab-control dflex">
        <div class="tab__item col-6 active"><span class="buttonTab">Menu</span></div>
        <div class="tab__item col-6"><span class="buttonTab">Categorias</span></div>
    </div>
    <div class="mobile__tab">
        <ul class="tab__list active">
 
            <li class="tab__item"><a class="link" href="{{ url('/login') }}">Ingresar</a></li>
            <li class="tab__item"><a class="link" href="{{ url('/register') }}">Registro</a></li>
            
        </ul>
        <ul class="tab__list category" id="tags">
            <li value="0"><span>TODOS</span></li>
            @foreach($categorias as $categoria)
            <li class="tab__item" value="{{ $categoria->id }}">
                <a class="link dflex" href="#"><span>{{ $categoria->name }}</span></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@if(auth()->user())
    <div class="moblie-navBottom dflex">
        <a class="link" href="{{ url('/') }}"><i class="fas fa-home" style="font-size: 20px"></i><p>Inicio</p></a>
        <a class="link" href="{{ url('#') }}"><i class="fas fa-heart" style="font-size: 20px"></i><p>Favoritos</p></a>
        <a class="link nav">
            <div class="nav__button"><i class="fas fa-bars" style="font-size: 20px"></i><p>Menú</p>
            </div>
        </a>
        <a class="link" href="{{ url('/home')}}"><i class="fas fa-store" style="font-size: 20px"></i><p>Mi Tienda</p></a>
    </div>
@else
    <div class="moblie-navBottom dflex">
        <a class="link" href="{{ url('/') }}"><i class="fas fa-home" style="font-size: 20px"></i><p>Inicio</p></a>
        <a class="link" href="{{ url('#') }}"><i class="fas fa-heart" style="font-size: 20px"></i><p>Favoritos</p></a>
        <a class="link nav">
            <div class="nav__button"><i class="fas fa-bars" style="font-size: 20px"></i><p>Menú</p>
            </div>
        </a>
        <a class="link" href="{{url('/login')}}"><i class="fas fa-store" style="font-size: 20px"></i><p>Mi Tienda</p></a>
    </div>
@endif
<!--End Menu Mobile-->