@extends('layouts.panel')

@section('load')
  <!--Start Page Loader-->
  <div class="loader dflex"><img src="{{ asset('img/images/logo/wood-logo-dark.svg') }}" alt="" >
    <div class="dflex"><span></span><span></span><span></span></div>
  </div>
  <!--End Page Loader-->
@endsection

@section('content')
@include('layouts.components.navbar')
@include('layouts.components.bannercovid')
@include('layouts.components.banner')

<!--Start Feature Product-->
<div class="featureProduct singleProduct">
    <div class="feature__wrap container">
    <h4 class="title">TIENDAS NUEVAS</h4>
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
</div>
<!--End Feature Product-->

<!--Start Featured Products-->
<div class="featureProduct">
        <div class="firstTitle">Actualmente tenemos 315 Productos</div>
        <h4 class="title">Productos Disponibles</h4>
        <div class="lastTitle">####</div>
        <div class="feature__filter">
            <div class="button-group filters-button-group feature__buttons">
                <button class="button is-checked" data-filter="*">CATEGORIA 1</button>
                <button class="button" data-filter=".featured">CATEGORIA 2</button>
                <button class="button" data-filter=".sale">CATEGORIA 3</button>
            </div>
            <ul class="featureSlider">
                <li class="grid features__grid">
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image desk sale"><img src="{{ asset('img/images/home/product/product-furniture-4-2-430x491.jpg') }}" alt="">
                            <div class="image__overlay">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('img/images/home/product/product-furniture-4-3-430x491.jpg') }}"></div>
                                </div><a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Wooden single drawer</a><a class="sub-link" href="#">Furniture</a>
                            <p class="price">$249.00 - $399,00</p>
                            <div class="content__overlay">
                                <p>Placerat tempor dolor eu leo ullamcorper et magnis habitant ultrices consectetur arcu nulla mattis</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 featured">
                        <div class="features__image clocks"><img src="{{ asset('img/images/home/product/product-accessories-8-1-430x490.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color"><span style="background: #f0deba" data-image="{{ asset('img/images/home/product/product-accessories-8-430x490.jpg') }}"></span><span style="background: #000" data-image="{{ asset('img/images/home/product/product-accessories-8-1-430x490.jpg') }}"></span></div>
                                <a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Smart Watches Wood Edition</a><a class="sub-link" href="#">Accessories, Clocks</a>
                            <p class="price">$599.00</p>
                            <div class="content__overlay">
                                <p>Himenaeos parturient nam a justo placerat lorem erat pretium a fusce pharetra pretium enim sagittis ut nunc neque torquent sem a leo. Dictumst himenaeos primis torquent ridiculus.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image chair new"><img src="{{ asset('img/images/home/product/product-furniture-19-3-430x490.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color"><span style="background: #000" data-image="{{ asset('img/images/home/product/product-furniture-19-2-430x490.jpg') }}"></span><span style="background: #19a8e3" data-image="{{ asset('img/images/home/product/product-furniture-19-430x490.jpg') }}"></span>
                                    <span style="background: #bfbfbf" data-image="{{ asset('img/images/home/product/product-furniture-19-4-430x490.jpg') }}"></span><span style="background: #50b948" data-image="{{ asset('img/images/home/product/product-furniture-19-3-430x490.jpg') }}"></span></div>
                                <a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Panton Tunior Chair</a><a class="sub-link" href="#">Furniture</a>
                            <p class="price">$199.00</p>
                            <div class="content__overlay">
                                <p> Placerat tempor dolor eu leo ullamcorper et magnis habitant ultrices consectetur arcu nulla mattis fermentum adipiscing a et bibendum sed platea malesuada eget vestibulum.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 featured">
                        <div class="features__image tree"><img src="{{ asset('img/images/home/product/product-accessories-10-430x490.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('img/images/home/product/product-accessories-10-2-430x490.jpg') }}"></div>
                                </div><a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Decoration Wooden Present</a><a class="sub-link" href="#">Accessories</a>
                            <p class="price">$89.00</p>
                            <div class="content__overlay">
                                <p>Nam gravida vulputate est venenatis eu at ullamcorper consectetur parturient suspendisse a elit lobortis ut convallis vestibulum vulputate nunc praesent mattis sem faucibus risus sociosqu.Dapibus curae a ac vestibulum a
                                    magnis ullamcorper orci.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 featured">
                        <div class="features__image drink"><img src="{{ asset('img/images/home/product/product-furniture-11-430x490.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color">
                                    <div class="image" data-image="{{ asset('img/images/home/product/product-furniture-11-3-430x490.jpg') }}"></div>
                                </div><a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Wine Bottle Lantern</a><a class="sub-link" href="#">Accessories</a>
                            <div class="dflex star"><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="price">$399.00</p>
                            <div class="content__overlay">
                                <p> Consequat a scelerisque suspendisse vel et eget eu vitae adipiscing nibh scelerisque semper cum adipiscing facilisis adipiscing est accumsan lorem vestibulum. Aliquet mus a aptent ullam corper metus accumsan.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 featured">
                        <div class="features__image dock"><img src="{{ asset('img/images/home/product/dock-black-walnut-ip6-grid-A4_7-430x490.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color"><span style="background:#0a0a0a;" data-image="{{ asset('img/images/home/product/dock-black-walnut-ip6-grid-A4_7-430x490.jpg') }}"> </span><span style="background:#bfbfbf;" data-image="{{ asset('img/images/home/product/dock-black-walnut-ip6-grid-B1_1-430x491.jpg') }}"> </span></div>
                                <a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">iPhone Dock</a><a class="sub-link" href="#">Accessories</a>
                            <div class="dflex star"><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="price">$399.00</p>
                            <div class="content__overlay">
                                <p>Consequat a scelerisque suspendisse vel et eget eu vitae adipiscing nibh scelerisque semper cum adipiscing facilisis adipiscing est accumsan lorem vestibulum.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 featured">
                        <div class="features__image pen"><img src="{{ asset('img/images/home/product/product-furniture-14-430x491.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color"><span style="background:#f0deba;" data-image="{{ asset('img/images/home/product/product-furniture-14-430x491.jpg') }}"> </span><span style="background:#49271d;" data-image="{{ asset('img/images/home/product/product-furniture-14-2-430x491.jpg') }}"> </span></div>
                                <a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Decoration For Table Pen</a><a class="sub-link" href="#">Accessories</a>
                            <div class="dflex star"><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="price">$359.00</p>
                            <div class="content__overlay">
                                <p> Adipiscing neque a a montes parturient scelerisque molestie magnis adipiscing mus porta parturient est a blandit fusce adipiscing augue per magnis venenatis ullamcorper.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item features__item col-lg-3 col-sm-6 col-12 sale">
                        <div class="features__image loungeChair fiftyPercent hot"><img src="{{ asset('img/images/home/product/product-furniture-8-430x490.jpg') }}" alt="">
                            <div class="image__overlay dflex">
                                <div class="color"><span style="background:#0a0a0a;" data-image="{{ asset('img/images/home/product/product-furniture-8-2-430x490.jpg') }}"> </span><span style="background:#bfbfbf;" data-image="{{ asset('img/images/home/product/product-furniture-8-3-430x490.jpg') }}"> </span></div>
                                <a class="share" href="#"><i class="fas fa-random"></i></a>
                            </div>
                        </div>
                        <div class="features__content"><a class="link" href="#">Eames Lounge Chair</a><a class="sub-link" href="#">Furniture</a>
                            <div class="dflex star"><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="price">
                                <del style="color: #777">$799.00</del>$359.00
                            </p>
                            <div class="content__overlay">
                                <p>Placerat tempor dolor eu leo ullamcorper et magnis habitant ultrices consectetur arcu nulla mattis fermentum adipiscing a et bibendum sed platea malesuada eget vestibulum.</p>
                                <div class="control dflex"><a href="#"><i class="far fa-heart"></i></a><a class="btn active" href="#">View Porducts</a><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--End Featured Products-->
    <!--Start Join-->
    <div class="join dflex">
        <h4 class="title">DEJANOS TU CORREO PARA RECIBIR MAS DETALLES</h4>
        <form class="dflex" action="#">
            <input type="text" placeholder="Your email address">
            <button type="submit">ENVIAR</button>
        </form>
        <p>Will be used in accordance with our <a href="#"><strong>Privacy Policy</strong></a></p>
    </div>
    <!--End Join-->
@include('layouts.components.footer')
@endsection
