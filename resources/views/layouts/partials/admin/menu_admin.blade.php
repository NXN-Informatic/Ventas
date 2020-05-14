<ul class="sidebar-nav">
    <li class="sidebar-header">
        Main
    </li>
    <li class="sidebar-item">
        <a href="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
        </a>
        <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item active"><a class="sidebar-link" href="{{ url('home') }}">{{ __('Inicio') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#usuario" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-user-cog"></i> <span class="align-middle">{{ __('Usuarios') }}</span>
        </a>
        <ul id="usuario" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('usuarios') }}">{{ __('Lista de Usuarios') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('usuarios/create') }}">{{ __('Crear Usuario') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#puestos" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-store"></i> <span class="align-middle">{{ __('Puestos') }}</span>
        </a>
        <ul id="puestos" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Puestos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Puesto') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#productos" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-laptop"></i> <span class="align-middle">{{ __('Productos') }}</span>
        </a>
        <ul id="productos" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Productos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Producto') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#grupo" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-align-justify"></i> <span class="align-middle">{{ __('Grupos') }}</span>
        </a>
        <ul id="grupo" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Grupos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Grupo') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#categoria" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-clipboard-list"></i> <span class="align-middle">{{ __('Categorias') }}</span>
        </a>
        <ul id="categoria" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('categoria') }}"">{{ __('Lista de Categorias') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('categoria/create') }}"">{{ __('Crear Categorias') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#subcategoria" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-tshirt"></i> <span class="align-middle">{{ __('SubCategoria') }}</span>
        </a>
        <ul id="subcategoria" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('subcategoria') }}"">{{ __('Lista de SubCategoria') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('subcategoria/create') }}"">{{ __('Crear SubCategoria') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#type_document" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 far fa-fw fa-newspaper"></i> <span class="align-middle">{{ __('Tipo Documentos') }}</span>
        </a>
        <ul id="type_document" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Tipos de Documentos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Tipo de Documento') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#documento" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 far fa-fw fa-folder-open"></i> <span class="align-middle">{{ __('Documentos') }}</span>
        </a>
        <ul id="documento" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Documentos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Documento') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#planes" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-money-bill-alt"></i> <span class="align-middle">{{ __('Planes') }}</span>
        </a>
        <ul id="planes" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Planes') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Plane') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#paises" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fab fa-fw fa-font-awesome-flag"></i> <span class="align-middle">{{ __('Paises') }}</span>
        </a>
        <ul id="paises" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('pais') }}"">{{ __('Lista de Paises') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('pais/create') }}"">{{ __('Crear Pais') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#regiones" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-map-marker-alt"></i> <span class="align-middle">{{ __('Regiones') }}</span>
        </a>
        <ul id="regiones" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('region') }}"">{{ __('Lista de Regiones') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('region/create') }}"">{{ __('Crear Region') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#provincias" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-map-pin"></i> <span class="align-middle">{{ __('Provincias') }}</span>
        </a>
        <ul id="provincias" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('provincia') }}"">{{ __('Lista de Provincias') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('provincia/create') }}"">{{ __('Crear Provincia') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#distritos" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-map-marked-alt"></i> <span class="align-middle">{{ __('Distritos') }}</span>
        </a>
        <ul id="distritos" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('distrito') }}"">{{ __('Lista de Distritos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('distrito/create') }}"">{{ __('Crear Distritos') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#pago" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-clipboard-list"></i> <span class="align-middle">{{ __('Pagos') }}</span>
        </a>
        <ul id="pago" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Pagos') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Pago') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#visitantes" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-clipboard-list"></i> <span class="align-middle">{{ __('Visitantes') }}</span>
        </a>
        <ul id="visitantes" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Lista de Visitantes') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear Visitante') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void" onclick="$('#logout-form').submit();">
            <i class="align-middle mr-2 fab fa-fw fa-expeditedssl"></i> <span class="align-middle">{{ __('Cerrar sesión') }}</span>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <li class="sidebar-header">
        EXTRAS
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="documentation.html">
            <i class="align-middle mr-2 fas fa-fw fa-book"></i> <span class="align-middle">{{ __('Manual de ayuda') }}</span>
        </a>
    </li>
</ul>