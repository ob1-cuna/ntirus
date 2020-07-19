<div class="app-header-right">
    <div class="header-btn-lg pr-0">
        <div class="header-dots">
            <div class="dropdown">
                <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 btn btn-link">
                    <i class="typcn typcn-bell"></i>
                    <span class="badge badge-dot badge-dot-sm badge-danger">Notificações</span>
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                    <div class="dropdown-menu-header mb-0">
                        <div class="dropdown-menu-header-inner bg-night-sky">
                            <div class="menu-header-image opacity-5" style="background-image: url('{{ asset('images/dropdown-header/city1.jpg') }}');"></div>
                            <div class="menu-header-content text-light">
                                <h5 class="menu-header-title">Notificações</h5>
                                <h6 class="menu-header-subtitle">Tens <b>21</b> notificações não lidas</h6>
                            </div>
                        </div>
                    </div>
                    <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <div class="p-3">
                                        <div class="notifications-box">
                                            <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                    <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title">Build the production release
                                                                <span class="badge badge-danger ml-2">NEW</span>
                                                            </h4>
                                                            <span class="vertical-timeline-element-date"></span></div>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                    <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title">Build the production release
                                                                <span class="badge badge-danger ml-2">NEW</span>
                                                            </h4>
                                                            <span class="vertical-timeline-element-date"></span></div>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                    <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                        <div class="vertical-timeline-element-content bounce-in">
                                                            <h4 class="timeline-title">Build the production release
                                                                <span class="badge badge-danger ml-2">NEW</span>
                                                            </h4>
                                                            <span class="vertical-timeline-element-date"></span></div>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                    <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                        <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">This dot has an info state</h4><span class="vertical-timeline-element-date"></span></div>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                    <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                        <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4><span class="vertical-timeline-element-date"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item-divider nav-item"></li>
                        <li class="nav-item-btn text-center nav-item">
                            <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Ver Todas Notificações</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-btn-lg pr-0">
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                            <img width="42" class="rounded" src="{{ asset('images/avatars/3.jpg') }}" alt="">
                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                        </a>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header">
                                <div class="dropdown-menu-header-inner bg-info">
                                    <div class="menu-header-image opacity-2" style="background-image: url('{{asset('images/dropdown-header/city1.jpg')}}');"></div>
                                    <div class="menu-header-content text-left">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="42" class="rounded-circle"
                                                         src="{{ asset('images/avatars/3.jpg') }}"
                                                         alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">{{ Auth::user()->name }}
                                                    </div>
                                                    <div class="widget-subheading opacity-8">Breve descrição do Perfil
                                                    </div>
                                                </div>
                                                <div class="widget-content-right mr-2">
                                                   <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();" class="btn-pill btn-shadow btn-shine btn btn-focus">
                                                       <span>Logout</span>
                                                   </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="scroll-area-xs" style="height: 120px;">
                                <div class="scrollbar-container ps">
                                    <ul class="nav flex-column">
                                        <li class="nav-item-header nav-item">Conta
                                        </li>
                                        <li class="nav-item">
                                            @if(checkPermission(['freelancer']))
                                                <a href="{{route('dashboard.perfil')}}" class="nav-link">Meu Perfil</a>
                                            @endif
                                            @if(checkPermission(['cliente']))
                                                <a href="{{route('cliente.perfil')}}" class="nav-link">Meu Perfil</a>
                                            @endif
                                            @if(checkPermission(['admin']))
                                                <a href="{{route('dashboard.perfil')}}" class="nav-link">Meu Perfil</a>
                                            @endif

                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">Definições da Conta</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
