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

    <!-- Estilos -->
    <link href="{{ asset('apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{ asset('images/favicon.png')}}" rel="icon" type="image/x-icon">

    <!-- Imagens -->
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
                    <strong class="wt-logo"><a href="{{ route('home') }}" class="logo-src"><img src="{{ asset('images/logo.png') }}" alt="company logo here"></a></strong>
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
