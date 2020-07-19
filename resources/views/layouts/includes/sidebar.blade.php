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
                <li class="">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="cliente_perfil.html"><i class="metismenu-icon pe-7s-browser"></i>Meu Perfil</a>
                </li>
                <li class="app-sidebar__heading">Trabalhos</li>
                <li>
                    <a href="c_publicar_trabalho.html"><i class="metismenu-icon pe-7s-car"></i>Publicar Trabalho</a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Gerir Trabalhos
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li><a href="#"><i class="metismenu-icon"></i>Ver Todos Trabalhos</a></li>
                        <li><a href="cliente_trabalhos_abertos.html"><i class="metismenu-icon"></i>Trabalhos Abertos</a></li>
                        <li><a href="#"><i class="metismenu-icon"></i>Trabalho Cancelados</a></li>
                        <li><a href="#"><i class="metismenu-icon"></i>Trabalhos Finalizados</a></li>
                    </ul>
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
                <li class="mm-active">
                    <a href="#" class="mm-active">
                        <i class="metismenu-icon pe-7s-graph"></i>
                        Definições da Conta
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                        <span>Logout</span>

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
