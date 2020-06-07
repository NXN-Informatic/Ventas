<ul class="sidebar-nav">
    <li class="sidebar-header">
        Main
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('home') }}">
            <i class="align-middle mr-2 fas fa-fw fa-home" style="color: #bf0000"></i> <span class="align-middle">{{ __('Inicio') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #bf0000">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="#catalogo" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-shopping-bag" style="color: #bf0000"></i> <span class="align-middle">Mi Catalogo</span>
        </a>
        <ul id="catalogo" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{url('producto/lista') }}">{{ __('Ver Catálogo') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/creargrupo') }}">{{ __('Crear Categorias') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/add') }}">{{ __('Añadir Productos') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#tienda" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-store-alt" style="color: #bf0000"></i> <span class="align-middle">Mi Tienda</span>
        </a>
        <ul id="tienda" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/editar') }}">{{ __('Configuración') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/personalizar') }}">{{ __('Personalizar') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#datos" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-user-tie" style="color: #bf0000"></i> <span class="align-middle">{{ __('Mis Datos') }}</span>
        </a>
        <ul id="datos" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('user') }}">Mi perfil</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/add') }}">{{ __('Datos de Acceso') }}</a></li>
            
        </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('puesto/canales') }}">
            <i class="align-middle mr-2 fas fa-fw fa-share-alt" style="color: #bf0000"></i> <span class="align-middle">{{ __('Canales de Venta') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #bf0000">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('movil') }}">
            <i class="align-middle mr-2 fas fa-fw fa-mobile-alt" style="color: #bf0000"></i> <span class="align-middle">{{ __('Móvil app') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #bf0000">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('price') }}">
            <i class="align-middle mr-2 fas fa-fw fa-dollar-sign" style="color: #bf0000"></i> <span class="align-middle">{{ __('Mi Plan') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #bf0000">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void" onclick="$('#logout-form').submit();">
            <i class="align-middle mr-2 fab fa-fw fa-expeditedssl" style="color: #bf0000"></i> <span class="align-middle">{{ __('Cerrar sesión') }}</span>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>