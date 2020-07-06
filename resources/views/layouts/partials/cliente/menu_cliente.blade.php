<ul class="sidebar-nav">
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('home') }}">
            <i class="align-middle mr-2 fas fa-fw fa-store" style="color: #bf0000"></i> <span class="align-middle">{{ __('Mi Tienda') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary" style="background-color: #bf0000">{{ __('Ir') }}</span>
        </a>
        <ul id="catalogo" class="sidebar-dropdown list-unstyled" data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{url('producto/lista') }}"><i class="align-middle mr-2 fas fa-fw fa-th" style="color: #bf0000"></i>{{ __('Ver Catálogo') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/creargrupo') }}"><i class="align-middle mr-2 fas fa-fw fa-star" style="color: #bf0000"></i>{{ __('Crear Categorias') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/add') }}"><i class="align-middle mr-2 fas fa-fw fa-plus" style="color: #bf0000"></i>{{ __('Añadir Productos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/personalizar') }}"><i class="align-middle mr-2 fas fa-fw fa-heart" style="color: #bf0000"></i>{{ __('Personalizar') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/editar') }}"><i class="align-middle mr-2 fas fa-fw fa-wrench" style="color: #bf0000"></i>{{ __('Configuración') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/infocontacto') }}"><i class="align-middle mr-2 fas fa-fw fa-phone" style="color: #bf0000"></i>{{ __('Info Contacto') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('user') }}"><i class="align-middle mr-2 fas fa-fw fa-user" style="color: #bf0000"></i>Mi perfil</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('acceso') }}"><i class="align-middle mr-2 fas fa-fw fa-key" style="color: #bf0000"></i>{{ __('Datos de Acceso') }}</a></li>
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
            <i class="align-middle mr-2 fas fa-fw fa-cog" style="color: #bf0000"></i> <span class="align-middle">{{ __('Cerrar sesión') }}</span>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>