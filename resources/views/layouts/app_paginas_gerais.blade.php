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
    <style>
        #footer {
            background: transparent !important;
            margin: 80px 0 0 0;
            padding: 20px 100px 20px 100px;
        }
        #footer .divisor {
            margin-top: 1rem;
            margin-bottom: 2rem;
            margin-right: -50px;
            margin-left: -50px;
            height: 2px;
            overflow: hidden;
            background: #6e757c;
            opacity: 0.2;
        }
        #footer h5{
            padding-left: 10px;
            border-left: 3px solid #6e757c;
            padding-bottom: 6px;
            margin-bottom: 20px;
            color:#495057;
        }
        #footer a {
            color: #495057;
            text-decoration: none !important;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }
        #footer ul.social li{
            padding: 3px 0;
        }
        #footer ul.social li a i {
            margin-right: 5px;
            font-size:25px;
            -webkit-transition: .5s all ease;
            -moz-transition: .5s all ease;
            transition: .5s all ease;
        }
        #footer ul.social li:hover a i {
            font-size:30px;
            margin-top:-10px;
        }
        #footer ul.social li a,
        #footer ul.quick-links li a{
            color:#495057;
        }
        #footer ul.social li a:hover{
            color:#6e757c;
        }
        #footer ul.quick-links li{
            padding: 3px 0;
            -webkit-transition: .5s all ease;
            -moz-transition: .5s all ease;
            transition: .5s all ease;
        }

        #footer ul.last-quick li.info-footer{

        }

        #footer ul.quick-links li:hover{
            padding: 3px 0;
            margin-left:5px;
            font-weight:700;
        }
        #footer ul.quick-links li a i{
            margin-right: 5px;
        }
        #footer ul.quick-links li:hover a i {
            font-weight: 700;
        }

        @media (max-width:767px){
            #footer h5 {
                padding-left: 0;
                border-left: transparent;
                padding-bottom: 0px;
                margin-bottom: 10px;
            }
            #footer {
                padding: 5px 15px 5px 15px;
            }

            #footer ul.last-quick li.info-footer{
                display: none;
            }
        }
    </style>
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
    <section id="footer">
        <div class="divisor"></div>
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Informa-te</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Como funciona</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Sobre nós</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Perguntas frequentes</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Conteudo</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="{{route('freelancers')}}"><i class="fa fa-angle-double-right"></i>Freelancers</a></li>
                        <li><a href="{{route('trabalhos.list')}}"><i class="fa fa-angle-double-right"></i>Trabalho</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Categorias</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quem somos</h5>
                    <ul class="list-unstyled last-quick">
                        <li><a href="{{ route('home-2') }}"><object type="image/svg+xml" data="{{ asset('images/brand_ntitus/logotype-02.svg') }}" style="width: auto; height: 22px;"></object></a></li>
                        <li style="color: #495057" class="info-footer"><u><a href="https://www.nationaltransaction.com/">Ntirus</a></u> é um website desenvolvido por <u><a href="https:://twitter.com/vnvcleto">Anacleto Cuna</a></u>, como requisito parcial para obtenção de grau de licenciatura em <b>Eng. Informática</b> pela Universidade Zambeze</li>
                        <li style="color: #495057">Tema desenvolvido pela Keru UI e adaptado pelo Autor</li>
                        </ul>
                </div>
            </div>
            <div class="row text-right">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-sm-center text-md-right text-white ">
                    <ul class="list-unstyled">
                        <li style="color: #495057;">© 2020 <u><a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Ntirus Brand</a></u>. Todos direitos reservados.</li>
                    </ul>
                </div>
                <hr>
            </div>
        </div>
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
