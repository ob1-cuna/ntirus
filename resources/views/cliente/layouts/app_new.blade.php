<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title') − Ntirus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="@yield('descricao')">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
<div class="app-container app-theme-gray">
    <div class="app-main">
        <div class="app-sidebar-wrapper">
            @include('cliente.layouts.includes.sidebar')
        </div>
        <div class="app-sidebar-overlay d-none animated fadeIn"></div>
        <div class="app-main__outer">
            <div class="app-main__inner p-0">
                <div class="app-inner-layout chat-layout">
                    <div class="header-mobile-wrapper">
                        <div class="app-header__logo">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                            </button>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="app-header">
                        <div class="page-title-heading">
                            @yield('title')
                            <div class="page-title-subheading">
                                @yield('descricao')
                            </div>
                        </div>

                            @include('layouts.includes.top_nav')

                        <div class="app-header-overlay d-none animated fadeIn"></div>
                    </div>
                    <div class="app-inner-layout__wrapper row-fluid no-gutters">

                            @yield('content')

                    </div>
                </div>
            </div>
           @include('layouts.includes.footer_dashboard')
        </div>
    </div>
</div>

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script></body>
</html>