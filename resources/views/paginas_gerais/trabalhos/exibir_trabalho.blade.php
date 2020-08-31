@extends('layouts.app_paginas_gerais')
@section('title', "$trabalho->nome_trabalho")
@section('meu_css')
    <style>

    </style>
@endsection
@section('content')
    <div class="divisor"></div>
    <div class="mb-4">
        <div class="conteudo">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">
                <div class="main-card card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-xs-8 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <div><h4 class="bold-medio">{{ $trabalho->nome_trabalho }}</h4></div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 13px">
                                    </object><b class="bold-medio ml-2"> {{ $trabalho->distrito }}, {{ $trabalho->provincia }}</b>
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
                        <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 col-xl-4 float-right">
                            <div class="btnarea">
                                <a href="{{ route ('trabalho.concorrer', ['trabalho' => $trabalho->slug ]) }}" class="btn btn-success btn-block btn-wide btn-lg">Enviar Proposta</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left mb-4">
                <div class="mb-4">
                    <h5>Detalhes</h5>
                <div class="main-card card px-2 py-2">
                    <div class="col-12 mb-3">
                        <h6 class="mt-4 bold-medio">Descrição do Trabalho</h6>
                        <div style="padding-left: 20px">
                            <?php echo $trabalho->descricao;?>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <h6 class="bold-medio mb-2">Habilidades</h6>
                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="btn-group">
                                <div class="row" style="padding-left: 20px">
                                    @foreach($trabalho->habilidades as $habilidade)
                                    <a href="#" class="btn btn-pill btn-transition btn btn-outline-primary btn-shadow-primary mb-2 mr-2">{{ $habilidade->nome }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="mb-4">
                    <h5>Anexos</h5>
                    <div class="main-card card px-3 py-3">
                        <div class="table-responsive">
                            <table class="mb-0 table table-borderless">
                                <tbody class="">
                                @foreach($imagems as $imagem)
                                <tr class="@if($loop->last) @else limite-abaixo @endif">
                                    <td><i class="fa @include('layouts.includes.icones_ficheiros') mr-2"></i> {{ $imagem->nome_imagem }}</td>
                                    <td class=""></td>
                                    <td class="text-right">{{ tamanhoParaHumanos(filesize(public_path($imagem->caminho))) }} <a href={{ nomeFicheiro ($imagem->caminho) }}><i class="fa fa-download ml-2"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left mb-4">
                <div class="mb-4">
                    <h5>Propostas</h5>
                    <div class="main-card card py-2 px-2">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left mr-3 ml-2 mt-2">
                                    <h1>{{ $numeroDePropostas }}</h1>
                                </div>
                                <div class="widget-content-left">
                                    @if ($numeroDePropostas==0)
                                        <div class="widget-heading">Sem Propostas
                                        </div>
                                    @else
                                    <div class="widget-heading">
                                        @if($numeroDePropostas >= 2)
                                            Propostas recebidas
                                        @else
                                            Proposta recebida
                                        @endif
                                    </div>
                                    <div class="widget-subheading">Ultima: {{ Carbon::parse($ultimaProposta->created_at)->diffForHumans() }}
                                    </div>
                                    @endif
                                </div>
                                <div class="widget-content-right mr-3">
                                    <i class="fa fa-3x fa-paper-plane mt-2 mb-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h5>Cliente</h5>
                    <div class="main-card card py-2 px-2">
                        <div class="text-center">
                            <div class="col mb-2"><img src="{{ asset ($trabalho->user->perfil->foto_perfil) }}" class="rounded-circle usuario-avatar mb-2" alt="" style="max-width: 120px; max-height: 120px"></div>
                            <div class="col mb-2">{{ $trabalho->user->name }}</div>
                            <div class="col mb-3">
                                <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <a href="{{ route ('cliente.show', ['user' => $trabalho->user->id]) }}" class="btn btn-wide btn-primary btn-block">Ver Perfil</a>
                                </div>
                                <div class="col-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                        <h5>Denunciar Trabalho</h5>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form class="">
                                    <div class="position-relative form-group"><label for="exampleSelectMulti" class="">
                                            Motivo
                                        </label><select name="selectMulti" id="exampleSelectMulti" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select></div>
                                    <div class="position-relative form-group"><label for="exampleText" class="">Text
                                            Area</label><textarea name="text" id="exampleText" class="form-control"></textarea>
                                    </div>
                                    <div class="position-relative form-group"><label for="exampleFile" class="">File</label><input name="file" id="exampleFile" type="file" class="form-control-file">
                                        <small class="form-text text-muted">Podes anexar um ficheiro com possiveis provas de violacao dos termos de uso.
                                        </small>
                                    </div>
                                    <button class="mt-1 btn btn-primary">Submit</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection