@extends('admin.layouts.app')
@section('title', 'Categorias' )
@section('descricao', 'Página de gestão das categorias dos usuários da Aplicação.' )
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="app-inner-layout__top-pane" style="padding: 0 0">
                <div class="pane-left" style="padding: 0 0">
                    <h4 style="font-size: 1.5rem;">Categorias Registradas</h4>
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
            <div class="divider"></div>
            <table style="width: 100%;" id="example"
                   class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th style="width: 10%">Trabalhos</th>
                    <th style="width: 10%">Freelancers</th>
                    <th class="text-center" style="width: 15%">Operacoes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($habilidades as $habilidade)
                    <tr>
                        <td class="block text-center" style="width: 10px;">{{ $habilidade->id }}</td>
                        <td>{{ $habilidade->nome }}</td>
                        <td>
                            {{ $habilidade->slug }}
                        </td>
                        <td class="text-center">
                            {{$habilidade->trabalhos->count()}}
                        </td>
                        <td class="text-center">
                            {{$habilidade->users->count()}}
                        </td>
                        <td class="text-center">
                            <button class="btn-icon btn-icon-only btn btn-outline-success" data-toggle="modal" data-target="#modalEditHabilidade{{ $habilidade->id }}">
                                <i class="fa fa-edit btn-icon-wrapper"> </i>
                            </button>
                            <button class="btn-icon btn-icon-only btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarHabilidade{{ $habilidade->id }}">
                                <i class="fa fa-trash btn-icon-wrapper"> </i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th style="width: 10%">Trabalhoss</th>
                    <th style="width: 10%">Freelancers</th>
                    <th class="text-center" style="width: 15%">Operacoes</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('meus_modals')
    <div class="modal fade" id="modalAdicionarHabilidade" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarHabilidade" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdicionarHabilidadeLabel">Adicionar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                <div class="modal-body">
                    <div class="position-relative form-group">
                        <label for="nome" class="">Nome</label>
                        <input name="nome" id="nome" placeholder="" type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="position-relative form-group">
                        <label for="slug" class="">Slug</label>
                        <input name="slug" id="slug" placeholder="" type="text" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary odom-submit">Adicionar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($habilidades as $habilidade)
        <div class="modal fade" id="modalApagarHabilidade{{ $habilidade->id }}" tabindex="-1" role="dialog" aria-labelledby="modalApagarHabilidade{{ $habilidade->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalApagarHabilidade{{ $habilidade->id }}Label">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">
                            Tem certeza que deseja remover o <b>{{ $habilidade->nome }}</b> na aplicação?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <form action="#" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger odom-submit">SIM, TENHO CERTEZA</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($habilidades as $habilidade)
        <div class="modal fade" id="modalEditHabilidade{{ $habilidade->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditHabilidade{{ $habilidade->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditHabilidade{{ $habilidade->id }}Label">Actualizar {{ $habilidade->nome }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <div class="position-relative form-group">
                                <label for="nome" class="">Nome</label>
                                <input name="nome" id="nome" placeholder="" type="text" class="form-control" value="{{ $habilidade->nome }}" autocomplete="off">
                            </div>
                            <div class="position-relative form-group">
                                <label for="slug" class="">Slug</label>
                                <input name="slug" id="slug" placeholder="" type="text" class="form-control" value="{{ $habilidade->slug }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary odom-submit">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection