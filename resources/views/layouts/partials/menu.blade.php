<div class="wrapper" >
    <nav id="sidebar" class="sidebar">
        <a class="sidebar-brand" href="/" style="background-color: #fff">
            <img src="{{ asset('img/logo.png') }}" class="img-fluid mb-2">
        </a>
        <div class="sidebar-content">
            <div class="sidebar-user">
                @if(auth()->user()->imagen)
                    <img src="{{ asset('storage/usuarios/'.auth()->user()->id.'/'.auth()->user()->imagen) }}" class="img-fluid rounded-circle mb-2">
                @else
                    <img src="{{ asset('img/defecto/avatar-159236_1280.png') }}" width="140" height="140" class="rounded-circle mt-2">
                @endif
                <div class="font-weight-bold">{{ auth()->user()->name }}</div>
                <small>{{ auth()->user()->usuario_puestos->first()->puesto->name }}</small>
            </div>

            @if(auth()->user()->role == 'Cliente')
                @include('layouts.partials.cliente.menu_cliente')
            @elseif(auth()->user()->role == 'Admin')
                @include('layouts.partials.admin.menu_admin')
            @endif
        </div>
    </nav>