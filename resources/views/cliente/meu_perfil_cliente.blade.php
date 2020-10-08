@extends('cliente.layouts.app')
@section('title', 'Meu Perfil' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Actualizar Perfil</h5>
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

                <form class="" method="POST" action="{{ route('perfil.edit') }}">
                    @method('patch')
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name" class="">Nome Completo</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="d_nascimento" class="">Data de Nascimeto</label>
                                <input id="d_nascimento" type="date" class="form-control @error('d_nascimento') is-invalid @enderror" name="d_nascimento" value="{{ Auth::user()->d_nascimento}}" required autocomplete="none">
                                @error('d_nascimento')
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
                                    {{ $var = $perfil->provincia  }}
                                    @include('layouts.includes.select_provincias_edit')
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="cidade" class="">Cidade</label>
                                <input name="cidade" id="cidade" placeholder="Cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" value="{{ $perfil->cidade }}">
                            </div>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="descricao" class="">Detalhes</label>
                        <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror">{{ $perfil->descricao }}</textarea>
                        @error('descricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Salvar Alterações</button>

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
