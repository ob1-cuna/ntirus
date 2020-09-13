<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <a href="{{ route('home') }}" data-toggle="tooltip" data-placement="bottom" title="Dashboard da Ntirus" class="logo-src"></a>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
        </button>
    </div>
    <div class="scrollbar-sidebar scrollbar-container">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading active">Menu</li>
                <li class="">
                    <a href="{{ route('cliente.dashboard') }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{ (request()->routeIs('cliente.perfil')) ? 'mm-active' : '' }}">
                    <a href="{{ route('cliente.perfil') }}" class="{{ (request()->routeIs('cliente.perfil')) ? 'mm-active' : '' }}"><i class="metismenu-icon pe-7s-browser "></i>Meu Perfil</a>
                </li>
                <li class="app-sidebar__heading">Trabalhos</li>
                <li class="">
                    <a href="{{ route('cliente.postar_job') }}" class="{{ (request()->routeIs('cliente.postar_job')) ? 'mm-active' : '' }}"><i class="metismenu-icon pe-7s-car"></i>Publicar Trabalho</a>
                </li>
                <li class="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos') === 0) ? 'mm-active' : '' }}">
                    <a href="#" aria-expanded="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos') === 0) ? 'true' : 'false' }}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Gerir Trabalhos
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos') === 0) ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('cliente.trabalhos.abertos') }}" class="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos.abertos') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Trabalhos Abertos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.trabalhos.em_andamento') }}" class="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos.em_andamento') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Trabalhos Em Andamento
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.trabalhos.cancelados') }}" class="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos.cancelados') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Trabalho Cancelados
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.trabalhos.finalizados') }}" class="{{ (strpos(Route::currentRouteName(), 'cliente.trabalhos.finalizados') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Trabalhos Finalizados
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (strpos(Route::currentRouteName(), 'cliente.invoices') === 0) ? 'mm-active' : '' }}">
                    <a href="#" aria-expanded="{{ (strpos(Route::currentRouteName(), 'cliente.invoices') === 0) ? 'true' : 'false' }}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Invoices
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>

                            <a href="{{ route('cliente.invoices.pagos') }}" class="{{ (strpos(Route::currentRouteName(), 'cliente.invoices.pagos') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Pagos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cliente.invoices.pendentes') }}" class="{{ (strpos(Route::currentRouteName(), 'cliente.invoices.pendentes') === 0) ? 'mm-active' : '' }}">
                            <i class="metismenu-icon">
                                </i>Pendentes
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Conta</li>
                <li>
                    <a href="{{ route('cliente.definicoes') }}" class="{{ (request()->routeIs('cliente.definicoes')) ? 'mm-active' : '' }}">
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
