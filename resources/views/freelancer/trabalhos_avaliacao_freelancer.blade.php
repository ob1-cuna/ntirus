@extends('freelancer.layouts.app')
@section('title', 'Avaliacao do Cliente' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Avaliação</h5>
                    <form action="{{ route('dashboard.trabalhos.finalizados.avaliacao.store', ['trabalho' => $trabalho->id]) }}" method="POST">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="descricao" class="">Depoimento</label>
                            <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror"></textarea>
                            @error('descricao')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <label for="css-stars" style="display: none"></label>
                        <select id="css-stars" name="nota">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input type="number" value="{{ $trabalho->id }}" name="id_trabalho" id="id_trabalho" style="display: none;">
                        <input type="number" value="{{ $trabalho->user_id }}" name="id_cliente" id="id_cliente" style="display: none;">
                        <input type="submit">
                    </form>
                </div>
                {{ count($avaliacoes) }}
                @foreach($avaliacoes as $avaliacao)
                    Minha Nota:
                    <div class="br-theme-css-stars">
                        <div class="br-widget">
                            @include('layouts.includes.estrelas')
                        </div>
                    </div>
                    <br>
                    Comentario: <?php echo $avaliacao->comentario; ?>

                @endforeach
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

