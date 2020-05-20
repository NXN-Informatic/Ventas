@extends('layouts.panel')

@section('load')
  <!--Start Page Loader-->
  <div class="loader dflex"><img src="{{ asset('img/images/logo/wood-logo-dark.svg') }}" alt="" >
    <div class="dflex"><span></span><span></span><span></span></div>
  </div>
  <!--End Page Loader-->
@endsection

@section('content')
@section('title','Bienvenido')
@include('layouts.components.navbar')
@include('layouts.components.banner')

<!--Start Featured Products-->
<div class="featureProduct">
    <div class="firstTitle" id="ocultarBanner4">Actualmente tenemos 315 Productos</div>
    <h4 class="title">Productos Disponibles</h4>
    <div class="feature__filter">
        <div class="button-group filters-button-group feature__buttons">
        </div>
        <ul class="featureSlider">
            <li class="grid features__grid" id="prod">
            
            </li>

            <li class="grid features__grid" id="mostrar">
            
            </li>
        </ul>
    </div>
    <button type="submit" style="background:#153d77"">VER MAS PRODUCTOS</button>
</div>
<!--End Featured Products-->

<!--Start Feature Product-->
<div class="featureProduct singleProduct">
    <div class="feature__wrap container">
    <h4 class="title">TIENDAS DISPONIBLES</h4>
    <div class="feature__filter">
        <div class="featureSlider">
        <div class="sliderButton left"><i class="fas fa-angle-left"></i></div>
        <div class="sliderButton right"><i class="fas fa-angle-right"></i></div>
        <ul class="features__grid" id="wrap">
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image wood light5"><img src="{{ url('img/images/singleProduct/product/light5-yellow.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color"><span style="background:#19a8e3" data-image="{{ url('img/images/singleProduct/product/light5-blue.jpg') }}"></span><span style="background: #bfbfbf" data-image="./images/singleProduct/product/light5-gray.jpg') }}"></span><span style="background:#cb2028" data-image="./images/singleProduct/product/light5-red.jpg') }}"></span><span style="background:#fefb4a" data-image="./images/singleProduct/product/light5-yellow.jpg') }}"></span></div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Hanging lamp lukasi</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$169.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image wood light2"><img src="{{ url('img/images/singleProduct/product/light2-blue.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color"><span style="background:#19a8e3" data-image="{{ url('img/images/singleProduct/product/light2-blue.jpg') }}"></span><span style="background:#cb2028" data-image="./images/singleProduct/product/light2-red.jpg') }}"></span><span style="background:#fefb4a" data-image="./images/singleProduct/product/light2-yellow.jpg') }}"></span></div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Ulltrices nunc</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$259.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image voi"><img src="{{ url('img/images/singleProduct/product/voi-3.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color">
                    <div class="image" data-image="{{ url('img/images/singleProduct/product/voi-2.jpg') }}"></div>
                </div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Pulvinar sed sceleris</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$459.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image wood light3"><img src="{{ url('img/images/singleProduct/product/light3-red.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color"><span style="background:#000" data-image="{{ url('img/images/singleProduct/product/light3-black.jpg') }}"></span><span style="background:#19a8e3" data-image="./images/singleProduct/product/light3-blue.jpg') }}"></span><span style="background:#50b948" data-image="./images/singleProduct/product/light3-green.jpg') }}"></span><span style="background:#cb2028" data-image="./images/singleProduct/product/light3-red.jpg') }}"></span></div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Ut commodo adipiscing</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$159.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image"><img src="{{ url('img/images/singleProduct/product/light4-2.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color"></div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Suspension nano black</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$99.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image wood2"><img src="{{ url('img/images/singleProduct/product/wood-1.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color">
                    <div class="image" data-image="{{ url('img/images/singleProduct/product/wood-2.jpg') }}"></div>
                </div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Ullamcorper nisl ullamcorper</a><a class="sub-link" href="#">Furniture</a>
                <p class="price">$456.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image wood fiftyPercent light1"><img src="{{ url('img/images/singleProduct/product/light1-red.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color"><span style="background:#000" data-image="{{ url('img/images/singleProduct/product/light1-black.jpg') }}"></span><span style="background: #bfbfbf" data-image="./images/singleProduct/product/light1-gray.jpg') }}"></span><span style="background:#50b948" data-image="./images/singleProduct/product/light1-green.jpg') }}"></span><span style="background:#cb2028" data-image="./images/singleProduct/product/light1-red.jpg') }}"></span></div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Hanging lamp lukasi</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$199.00 - $399.00</p>
            </div>
            </li>
            <li class="features__item col-lg-3 col-sm-6 col-12">
            <div class="features__image light"><img src="{{ url('img/images/singleProduct/product/light-2.jpg') }}" alt="">
                <div class="image__tools"><i class="far fa-heart"></i>
                <i class="fas fa-cart-plus"></i>
                <i class="fas fa-search"></i>
                </div>
                <div class="image__overlay dflex">
                <div class="color">
                    <div class="image" data-image="{{ url('img/images/singleProduct/product/light-1.jpg') }}"></div>
                </div><a class="share" href="#"><i class="fas fa-random"></i></a>
                </div>
            </div>
            <div class="features__content"><a class="link" href="#">Pharetra enim</a><a class="sub-link" href="#">Lighting</a>
                <p class="price">$229.00</p>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </div>
    <button type="submit" style="background:#153d77"">VER MAS TIENDAS</button>
</div>
<!--End Feature Product-->

<!--Start Join-->
<div class="join dflex">
    <h4 class="title">DEJANOS TU CORREO</h4>
    <form class="dflex" action="#">
        <input type="text" placeholder="Ingrese su correo electrónico">
        <button type="submit" style="background:#153d77"">ENVIAR</button>
    </form>
</div>
<!--End Join-->
@include('layouts.components.footer')

@endsection

@section('scripts')

<script>
    $(function() {
        $producto_id = $('#prod');
        $mostrar = $('#mostrar');
        onload('feriaTacna');
        $('#mostrar').hide();
        $("#buscar").on("keyup", function() {
            valor=$(this).val();
            if(valor.length === 0) {
                $('#ocultarBanner').show();
                $('#ocultarBanner2').show();
                $('#ocultarBanner3').show();
                $('#ocultarBanner4').show();
                $('#mostrar').hide();
                $('#prod').show();
            }else {
                mostrarload(valor);
                $('#ocultarBanner').hide();
                $('#ocultarBanner2').hide();
                $('#ocultarBanner3').hide();
                $('#ocultarBanner4').hide();
                $('#prod').hide();
                $('#mostrar').show();
            }
        });

        function onload(name) {
            const url = `/productos/${name}/all`;
            $.getJSON(url, onProductos);
        }

        function mostrarload(name){
            const url = `/productos/${name}/all`;
            $.getJSON(url, onMostrar);
        }

        function onMostrar(data) {
            console.log(data);
            let htmlOptions = '';
            data.forEach(productos => {
                htmlOptions += 
                `<div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">`+
                    `<div class="features__image desk"><img src="{{ asset('img/images/home/product/product-furniture-4-2-430x491.jpg') }}" alt="">`+
                        `<div class="image__overlay">`+
                            `<div class="color">`+
                                `<div class="image" data-image="{{ asset('img/images/home/product/product-furniture-4-3-430x491.jpg') }}"></div>`+
                            `</div><a class="share" href="#"><i class="fas fa-random"></i></a>`+
                        `</div>`+
                    `</div>`+
                    `<div class="features__content"><a class="link" href="#">${productos.name}</a>`+
                        `<p class="price">$${productos.precio}</p>`+
                        `<div class="content__overlay">`+
                            `<p>${ productos.description }</p>`+
                            `<div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">Ver Producto</a><a href="#"><i class="fas fa-search"></i></a></div>`+
                        `</div>`+
                    `</div>`+
                `</div>`;
            });
            $mostrar.html(htmlOptions);
        }

        function onProductos(data) {
            console.log(data);
            let htmlOptions = '';
            $("prod").remove();
            data.forEach(productos => {
                htmlOptions += 
                `<div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">`+
                    `<div class="features__image desk"><img src="{{ asset('img/images/home/product/product-furniture-4-2-430x491.jpg') }}" alt="">`+
                        `<div class="image__overlay">`+
                            `<div class="color">`+
                                `<div class="image" data-image="{{ asset('img/images/home/product/product-furniture-4-3-430x491.jpg') }}"></div>`+
                            `</div><a class="share" href="#"><i class="fas fa-random"></i></a>`+
                        `</div>`+
                    `</div>`+
                    `<div class="features__content"><a class="link" href="#">${productos.name}</a>`+
                        `<p class="price">$${productos.precio}</p>`+
                        `<div class="content__overlay">`+
                            `<p>${ productos.description }</p>`+
                            `<div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">Ver Producto</a><a href="#"><i class="fas fa-search"></i></a></div>`+
                        `</div>`+
                    `</div>`+
                `</div>`;
            });
            $producto_id.html(htmlOptions);
        }
    });
</script>
@endsection


