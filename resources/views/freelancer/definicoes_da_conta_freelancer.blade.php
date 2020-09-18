@extends('freelancer.layouts.app_new')
@section('title', 'Definições da Conta' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')


<div class="app-inner-layout__sidebar card">
    <div class="p-3 stick-to-parent">
        <div class="dropdown-menu nav p-0 dropdown-menu-inline dropdown-menu-rounded dropdown-menu-hover-primary">
            <h6 tabindex="-1" class="pt-0 dropdown-header">Operações</h6>
            <a href="#tab-faq-1" data-toggle="tab" tabindex="0"
               class="mb-1 active dropdown-item">Alterar Senha</a>
            <a href="#tab-faq-2" data-toggle="tab" tabindex="0" class="mb-1 dropdown-item">
                Alterar Email</a>
            <a href="#tab-faq-3" data-toggle="tab" tabindex="0" class="mb-1 dropdown-item">
                Remover Conta</a>
        </div>
    </div>
</div>
<div class="col-md-12 app-inner-layout__content card">
    <div class="pb-5 pl-5 pr-5 pt-3">
        <div class="mobile-app-menu-btn mb-3">
            <button type="button" class="hamburger hamburger--elastic"><span
                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>
        </div>
        <div class="tab-content">
            <div class="tab-pane active show" id="tab-faq-1" ><h4>Alterar Senha</h4>
                <div class="divider"></div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ups</strong> houve alguns beefs com os dados inseridos.<br>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success-update-password'))
                    <div class="alert alert-success">
                        {{ session('success-update-password') }}
                    </div>
                @endif
                <form class="" method="POST" action="{{ route('update.password') }}">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="senha_actual" class="">Senha Actual</label>
                        <input name="senha_actual" id="senha_actual" type="password" class="form-control  @error('senha_actual') is-invalid @enderror" required autocomplete="off">
                        @error('senha_actual')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="nova_senha" class="">Nova Senha</label>
                        <input name="nova_senha" id="nova_senha"  type="password" class="form-control @error('nova_senha') is-invalid @enderror" required autocomplete="confirmacao_nova_senha">
                        @error('nova_senha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="confirmacao_nova_senha" class="">Confirmação da nova senha</label>
                        <input name="confirmacao_nova_senha" id="confirmacao_nova_senha" placeholder="" type="password" class="form-control @error('confirmacao_nova_senha') is-invalid @enderror">
                        @error('confirmacao_nova_senha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="clearfix">
                        <div class="text-left">
                            <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Salvar nova senha</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab-faq-2"><h4>Alterar Email</h4>
                <div class="divider"></div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ups</strong> houve alguns beefs com os dados inseridos.<br>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success-update-email'))
                    <div class="alert alert-success">
                        {{ session('success-update-email') }}
                    </div>
                @endif
                <form class="" method="POST" action="{{ route('update.email') }}">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="email_actual" class="">Email Actual</label>
                        <input name="email_actual" id="email_actual" placeholder="exemplo@site.com" type="email" class="form-control @error ('email_actual') is-invalid @enderror" value="{{ old('email_actual') }}" autocomplete="off">
                        @error('email_actual')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="email" class="">Novo Email</label>
                        <input name="email" id="email" placeholder="novoexemplo@site.com" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="password_novo_email" class="">Confirmar senha</label>
                        <input name="password_novo_email" id="password_novo_email" type="password" class="form-control @error('password_novo_email') is-invalid @enderror" autocomplete="off">
                        @error('password_novo_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="clearfix">
                        <div class="text-left">
                            <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Alterar Email</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab-faq-3"><h4>Remover conta</h4>
                <div class="divider"></div>
                <form class="">
                    <div class="position-relative form-group">
                        <label for="motivo_remover_conta" class="">Diga-nos porque</label>
                        <input name="titulo_trabalho" id="motivo_remover_conta" placeholder="Digite um titulo simples..." type="text" class="form-control">
                    </div>

                    <div class="clearfix">
                        <div class="text-left">
                            <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">APAGAR CONTA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection