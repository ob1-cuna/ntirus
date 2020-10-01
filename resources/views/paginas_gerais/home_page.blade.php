@extends('layouts.app_paginas_gerais')
@section('title', 'Freelancers')
@section('content')

    <section class="nt-headline">
        <h1 class="nt-h1 text-left" style="font-family: 'Lato', 'Arial', sans-serif; margin-left: 100px;">Bem-vindo a Ntirus</h1>
        <p class="nt-p text-left" style="font-family: 'Lato', 'Arial', sans-serif; margin-left: 100px;">Conectando profissionais autonomos e clientes!</p>
        <div class="hero-btn-area">
            @if(auth()!=true)
            <a class="btn btn-light btn-lg" href="{{ route('register') }}">Cadastre-se</a>
            <a class="btn btn-light btn-lg" href="{{ route('login') }}">Faca o Login</a>
            @endif
        </div>
    </section>
    <div class="clearfix mb-4"></div>
    <div class="conteudo col-12">
    <h4>Categorias</h4>
        <div class="">
            <div class="row justify-content-center">
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/cabelo.svg') }}" class="card-img-top" alt="">
                        <a href="{{ route ('trabalhos.list', ['cat' => 'cabelereiro-estetica']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Cabeleireiro & Estética</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/categories/carpentaria.svg') }}" class="card-img-top" alt="">
                            <a href="{{ route ('trabalhos.list', ['cat' => 'carpetaria']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                                <p class="card-text text-center text-capitalize">Carpetaria</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/electricidade.svg') }}" class="card-img-top" alt="">
                        <a href="{{ route ('trabalhos.list', ['cat' => 'electricidade']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Electricidade</p>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/instalacao-tv.svg') }}" class="card-img-top" alt="">
                        <a href="{{ route ('trabalhos.list', ['cat' => 'instalacao-tv']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Instalação de TV</p>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/culinaria.svg') }}" class="card-img-top" alt="">
                        <a href="{{ route ('trabalhos.list', ['cat' => 'culinaria']) }}" class="card-body btn btn-outline-secondary  btn-block btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Culinária</p>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/categories/code.svg') }}" class="card-img-top" alt="">
                            <a href="{{ route ('trabalhos.list', ['cat' => 'dev-web']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                                <p class="card-text text-center text-capitalize">Desenvolvimento Web</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/categories/design-grafico.svg') }}" class="card-img-top" alt="">
                                <a href="{{ route ('trabalhos.list', ['cat' => 'design-grafico']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                                    <p class="card-text text-center text-capitalize">Design Grafico</p>
                                </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/edicao-de-video.svg') }}" class="card-img-top" alt="">
                        <a href="{{ route ('trabalhos.list', ['cat' => 'edicao-de-video']) }}" class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Edição de Vídeo</p>
                        </a>
                        </div>
                    </div>
            </div>
        </div>

        <h4>Como Funciona</h4>
        <div class="container col-10">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_1.svg') }}" style="max-height: 150px"></object>
                    <h6><strong>Publique um Trabalho</strong></h6>
                    <p>Começe publicando um trabalho para os freelancers possam concorrer.</p>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_2.svg') }}" style="max-height: 150px"></object>
                    <h6><strong>Selecione o Freelancer</strong></h6>
                    <p>Selecione o freelancer com a proposta que te agrada.</p>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_3.svg') }}" style="max-height: 150px"></object>
                    <h6><strong>Pague pelo trabalho</strong></h6>
                    <p>Pague pelo trabalho e e a plataforma ficará com o valor até o freelancer terminar a execução.</p>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_4.svg') }}" style="max-height: 150px"></object>
                    <h6> <strong>Receba o Trabalho</strong></h6>
                    <p>Receba o trabalho e a plataforma fará o pagamento ao freelancer e podes avaliar o freelancer.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
