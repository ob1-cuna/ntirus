@extends('cliente.layouts.app')
@section('title', 'Detalhes da Transação' )
@section('descricao', 'Página dos detalhes da transação.' )
@section('content')
    <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12" style="padding: 0;">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Transacao</h5>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <table class="mb-0 table table-borderless">
                            <tbody>

                            <tr>
                                <th scope="row">ID</th>
                                <td>{{$transacao->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tipo</th>
                                @switch($transacao->tipo)
                                    @case('c2p')
                                    <td>Pagamento de Trabalho </td>
                                    @break
                                    @case('p2c')
                                    <td>Reembolso</td>
                                    @break
                                @endswitch
                            </tr>
                            <tr>
                                <th scope="row">Trabalho</th>
                                <td><a href="{{ route ('trabalho.show', ['trabalho' => $transacao->trabalho->slug]) }} ">{{ $transacao->trabalho->slug }}</a></td>
                            </tr>
                            <tr>
                                <th scope="row">Valor</th>
                                <td class="text-success">{{ number_format($transacao->valor, 2 ) }} MTs</td>
                            </tr>
                            <tr>
                                <th scope="row">Metodo</th>
                                <td>{{$transacao->metodo['nome']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Codigo</th>
                                <td>{{ $transacao->codigover }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Estado</th>
                                @switch($transacao->estado)
                                    @case('Pendente')
                                    <td class="text-capitalize">
                                        <div class="badge badge-pill badge-info">
                                            Pendente
                                        </div>
                                    </td>
                                    @break
                                    @case('Concluido')
                                    <td class="text-capitalize">
                                        <div class="badge badge-pill badge-success">
                                            Pago
                                        </div>
                                    </td>
                                    @break
                                    @case('Por Confirmar')
                                    <td class="text-capitalize">
                                        <div class="badge badge-pill badge-info">
                                            Por Confirmar
                                        </div>
                                    </td>
                                    @break
                                    @endswitch
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 text-right">
                        <a href="{{ route('imprimir.factura.cliente', ['transacao' => $transacao->id]) }}" class="btn-icon btn-icon-right btn btn-primary btn-wide">
                            Imprimir<i class="lnr-printer btn-icon-wrapper"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection