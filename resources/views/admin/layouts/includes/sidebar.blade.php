<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
        </button>
    </div>
    <div class="scrollbar-sidebar scrollbar-container">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="{{ (request()->routeIs('admin.dashboard')) ? 'mm-active' : '' }}">
                    <a href="#" class="{{ (request()->routeIs('admin.dashboard')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#"><i class="metismenu-icon pe-7s-browser"></i>Estado</a>
                </li>
                <li class="app-sidebar__heading">Aplicação</li>
                <li class="{{ (request()->routeIs('admin.dashboard.usuarios.index')) ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.dashboard.usuarios.index') }}" class="{{ (request()->routeIs('admin.dashboard.usuarios.index')) ? 'mm-active' : '' }}"><i class="metismenu-icon pe-7s-diamond"></i>Gerir Usuários</a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Gerir Trabalhos
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li><a href="#"><i class="metismenu-icon"></i>Em Andamento</a></li>
                        <li><a href="#"><i class="metismenu-icon"></i>Cancelados</a></li>
                        <li><a href="#"><i class="metismenu-icon"></i>Finalizados</a></li>
                    </ul>
                </li>
                <li class="{{ (request()->routeIs('admin.dashboard.categorias.index')) ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.dashboard.categorias.index') }}" class="{{ (request()->routeIs('admin.dashboard.categorias.index')) ? 'mm-active' : '' }}"><i class="metismenu-icon pe-7s-diamond"></i>Gerir Habilidades</a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Invoices
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon">
                                </i>Pagos
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon">
                                </i>Pendentes
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Conta</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-graph"></i>
                        Definições da Conta
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">


                        <i class="metismenu-icon pe-7s-way"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
