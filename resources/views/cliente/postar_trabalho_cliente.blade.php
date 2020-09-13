@extends('cliente.layouts.app')
@section('title', 'Publicar Ntiru' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Publicar Trabalho</h5>
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
                                    <label for="tipo_trabalho" class="">Tipo</label>
                                    <select name="tipo_trabalho" id="tipo_trabalho" class="form-control @error('tipo_trabalho') is-invalid @enderror">
                                        <option value="1">Presencial</option>
                                        <option value="2">Remoto</option>
                                    </select>
                                    @error('tipo_trabalho')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="nivel_trabalho" class="">Nivel</label>
                                    <select name="nivel_trabalho" id="nivel_trabalho" class="form-control @error('nivel_trabalho') is-invalid @enderror">
                                        <option value="1">Iniciante</option>
                                        <option value="2">Intermedio</option>
                                        <option value="3">Avancado</option>
                                    </select>
                                    @error('nivel_trabalho')
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
                                    <select name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror">
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
                                    <label for="cidade" class="">Cidade</label>
                                    <input name="cidade" id="cidade" placeholder="Cidade" type="text" class="form-control @error('cidade') is-invalid @enderror">
                                    @error('cidade')
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
                            <label for="file" class="">File</label>
                            <input type="file" name="file" id="file" class="form-control-file @error('file') is-invalid @enderror">
                            <small class="form-text text-muted">Podes adicionar ficheiros.</small>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Publicar Trabalho</button>
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