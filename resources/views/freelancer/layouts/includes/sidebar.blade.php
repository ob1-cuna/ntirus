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
                <li>
                    <a href="{{route('dashboard')}}" class="{{ (request()->routeIs('dashboard')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.perfil')}}" class="{{ (request()->routeIs('dashboard.perfil')) ? 'mm-active' : '' }}">
                    <i class="metismenu-icon pe-7s-browser"></i>Meu Perfil</a>
                </li>
                <li class="app-sidebar__heading">Trabalhos</li>
                <li>
                    <a href="{{ route('dashboard.propostas') }}" class="{{ (request()->routeIs('dashboard.propostas')) ? 'mm-active' : '' }}"><i class="metismenu-icon pe-7s-diamond"></i>Concorridos</a>
                </li>
                <li class="{{ (strpos(Route::currentRouteName(), 'dashboard.trabalhos') === 0) ? 'mm-active' : '' }}">
                    <a href="#" aria-expanded="{{ (strpos(Route::currentRouteName(), 'dashboard.trabalhos') === 0) ? 'true' : 'false' }}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Gerir Trabalhos
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ (strpos(Route::currentRouteName(), 'dashboard.trabalhos') === 0) ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('dashboard.trabalhos.em_andamento') }}" class="{{ (strpos(Route::currentRouteName(), 'dashboard.trabalhos.em_andamento') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Em Andamento
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.trabalhos.cancelados') }}" class="{{ (strpos(Route::currentRouteName(), 'dashboard.trabalhos.cancelados') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Cancelados
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.trabalhos.finalizados') }}" class="{{ (strpos(Route::currentRouteName(), 'dashboard.trabalhos.finalizados') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Finalizados
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (strpos(Route::currentRouteName(), 'dashboard.invoices') === 0) ? 'mm-active' : '' }}">
                    <a href="#" aria-expanded="{{ (strpos(Route::currentRouteName(), 'dashboard.invoices') === 0) ? 'true' : 'false' }}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Invoices
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ (strpos(Route::currentRouteName(), 'dashboard.invoices') === 0) ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('dashboard.invoices.pagos.list') }}" class="{{ (strpos(Route::currentRouteName(), 'dashboard.invoices.pagos.list') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Pagos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.invoices.pendentes.list') }}" class="{{ (strpos(Route::currentRouteName(), 'dashboard.invoices.pendentes.list') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Pendentes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.invoices.saque') }}" class="{{ (strpos(Route::currentRouteName(), 'dashboard.invoices.saque') === 0) ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Saque
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Conta</li>
                <li>
                    <a href="{{ route('dashboard.definicoes') }}" class="{{ (request()->routeIs('dashboard.definicoes')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-graph"></i>
                        Definições da Conta
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">


                        <i class="metismenu-icon pe-7s-way"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
