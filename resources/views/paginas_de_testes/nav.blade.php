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
    @yield('meu_css')

</head>

<body>
<div class="nt-page-wrapper">
<header class="nt-sombras">
    <div class="nt-nav-wrapper">
        <nav class="nt-navbar">
            <img src="{{ asset('images/brand_ntitus/logotype.svg') }}" class="nt-img" alt="Company Logo">
            <div class="nt-menu-toggle" id="nt-mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav nt-no-search float-right">
                <li class="nt-nav-item"><a class="nt-a" href="#">Freelancers</a></li>
                <li class="nt-nav-item"><a class="nt-a" href="#">Trabalhos</a>
                <li class="nt-nav-item"><a class="nt-a" href="#">Como Funciona</a></li>
                <li class="nt-nav-item">
                    <a class="nt-a" href="#">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
    <section class="nt-headline">
        <h1 class="nt-h1">Responsive Navigation</h1>
        <p class="nt-p">Using CSS grid and flexbox to easily build navbars!</p>
        <input type="text" class="nt-input nt-search-input" placeholder="Search..">
    </section>
    <section class="nt-features">
        <div class="nt-feature-container">
            <img src="{{ asset('images/categories/meu_file.svg') }}" class="nt-img" alt="">
            <h2 class="nt-h2">Flexbox Featured</h2>
            <p class="nt-p">This pen contains use of flexbox for the headline and feature section! We use it in our mobile navbar and show the power of mixing css grid and flexbox.</p>
        </div>
        <div class="nt-feature-container">
            <img src="{{ asset('images/categories/meu_file.svg') }}" class="nt-img" alt="">
            <h2 class="nt-h2">CSS Grid Navigation</h2>
            <p class="nt-p">While flexbox is used for the the mobile navbar, CSS grid is used for the desktop navbar showing many ways we can use both.</p>
        </div>
        <div class="nt-feature-container">
            <img src="{{ asset('images/categories/meu_file.svg') }}" class="nt-img" alt="">
            <h2 class="nt-h2">Basic HTML5</h2>
            <p class="nt-p">This pen contains basic html to setup the page to display the responsive navbar.</p>
        </div>
    </section>
</div>
@yield('content')

<script src="{{ asset('js/vendor/jquery-3.3.1.js') }}"></script>
<script>
    $("#nt-search-icon").click(function() {
        $(".nav").toggleClass("nt-search");
        $(".nav").toggleClass("nt-no-search");
        $(".search-input").toggleClass("nt-search-active");
    });

    $('.nt-menu-toggle').click(function(){
        $(".nav").toggleClass("nt-mobile-nav");
        $(this).toggleClass("nt-is-active");
    });

</script>
@yield('meu_script')
</body>
</html>
@yield('meus_modals')



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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ajustes.css') }}" rel="stylesheet">
    @yield('meu_css')

</head>

<body style="background-color: #fbfbfb">

<header class="wt-header">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="wt-logo">
                        <a href="{{ route('home') }}" class="logo-src">
                            <img src="{{ asset('images/brand_ntitus/logotype-sm.png') }}" alt="logotipo-aqui">
                        </a>
                    </strong>
                    <div class="wt-rightarea">
                        <nav id="wt-nav" class="wt-nav navbar-expand-lg" style="">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="{{route('freelancers')}}">Freelancers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('trabalhos.list') }}">Trabalhos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Como Funciona</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                        <div class="wt-loginarea">
                            <a href="{{ route('login') }}" id="wt-loginbtn" class="btn btn-outline-primary">Entrar</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<script src="{{ asset('js/main.js') }}"></script>
@yield('meu_script')
</body>
</html>
@yield('meus_modals')


<header class="nt-sombras">
    <div class="nt-nav-wrapper">
        <nav class="nt-navbar">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/brand_ntitus/logotype.svg') }}" class="nt-img" alt="Company Logo">
            </a>
            <div class="nt-menu-toggle" id="nt-mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav nt-no-search float-right">
                <li class="nt-nav-item"><a class="nt-a" href="#">Freelancers</a></li>
                <li class="nt-nav-item"><a class="nt-a" href="#">Trabalhos</a>
                <li class="nt-nav-item"><a class="nt-a" href="#">Como Funciona</a></li>
                <li class="nt-nav-item">
                    <a class="btn btn-outline-primary" href="{{ route('login') }}">Entrar</a>
                    <a class="btn btn-primary" href="#">Cadastre-se</a>
                </li>
            </ul>
        </nav>
    </div>
</header>