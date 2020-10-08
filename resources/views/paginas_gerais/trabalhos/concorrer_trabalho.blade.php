@extends('layouts.app_paginas_gerais')
@section('title', "Enviar Propostar para $trabalho->nome_trabalho")
@section('meu_css')
    <style>
        .ck-editor__editable {
            min-height: 100px;
        }
    </style>
@endsection
@section('content')
    <div class="container col-lg-10 col-xl-8 col-md-12 col-sm-12 justify-content-center">
        <div class="divisor"></div>
        <div class="mb-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="main-card card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div><h4 class="bold-medio">{{ $trabalho->nome_trabalho }}</h4></div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                        <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 13px"></object>
                                        <b class="bold-medio ml-2"> {{ $trabalho->distrito }}, {{ $trabalho->provincia }}</b>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                        <i class="fa fa-folder fa-lg mr-2"></i> Tipo: <b class="bold-medio">{{ $trabalho->tipo }}</b>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                        <i class="fa fa-toolbox fa-lg mr-2"></i> Nivel: <b class="bold-medio">{{ $trabalho->nivel }}</b>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                        <i class="fa fa-calendar-alt fa-lg mr-2"></i> Prazo: <b class="bold-medio">{{ Carbon::parse($trabalho->data_prev)->format('d M Y') }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h5>Detalhes da Proposta</h5>
                <div class="main-card card">
                    <div class="card-body">
                        <form action="{{ route('trabalho.concorrer.store', ['trabalho' => $trabalho->slug]) }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-4">
                                    <div class="position-relative form-group">
                                        <label for="preco_proposta" class="">Preco</label>
                                        <input type="hidden" name="trabalho_id" class="form-control" placeholder="" value="{{ $trabalho->id }}">
                                        <input type="number" name="preco_proposta" id="preco_proposta" value="{{ old('preco_proposta') }}" placeholder="Digite o preco da sua proposta" class="form-control" onkeyup="calculateTotal()">
                                    </div>
                                    <small class="form-text font-size-md">
                                        <table class="col-12">
                                            <tbody class="justify-content-center col-12">
                                            <tr class="limite-abaixo">
                                                <td><i class="fa fa-money mr-2"></i> <b>-</b> <b id="taxa_ntiru">00.00 MTn</b></td>
                                                <td class=""></td>
                                                <td class="text-right">Comissão da Ntirus.</td>
                                            </tr>
                                            <tr class="limite-abaixo">
                                                <td><i class="fa fa-money mr-2"></i><b id="valor_freelancer">00.00 MTn</b></td>
                                                <td class=""></td>
                                                <td class="text-right">Pagamento após comissão.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="tempo_exec" class="">Data de Entrega</label>
                                        <input name="tempo_exec" id="tempo_exec" placeholder="dd/mm/aaaa" type="datetime-local" value="{{ old('tempo_exec') }}" class="form-control @error('tempo_exec') is-invalid @enderror"></div>
                                    @error('tempo_exec')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="descricao" class="">Detalhes</label>
                                <textarea name="descricao" id="descricao" class="form-control ck-editor__editable @error('descricao') is-invalid @enderror">{{ old('descricao') }}</textarea>
                                @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="position-relative form-group">
                                <label for="file" class="">Anexos</label>
                                <input type="file" name="file" id="file" value="{{ old('file') }}" class="form-control-file @error('file') is-invalid @enderror">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">
                                    Podes anexar um ficheiro.
                                </small>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <button class="mt-2 btn btn-primary btn-block btn-lg" type="submit">Enviar
                                        Proposta
                                    </button>
                                </div>
                            </div>

                        </form>
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
    <script>

        function calculateTotal() {

            taxa_ntiru = 0.1 * document.getElementById("preco_proposta").value;
            valor_freelancer = document.getElementById("preco_proposta").value * 0.9;

            var formatter = new Intl.NumberFormat('pt-MZ', {
                style: 'currency',
                currency: 'MZN',
            });

            tako_f = formatter.format(valor_freelancer);
            tako_n = formatter.format(taxa_ntiru);

            document.getElementById('taxa_ntiru').innerHTML = tako_n;
            document.getElementById('valor_freelancer').innerHTML = tako_f;
        }

    </script>
@endsection
