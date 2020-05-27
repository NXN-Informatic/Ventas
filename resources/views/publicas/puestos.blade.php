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
@include('layouts.components.navbar')
<!--Start Banner Slide-->
<div class="banner">
    <div class="banner__control">
        <div class="circle dflex"><span class="active" data-slide="0"></span><span data-slide="1"></span><span data-slide="2"></span></div>
        <div class="button buttonLeft dflex"><i class="fas fa-angle-left"></i></div>
        <div class="button buttonRight dflex"><i class="fas fa-angle-right"></i></div>
    </div>
    <ul class="slider dflex">
        <li class="slider__item col-12 dflex firstSlide active">
            <div class="image col-lg-12 col-12">
                <img class="switchImage" src="{{ asset('img/banner.jpg')}}" alt="">
            </div>
        </li>
    </ul>
</div>
<!--End Banner Slide-->
<!--Start Featured Products-->
<div class="featureProduct">
    <label style="font-size:20px; color:#F0C908">
        @for ($i = 0; $i < $puesto->calification; $i++)   
            <i class="fas fa-star"></i>
        @endfor
        @for ($i = 0; $i < (5 - $puesto->calification); $i++)
            <i class="far fa-star text-dark"></i> 
        @endfor
    </label><br><br>
    <label style="font-size:20px">
        <i class="fas fa-phone-volume"></i> Llamar {{ $puesto->phone }}
    </label><br><br>
    <h4 class="title">{{ $puesto->name }}</h4>
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider container">
            <li class="grid features__grid">
                @foreach($puesto->puestosubcategorias as $puestosubcategorias)
                    @foreach($puestosubcategorias->grupos as $grupos)
                        @foreach($grupos->productos as $productos)
                        @foreach($productos->imagen_productos as $imagen) @endforeach
                        @if($imagen)
                        <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                            <div class="features__image desk"><img src="{{ asset('storage/'.$puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"  width="200px" height="300px" alt="">
                                <div class="image__overlay">
                                    <div class="color">
                                        <div class="image" data-image="{{ asset('storage/'.$puesto->id.'/'.$productos->id.'/'.$imagen->imagen) }}"  width="200px" height="300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="features__content"><a class="link" href="#">{{$productos->name}}</a>
                                <p class="price">S./ ${{$productos->precio}}</p>
                                <div class="content__overlay">
                                    <p>{{ $productos->description }}</p>
                                    <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/'. $productos->id.'/detailProd') }}"><i class="fas fa-search"></i></a></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                            <div class="features__image desk"><img src="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px" alt="">
                                <div class="image__overlay">
                                    <div class="color">
                                        <div class="image" data-image="{{ asset('img/defaultProducto.jpg') }}"  width="200px" height="300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="features__content"><a class="link" href="#">{{$productos->name}}</a>
                                <p class="price">S./ ${{$productos->precio}}</p>
                                <div class="content__overlay">
                                    <p>{{ $productos->description }}</p>
                                    <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="{{ url('/producto/'.$productos->id.'/detailProd') }}" target="black">Ver Producto</a><a href="{{ url('/producto/'. $productos->id.'/detailProd') }}"><i class="fas fa-search"></i></a></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    @endforeach
                @endforeach
            </li>
        </ul>
    </div>
</div>


<section class="disqus container">
    <h2>Comparte tu Opinión</h2>
    <div id="disqus_thread"></div>
    <br><br><br>
</section>

@include('layouts.components.footer')
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script>
        (function() { // DON'T EDIT BELOW THIS LINE
        setTimeout(cargar, 1000);
        function cargar() {    
            var d = document, s = d.createElement('script');
            s.src = 'https://feriatacna.disqus.com/embed.js';
            s.setAttribute('data-timestamp', new Date());
            (d.head || d.body).appendChild(s);
        }
        })();
    </script>
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


