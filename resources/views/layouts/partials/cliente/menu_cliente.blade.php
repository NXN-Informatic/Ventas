<ul class="sidebar-nav">
    <li class="sidebar-header">
        Main
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('home') }}">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('Inicio') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('user') }}">
            <i class="align-middle mr-2 fas fa-fw fa-user-tie"></i> <span class="align-middle">{{ __('Mis Datos') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{ url('puesto') }}" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-store-alt"></i> <span class="align-middle">{{ __('Mis Puestos') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Ir') }}</span>
        </a>
        <ul id="puestos" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/editar') }}">{{ __('Actualizar Datos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/personalizar') }}">{{ __('Personalizar') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/add') }}">{{ __('Añadir Productos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/creargrupo') }}">{{ __('Añadir Grupos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/fbcatalogo') }}">{{ __('Enlazar con Facebook') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('price') }}">
            <i class="align-middle mr-2 fas fa-fw fa-dollar-sign"></i> <span class="align-middle">{{ __('Mi Plan') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void" onclick="$('#logout-form').submit();">
            <i class="align-middle mr-2 fab fa-fw fa-expeditedssl"></i> <span class="align-middle">{{ __('Cerrar sesión') }}</span>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>