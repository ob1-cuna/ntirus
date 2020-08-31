@extends('cliente.layouts.app')
@section('title', 'Trabalhos Abertos' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            @foreach($trabalhos as $trabalho)
            <div class="main-card card">
                <div class="card-body"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}"><h5 class="card-title">{{ $trabalho->nome_trabalho }}</h5></a>
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <p>Data: <b>{{ Carbon::parse($trabalho->data_prev)->format('d M Y') }} </b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Nivel: <b>{{ $trabalho->nivel }}</b> </p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Tipo: <b>{{ $trabalho->tipo }}</b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>
                                <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 12px" class="mr-1"></object>
                                <b>{{ $trabalho->distrito }}, {{ $trabalho->provincia }}</b>
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('cliente.trabalhos.abertos.proposta.show', ['trabalho' => $trabalho->id]) }}" class="btn btn-warning">
                        Ver Propostas
                        <span class="badge badge-pill badge-light">
                            {{ count($trabalho->propostas) }}
                        </span>
                    </a>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarTrabalho{{ $trabalho->id }}">Remover</button>
                    <button class="btn btn-outline-secondary">Actualizar</button>
                </div>
            </div>
                <br>
            @endforeach
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="main-card card">
                <div class="card-body"><h5 class="card-title">NOVA</h5>
                    <h6 class="card-subtitle">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                    </h6>
                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis eni</p>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection

@section('meus_modals')
    @foreach($trabalhos as $trabalho)
    <div class="modal fade" id="modalApagarTrabalho{{ $trabalho->id }}" tabindex="-1" role="dialog" aria-labelledby="modalApagarTrabalho{{ $trabalho->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalApagarTrabalho{{ $trabalho->id }}Label">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Tem certeza que deseja remover <b>{{ $trabalho->nome_trabalho }}</b> da sua lista de trabalhos abertos?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Sim, tenho certeza</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection