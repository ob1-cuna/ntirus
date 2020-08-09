@extends('freelancer.layouts.app')
@section('title', 'Trabalhos Propostos' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">

            @foreach ($propostas as $proposta)
                <div class="mb-4">
                <div class="main-card card">
                    <div class="card-body"><h5 class="card-title"><a href="{{ route ('trabalho.show', ['trabalho' => $proposta->trabalho->slug]) }}" style="color: rgba(73,25,15,0.55);">{{ $proposta->trabalho->nome_trabalho }}</a></h5>
                    <h6 class="card-subtitle">
                        @switch($proposta->status)
                            @case('Pendente')
                            <a href="#" class="badge badge-light" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Nenhuma proposta foi respondida pelo cliente">
                                Pendente
                            </a>
                                @break
                            @case('Aceite')
                            <a href="#" class="badge badge-success" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="A sua proposta foi aceite pelo cliente">
                               Aceite
                            </a>
                                @break
                            @case('Recusado')
                            <a href="#" class="badge badge-danger badge-pill" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="A proposta de um outro freelancer foi aceite pelo cliente">
                                    Recusado
                            </a>
                                @break

                            @default
                            <a href="#" class="badge badge-warning" style="font-weight: 500;">
                                Erro de Digitacao
                            </a>
                        @endswitch
                    </h6>

                        <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <span>Data de Entrega: <b style="font-weight: 500">{{ Carbon::parse($proposta->trabalho->data_prev)->format('d M Y') }}</b></span>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <span>Preço: <b style="font-weight: 500" class="text-success">{{ number_format($proposta->preco_proposta, 2 ) }} MTs</b></span>
                        </div>
                        <div class="col-sm-6 col-xl-4">

                            <p> <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 14px; padding-top: 2px" class="mr-2">
                                </object><b style="font-weight: 500">{{ $proposta->trabalho->distrito }}, {{ $proposta->trabalho->provincia }}</b></p>
                        </div>
                        </div>


                        <a class="btn btn-warning" data-toggle="collapse" href="#tabProposta{{$proposta->id}}">Ver Detalhes</a>
                        <div class="collapse" id="tabProposta{{$proposta->id}}">
                            <div class="mb-4"></div>
                                <h6>Carta</h6>
                                <p><?php echo $proposta->carta;?></p>
                            <div class="mb-4"></div>
                            <h6>Anexos</h6>
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Tamanho</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proposta->trabalho->imagems as $imagem)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{{ $imagem->nome_imagem }}</td>
                                        <td>{{ tamanhoParaHumanos(filesize(public_path($imagem->caminho))) }} <a href="{{ $imagem->caminho }}"><i class="lnr-download btn-icon-wrapper"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                </div>
                    <div class="d-block text-right card-footer">
                        @switch($proposta->status)
                            @case('Pendente')
                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarProposta{{ $proposta->id}}">Remover</button>
                                <button class="btn btn-outline-secondary">Actualizar</button>
                            @break

                            @case('Aceite')
                                <button class="btn btn-outline-secondary">Ver Trabalho</button>
                            @break

                            @case('Recusado')
                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalApagarProposta{{ $proposta->id}}">Remover</button>
                            @break

                            @default
                                <button class="btn btn-danger">M * I * S * T * A * K * E</button>
                        @endswitch
                </div>
                </div>
                </div>
            @endforeach
        </div>


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
            <div class="main-card card">
                <div class="card-body"><h5 class="card-title">NOVA</h5>
                    <h6 class="card-subtitle">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                    </h6>
                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis eni</p>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection

@section('meus_modals')
    @foreach($propostas as $proposta)
        <div class="modal fade" id="modalApagarProposta{{ $proposta->id}}" tabindex="-1" role="dialog" aria-labelledby="modalApagarProposta{{ $proposta->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalApagarProposta{{ $proposta->id}}Label">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">
                            Tem certeza que deseja remover a sua proposta para <b>{{ $proposta->trabalho->nome_trabalho }}</b>?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <form action="{{ route('dashboard.propostas.delete', ['proposta' => $proposta->id]) }}" method="POST">
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