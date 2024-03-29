@extends('cliente.layouts.app')
@section('title', 'Trabalhos Abertos' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ups</strong> houve alguns beefs com os dados inseridos.<br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @foreach($trabalhos as $trabalho)
            <div class="main-card card">
                <div class="card-body"><h5 class="card-title"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}">{{ $trabalho->nome_trabalho }}</a></h5>
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
                    <a href="{{ route('cliente.postar_job.edit.view', ['trabalho' => $trabalho->id]) }}" class="btn btn-outline-secondary">Actualizar</a>
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
                    <form method="POST" action="{{ route('cliente.trabalho.destroy', ['trabalho' => $trabalho->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary">SIM, TENHO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection