@extends('freelancer.layouts.app')
@section('title', 'Trabalhos Em Andamento' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">

            @foreach ($trabalhos as $trabalho)
                <div class="mb-4">
                <div class="main-card card">
                    <div class="card-body"><h5 class="card-title"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}" style="color: rgba(73,25,15,0.55);">{{ $trabalho->nome_trabalho }}</a></h5>
                    <h6 class="card-subtitle">
                        @switch($trabalho->status)
                            @case('Em Andamento')
                            <a href="#" class="badge badge-light" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Nenhuma proposta foi respondida pelo cliente">
                                Em Andamento
                            </a>
                                @break
                            @case('AguardandoAC')
                            <a href="#" class="badge badge-info" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="A sua proposta foi aceite pelo cliente">
                                Aguardar Resposta
                            </a>
                                @break
                            @case('Aprovado')
                            <a href="#" class="badge badge-success badge-pill" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="A proposta de um outro freelancer foi aceite pelo cliente">
                                Aprovado
                            </a>
                                @break
                            @case('Recusado')
                            <a href="#" class="badge badge-danger badge-pill" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="A proposta de um outro freelancer foi aceite pelo cliente">
                                Rejeitado
                            </a>
                                @break
                            @default
                            <a href="#" class="badge badge-warning" style="font-weight: 500;">
                                Erro de Digitacao
                            </a>
                        @endswitch
                    </h6>

                        <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <span>Prazo: <b class="bold-medio">{{ Carbon::parse($trabalho->data_aceite)->format('d M Y') }}</b></span>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <span>Preço: <b class="text-success bold-medio">{{ number_format($trabalho->preco_final, 2 ) }} MTs</b></span>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <p><object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 13px"></object>
                                <b class="bold-medio ml-2"> {{ $trabalho->distrito }}, {{ $trabalho->provincia }}</b></p>
                        </div>
                        </div>
                    </div>
                    <div class="d-block text-right card-footer">
                        @switch($trabalho->status)
                            @case('Em Andamento')
                                <a href="{{ route('freelancer.trabalho.solicitar_aprovacao', ['trabalho' => $trabalho->id]) }}" onclick="event.preventDefault();
                                    document.getElementById('pedir-aprovacao-trabalho-form').submit();" class="btn btn-outline-secondary">
                                    <span>Enviar Aprovação</span>
                                </a>
                                <form method="post" id="pedir-aprovacao-trabalho-form" action="{{ route('freelancer.trabalho.solicitar_aprovacao', ['trabalho' => $trabalho->id]) }}" style="display: none">
                                    @csrf
                                </form>
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalCancelarTrabalho{{ $trabalho->id}}">Cancelar Trabalho</button>
                            @break

                            @case('AguardandoAC')
                                <button class="btn btn-outline-secondary">Reclamar</button>
                            @break

                            @case('Aprovado')
                                <button class="btn btn-outline-danger" style="display: none" data-toggle="modal" data-target="#modalCancelarTrabalho{{ $trabalho->id}}">Cancelar Trabalho</button>
                            @break

                            @case('Recusado')
                                <a href="{{ route('freelancer.trabalho.solicitar_aprovacao', ['trabalho' => $trabalho->id]) }}" onclick="event.preventDefault();
                                    document.getElementById('pedir-aprovacao-trabalho-form').submit();" class="btn btn-outline-secondary">
                                <span>Enviar Aprovação</span>
                                </a>
                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalCancelarTrabalho{{ $trabalho->id}}">Cancelar Trabalho</button>
                            @break

                            @default
                                <button class="btn btn-danger">M * I * S * T * A * K * E</button>
                        @endswitch
                </div>
                </div>
                </div>
            @endforeach
        </div>


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
            <div class="main-card card">
                <div class="card-body"><h5 class="card-title">NOVA</h5>
                    <h6 class="card-subtitle">
                    </h6>
                    <p></p>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection

@section('meus_modals')
    @foreach($trabalhos as $trabalho)
        <div class="modal fade" id="modalCancelarTrabalho{{ $trabalho->id }}" tabindex="-1" role="dialog" aria-labelledby="modalCancelarTrabalho{{ $trabalho->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCancelarTrabalho{{ $trabalho->id }}Label">Cancelar Trabalho</h5>
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
                        <form method="post" action="{{ route('freelancer.trabalho.cancelar_trabalho', ['trabalho' => $trabalho->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">SIM, TENHO</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection