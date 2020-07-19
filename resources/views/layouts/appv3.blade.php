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
    <link rel="{{ asset('apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="{{ asset('images/favicon.png')}}" rel="icon" type="image/x-icon">

    <!-- Imagens -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tipso.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">


</head>
@guest
<body>
@endguest

@auth
<body class="wt-login">
@endauth

<div class="preloader-outer"></div>
<div class="loader"> </div>

<div id="wt-wrapper" class="wt-wrapper wt-haslayout">
    <div class="wt-contentwrapper">
        <header id="wt-header" class="wt-header wt-haslayout">
                <div class="wt-navigationarea">
                        <div class="container-fluid">
                            <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <strong class="wt-logo"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="company logo here"></a>
											</strong>
            
                                            <div class="wt-rightarea">
                                                    <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                                            <i class="lnr lnr-menu"></i>
                                                        </button>
                                                        
                                                        <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                                                <ul class="navbar-nav">
                                                                    <li class="menu-item-has-children page_item_has_children">
                                                                        <a href="#">Main</a>
                                                                        <ul class="sub-menu">
                                                                            <li>
                                                                                <a href="#">About</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Privacy Policy</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">Coming Soon</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    
                                                                    <li class="nav-item">
                                                                        <a href="#">How It Works</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#">How It Works</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#">How It Works</a>
                                                                    </li>
                                                                </ul>
                                                        </div>
                                                        
                                                    </nav>
                                                        @auth
                                                        <div class="wt-userlogedin">
                                                                <figure class="wt-userimg">
                                                                    <img src="{{ asset('images/user-img.jpg') }}" alt="image description">
                                                                    
                                                                </figure>
                                                            
                                                            
                                                                <div class="wt-username">
                                                                    <h3>{{ Auth::user()->name }}</h3>
                                                                    <span>GLOBAL HEADER</span>
                                                                </div>

                                                                <nav class="wt-usernav">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                                <span>Logout</span></a>
                                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                 @csrf
                                                                            </form>
                                                                            
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                        </div>
                                                        
                                                        @endauth

                                                        @guest
                                                        <div class="wt-loginarea">
                                                                <figure class="wt-userimg">
                                                                    <img src="{{ asset('images/user-login.png') }}" alt="img description">
                                                                </figure>
                                                                <div class="wt-loginoption">
                                                                    <a href="#" id="wt-loginbtn" class="wt-loginbtn">Login</a>
                                                                    <div class="wt-loginformhold">
                                                                        <div class="wt-loginheader">
                                                                            <span>Login</span>
                                                                            <a href="#"><i class="fa fa-times"></i></a>
                                                                        </div>
                                                                        <form class="wt-formtheme wt-loginform do-login-form" action="{{ route('login') }}" method="POST">
                                                                        @csrf
                                                                            <fieldset>
                                                                                <div class="form-group">
                                                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                                                                </div>
                                                                                <div class="wt-logininfo">
                                                                                        <button type="submit" class="wt-btn do-login-button">
                                                                                                {{ __('Entrar') }}
                                                                                        </button>
                                                                                    
                                                                                    <span class="wt-checkbox">
                                                                                            <input id="wt-login" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                                            <label for="wt-login">Lembrar</label>
                                                                                    </span>
                                                                                </div>
                                                                            </fieldset>
                                                                            <div class="wt-loginfooterinfo">
                                                                                <a href="{{ route('password.request') }}" class="wt-forgot-password">Recupere a senha</a>
                                                                                <a href="{{ route('register') }}">Crie uma conta</a>
                                                                            </div>
                                                                        </form>
                                                                     </div>
                                                                </div>
                                                                <a href="{{ route('register') }}" class="wt-btn">Cadastre-se</a>
                                                            </div>
                                                        @endguest
										</div> 
									
								
							
						</div>
					</div>
				</div>
			</div>
         </header>
		@yield('content')
	</div>
</div>


    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-3.3.1.js') }}"></script>
	<script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
	<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.hoverdir.js') }}"></script>
	<script src="{{ asset('js/chosen.jquery.js') }}"></script>
	<script src="{{ asset('js/tilt.jquery.js') }}"></script>
	<script src="{{ asset('js/scrollbar.min.js') }}"></script>
	<script src="{{ asset('js/prettyPhoto.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.js') }}"></script>
	<script src="{{ asset('js/readmore.js') }}"></script>
	<script src="{{ asset('js/countTo.js') }}"></script>
	<script src="{{ asset('js/appear.js') }}"></script>
	<script src="{{ asset('js/tipso.js') }}"></script>
	<script src="{{ asset('js/jRate.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>


</html>
