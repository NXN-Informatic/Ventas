@extends('layouts.panel')
@section('ogTitle'){{ $puesto->name }}@endsection
@section('ogUrl'){{ 'http://feriatacna.com/puesto/'.$puesto->id.'/detail' }}@endsection
@section('ogDesc'){{ $puesto->description }}@endsection
@section('ogImage'){{ 'http://feriatacna.com/storage/'.$puesto->id.'/banner/'.$puesto->banner }}@endsection

@section('content')
@include('layouts.components.navbarHide')
<!--Start Banner Header-->
<div style="background-color: rgba(0,0,0,0.6);background:url(../../storage/4/banner/banner.jpg); 
            background-size:cover;  background-position:center; text-align:center;
            filter: brightness(90%);height:400px"
    class="bannerHeader">
    <h1 class="title">{{ $puesto->name }}</h1><a class="des link" href="#">CATEGORIES<i class="fas fa-angle-down"></i></a>
    <div class="banner__list dflex">
        <a class="item dflex" href="#"><img src="./images/shop/banner/flower.svg" alt="">
            <div class="content"><span class="name">Accessories</span><span class="des">12 Product</span></div>
        </a>
        <a class="item dflex" href="#"><img src="./images/shop/banner/clock.svg" alt="">
            <div class="content"><span class="name">Clocks</span><span class="des">12 Product</span></div>
        </a>
        <a class="item dflex" href="#"><img src="./images/shop/banner/knives.svg" alt="">
            <div class="content"><span class="name">Cooking</span><span class="des">12 Product</span></div>
        </a>
        <a class="item dflex" href="#"><img src="./images/shop/banner/chair.svg" alt="">
            <div class="content"><span class="name">Furniture</span><span class="des">22 Product</span></div>
        </a>
        <a class="item dflex" href="#"><img src="./images/shop/banner/light-bulb.svg" alt="">
            <div class="content"><span class="name">Lighting</span><span class="des">16 Product</span></div>
        </a>
        <a class="item dflex" href="#"><img src="./images/shop/banner/rocking-horse.svg" alt="">
            <div class="content"><span class="name">Toys</span><span class="des">12 Product</span></div>
        </a>
    </div>
</div>
<!--End Banner Header-->
@endsection


