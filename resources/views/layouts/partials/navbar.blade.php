<div class="main">
    <nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center"></i>
    </a>
    
    <div class="form-control form-control-lite"><span style="color: #E5E5E5">Desplegar menú</span></div>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown ml-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
                    <i class="align-middle fas fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-user"></i> View Profile</a>
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-comments"></i> Contacts</a>
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-chart-pie"></i> Analytics</a>
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-cogs"></i> Settings</a>
                    <div class="dropdown-divider"></div>-->
                    <a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">
                        <i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> Salir de sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>

</nav>