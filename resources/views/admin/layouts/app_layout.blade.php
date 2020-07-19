<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    
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
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tipso.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dbresponsive.css') }}" rel="stylesheet">
    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}" defer></script>
</head>
@guest
<body>
@endguest

@auth
<body class="wt-login">
@endauth

<div class="preloader-outer">
<div class="loader"></div>
</div>
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
                                                                <img src="{{ asset(Auth()->user()->prof_pic) }}" alt="image description">
                                                                
                                                            </figure>
                                                        
                                                        
                                                            <div class="wt-username">
                                                                <h3>{{ Auth::user()->name }}</h3>
                                                                <span>Amento Tech</span>
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
    

        <main id="wt-main" class="wt-main wt-haslayout">
            <div id="wt-sidebarwrapper" class="wt-sidebarwrapper">
                <div id="wt-btnmenutoggle" class="wt-btnmenutoggle">
                    <span class="menu-icon">
                        <em></em>
                        <em></em>
                        <em></em>
                    </span>
                </div>
                <div id="wt-verticalscrollbar" class="wt-verticalscrollbar">
                    <div class="wt-companysdetails wt-usersidebar">
                        <figure class="wt-companysimg">
                            <img src="{{ asset('images/sidebar/img-01.jpg') }}" alt="img description">
                        </figure>
                        <div class="wt-companysinfo">
                            <figure><img src="{{ asset(Auth()->user()->prof_pic) }}" alt="img description"></figure>
                            <div class="wt-title">
                                <h2><a href="javascript:void(0);"> {{ Auth::user()->name }}</a></h2>
                                <span>Admin</span>
                            </div>
                            <div class="wt-btnarea"><a href="dashboard-postjob.html" class="wt-btn">Post a Job</a></div>
                        </div>
                    </div>
                    <nav id="wt-navdashboard" class="wt-navdashboard">
                        <ul>
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <i class="ti-dashboard"></i>
                                    <span>Insights</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><hr><a href="dashboard-insights.html">Insights</a></li>
                                    <li><hr><a href="dashboard-insightsuser.html">Insights User</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="dashboard-profile.html">
                                    <i class="ti-briefcase"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">
                                    <i class="ti-package"></i>
                                    <span>All Jobs</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><hr><a href="dashboard-completejobs.html">Completed Jobs</a></li>
                                    <li><hr><a href="dashboard-canceljobs.html">Cancelled Jobs</a></li>
                                    <li><hr><a href="dashboard-ongoingjob.html">Ongoing Jobs</a></li>
                                    <li><hr><a href="dashboard-ongoingsingle.html">Ongoing Single</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="dashboard-managejobs.html">
                                    <i class="ti-announcement"></i>
                                    <span>Manage Jobs</span>
                                </a>
                            </li>
                            <li class="wt-notificationicon menu-item-has-children">
                                <a href="javascript:void(0);">
                                    <i class="ti-pencil-alt"></i>
                                    <span>Messages</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><hr><a href="dashboard-messages.html">Messages</a></li>
                                    <li><hr><a href="dashboard-messages2.html">Messages V 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="dashboard-saveitems.html">
                                    <i class="ti-heart"></i>
                                    <span>My Saved Items</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-invocies.html">
                                    <i class="ti-file"></i>
                                    <span>Invoices</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-category.html">
                                    <i class="ti-layers"></i>
                                    <span>Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-packages.html">
                                    <i class="ti-money"></i>
                                    <span>Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-proposals.html">
                                    <i class="ti-bookmark-alt"></i>
                                    <span>Proposals</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-accountsettings.html">
                                    <i class="ti-anchor"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>
                            <li class="wt-active">
                                <a href="dashboard-helpsupport.html">
                                    <i class="ti-tag"></i>
                                    <span>Help &amp; Support</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html">
                                    <i class="ti-shift-right"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="wt-navdashboard-footer">
                        <span>Worktern. © 2019 All Rights Reserved.</span>
                    </div>
                </div>
            </div>
            <section class="wt-haslayout wt-dbsectionspace">  

            @yield('content')
            
            </section>
        </main>
    
    </div>
</div>
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
    <script>
		const menu_icon = document.querySelector('.menu-icon');
		function addClassFunThree() {
	        this.classList.toggle("click-menu-icon");
	    }
	    menu_icon.addEventListener('click', addClassFunThree);
	</script>
</body>

</html>
