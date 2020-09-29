<div class="app-header-right">
    <div class="header-btn-lg pr-0">
        <div class="header-dots">
            <div class="dropdown">
                <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 btn btn-link">
                    <i class="typcn typcn-bell"></i>
                    @if(Auth::user()->unreadNotifications->count() >= 1)
                        <span class="badge badge-dot badge-dot-sm badge-danger">Notificações</span>
                    @endif
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                    <div class="dropdown-menu-header mb-0">
                        <div class="dropdown-menu-header-inner bg-night-sky">
                            <div class="menu-header-image opacity-5" style="background-image: url('{{ asset('images/dropdown-header/city1.jpg') }}');"></div>
                            <div class="menu-header-content text-light">
                                <h5 class="menu-header-title">Notificações</h5>
                                <h6 class="menu-header-subtitle">Tens <b>{{ Auth::user()->unreadNotifications->count() }}</b> notificações não lidas</h6>
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
                                                @foreach( Auth::user()->notifications as $notificacao)
                                                    <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                        <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                <h4 class="timeline-title">
                                                                    <a href="{{ route('notificacao.url', ['notificacao' => $notificacao->id]) }}" class="@if($notificacao->read_at == null) bold-medio @endif">
                                                                        {{ $notificacao->data['data'] }}
                                                                    </a>
                                                                    @if($notificacao->read_at == null)
                                                                        <span class="badge badge-danger ml-2">NOVA</span>
                                                                    @endif
                                                                </h4>
                                                                <span class="vertical-timeline-element-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach()
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
                            <img width="35" height="35" class="rounded-circle" src="{{ asset(Auth::user()->perfil->foto_perfil) }}" alt="" style="object-fit: cover;">
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
                                                    <img width="42" height="42" class="rounded-circle" src="{{ asset(Auth::user()->perfil->foto_perfil) }}" alt="" style="object-fit: cover;">
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
                                            <a href="#" class="nav-link">Definições da Conta</a>
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
