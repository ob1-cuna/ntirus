@extends('layouts.app_paginas_gerais')
@section('title', 'Registro | Verificação de Email')
@section('content')
    <div class="conteudo">
        <div class="col-xl-4 col-lg-4 col-sm-5 col-md-5 centro-horizontal mb-2">
            <div class="titulo_pagina">Verificação de Email</div>
            <ul class="forms-wizard nav nav-tabs">
                <li class="nav-item done">
                    <a href="#" class="nav-link">
                        <em>1</em>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <em>2</em>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <em>3</em>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <em>4</em>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirmação do endereço de email') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Um novo código de verificação foi enviado para o seu email.') }}
                            </div>
                        @endif

                        {{ __('Antes de prosseguir para o próximo passo, por favor verifique a sua conta através de um link enviado para o seu email!') }}
                        {{ __('Se não recebeu o código de verificação,') }}
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aquí para solicitar outro.') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
