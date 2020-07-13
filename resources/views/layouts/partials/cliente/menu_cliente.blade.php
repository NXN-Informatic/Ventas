<ul class="sidebar-nav">
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('home') }}">
            <i class="align-middle mr-2 fas fa-fw fa-store" style="color: #ff1a00"></i> <span class="align-middle medium12">{{ __('Mi Tienda') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary regular9" style="background-color: #ff1a00">{{ __('Ir') }}</span>
        </a>
        <ul id="catalogo" class="sidebar-dropdown list-unstyled" data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{url('producto/lista') }}"><i class="align-middle mr-2 fas fa-fw fa-th" style="color: #ff1a00"></i><span class="regular11">Mis productos</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/creargrupo') }}"><i class="align-middle mr-2 fas fa-fw fa-star" style="color: #ff1a00"></i><span class="regular11">Crear Categorias</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto/add') }}"><i class="align-middle mr-2 fas fa-fw fa-plus" style="color: #ff1a00"></i><span class="regular11">Añadir Productos</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/personalizar') }}"><i class="align-middle mr-2 fas fa-fw fa-heart" style="color: #ff1a00"></i><span class="regular11">Personalizar</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/editar') }}"><i class="align-middle mr-2 fas fa-fw fa-wrench" style="color: #ff1a00"></i><span class="regular11">Configuración</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/infocontacto') }}"><i class="align-middle mr-2 fas fa-fw fa-phone" style="color: #ff1a00"></i><span class="regular11">Info Contacto</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('user') }}"><i class="align-middle mr-2 fas fa-fw fa-user" style="color: #ff1a00"></i><span class="regular11">Mi perfil</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('acceso') }}"><i class="align-middle mr-2 fas fa-fw fa-key" style="color: #ff1a00"></i><span class="regular11">Datos de Acceso</span></a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('puesto/canales') }}">
            <i class="align-middle mr-2 fas fa-fw fa-share-alt" style="color: #ff1a00"></i> <span class="align-middle medium12">{{ __('Canales de Venta') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary regular9" style="background-color: #ff1a00">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('movil') }}">
            <i class="align-middle mr-2 fas fa-fw fa-mobile-alt" style="color: #ff1a00"></i> <span class="align-middle medium12">{{ __('Móvil app') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary regular9" style="background-color: #ff1a00">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('price') }}">
            <i class="align-middle mr-2 fas fa-fw fa-dollar-sign" style="color: #ff1a00"></i> <span class="align-middle medium12">{{ __('Mi Plan') }}</span>
            <span class="sidebar-badge badge badge-pill badge-primary regular9" style="background-color: #ff1a00">{{ __('Ir') }}</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void" onclick="$('#logout-form').submit();">
            <i class="align-middle mr-2 fas fa-fw fa-cog" style="color: #ff1a00"></i> <span class="align-middle medium12">{{ __('Cerrar sesión') }}</span>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>