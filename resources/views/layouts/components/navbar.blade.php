
<!--Start Menu Moblie-->
<div class="closeMenu"></div>
<div class="mobile">
    <div class="search dflex">
        <input type="text" placeholder="Buscar Tiendas"><i class="fas fa-search"></i>
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
        <a class="link" href="{{ url('/puestos/all') }}"><i class="fas fa-store"></i><p>Tiendas</p></a>
        <a class="link" href="{{ url('/all/productos') }}"><i class="fas fa-heart"></i><p>Productos</p></a>
        <a class="link" href="{{ url('/login') }}"><i class="fas fa-user"></i><p>Mi cuenta</p></a>
        <a class="link" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com"><i class="fas fa-random"></i><p>Compartir</p></a>
    </div>
@else
    <div class="moblie-navBottom dflex">
        <a class="link" href="{{ url('/puestos/all') }}"><i class="fas fa-store"></i><p>Tiendas</p></a>
        <a class="link" href="{{ url('/all/productos') }}"><i class="fas fa-heart"></i><p>Productos</p></a>
        <a class="link" href="{{ url('/login') }}"><i class="fas fa-user"></i><p>Mi cuenta</p></a>
        <a class="link" href="http://www.facebook.com/sharer.php?u=https://feriatacna.com"><i class="fas fa-random"></i><p>Compartir</p></a>
    </div>
@endif
<!--End Menu Mobile-->