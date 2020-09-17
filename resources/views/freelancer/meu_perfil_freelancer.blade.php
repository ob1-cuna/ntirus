@extends('freelancer.layouts.app_new')
@section('title', 'Meu Perfil' )
@section('descricao', 'Altere os dados do seu perfil!' )
@section('meu_css')

@endsection
@section('content')


<div class="app-inner-layout__sidebar card">
    <div class="p-3 stick-to-parent">
        <div class="dropdown-menu nav p-0 dropdown-menu-inline dropdown-menu-rounded dropdown-menu-hover-primary">
            <h6 tabindex="-1" class="pt-0 dropdown-header">Menu</h6>
            <a href="#tab-info-pessoal" data-toggle="tab" tabindex="0" class="mb-1 active dropdown-item">Dados Pessoais</a>
            <a href="#tab-exp-educa" data-toggle="tab" tabindex="0" class="mb-1 dropdown-item">
                Experiencia & Educação</a>
            <a href="#tab-habilidades" data-toggle="tab" tabindex="0" class="mb-1 dropdown-item">
                Habilidades</a>
        </div>
    </div>
</div>
<div class="col-md-12 app-inner-layout__content card">
    <div class="pb-5 pl-5 pr-5 pt-3">
        <div class="mobile-app-menu-btn mb-3">
            <button type="button" class="hamburger hamburger--elastic"><span
                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>
        </div>
        <div class="tab-content">
            <div class="tab-pane active show" id="tab-info-pessoal" ><h4>Dados Pessoais</h4>
                <div class="divider"></div>
                <form class="" method="POST" action="{{ route('perfil.edit') }}">
                    @method('patch')
                    @csrf

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

                    <div class="position-relative form-group">
                        <label for="name" class="">Nome Completo</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
						    <strong>{{ $message }}</strong>
						</span>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="d_nascimento" class="">Data de Nascimento</label>
                        <input id="d_nascimento" type="date" class="form-control @error('d_nascimento') is-invalid @enderror" name="d_nascimento" value="{{ Auth::user()->d_nascimento}}" required>
                        @error('d_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="provincia" class="">Provincia</label>
                                <select name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" value="{{ Auth::user()->perfil->provincia }}" required>
                                    {{ $var = $perfil->provincia  }}
                                    @include('layouts.includes.select_provincias_edit')
                                </select>
                                @error('provincia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="cidade" class="">Cidade</label>
                                <input name="cidade" id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" value="{{ Auth::user()->perfil->cidade }}" required>
                                @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="descricao" class="">Descricao</label>
                        <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror">{{ $perfil->descricao }}</textarea>
                        @error('descricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="clearfix">
                        <div class="text-left">
                            <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab-exp-educa">
                <div>
                <div class="app-inner-layout__top-pane" style="padding: 0 0">
                    <div class="pane-left" style="padding: 0 0">
                        <h4 style="font-size: 1.5rem;">Experiencia</h4>
                    </div>
                    <div class="pane-right">
                        <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-primary" data-toggle="collapse" data-target="#nova-exp">
                            <span class="opacity-7 mr-1">
                                <i class="fa fa-plus-circle"></i>
                            </span>
                            Nova
                        </button>
                    </div>

                </div>
                <div class="divider"></div>

                    <div id="acordion-nova-exp">
                        <div class="card nova-exp">
                            <div data-parent="#acordion-nova-exp" id="nova-exp" aria-labelledby="headingOne" class="collapse hide" style="">
                                <div class="card-body">
                                    <form class="" method="post" action="{{ route('dashboard.perfil.exp-educa.adicionar') }}">

                                        @csrf
                                        <?php $ocupacao = "Cargo"; $categoria = 'exper_prof'; ?>
                                        @include('freelancer.layouts.includes.formulario_adicionar_eduexp')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    @foreach($exper_profs as $exper_prof)

                        <div id="accordionExp{{ $exper_prof->id }}">
                            <div class="card mb-1">
                                <div id="headingExp{{ $exper_prof->id }}" class="card-header">
                                    <div class="pane-left flex2">
                                        <button type="button" data-toggle="collapse"
                                                data-target="#collapseExp{{ $exper_prof->id }}" aria-expanded="false"
                                                aria-controls="collapseExp{{ $exper_prof->id }}Controls"
                                                class="text-left m-0 p-0 btn-pill btn btn-gradient-link collapsed">
                                            <h6 class="m-0 p-0">{{ $exper_prof->instituicao}}</h6>
                                            <span>{{ $exper_prof->data_inicio }} - {{ $exper_prof->data_terminio }}</span>
                                        </button>
                                    </div>
                                    <div class="pane-right">
                                        <button class="mb-2 mr-2 btn-icon btn-icon-only border-0 btn-transition btn btn-outline-danger"
                                                data-toggle="modal" data-target="#modalApagarExp{{ $exper_prof->id }}">
                                            <i class="lnr-trash btn-icon-wrapper"> </i>
                                        </button>
                                    </div>
                                </div>
                                <div data-parent="#accordionExp{{ $exper_prof->id }}" id="collapseExp{{ $exper_prof->id }}"
                                     aria-labelledby="headingExp{{ $exper_prof->id }}" class="collapse" style="">
                                    <div class="card-body">
                                        <form class="" method="POST"
                                              action="{{ route('dashboard.perfil.exp-educa.actualizar', ['expereduca' => $exper_prof->id]) }}">
                                            @method('patch')
                                            @csrf
                                            <?php $tipo = $exper_prof; $ocupacao = "Ocupacao"; $categoria = 'exper_prof';?>
                                            @include('freelancer.layouts.includes.formulario_actualizar_expeduca')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                <br>
            </div>
                    <div class="divider"></div>
                <div>
                <div class="app-inner-layout__top-pane" style="padding: 0 0">
                    <div class="pane-left" style="padding: 0 0">
                        <h4 style="font-size: 1.5rem;">Educação</h4>
                    </div>
                    <div class="pane-right">
                        <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-primary" data-toggle="collapse" data-target="#nova-educa">
                            <span class="opacity-7 mr-1">
                                <i class="fa fa-plus-circle"></i>
                            </span>
                            Nova
                        </button>
                    </div>
                </div>
                <div class="divider"></div>

                <div id="tab-nova-educa">
                    <div id="acordion-nova-educa">
                        <div class="card nova-educa">
                            <div data-parent="#acordion-nova-educa" id="nova-educa" aria-labelledby="headingOne" class="collapse hide" style="">
                                <div class="card-body">
                                    <form class="" method="POST" action="{{ route('dashboard.perfil.exp-educa.adicionar') }}">
                                        @csrf
                                        <?php $ocupacao = "Curso"; $categoria = 'educacao';?>
                                        @include('freelancer.layouts.includes.formulario_adicionar_eduexp')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    @foreach($educas as $educa)

                        <div id="accordionEduca{{ $educa->id }}">
                            <div class="card mb-1">
                                <div id="headingEduca{{ $educa->id }}" class="card-header">
                                    <div class="pane-left">
                                        <button type="button" data-toggle="collapse"
                                                data-target="#collapseEduca{{ $educa->id }}" aria-expanded="false"
                                                aria-controls="collapseEduca{{ $educa->id }}Controls"
                                                class="text-left m-0 p-0 btn-pill btn btn-gradient-link collapsed">
                                            <h6 class="m-0 p-0">{{ $educa->instituicao}}</h6>
                                            <span>{{ $educa->data_inicio }} - {{ $educa->data_terminio }}</span>
                                        </button>
                                    </div>
                                    <div class="pane-right">
                                        <button class="mb-2 mr-2 btn-icon btn-icon-only border-0 btn-transition btn btn-outline-danger"
                                                data-toggle="modal" data-target="#modalApagarEduca{{ $educa->id }}">
                                            <i class="lnr-trash btn-icon-wrapper"> </i>
                                        </button>
                                    </div>
                                </div>
                                <div data-parent="#accordionEduca{{ $educa->id }}" id="collapseEduca{{ $educa->id }}"
                                     aria-labelledby="headingEduca{{ $educa->id }}" class="collapse" style="">
                                    <div class="card-body">
                                        <form class="" method="POST"
                                              action="{{ route('dashboard.perfil.exp-educa.actualizar', ['expereduca' => $educa->id]) }}">
                                            @method('patch')
                                            @csrf
                                            <?php $tipo = $educa; $ocupacao = "Cargo"; $categoria = 'educacao';?>
                                            @include('freelancer.layouts.includes.formulario_actualizar_expeduca')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="tab-habilidades">
                <h4>Habilidades</h4>
                <div class="divider"></div>
                <form class="" action="{{ route('dashboard.perfil.habilidade.sincronizar') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-9">
                            <div class="position-relative form-group">
                                <label for="habilidade_id" class="">Habilidade</label>
                                <select id="habilidade_id"  name="habilidade_id" value="{{ old('habilidade_id') }}" required autocomplete="off" class="form-control @error('habilidade_id') is-invalid @enderror">
                                    <option value="" selected disabled hidden>Selecione uma habilidade</option>
                                    @foreach($habilidades as $habilidade)
                                        <option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
                                    @endforeach
                                </select>
                                @error('habilidade_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label for="classificacao" class="">Dominio</label>
                                <input type="number" name="classificacao" id="classificacao" class="form-control @error('classificacao') is-invalid @enderror" value="{{ old('classificacao') }}" placeholder="0 - 100" required autocomplete="off">
                                @error('classificacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="text-left">
                            <button class="mb-3 mr-2 btn btn-primary">Adicionar Habilidade</button>
                        </div>
                </form>
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

                @if(session('success-remove-habilidade') || session('success-add-habilidades'))
                    <div class="alert alert-success">
                        {{ session('success-remove-habilidade') ?? session('success-add-habilidades')}}
                    </div>
                @endif

                    <div class="card-body">
                        <h5>Minhas Habilidades</h5>
                        <ul class="list-group list-group-flush">
                            @foreach(Auth::user()->habilidades as $habilidade)
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                {{ $habilidade->nome }}
                                            </div>
                                            <div class="widget-subheading">
                                                Nivel: {{ $habilidade->pivot->classificacao }}
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <button class="btn-icon btn-icon-only border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarHabilidade{{ $habilidade->id }}">
                                                <i class="lnr-trash btn-icon-wrapper"> </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('meu_script')
    <script src="{{ asset('js/ckeditor5/11.2.0/classic/ckeditor.js') }}"></script>
    <script>
        var editor = null;
        ClassicEditor.create(document.querySelector("#descricao"), {
            toolbar: [
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "blockQuote",
                "undo",
                "redo"
            ]
        })
            .then(editor => {
                //debugger;
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection

@section('meus_modals')
    @foreach($educas as $educa)
        <div class="modal fade" id="modalApagarEduca{{ $educa->id }}" tabindex="-1" role="dialog" aria-labelledby="modalApagarEduca{{ $educa->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalApagarEduca{{ $educa->id }}Label">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">
                            Tem certeza que deseja remover o <b>{{ $educa->nome }}</b> feito na <b>{{ $educa->instituicao }}</b> do perfil?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <form action="{{ route('dashboard.perfil.exp-educa.apagar', ['expereduca' => $educa->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger odom-submit">SIM, TENHO CERTEZA</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($exper_profs as $exper_prof)
        <div class="modal fade" id="modalApagarExp{{ $exper_prof->id }}" tabindex="-1" role="dialog" aria-labelledby="modalApagarExp{{ $exper_prof->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalApagarExp{{ $exper_prof->id }}Label">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">
                            Tem certeza que deseja remover a experiência profissional de <b>{{ $exper_prof->nome }}</b> feito na <b>{{ $exper_prof->instituicao }}</b> do perfil?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <form action="{{ route('dashboard.perfil.exp-educa.apagar', ['expereduca' => $exper_prof->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger odom-submit">SIM, TENHO CERTEZA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach(Auth::user()->habilidades as $habilidade)
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
                            Tem certeza que deseja remover a habilidade <b>{{ $habilidade->nome}}</b> do perfil?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <form action="{{ route('dashboard.perfil.habilidade.apagar', ['habilidade' => $habilidade->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger odom-submit">SIM, TENHO CERTEZA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection