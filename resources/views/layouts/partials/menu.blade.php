<div class="wrapper" >
    <nav id="sidebar" class="sidebar">
        <a class="sidebar-brand" href="index.html" style="background-color: #fff">
        <svg>
            <use xlink:href="#ion-ios-pulse-strong"></use>
        </svg>
            Feria Tacna
        </a>
        <div class="sidebar-content">
            <div class="sidebar-user">
                @if(auth()->user()->imagen)
                    <img src="{{ asset('storage/usuarios/'.auth()->user()->id.'/'.auth()->user()->imagen) }}" class="img-fluid rounded-circle mb-2">
                @else
                    <img src="{{ asset('img/user.png') }}" width="140" height="140" class="rounded-circle mt-2">
                @endif
                <div class="font-weight-bold">{{ auth()->user()->name }}</div>
                <small>{{ __('Feria Tacna') }}</small>
            </div>

            @if(auth()->user()->role == 'Cliente')
                @include('layouts.partials.cliente.menu_cliente')
            @elseif(auth()->user()->role == 'Admin')
                @include('layouts.partials.admin.menu_admin')
            @endif
        </div>
    </nav>