@extends('admin.layouts.app')
@section('title', 'Painel do Admin' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('meu_css')
    <style>
        .limite-direita {
            border-style: solid;
            border-width: 1px;
            border-color: rgba(38, 151, 128, 0.21);
            border-left: none;
            border-top: none;
            border-bottom: none;
        }
    </style>
@endsection()
@section('content')


<div class="card no-shadow bg-transparent no-border rm-borders mb-3">
    <div class="card">
        <div class="no-gutters row">
            <div class="col-md-12 col-lg-6 col-xl-3 limite-direita">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Novos Usuarios
                                            </div>
                                            <div class="widget-subheading">Clientes
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary">
                                                {{ $clientesTotal }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3 limite-direita">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Novos Usuarios
                                            </div>
                                            <div class="widget-subheading">Freelancers
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success">
                                                {{ $freelancersTotal }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3 limite-direita">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Contas Bloqueadas
                                            </div>
                                            <div class="widget-subheading">Total
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger">
                                                    {{ count ($perfils_bloqueados) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Trabalhos Publicados
                                            </div>
                                            <div class="widget-subheading">Total
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-focus">
                                                {{ count($trabalhos) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <div class="card-title">
                Usuários Cadastrados
            </div>
                <table style="width: 100%;" id="example"
                       class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th style="width: 15%">Perfil</th>
                        <th style="width: 20%">Operações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="block text-center" style="width: 10px;">{{ $user->id }}</td>
                            <td><a href="{{ route ('admin.dashboard.usuarios.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                            <td>@switch($user->is_permission)
                                    @case(0)
                                    Freelancer
                                    @break
                                    @case(1)
                                    Cliente
                                    @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                @switch($user->perfil->status)
                                    @case(0)
                                    <div class="badge badge-pill badge-danger">
                                        Incompleto
                                    </div>
                                    @break
                                    @case(1)
                                    <div class="badge badge-pill badge-success">
                                        Aprovado
                                    </div>
                                    @break
                                    @case(2)
                                    <div class="badge badge-pill badge-warning">
                                        Completo
                                    </div>
                                    @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                @switch($user->perfil->status)
                                    @case(0)
                                    <button class="btn-icon btn-icon-only btn btn-outline-success disabled">
                                        <i class="fa fa-thumbs-up btn-icon-wrapper"> </i>
                                    </button>
                                    <button class="btn-icon btn-icon-only btn btn-outline-danger disabled">
                                        <i class="fa fa-thumbs-down btn-icon-wrapper"> </i>
                                    </button>
                                    @break
                                    @case(1)
                                    <button class="btn-icon btn-icon-right btn btn-danger">
                                        Suspender <i class="fa fa-ban btn-icon-wrapper ml-1"> </i>
                                    </button>
                                    @break
                                    @case(2)
                                    <a href="{{ route('admin.usuario.aprovar_perfil', ['user' => $user->id]) }}"
                                       onclick="event.preventDefault();
                                                   document.getElementById('aprovar-perfil-{{ $user->id }}').submit();"
                                       class="btn-icon btn-icon-only btn btn-outline-success">
                                        <i class="fa fa-thumbs-up btn-icon-wrapper"> </i>
                                    </a>
                                    <form method="post" id="aprovar-perfil-{{ $user->id }}" action="{{ route('admin.usuario.aprovar_perfil', ['user' => $user->id]) }}" style="display: none;">
                                        @csrf
                                    </form>
                                    <button class="btn-icon btn-icon-only btn btn-outline-danger">
                                        <i class="fa fa-thumbs-down btn-icon-wrapper"> </i>
                                    </button>
                                    @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th style="width: 15%">Perfil</th>
                        <th style="width: 20%">Operações</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection