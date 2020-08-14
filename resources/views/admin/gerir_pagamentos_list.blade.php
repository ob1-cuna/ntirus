@extends('admin.layouts.app')
@section('title', 'Transações' )
@section('descricao', 'Página das transações efectuadas no Ntirus.' )
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-11">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="app-inner-layout__top-pane" style="padding: 0 0">
                        <div class="pane-left" style="padding: 0 0">
                            <h4 style="font-size: 1.5rem;">Transações</h4>
                        </div>
                        <div class="pane-right">

                        </div>
                    </div>
                    <div class="divider"></div>
                    <table style="width: 100%;" id="example"
                           class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Trab.</th>
                            <th>Usuario</th>
                            <th>Metodo</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th style="width: 15%">Estado</th>
                            <th style="width: 20%">Operações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transacoes as $transacao)
                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('admin.dashboard.transacoes.show', ['transacao' => $transacao->id]) }}">{{ $transacao->id }}</a>
                                </td>
                                <td>{{ $transacao->trabalho->slug }}</td>
                                <td><a href="{{ route('admin.dashboard.usuarios.show', ['user' => $transacao->user->id]) }}">{{$transacao->user->name}}</a></td>
                                <td class="text-center">{{ $transacao->metodo->nome }}</td>
                                <td>{{ number_format($transacao->valor, 2 ) }} MTs</td>
                                @switch($transacao->tipo)
                                    @case('c2p')
                                        <td>Cliente -> Plataforma</td>
                                        @switch($transacao->estado)
                                            @case('Pendente')
                                        <td class="text-center text-capitalize">
                                            <div class="badge badge-pill badge-info">
                                                Pendente
                                            </div>
                                        </td>

                                        <td>
                                            <button class="btn-icon btn btn-danger btn-block">
                                                <i class="pe-7s-wallet btn-icon-wrapper"> </i>Cobrar
                                            </button>
                                        </td>
                                            @break
                                            @case('Concluido')
                                        <td class="text-center text-capitalize">
                                            <div class="badge badge-pill badge-success">
                                                Pago
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn-icon btn-icon-right btn btn-primary btn-sm btn-block">
                                                Imprimir<i class="lnr-printer btn-icon-wrapper"> </i>
                                            </button>
                                        </td>
                                            @break
                                            @default
                                                <td>Mistake</td>
                                        @endswitch
                                    @break
                                    @case('p2f')
                                        <td>Plataforma -> Freelancer</td>
                                        @switch($transacao->estado)
                                            @case('Pendente')
                                                <td class="text-center text-capitalize">
                                                    <div class="badge badge-pill badge-info">
                                                        Pendente
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn-icon btn btn-alternate btn-block">
                                                        <i class="pe-7s-wallet btn-icon-wrapper"> </i>Pagar
                                                    </button>
                                                </td>
                                            @break
                                            @case('Concluido')
                                                <td class="text-center text-capitalize">
                                                    <div class="badge badge-pill badge-success">
                                                        Pago
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn-icon btn-icon-right btn btn-primary btn-sm btn-block">
                                                        Imprimir<i class="lnr-printer btn-icon-wrapper"> </i>
                                                    </button>
                                                </td>
                                            @break
                                            @default
                                                <td>Mistake</td>
                                        @endswitch
                                    @break
                                    @case('p2c')
                                        <td>Reembolso</td>
                                        @switch($transacao->estado)
                                            @case('Pendente')
                                        <td class="text-center text-capitalize">
                                            <div class="badge badge-pill badge-info">
                                                Pendente
                                            </div>

                                        </td>
                                        <td>
                                            <button class="btn-icon btn btn-alternate btn-block">
                                                <i class="pe-7s-wallet btn-icon-wrapper"> </i>Pagar
                                            </button>
                                        </td>
                                            @break
                                            @case('Concluido')
                                        <td class="text-center text-capitalize">
                                            <div class="badge badge-pill badge-success">
                                                Pago
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn-icon btn-icon-right btn btn-primary btn-sm btn-block">
                                                Imprimir<i class="lnr-printer btn-icon-wrapper"> </i>
                                            </button>
                                        </td>
                                            @break
                                            @default
                                                <td>Mistake</td>
                                            @endswitch
                                    @break
                                    @default
                                    <td class="text-danger">MISTAKE</td>
                                @endswitch
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Trab.</th>
                            <th>Usuario</th>
                            <th>Metodo</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th style="width: 15%">Estado</th>
                            <th style="width: 20%">Operações</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection