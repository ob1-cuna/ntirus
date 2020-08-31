@extends('layouts.app_paginas_gerais')
@section('title', 'Freelancers')
@section('content')

    <section class="nt-headline">
        <h1 class="nt-h1 text-left" style="font-family: 'Lato', 'Arial', sans-serif; margin-left: 100px;">Bem-vindo a Ntirus</h1>
        <p class="nt-p text-left" style="font-family: 'Lato', 'Arial', sans-serif; margin-left: 100px;">Conectando profissionais autonomos e clientes!</p>
        <div class="hero-btn-area">
            <a class="btn btn-light btn-lg" href="#">Cadastre-se</a>
            <a class="btn btn-light btn-lg" href="#">Faca o Login</a>
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
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Cabeleireiro & Estética</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/design-grafico.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Design Grafico</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/electricidade.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Electricidade</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/instalacao-tv.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Instalação de TV</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/meu_file.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary  btn-block btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">1Programação</p>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/meu_file.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Pintura</p>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/meu_file.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Programação</p>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-10 mb-4">
                        <div class="card">
                        <img src="{{ asset('images/categories/meu_file.svg') }}" class="card-img-top" alt="">
                        <div class="card-body btn btn-outline-secondary btn-lg btn-square border-0">
                            <p class="card-text text-center text-capitalize">Programação</p>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="align-middle text-center">
            <a class="btn btn-outline-secondary btn-lg" href="#" role="button">Ver Todas</a>
        </div>

        <h4>Como Funciona</h4>
        <div class="container col-10">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_1.svg') }}" style="max-height: 150px"></object>
                    <h6><strong>Publique um Trabalho</strong></h6>
                    <p>Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed
                        diam nonumy eirmod tempor.</p>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/brand_ntitus/logotype.svg') }}" style="max-height: 150px"></object>
                    <h6><strong>Selecione o Freelancer</strong></h6>
                    <p>Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed
                        diam nonumy eirmod tempor.</p>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_1.svg') }}" style="max-height: 150px"></object>
                    <h6><strong>Pague pelo trabalho</strong></h6>
                    <p>Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed
                        diam nonumy eirmod tempor.</p>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <object type="image/svg+xml" data="{{ asset('images/passos/passo_1.svg') }}" style="max-height: 150px"></object>
                    <h6> <strong>Receba o Trabalho</strong></h6>
                    <p>Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed
                        diam nonumy eirmod tempor.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
