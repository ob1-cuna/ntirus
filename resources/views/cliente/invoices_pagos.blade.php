@extends('cliente.layouts.app')
@section('title', 'Meu Perfil' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
    <div class="main-card mb-3 card">
        <div class="card-body">

                <table style="width: 100%;" id="example"
                   class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID Trabalho</th>
                    <th>Valor</th>
                    <th style="width: 15%">Estado</th>
                    <th style="width: 20%">Operações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transacoes as $transacao)
                    <tr>
                        <td>{{ $transacao->trabalho->slug }}</td>
                        <td>{{ $transacao->valor }}</td>
                        @switch($transacao->estado)
                        @case('Pendente')
                            <td class="text-center text-capitalize">
                                <div class="badge badge-pill badge-info">
                                    Pendente
                                </div>
                            </td>
                            <td>
                                <button class="btn-icon btn btn-danger btn-block">
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
                        @endswitch

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID Trabalho</th>
                    <th>Valor</th>
                    <th>Estado</th>
                    <th>Acções</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>
</div>

@endsection