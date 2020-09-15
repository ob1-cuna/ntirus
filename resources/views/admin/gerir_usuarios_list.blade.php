@extends('admin.layouts.app')
@section('title', 'Gerir Usuarios' )
@section('descricao', 'Página de gestão dos usuários da Aplicação.' )
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="main-card card">
                <div class="card-body">
                    <h5 class="card-title">Filtros</h5>
                    <ul class="list-group list-group-flush">
                        <a href="#" class="list-group-item">Freelancers
                            <span class="badge badge-success badge-pill">{{ $freelancers_perfil_activos->count() }}</span>
                            <span class="badge badge-warning badge-pill">{{ $freelancers_perfil_completos->count() }}</span>
                            <span class="badge badge-danger badge-pill">{{ $freelancers_perfil_incompletos->count() }}</span>
                        </a>
                        <a href="#" class="list-group-item">Clientes
                            <span class="badge badge-success badge-pill">{{ $clientes_perfil_activos->count() }}</span>
                            <span class="badge badge-warning badge-pill">{{ $clientes_perfil_completos->count() }}</span>
                            <span class="badge badge-danger badge-pill">{{ $clientes_perfil_incompletos->count() }}</span>
                        </a>
                    </ul>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-9 col-sm-12">
            @include('admin.includes.caixa-pesquisa-usuarios')
            <div class="divider"></div>
            @if(request()->input('query') != null)
                <h5>@if($users->count() == 1) 1 resultado @elseif( $users->count() == 0) Sem resultados @else {{ $users_count }} resultados @endif para "<b class="bold-medio">{{request()->input('query')}}</b>"</h5>
                <div class="divider"></div>
            @endif
            @foreach($users as $user)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="widget-content-wrapper mb-2">
                            <div class="list-group list-group-flush">
                                <li style="list-style: none">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <img width="42" class="avatar-icon usuario-avatar-xs"
                                                     src="{{ asset($user->perfil->foto_perfil) }}" height="42" alt=""
                                                     style="object-fit: cover;">
                                            </div>
                                            <div class="widget-content-left">

                                                <div class="widget-heading"><a href="{{ route ('admin.dashboard.usuarios.show', ['user' => $user->id]) }}">{{ $user->name }}</a>
                                                </div>
                                                <div class="">
                                                    <o href="#" class="widget-subheading mr-2">
                                                    @switch($user->is_permission)
                                                        @case(0)
                                                        Freelancer
                                                        @break
                                                        @case(1)
                                                        Cliente
                                                        @break
                                                        @default
                                                        Miskate
                                                    @endswitch
                                                    </o>
                                                    @switch($user->perfil->status)
                                                        @case(0)
                                                        <div class="badge badge-pill badge-danger widget-label">
                                                            Incompleto
                                                        </div>
                                                        @break
                                                        @case(1)
                                                        <div class="badge badge-pill badge-success widget-label">
                                                            Aprovado
                                                        </div>
                                                        @break
                                                        @case(2)
                                                        <div class="badge badge-pill badge-warning widget-label">
                                                            Completo
                                                        </div>
                                                        @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="row">
                        @switch($user->is_permission)
                            @case(0)

                                @switch($user->perfil->status)
                                    @case(0)
                                    @break

                                    @case(1)
                                    <div class="col-md-6 mb-1">
                                        <strong>Categorias:</strong>
                                        @foreach($user->habilidades as $habilidade)
                                            @if($loop->last)
                                                {{ $habilidade->nome }}.
                                            @else
                                                {{ $habilidade->nome }},
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 12px" class="mr-1"></object>
                                        {{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <strong>Trabalhos Feitos:</strong>
                                        {{$user->trabalhos_frees->where('status', 'Finalizado')->count()}}
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <strong>Trabalhos Cancelados:</strong>
                                        {{$user->trabalhos_frees->where('status', 'Cancelado-F')->count()}}
                                    </div>
                                    @break
                                    @case(2)
                                    <div class="col-md-6 mb-1">
                                        <strong>Categorias:</strong>
                                        @foreach($user->habilidades as $habilidade)
                                            @if($loop->last)
                                                {{ $habilidade->nome }}.
                                            @else
                                                {{ $habilidade->nome }},
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 12px" class="mr-1"></object>
                                        {{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}
                                    </div>
                                    @break
                                    @default
                                    Miskate
                                @endswitch
                            @break

                            @case(1)
                                <div class="col-md-12 col-lg-3 col-sm-12 mb-1">
                                    <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}"
                                            style="width: 18px; height: 12px" class="mr-1"></object>
                                    {{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}
                                </div>
                                <div class="col-md-4 col-lg-3 col-sm-4 mb-1">
                                    <strong>Postados: </strong>{{$user->trabalhos_cliente->count()}}
                                </div>
                                <div class="col-md-4 col-lg-3 col-sm-4 mb-1">
                                    <strong>Pagos: </strong>{{$user->trabalhos_cliente->where('status', 'Finalizado')->count()}}
                                </div>
                                <div class="col-md-4 col-lg-3 col-sm-4 mb-1">
                                    <strong>Pag. Pendente: </strong>{{$user->trabalhos_cliente->where('status', 'Pagamento Pendente')->count()}}
                                </div>
                            @break
                            @default
                            Miskate
                        @endswitch
                        </div>
                    </div>
                    <div class="d-block text-right card-footer">
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
                            <button class="btn-icon btn-icon-right btn btn-danger">
                                Suspender <i class="fa fa-ban btn-icon-wrapper ml-1"> </i>
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
                    </div>
                </div>
            @endforeach
            <div class="paginacao-rounded" style="margin-top: 25px">
               {{ $users->links() }}
            </div>

        </div>

    </div>
@endsection()

