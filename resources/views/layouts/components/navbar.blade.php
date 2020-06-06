
<!--Start Menu Moblie-->
<div class="closeMenu"></div>
<div class="mobile">
    <div class="search dflex">
        <input type="text" placeholder="Buscar Tiendas"><i class="fas fa-search"></i>
    </div>
    <div class="mobile__tab-control dflex">
        <div class="tab__item col-6 active"><span class="buttonTab">MENU</span></div>
        <div class="tab__item col-6"><span class="buttonTab">CATEGORIES</span></div>
    </div>
    <div class="mobile__tab">
        <ul class="tab__list active">
 
            <li class="tab__item"><a class="link" href="{{ url('/login') }}">Login</a></li>
            <li class="tab__item"><a class="link" href="{{ url('/register') }}">Register</a></li>
            
        </ul>
        <ul class="tab__list category">
            @foreach($categorias as $categoria)
            <li class="tab__item">
                <a class="link dflex" href="#"><span>{{ $categoria->name }}</span></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="moblie-navBottom dflex"><a class="link" href="#"><i class="fas fa-store"></i>
    <p>Shop</p></a><a class="link" href="#"><i class="fas fa-filter"></i>
    <p>Filters</p></a><a class="link" href="#"><i class="fas fa-heart"></i>
    <p>Wishlist</p></a><a class="link" href="#"><i class="fas fa-user"></i>
    <p>My Account</p></a><a class="link" href="#"><i class="fas fa-random"></i>
    <p>Compare</p></a>
</div>
<!--End Menu Mobile-->