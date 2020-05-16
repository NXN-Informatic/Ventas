@extends('layouts.panel')
@section('ogTitle'){{ $puesto->name }}@endsection
@section('ogUrl'){{ 'http://feriatacna.com/puesto/'.$puesto->id.'/detail' }}@endsection
@section('ogDesc'){{ $puesto->description }}@endsection
@section('ogImage'){{ 'http://feriatacna.com/storage/'.$puesto->id.'/banner/'.$puesto->banner }}@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <style>
    .swiper-button-prev,
    .swiper-button-next {
        display: none !important;
    }
    
    .swiper-container:hover .swiper-button-prev,
    .swiper-container:hover .swiper-button-next {
        display: flex !important;
    }
    </style>
@endsection

@section('content')
@include('layouts.components.navbarHide')
<!--Start Banner Header-->
<div style="background-color: rgba(0,0,0,0.6);background:url(../../storage/4/banner/banner.jpg); 
            background-size:cover;  background-position:center; text-align:center;
            filter: brightness(90%);height:400px"
    class="bannerHeader">
    <h1 class="title">{{ $puesto->name }}</h1><a class="des link" href="#">CATEGORIES<i class="fas fa-angle-down"></i></a>
    <div class="banner__list dflex">
        @foreach($puesto->puestosubcatergorias as $puestosub)
        <a class="item dflex" href="#" style="margin-top:5%">
            @if($puestosub->subcategoria->imagen != null)
            <img src="{{ asset('storage/subcategorias/'.$puestosub->subcategoria->categoria_id.'/'.$puestosub->subcategoria->id.'/'.$puestosub->subcategoria->imagen) }}" 
            alt="" >
            @endif
            <div class="content"><span class="name" style="font-size:20px">{{ $puestosub->subcategoria->name }}</span></div>
        </a>
        @endforeach
    </div>
    <br>
    <h1 class="name" style="font-size:20px"><i class="align-middle mr-2 fas fa-fw fa-phone-volume"></i> {{ $puesto->phone }}</h1>
</div>
<!--End Banner Header-->

 <!--Start Shop Product-->
 <div class="closeFilter"></div>
    <div class="shopProduct">
        <div class="shopProduct__wrap dflex container">
            <ul class="product__item col-3 filter" style="background: #000">

            </ul>
            <div class="product__item col-lg-9 col-12">
                <div class="filter__control dflex">
                    <div class="control__item">
                        <div class="buttonSidebar"><i class="fas fa-bars"></i>SHOW SIDEBAR</div><a href="#">Home</a><span>/</span><a href="#"><strong>Shop</strong></a>
                    </div>
                    <div class="control__item dflex">
                        <div class="filterNumber">
                            <p><strong>Show:</strong><span class="number">9</span><span>/</span><span class="number active">12</span><span>/</span><span class="number">18</span><span>/</span><span class="number">24</span></p>
                        </div>
                        <div class="filterGrid dflex"><svg data-grid="gridRow" class="active" version="1.1" id="list-view" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18" height="18" viewBox="0 0 18 18" enable-background="new 0 0 18 18"
                                xml:space="preserve">
                            <rect width="18" height="2"></rect>
                            <rect y="16" width="18" height="2"></rect>
                            <rect y="8" width="18" height="2"></rect>
                            </svg>
                                                        <svg data-grid="fourGrid" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                            <path d="M7,2v5H2V2H7 M9,0H0v9h9V0L9,0z"></path>
                            <path d="M17,2v5h-5V2H17 M19,0h-9v9h9V0L19,0z"></path>
                            <path d="M7,12v5H2v-5H7 M9,10H0v9h9V10L9,10z"></path>
                            <path d="M17,12v5h-5v-5H17 M19,10h-9v9h9V10L19,10z"></path>
                            </svg>
                                                        <svg data-grid="nineGrid" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                            <rect width="5" height="5"></rect>
                            <rect x="7" width="5" height="5"></rect>
                            <rect x="14" width="5" height="5"></rect>
                            <rect y="7" width="5" height="5"></rect>
                            <rect x="7" y="7" width="5" height="5"></rect>
                            <rect x="14" y="7" width="5" height="5"></rect>
                            <rect y="14" width="5" height="5"></rect>
                            <rect x="7" y="14" width="5" height="5"></rect>
                            <rect x="14" y="14" width="5" height="5"></rect>
                            </svg>
                                                        <svg data-grid="sixteenGrid" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                            <rect width="4" height="4"></rect>
                            <rect x="5" width="4" height="4"></rect>
                            <rect x="10" width="4" height="4"></rect>
                            <rect x="15" width="4" height="4"></rect>
                            <rect y="5" width="4" height="4"></rect>
                            <rect x="5" y="5" width="4" height="4"></rect>
                            <rect x="10" y="5" width="4" height="4"></rect>
                            <rect x="15" y="5" width="4" height="4"></rect>
                            <rect y="15" width="4" height="4"></rect>
                            <rect x="5" y="15" width="4" height="4"></rect>
                            <rect x="10" y="15" width="4" height="4"></rect>
                            <rect x="15" y="15" width="4" height="4"></rect>
                            <rect y="10" width="4" height="4"></rect>
                            <rect x="5" y="10" width="4" height="4"></rect>
                            <rect x="10" y="10" width="4" height="4"></rect>
                            <rect x="15" y="10" width="4" height="4"></rect>
                            </svg>
                        </div>
                        <div class="filterInput">
                            <select>
                  <option value="Default Sorting">Default Sorting</option>
                  <option value="Sort by popularity">Sort by popularity</option>
                  <option value="Sort by average rating">Sort by average rating</option>
                  <option value="Sort by latest">Sort by latest</option>
                  <option value="Sort by price: low to high">Sort by price: low to high</option>
                  <option value="Sort by price: high to low">Sort by price: high to low</option>
                </select>
                        </div>
                    </div>
                </div>
                <ul class="filterProduct gridRow">
                    @foreach($puesto->puestosubcatergorias as $puesto_subcategoria)
                        @foreach($puesto_subcategoria->grupos as $grupo)
                            @foreach($grupo->productos as $producto)
                            <li class="product__item">
                                <div class="product__image">
                                <div class="swiper-container">
                                <div class="swiper-wrapper">
                                @foreach($producto->imagen_productos as $imagenProduc) 
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="{{ asset('/storage/'.$puesto_subcategoria->puesto->id.'/'.$producto->id.'/'.$imagenProduc->imagen) }}" 
                                        alt="{{ $puesto->name }}">
                                    </a>
                                </div>
                                @endforeach
                                </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                                </div>
                                <div class="product__content"><a class="link-title" href="#">{{ $producto->name }}</a>
                                    <a class="sub-link" href="#">STOCK {{ $producto->stock }}</a>
                                    <p class="price">${{$producto->precio}}</p>
                                    <p>
                                    {!! $producto->description !!}
                                    </p><a class="btn active" href="singleProduct.html">Añadir a favoritos</a>
                                </div>
                            </li>
                            @endforeach
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--End Shop Product-->
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            loopFillGroupWithBlank: true,

            autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            },

            // Si se desea agregar la paginacion 
            // pagination: {
            // el: '.swiper-pagination',
            // clickable: true,
            // },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection


