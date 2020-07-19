@extends('cliente.layouts.app_new')
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
                <form class="">
                    <div class="position-relative form-group">
                        <label for="senha_actual" class="">Senha Actual</label>
                        <input name="titulo_trabalho" id="senha_actual" placeholder="******" type="password" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="nova_senha" class="">Nova Senha</label>
                        <input name="titulo_trabalho" id="nova_senha" placeholder="*******" type="password" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="confirmacao_nova_senha" class="">Confirmação da nova senha</label>
                        <input name="titulo_trabalho" id="confirmacao_nova_senha" placeholder="" type="password" class="form-control">
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
                <form class="">
                    <div class="position-relative form-group">
                        <label for="email_actual" class="">Email Actual</label>
                        <input name="titulo_trabalho" id="email_actual" placeholder="exemplo@site.com" type="email" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="novo_email" class="">Novo Email</label>
                        <input name="titulo_trabalho" id="novo_email" placeholder="novoexemplo@site.com" type="email" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="password_novo_email" class="">Confirmar senha</label>
                        <input name="titulo_trabalho" id="password_novo_email" placeholder="*******" type="password" class="form-control">
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