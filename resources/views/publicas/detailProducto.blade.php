@extends('layouts.panel')

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

@section('title','Bienvenido')

<!--Start Single Product-->
<div class="singleProduct">
      <div class="singleProduct__wrap container">
        <div class="firstTitle">{{ $producto->grupo->puestosubcategoria->puesto->description }}</div>
        <h4 class="title">{{ $producto->grupo->puestosubcategoria->puesto->name }}</h4>
        <div class="signleProduct__content">
          <div class="info dflex">
            <div class="info__content"><a href="#">Productos</a><span>/</span><a href="#">{{ $producto->name }}</a>
            </div>
            <div class="control dflex"><i class="fas fa-angle-left"></i><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
              <path d="M7,2v5H2V2H7 M9,0H0v9h9V0L9,0z"></path>
              <path d="M17,2v5h-5V2H17 M19,0h-9v9h9V0L19,0z"></path>
              <path d="M7,12v5H2v-5H7 M9,10H0v9h9V10L9,10z"></path>
              <path d="M17,12v5h-5v-5H17 M19,10h-9v9h9V10L19,10z"></path>
              </svg><i class="fas fa-angle-right"></i>
            </div>
          </div>
          <div class="product dflex">
            @foreach($producto->imagen_productos as $imagen_producto) @endforeach
            <div class="col-lg-8 col-12">
            
                  <div class="swiper-container">
                    <div class="swiper-wrapper">
                    @foreach($producto->imagen_productos as $imagenes)
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="{{ asset('storage/'.$producto->grupo->puestosubcategoria->puesto->id.'/'.$producto->id.'/'.$imagenes->imagen) }}" 
                                class="card-img-top" alt="" height="400px">
                            </a>
                        </div>
                    @endforeach
                    </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
            </div>
            <div class="content col-lg-4 col-12">
              <h1>{{ $producto->name }}</h1>
              <div class="price">${{ $producto->precio }}</div>
              <p>{{ $producto->description }}</p>
              <hr>
              <a class="tag" href="#"><strong>Celular: </strong>{{ $producto->grupo->puestosubcategoria->puesto->phone }}</a>
              <a class="tag" href="#"><strong>Celular2: </strong>{{ $producto->grupo->puestosubcategoria->puesto->phone2 }}</a>
              <a class="tag" href="#"><strong>Subcategoria: </strong>{{ $producto->grupo->puestosubcategoria->subcategoria->name }}</a>
              <div class="share dflex"><strong>Redes Sociales:</strong><i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-pinterest"></i>
                <i class="fab fa-linkedin-in"></i>
                <i class="fas fa-paper-plane"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Single Product-->
    
    @include('layouts.components.footer')
@endsection


@section('scripts')
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 100,
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



