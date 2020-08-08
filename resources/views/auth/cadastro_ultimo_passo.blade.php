@extends('layouts.app_paginas_gerais')
@section('content')
    <div class="conteudo">
        <div class="col-xl-4 col-lg-4 col-sm-5 col-md-5 centro-horizontal mb-2">
            <div class="titulo_pagina">Aguarde a confirmação</div>
            <ul class="forms-wizard nav nav-tabs">
                <li class="nav-item done">
                    <a href="#" class="nav-link">
                        <em>1</em>
                    </a>
                </li>
                <li class="nav-item done">
                    <a href="#" class="nav-link">
                        <em>2</em>
                    </a>
                </li>
                <li class="nav-item done">
                    <a href="#" class="nav-link">
                        <em>3</em>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <em>4</em>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-xl-8 col-lg-8 col-sm-12 col-md-10 centro-horizontal mb-2">

            <div class="no-results">
                <div class="swal2-icon swal2-success swal2-animate-success-icon">

                    <span class="swal2-success-line-tip"></span>
                    <span class="swal2-success-line-long"></span>
                    <div class="swal2-success-ring"></div>
                </div>
                <div class="results-title mt-4">Terminado</div>
                <div class="results-subtitle">Aguarde a confirmação do seu perfil, este processo pode durar até 24h!
                </div>
                <div class="mt-3 mb-3"></div>
                <div class="text-center">
                    <a href="{{ route('registro/perfil') }}" class="btn-shadow btn-wide btn btn-success btn-lg">
                        Alterar informações
                    </a>
                </div>
                <div class="results-subtitle mt-4 col-md-8 centro-horizontal">Se o perfil não for confirmado apôs 24h podes voltar a
                    <form class="d-inline" method="POST" action="#">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline results-subtitle text-success">solicitar a confirmação</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection