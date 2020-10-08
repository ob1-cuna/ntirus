@extends('cliente.layouts.app')
@section('title', 'Trabalhos em Andamento' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
            @foreach($trabalhos as $trabalho)
            <div class="main-card card">
                <div class="card-body"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}"><h5 class="card-title">{{ $trabalho->nome_trabalho }}</h5></a>
                    <h6 class="card-subtitle">
                        Freelancer: <a href="/f/{{ $trabalho->freelancer['username'] ?? $trabalho->freelancer['id']}}">{{ $trabalho->freelancer['name']}}</a>
                    </h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <p>Prazo: <b>{{ Carbon::parse($trabalho->data_aceite)->format('d/M/Y') }}</b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Preço: <b>{{ number_format($trabalho->preco_final, 2 ) }} MTs</b> </p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Tipo: <b>{{ $trabalho->tipo }}</b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Estado:
                                @switch($trabalho->status)
                                    @case('Em Andamento')
                                        <b class="badge badge-pill badge-success widget-label">Em Execucao</b>
                                    @break

                                    @case('AguardandoAC')
                                        <b class="badge badge-pill badge-info widget-label">Aguardar Aprovacao</b>
                                    @break

                                    @case('Aprovado')
                                        <b class="badge badge-pill badge-warning widget-label">Por Pagar</b>
                                    @break

                                    @case('Recusado')
                                        <b class="badge badge-pill badge-danger widget-label">Recusado</b>
                                    @break

                                    @default
                                    Ups falhaste em algum lugar...
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-warning">
                        Ver Proposta Aceite
                    </a>
                </div>
                <div class="d-block text-right card-footer">
                    @switch($trabalho->status)
                        @case('Em Andamento')
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarTrabalho{{ $trabalho->id }}">
                                Cancelar
                            </button>
                        @break

                        @case('AguardandoAC')

                            <a href="{{ route('cliente.trabalho.em_andamento.aprovar', ['trabalho' => $trabalho->id]) }}" onclick="event.preventDefault();
                                document.getElementById('aceitar-trabalho-form').submit();" class="btn btn-outline-success">
                            <span>Aprovar</span>
                            </a>

                            <form method="POST" id="aceitar-trabalho-form" action="{{ route('cliente.trabalho.em_andamento.aprovar', ['trabalho' => $trabalho->id]) }}" style="display: none;">
                                @csrf
                            </form>

                            <a href="{{ route('cliente.trabalho.em_andamento.rejeitar', ['trabalho' => $trabalho->id]) }}" onclick="event.preventDefault();
                                document.getElementById('rejeitar-trabalho-form').submit();" class="btn btn-outline-danger">
                            <span>Rejeitar</span>
                            </a>

                            <form method="POST" id="rejeitar-trabalho-form" action="{{ route('cliente.trabalho.em_andamento.rejeitar', ['trabalho' => $trabalho->id]) }}" style="display: none;">
                                @csrf
                            </form>

                        @break
                        @case('Aprovado')
                            @foreach($transacoes as $transacao)
                                @if($transacao->trabalho_id == $trabalho->id)
                                    <a href="{{ route('cliente.invoices.pay', ['transacao' => $transacao->id])  }}" class="btn btn-outline-secondary">Efectuar Pagamento</a>
                                @endif
                            @endforeach
                        @break

                        @case('Recusado')
                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarTrabalho{{ $trabalho->id }}">
                            Cancelar
                        </button>
                        @break

                        @default
                        Ups falhaste em algum lugar...
                    @endswitch
                </div>
            </div>
                <br>
            @endforeach
                <div class="" style="margin-top: 25px">
                    {{ $trabalhos->links() }}
                </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            @include('cliente.layouts.includes.estatisticas_trabalhos')
        </div>
    </div>

@endsection

@section('meus_modals')
    @foreach($trabalhos as $trabalho)
    <div class="modal fade" id="modalApagarTrabalho{{ $trabalho->id }}" tabindex="-1" role="dialog" aria-labelledby="modalApagarTrabalho{{ $trabalho->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalApagarTrabalho{{ $trabalho->id }}Label">Cancelar Trabalho</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Tem certeza que deseja cancelar o <b>{{ $trabalho->nome_trabalho }}</b>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <form method="post" action="{{ route('cliente.trabalho.em_andamento.cancelar', ['trabalho' => $trabalho->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">SIM, TENHO</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection