@extends('layouts.panel')

@section('styles')
    <meta property="og:title" content="{{ $puesto->name }}" />
    <meta property="og:description" content="{{ $puesto->description }}" />
    <meta property="og:image" content="http://feriatacna.com/storage/{{ $puesto->id }}/banner/{{ $puesto->banner }}" />      
    <meta property="og:url" content='http://feriatacna.com/puesto/{{ $puesto->id }}/detail' />
@endsection

@section('content')
@include('layouts.components.navbar')
@include('layouts.components.banner')
<!--Start Featured Categories-->
<div class="feature">
    <div class="firstTitle">Woodmart Collections</div>
    <h4 class="title">Featured Categories</h4>
    <div class="lastTitle">WoodMart is a powerful eCommmerce theme for WordPress</div>
    <div class="feature__wrap container">
        <div class="feature__item big"><img src="{{ asset('img/images/home/cat-23-860x860.jpg') }}" alt="">
            <div class="feature__content">
                <h3>Furniture</h3><span>22 products</span>
            </div>
        </div>
        <div class="feature__item"><img src="{{ asset('img/images/home/cat-klock-430x430.jpg') }}" alt="">
            <div class="feature__content">
                <h3>Clocks</h3><span>12 products</span>
            </div>
        </div>
        <div class="feature__item"><img src="{{ asset('img/images/home/cat-clock-3-430x430.jpg') }}" alt="">
            <div class="feature__content">
                <h3>Accessories</h3><span>12 products</span>
            </div>
        </div>
        <div class="feature__item"><img src="{{ asset('img/images/home/light-cat-5-430x430.jpg') }}" alt="">
            <div class="feature__content">
                <h3>Lighting</h3><span>16 products</span>
            </div>
        </div>
        <div class="feature__item"><img src="{{ asset('img/images/home/Toys-cat-1-430x430.jpg') }}" alt="">
            <div class="feature__content">
                <h3>Toys</h3><span>22 products</span>
            </div>
        </div>
    </div>
</div>
<!--End Featured Categories-->
@endsection
