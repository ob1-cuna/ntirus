@extends('cliente.layouts.app')
@section('title', 'Definições da Conta' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

<div class="row">
    <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="card mb-3 widget-chart">
            <div class="widget-chart-content">
                <div class="icon-wrapper rounded">
                    <div class="icon-wrapper-bg bg-warning"></div>
                    <i class="lnr-laptop-phone text-warning"></i></div>
                <div class="widget-numbers">
                    <span>{{ App\Trabalho::where('user_id', Auth::user()->id)->count() }}</span>
                </div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                    Trabalhos Publicados
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-1"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="card mb-3 widget-chart">
            <div class="widget-chart-content">
                <div class="icon-wrapper rounded">
                    <div class="icon-wrapper-bg bg-danger"></div>
                    <i class="lnr-graduation-hat text-danger"></i>
                </div>
                <div class="widget-numbers"><span>{{ getEstatisticaCliente(Auth::user()->id, 'Aberto', 'trabalhos') }}</span></div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-danger font-weight-bold">
                    Trabalhos Abertos
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-2"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-xl-4">
        <div class="card mb-3 widget-chart">
            <div class="widget-chart-content">
                <div class="icon-wrapper rounded">
                    <div class="icon-wrapper-bg bg-info"></div>
                    <i class="lnr-diamond text-info"></i></div>
                <div class="widget-numbers text-danger"><span>{{ getEstatisticaCliente(Auth::user()->id, 'Finalizados', 'trabalhos') }}</span></div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-info font-weight-bold">
                    Trabalhos Finalizados
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mbg-3">
    <a href="{{ route('cliente.postar_job') }}" class="btn-wide btn-pill btn-shadow fsize-1 btn btn-focus btn-lg">
                                                <span class="mr-2 opacity-7">
                                                    <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                                </span>
        Publicar Novo Trabalho
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding: 0;">
    <div class="main-card mb-3 card">

        <div class="card-body">
            <div class="card-title">
                Transações Pendentes
            </div>
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

@endsection