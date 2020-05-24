@extends('layouts.panel')
@section('title','Puestos')
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

<!--Start Banner Slide-->
<div class="banner">
        <div class="banner__control">
            <div class="circle dflex"><span class="active" data-slide="0"></span><span data-slide="1"></span><span data-slide="2"></span></div>
            <div class="button buttonLeft dflex"><i class="fas fa-angle-left"></i></div>
            <div class="button buttonRight dflex"><i class="fas fa-angle-right"></i></div>
        </div>
        <ul class="slider dflex">
            <li class="slider__item col-12 dflex firstSlide active">
                <div class="content col-lg-6 col-6">
                    <h2>Simple - Rock Chairs</h2>
                    <p>Semper vulputate aliquam curae condimentum<br>quisque gravida fusce convallis arcu cum at.</p>
                    <div class="smallImage dflex"><img class="changeImage" src="{{ asset('img/images/bannerSlide/swatch-main-demo-1.jpg') }}" alt="" data-image="./images/bannerSlide/slider-main-demo-1.jpg"><img class="changeImage" src="./images/bannerSlide/swatch-main-demo-1-2.jpg" alt="" data-image="./images/bannerSlide/slider-main-demo-1-2.jpg">
                        <img class="changeImage" src="{{ asset('img/images/bannerSlide/swatch-main-demo-1-3.jpg') }}" alt="" data-image="./images/bannerSlide/slider-main-demo-1-3.jpg"><img class="changeImage" src="./images/bannerSlide/swatch-main-demo-1-4.jpg" alt=""
                            data-image="./images/bannerSlide/slider-main-demo-1-4.jpg"></div>
                    <div class="price">$199.00</div>
                </div>
                <div class="image col-lg-6 col-6"><img class="switchImage" src="{{ asset('storage/'.$puesto->id.'/banner/'.$puesto->banner)}}" alt=""></div>
            </li>
            <li class="slider__item col-12 dflex secondSlide">
                <div class="content col-lg-6 col-6">
                    <h2>Eanes - Side Chairs.</h2>
                    <div class="colors dflex">
                        <p>Color:</p>
                        <div class="blue color changeImage" data-image="./images/bannerSlide/slider-main-demo-2.jpg"></div>
                        <div class="red color changeImage" data-image="./images/bannerSlide/slider-main-demo-2-1.jpg"></div>
                        <div class="orange color changeImage" data-image="./images/bannerSlide/slider-main-demo-2-2.jpg"></div>
                    </div>
                    <p>Semper vulputate aliquam curae condimentum<br>quisque gravida fusce convallis arcu cum at.</p>
                    <div class="price">$99.00</div>
                </div>
                <div class="image col-lg-6 col-6"><img class="switchImage" src="{{ asset('img/images/bannerSlide/slider-main-demo-2.jpg') }}" alt=""></div>
            </li>
            <li class="slider__item col-12 dflex wooden">
                <div class="content col-lg-6 col-6">
                    <h3>Cappellini</h3>
                    <h2>Wooden Lounge Chairs</h2>
                    <p>Semper vulputate aliquam curae condimentum<br>quisque gravida fusce convallis arcu cum at.</p>
                    <div class="price">$999.00</div>
                </div>
                <div class="image col-lg-6 col-6"><img class="switchImage" src="{{ asset('img/images/bannerSlide/slider-main-demo-3.jpg') }}" alt=""></div>
            </li>
        </ul>
    </div>
    <!--End Banner Slide-->
 <!--Start Shop Product-->
 <div class="closeFilter"></div>
    <div class="shopProduct">
        <div class="shopProduct__wrap dflex container">
            <ul class="product__item col-3 filter text-center">
                <li class="filterOptions" style="text-align:center;">
                    <img src="{{ asset('storage/'.$puesto->id.'/logo/'.$puesto->perfil) }}" width="140" style="margin:auto;display:block;" height="140" class="rounded-circle" alt="">
                            
                    <h5 class="footerTitle" style="text-align:center; margin-top:5%">{{ $puesto->name }}</h5>
                    <label style="font-size:20px; color:#F0C908">
                        @for ($i = 0; $i < $puesto->calification; $i++)   
                            <i class="fas fa-star"></i>
                        @endfor
                        @for ($i = 0; $i < (5 - $puesto->calification); $i++)
                            <i class="far fa-star text-dark"></i> 
                        @endfor
                    </label>
                    @foreach($categorias as $categoria)
                        <h5 class="footerTitle" style="text-align:center; margin-top:5%;color:#83b735">{{ $categoria }}</h5>
                    @endforeach
                </li>
                <li class="filterOptions">
                    <h5 class="footerTitle">Contactos</h5>
                    <h2 style="text-align:center; margin-top:5%;color:#1f4173"><i class="align-middle mr-2 fas fa-fw fa-phone-volume"></i> {{ $puesto->phone }}</h2>
                    <h2 style="text-align:center; margin-top:5%;color:#1f4173"><i class="align-middle mr-2 fas fa-fw fa-phone-volume"></i> {{ $puesto->phone2 }}</h2>
                </li>
            </ul>
            <div class="product__item col-lg-9 col-12">
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
    <script>
        

    </script>
@endsection


