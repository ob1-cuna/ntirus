@extends('cliente.layouts.app')
@section('title', 'Transações' )
@section('descricao', 'Suas transações na Ntirus!' )
@section('content')


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9" style="padding: 0;">
    <div class="main-card mb-3 card">
        <div class="card-body">

                <table style="width: 100%;" id="example"
                   class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID Trabalho</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th style="width: 15%">Estado</th>
                    <th style="width: 20%">Operações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transacoes as $transacao)
                    <tr>
                        <td><a href="{{ route ('trabalho.show', ['trabalho' => $transacao->trabalho->slug]) }}">{{ $transacao->trabalho->slug }}</a></td>
                        <td>{{ number_format($transacao->valor, 2 ) }} MTs</td>
                        <td>
                            @switch($transacao->tipo)
                                @case('c2p')
                                    Pagamento de Trabalho
                                @break
                                @case('p2c')
                                    Reembolso
                                @break
                            @endswitch
                        </td>
                        @switch($transacao->estado)
                        @case('Pendente')
                            <td class="text-center text-capitalize">
                                <div class="badge badge-pill badge-info">
                                    Pendente
                                </div>
                            </td>
                            @switch($transacao->tipo)
                                @case('p2c')
                                <td>
                                    <a href="{{ route ('cliente.invoices.show', ['transacao' => $transacao->id]) }}" class="btn-icon btn btn-warning btn-block">
                                        <i class="pe-7s-info btn-icon-wrapper"> </i>
                                        Ver Detalhes
                                    </a>
                                </td>
                                @break
                                @case('c2p')
                                <td>
                                    <a href="{{ route('cliente.invoices.pay', ['transacao' => $transacao->id])  }}" class="btn-icon btn btn-danger btn-block">
                                        <i class="pe-7s-wallet btn-icon-wrapper"> </i>
                                        Pagar
                                    </a>
                                </td>
                                @break
                            @endswitch
                        @break
                        @case('Concluido')
                            <td class="text-center text-capitalize">
                                <div class="badge badge-pill badge-success">
                                    Pago
                                </div>
                            </td>
                            <td>
                                <a href="{{ route ('cliente.invoices.show', ['transacao' => $transacao->id]) }}" class="btn-icon btn btn-warning btn-block">
                                    <i class="pe-7s-info btn-icon-wrapper"> </i>
                                    Ver Detalhes
                                </a>
                            </td>
                        @break
                        @case('Por Confirmar')
                            <td class="text-center text-capitalize">
                                <div class="badge badge-pill badge-light">
                                    Por Confirmar
                                </div>
                            </td>
                            <td>
                                <a href="{{ route ('cliente.invoices.show', ['transacao' => $transacao->id]) }}" class="btn-icon btn btn-warning btn-block">
                                    <i class="pe-7s-info btn-icon-wrapper"> </i>
                                    Ver Detalhes
                                </a>
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