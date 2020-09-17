@extends('cliente.layouts.app')
@section('title', 'Publicar Ntiru' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Actualizar Trabalho</h5>
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
                    <form enctype="multipart/form-data" class="" action="{{ route('cliente.postar_job.edit', ['trabalho' => $trabalho->id]) }}" method="post">
                        @csrf

                        <div class="position-relative form-group">
                            <label for="nome_trabalho" class="">Titulo</label>
                            <input type="text" name="nome_trabalho" id="nome_trabalho" class="form-control @error('nome_trabalho') is-invalid @enderror" value="{{$trabalho->nome_trabalho}}" placeholder="Digite um titulo simples..." autocomplete="off">
                            @error('nome_trabalho')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="tipo" class="">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" autocomplete="off">
                                        <option value="1" @if ($trabalho->tipo == 'Presencial') selected @else @endif>Presencial</option>
                                        <option value="2" @if ($trabalho->tipo == 'Remoto') selected @else @endif>Remoto</option>
                                    </select>
                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="nivel" class="">Nivel</label>
                                    <select name="nivel" id="nivel" class="form-control @error('nivel') is-invalid @enderror" autocomplete="off" required>
                                        <option disabled selected hidden value="{{ $trabalho->nivel }}">{{ $trabalho->nivel }}</option>
                                        <option value="1" @if ($trabalho->nivel == 'Iniciante') selected @else @endif>Iniciante</option>
                                        <option value="2" @if ($trabalho->nivel == 'Intermedio') selected @else @endif>Intermedio</option>
                                        <option value="3" @if ($trabalho->nivel == 'Avancado') selected @else @endif>Avancado</option>
                                    </select>
                                    @error('nivel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="provincia" class="">Provincia</label>
                                    <select name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" autocomplete="off" required>
                                        <option disabled selected hidden value="{{ $trabalho->provincia }}">{{ $trabalho->provincia }}</option>
                                        {{ $var = $trabalho->provincia }}
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
                                    <label for="distrito" class="">Cidade</label>
                                    <input name="distrito" id="distrito" placeholder="Cidade" value="{{ $trabalho->distrito }}" type="text" class="form-control @error('distrito') is-invalid @enderror" autocomplete="off" required>
                                    @error('distrito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="select-habilidades" class="">Habilidades</label>
                                    <select multiple="multiple" id="select-habilidades" name="habilidade_id[]"  class="multiselect-dropdown form-control @error('select-habilidades') is-invalid @enderror" required>
                                        @foreach($habilidades as $habilidade)
                                            @foreach($trabalho->habilidades as $t_habilidades)
                                                @if($t_habilidades->id == $habilidade->id)
                                                    <option value="{{ $habilidade->id }}" selected>{{ $habilidade->nome }}</option>
                                                    @else
                                                    <option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('select-habilidades')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="data_prev" class="">Data de Entrega</label>
                                    <input type="datetime-local" name="data_prev" id="data_prev" value="{{ Carbon::parse($trabalho->data_prev)->format('Y-m-d\TH:i')}}" class="form-control @error('data_prev') is-invalid @enderror" required>
                                    @error('data_prev')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="descricao" class="">Detalhes</label>
                            <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" required>{{$trabalho->descricao}}</textarea>
                            @error('descricao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="file" class="">File</label>
                            <input type="file" name="file" id="file" class="form-control-file @error('file') is-invalid @enderror" multiple>
                            <small class="form-text text-muted">Podes adicionar ficheiros.</small>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Actualizar</button>
                    </form>
                </div>
            </div>
q        </div>
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