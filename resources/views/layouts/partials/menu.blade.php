<div class="wrapper" >
    <nav id="sidebar" class="sidebar">
        <div class="row text-center" style="margin-right: 0rem">
            <a class="sidebar-brand" href="/" style="background-color: #fff">
                <img src="{{ asset('img/logo.png') }}" class="img-fluid mb-2" style="width: 50%">
            </a>
        </div>
        <div class="sidebar-content">
            @if(auth()->user()->role == 'Propietario')
                @include('layouts.partials.cliente.menu_cliente')
            @elseif(auth()->user()->role == 'Admin')
                @include('layouts.partials.admin.menu_admin')
            @endif
        </div>
    </nav>