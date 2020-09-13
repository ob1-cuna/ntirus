@extends('freelancer.layouts.app')
@section('title', 'Transações' )
@section('descricao', 'Suas transações na Ntirus!' )
@section('content')
    @include('freelancer.layouts.includes.estatisticas_valores')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                <td>
                                    @if($transacao->trabalho['slug'] != null)
                                        <a href="{{ route ('trabalho.show', ['trabalho' => $transacao->trabalho->slug]) }}">
                                            {{ $transacao->trabalho->slug }}
                                        </a>
                                    @else
                                        <b>N/A</b>
                                @endif
                                <td>{{ number_format($transacao->valor, 2 ) }} MTs</td>
                                <td>
                                    Pagamento de Trabalho
                                </td>
                                @switch($transacao->estado)
                                    @case('Pendente')
                                    <td class="text-center text-capitalize">
                                        <div class="badge badge-pill badge-info">
                                            Pendente
                                        </div>
                                    </td>
                                    @break
                                    @case('Por Confirmar')
                                    <td class="text-center text-capitalize">
                                        <div class="badge badge-pill badge-light">
                                            Por Confirmar
                                        </div>
                                    </td>
                                    @break
                                @endswitch
                                <td>
                                    <a href="{{ route('dashboard.invoices.show', ['transacao' => $transacao->id]) }}" class="btn-icon btn btn-warning btn-block">
                                        <i class="pe-7s-info btn-icon-wrapper"> </i>
                                        Ver Detalhes
                                    </a>
                                </td>
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
