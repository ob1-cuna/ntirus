@extends('cliente.layouts.app')
@section('title', 'Publicar Ntiru' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Publicar Trabalho</h5>
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

                    <form enctype="multipart/form-data" class="" action="{{ route('cliente.postar_job.store') }}" method="post">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="nome_trabalho" class="">Titulo</label>
                            <input type="text" name="nome_trabalho" id="nome_trabalho" class="form-control @error('nome_trabalho') is-invalid @enderror" placeholder="Digite um titulo simples..." autocomplete="off">
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
                                    <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                                        <option value="1">Presencial</option>
                                        <option value="2">Remoto</option>
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
                                    <select name="nivel" id="nivel" class="form-control @error('nivel') is-invalid @enderror" required>
                                        <option value="1">Iniciante</option>
                                        <option value="2">Intermedio</option>
                                        <option value="3">Avancado</option>
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
                                    <select name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" required>
                                        @include('layouts.includes.select_provincias')
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
                                    <input name="distrito" id="distrito" placeholder="Cidade" type="text" class="form-control @error('distrito') is-invalid @enderror" required>
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
                                            <option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
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
                                    <input type="datetime-local" name="data_prev" id="data_prev" class="form-control @error('data_prev') is-invalid @enderror">
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
                            <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror"></textarea>
                            @error('descricao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="position-relative form-group">
                            <label for="files" class="">Arquivos</label>
                            <input type="file" name="files" id="files" class="form-control-file @error('files') is-invalid @enderror">
                            <small class="form-text text-muted">Podes adicionar ficheiros.</small>
                            @error('files')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Publicar Trabalho</button>
                    </form>
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