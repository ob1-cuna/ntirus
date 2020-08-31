@extends('admin.layouts.app')
@section('title', "Gerir Freelancer" )
@section('descricao', "Perfil de $user->name!" )
@section('content')

        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-4"><!--left col-->
                <div class="text-center">
                    <div class="avatar-icon-wrapper avatar-icon-xl" style="width: 200px; height: 200px">
                        <div class="avatar-icon" style="width: 200px; height: 200px" >
                            <img src="{{ asset($user->perfil->foto_perfil) }}"  style="object-fit: cover;" alt="">
                        </div>
                    </div>
                    <h6>{{$user->name}}</h6>
                </div>
                <div class="mb-2 text-center">
                    <div class="">
                        <i class="fab fa-github fa-1x"></i>
                        <i class="fa fa-twitter fa-1x"></i>
                        <i class="fab fa-pinterest fa-1x"></i>
                        <i class="fab fa-google-plus fa-1x"></i>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item text-muted">Estatisticas <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item"><span class="text-left"><strong>Trabalhos Pagos</strong></span> <o class="pull-right">{{$user->trabalhos_frees->where('status', 'Finalizado')->count()}}</o></li>
                    <li class="list-group-item"><span class="text-left"><strong>Trabalhos Cancelados</strong></span> <o class="pull-right">{{$user->trabalhos_frees->where('status', 'Cancelado-F')->count()}}</o></li>
                    <li class="list-group-item"><span class="text-left"><strong>Trabalhos Concorridos</strong></span> <o class="pull-right">{{$user->propostas->count()}}</o></li>
                    <li class="list-group-item"><span class="text-left"><strong>Pagamentos Pendentes</strong></span> <o class="pull-right">N/A</o></li>
                </ul>
            </div><!--/col-3-->
            <div class="col-sm-12 col-md-8 col-lg-9 col-lg-9">
                <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                    <div class="container-fluid">
                        <ul class="tabs-animated-shadow tabs-animated nav">
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#tab-animated-0" aria-selected="true">
                                                    <span>Info</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#tab-animated-1" aria-selected="false">
                                                    <span>Experiencias</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tab-animated-2" aria-selected="false">
                                                    <span>Operações</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">ID</label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>{{ $user->id }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">Nome</label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>{{ $user->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">Email</label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">Endereco</label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>
                                                            <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 12px" class="mr-1"></object>
                                                            {{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">Habilidades</label>
                                                  </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>@foreach($user->habilidades as $habilidade)
                                                                @if($loop->last)
                                                                    {{ $habilidade->nome }}.
                                                                @else
                                                                    {{ $habilidade->nome }},
                                                                @endif
                                                            @endforeach</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">Data de Cadastro</label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>
                                                            {{ Carbon::parse($user->created_at)->format('d F Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <label style="font-weight: 500">Metodos de Pagamentos</label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <p>
                                                            @foreach($user->metodos_de_pagamento as $habilidade)
                                                                @if($loop->last)
                                                                    {{ $habilidade->nome }}.
                                                                @else
                                                                    {{ $habilidade->nome }},
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="">
                                                        <label style="font-weight: 500">Descricao</label>
                                                        <?php echo $user->perfil->descricao;?>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="tab-pane" id="tab-animated-1" role="tabpanel">
                                               <hr>
                                                <div class="app-inner-layout__top-pane" style="padding: 0 0">
                                                    <div class="pane-left" style="padding-top: 15px">
                                                        <h5>Educação</h5>
                                                    </div>
                                                    <div class="pane-right">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdicionarHabilidade">
                                                            <span class="opacity-7 mr-1">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </span>
                                                            Adicionar Nova
                                                        </button>
                                                    </div>
                                                </div>
                                                <ul style="padding-inline-start: 20px">
                                                    @forelse($user->experiencia->where('tipo', 'educacao') as $educacao)
                                                    <li style="list-style: none">
                                                        <div class="row mt-2">
                                                            <h6 class="bold-medio">{{ $educacao->nome}} <i class="fa fa-edit"></i>  <i class="fa fa-trash"></i></h6>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="mr-2">
                                                                <i class="fa fa-building"></i>
                                                                <span class="">{{ $educacao->instituicao }}</span>
                                                            </div>
                                                            <div class="limite-direita ml-3 mr-2 py-1"></div>
                                                            <div class="">
                                                                <i class="fa fa-calendar-alt mr-2"></i>{{ $educacao->data_inicio }} - @if($educacao->data_terminio == 'Nov -0001')  Até Hoje @else {{ ($educacao->data_terminio)}}@endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @empty
                                                        <strong>SEM HISTORICO ACADEMICO REGISTRADO</strong>
                                                    @endforelse
                                                </ul>
                                               <hr>
                                                <div class="app-inner-layout__top-pane" style="padding: 0 0">
                                                    <div class="pane-left" style="padding-top: 15px">
                                                        <h5>Experiencia Profissional</h5>
                                                    </div>
                                                    <div class="pane-right">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdicionarHabilidade">
                                                            <span class="opacity-7 mr-1">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </span>
                                                            Adicionar Nova
                                                        </button>
                                                    </div>
                                                </div>
                                                <ul style="padding-inline-start: 20px">
                                                    @forelse($user->experiencia->where('tipo', 'exper_prof') as $exper_prof)
                                                        <li style="list-style: none">
                                                            <div class="row mt-2">
                                                                <h6 class="bold-medio">{{ $exper_prof->nome}} <i class="fa fa-edit"></i>  <i class="fa fa-trash"></i></h6>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="mr-2">
                                                                    <i class="fa fa-building"></i>
                                                                    <span class="">{{ $exper_prof->instituicao }}</span>
                                                                </div>
                                                                <div class="limite-direita ml-3 mr-2 py-1"></div>
                                                                <div class="">
                                                                    <i class="fa fa-calendar-alt mr-2"></i>{{ $exper_prof->data_inicio }} - @if($exper_prof->data_terminio == 'Nov -0001')  Até Hoje @else {{ ($exper_prof->data_terminio)}}@endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <strong>SEM EXPERINCIA PROFISSIONAL REGISTRADA</strong>
                                                    @endforelse
                                                </ul>

                                                <hr>
                                            </div>
                                            <div class="tab-pane" id="tab-animated-2" role="tabpanel">
                                                <hr>
                                                @switch($user->perfil->status)
                                                    @case(0)
                                                    <button class="btn-icon btn-icon-right btn btn-outline-success disabled">
                                                        Aprovar <i class="fa fa-thumbs-up btn-icon-wrapper ml-1"> </i>
                                                    </button>
                                                    <button class="btn-icon btn-icon-right btn btn-outline-danger disabled">
                                                        Reprovar <i class="fa fa-thumbs-down btn-icon-wrapper ml-1"> </i>
                                                    </button>
                                                    @break
                                                    @case(1)
                                                    <button class="btn-icon btn-icon-right btn btn-warning">
                                                        Suspender <i class="fa fa-ban btn-icon-wrapper ml-1"> </i>
                                                    </button>
                                                    <button class="btn-icon btn-icon-right btn btn-danger">
                                                        Apagar Conta <i class="fa fa-user-times btn-icon-wrapper ml-1"> </i>
                                                    </button>
                                                    @break
                                                    @case(2)
                                                    <a href="{{ route('admin.usuario.aprovar_perfil', ['user' => $user->id]) }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('aprovar-perfil-{{ $user->id }}').submit();"
                                                       class="btn-icon btn-icon-right btn btn-outline-success">
                                                        Aprovar <i class="fa fa-thumbs-up btn-icon-wrapper ml-1"> </i>
                                                    </a>
                                                    <form method="post" id="aprovar-perfil-{{ $user->id }}" action="{{ route('admin.usuario.aprovar_perfil', ['user' => $user->id]) }}" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <button class="btn-icon btn-icon-right btn btn-outline-danger">
                                                        Reprovar <i class="fa fa-thumbs-down btn-icon-wrapper ml-1"> </i>
                                                    </button>
                                                    @break
                                                @endswitch
                                                <hr>
                                            </div>
                                        </div>
                    </div>
                </div>
                </div><!--/tab-pane-->
           <!--/tab-content-->
        </div>
@endsection()