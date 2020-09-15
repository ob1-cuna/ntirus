<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') − Ntirus</title>

    <!-- Scripts -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Imagens -->
    <link href="{{ asset('apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{ asset('images/brand_ntitus/favicon-circular.png')}}" rel="icon" type="image/x-icon">

    <!-- Estilos -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ajustes.css') }}" rel="stylesheet">
    @yield('meu_css')

</head>

<body style="background-color: #fbfbfb">
<div class="nt-page-wrapper app-container app-theme-gray closed-sidebar-mobile sidebar-mobile-open">
<header class="nt-sombras">
    <div class="nt-nav-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <a class="navbar-brand" href="{{ route('home-2') }}">
                <img src="{{ asset('images/brand_ntitus/logotype.svg') }}" width="auto" height="22" alt="" loading="lazy">
            </a>
            <button class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="navbar-nav mr-auto">
                    <div class="caixa-de-pesquisa-alt">
                        <input type="search" name="query" id="query" value="{{request()->input('query')}}" placeholder="Pesquise..." class="form-control" autocomplete="off">
                        <i class="caixa-de-pesquisa-icon-wrapper-alt fa fa-search"></i>
                    </div>
                </form>

                <ul class="navbar-nav form-inline ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('freelancers')}}">Freelancers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trabalhos.list') }}">Trabalhos</a>
                    </li>
                    <li @guest class="nav-item" @endguest @auth class="nav-item mr-3" @endauth>
                        <a class="nav-link" href="#">Como Funciona</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">Entrar</a>
                        <a class="btn btn-primary" href="#">Cadastre-se</a>
                    </li>
                    @endguest
                    @auth
                        <li class="nav-item avatar row dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset(Auth::user()->perfil->foto_perfil) }}" class="avatar-icon usuario-avatar-xs z-depth-0 mr-2" alt="avatar image" height="35"> {{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();" class="dropdown-item">


                                    <i class="metismenu-icon pe-7s-way mr-2"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
    <section>
        @yield('content')
    </section>
</div>
	<script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-3.3.1.js') }}"></script>
<script>
    $("#nt-search-icon").click(function() {
        $(".nav").toggleClass("nt-search");
        $(".nav").toggleClass("nt-no-search");
        $(".search-input").toggleClass("nt-search-active");
    });

    $('.nt-menu-toggle').click(function(){
        $(".nav").toggleClass("nt-mobile-nav");
        $(".nt-page-wrapper").toggleClass("sidebar-mobile-open");
        $(this).toggleClass("nt-is-active");
    });
</script>
    @yield('meu_script')
</body>
</html>
@yield('meus_modals')
