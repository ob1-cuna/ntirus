@extends('admin.layouts.app')
@section('title', 'Trabalhos' )
@section('descricao', 'Página de gestão das trabalhos dos usuários da Aplicação.' )
@section('meu_css')
    <style>
        .caixa-de-pesquisa-alt {
            position: relative
        }

        .caixa-de-pesquisa-alt input {
            padding: 5px 5px 5px 50px;
            border-radius: 25px;
            width: 100%;
            outline: none !important
        }

        .caixa-de-pesquisa-alt .caixa-de-pesquisa-icon-wrapper-alt {
            position: absolute;
            left: 20px;
            top: 50%;
            margin-top: -16px;
            height: 15px;
            line-height: 32px;
            width: 15px;
            text-align: center;
            opacity: .4;
            font-size: 1.2rem
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="main-card card">
                <ul class="list-group">
                    <li class="list-group-item text-muted">Estatisticas</li>
                    <li class="list-group-item"><span class="text-left">Publicados</span> <o class="pull-right"><span class="badge badge-primary badge-pill">{{ $trabalhos->count() }}</span></o></li>
                    <li class="list-group-item"><span class="text-left">Abertos</span> <o class="pull-right"><span class="badge badge-info badge-pill">{{ $trabalhos->where('status', 'Aberto')->count() }}</span></o></li>
                    <li class="list-group-item"><span class="text-left">Ocultados</span> <o class="pull-right"><span class="badge badge-secondary badge-pill">{{ $trabalhos->where('status', 'Ocultado')->count() }}</span></o></li>
                    <li class="list-group-item"><span class="text-left">Em Andamento</span> <o class="pull-right"><span class="badge badge-alternate badge-pill">{{ $trabalhos->where('status', 'Em Andamento')->count() }}</span></o></li>
                    <li class="list-group-item"><span class="text-left">Cancelados</span> <o class="pull-right"><span class="badge badge-warning badge-pill mr-1">{{ $trabalhos->where('status', 'Cancelado-F')->count() }}</span><span class="badge badge-danger badge-pill">{{ $trabalhos->where('status', 'Cancelado-C')->count() }}</span></o></li>
                    <li class="list-group-item"><span class="text-left">Finalizados</span> <o class="pull-right"><span class="badge badge-success badge-pill">{{ $trabalhos->where('status', 'Finalizado')->count() }}</span></o></li>
                </ul>
            </div>
        </div>
    <div class="col-md-9 col-sm-12">
    <form method="GET" action="{{route('admin.dashboard.trabalho.pesquisar')}}">
        <div class="caixa-de-pesquisa-alt col-md-6 col-xl-6 col-sm-12" style="padding-left: 0;">
            <label for="query" style="display: none"></label>
            <input type="search" name="query" id="query" value="{{request()->input('query')}}" placeholder="Pesquise..." class="form-control @error('query') is-invalid @enderror" autocomplete="off">
            <i class="caixa-de-pesquisa-icon-wrapper-alt fa fa-search"></i>
        </div>
        <br>
    </form>
    @if(request()->input('query') != null)
        <h5>@if($trabalhos->count() == 1) 1 resultado @elseif( $trabalhos->count() == 0) Sem resultados @else {{ $trabalhos_count }} resultados @endif para "<b class="bold-medio">{{request()->input('query')}}</b>"</h5>
        <div class="divider"></div>
    @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
    @foreach($trabalhos as $trabalho)
    <div class="main-card card">
        <div class="card-body"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}"><h5 class="card-title">{{ $trabalho->nome_trabalho }}</h5></a>

            <h6 class="card-subtitle">
                <a href="{{ route ('admin.dashboard.usuarios.show', ['user' => $trabalho->user->id]) }}">{{ $trabalho->user->name }}</a>
                @switch($trabalho->status)
                    @case('Aberto')
                    @case('Ocultado')

                    @break
                    @default
                    | <a href="{{ route ('admin.dashboard.usuarios.show', ['user' => $trabalho->freelancer->id]) }}">{{ $trabalho->freelancer->name }} </a>
                @endswitch
            </h6>
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-6 mb-1">
                    <strong>Categorias:</strong>
                    @foreach($trabalho->habilidades as $habilidade)
                        @if($loop->last)
                            {{ $habilidade->nome }}.
                        @else
                            {{ $habilidade->nome }},
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 mb-1">
                    <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 12px" class="mr-1"></object>
                    {{ $trabalho->distrito }}, {{ $trabalho->provincia }}
                </div>
                <div class="col-md-6 mb-1">
                    <p>Tipo: <b>{{ $trabalho->tipo }}</b> | <b>{{ $trabalho->nivel }}</b></p>
                </div>
                <div class="col-md-6 mb-1">
                    <p>Estado: <b>@switch($trabalho->status)
                                @case('Cancelado-C')
                                <a href="#" class="badge badge-danger" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Cancelado pelo Cliente">
                                    Cancelado C
                                </a>
                                @break
                                @case('Cancelado-F')
                                <a href="#" class="badge badge-warning" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Cancelado pelo Freelancer">
                                    Cancelado F
                                </a>
                                @break
                                @case('Aberto')
                                <a href="#" class="badge badge-info" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="">
                                    Aberto
                                </a>
                                @break
                                @case('Em Andamento')
                                @case('Aprovado')
                                @case('Recusado')
                                <a href="#" class="badge badge-alternate" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="">
                                    Em Andamento
                                </a>
                                @break
                                @case('Pagamento Pendente')
                                <a href="#" class="badge badge-light" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="">
                                    Pagamento Pendente
                                </a>
                                @break
                                @case('Finalizado')
                                <a href="#" class="badge badge-success" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="">
                                    Finalizado
                                </a>
                                @break
                                @case('AguardandoAC')
                                <a href="#" class="badge badge-dark" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Enviado pelo freelancer e nao confirmado pelo cliente">
                                    Aguardado Confirmação
                                </a>
                                @break
                                @case('Ocultado')
                                <a href="#" class="badge badge-secondary" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Enviado pelo freelancer e nao confirmado pelo cliente">
                                    Ocultado
                                </a>
                                @break
                                @default
                                Ups falhaste em algum lugar...
                            @endswitch</b></p>
                </div>
            </div>
            <a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}" class="btn btn-warning">
                Ver Detalhes
            </a>
        </div>
        @if ($trabalho->status == 'Aberto')

        @endif
        @switch($trabalho->status)
            @case('Aberto')
            <div class="d-block text-right card-footer">
                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalOcultarTrabalho{{ $trabalho->id }}">Ocultar</button>
            </div>
            @break
            @case('Ocultado')
            <div class="d-block text-right card-footer">
                <a href="{{ route('admin.dashboard.trabalho.reabrir', ['trabalho' => $trabalho->id]) }}"
                   onclick="event.preventDefault();
                           document.getElementById('aprovar-perfil-{{ $trabalho->id }}').submit();"
                   class="btn btn-outline-primary">
                    Reabrir
                </a>
                <form method="POST" id="aprovar-perfil-{{ $trabalho->id }}" action="{{ route('admin.dashboard.trabalho.reabrir', ['trabalho' => $trabalho->id]) }}" style="display: none;">
                    @csrf
                </form>
            </div>
            @break
        @endswitch
    </div>
        <div class="divider" style="background: transparent"></div>
    @endforeach
    </div>
    </div>
@endsection()

@section('meus_modals')
    @foreach($trabalhos as $trabalho)
        <div class="modal fade" id="modalOcultarTrabalho{{ $trabalho->id }}" tabindex="-1" role="dialog" aria-labelledby="modalOcultarTrabalho{{ $trabalho->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalOcultarTrabalho{{ $trabalho->id }}Label">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">
                            Tem certeza que deseja ocultar <b>{{ $trabalho->nome_trabalho }}</b> publicado por <b>{{ $trabalho->user->name }}</b> da lista de trabalhos abertos?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form method="POST" action="{{ route('admin.dashboard.trabalho.ocultar', ['trabalho' => $trabalho->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">SIM, TENHO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
