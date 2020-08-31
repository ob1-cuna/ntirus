@extends('cliente.layouts.app')
@section('title', 'Propostas' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="col-lg-10 col-md-12 col-xl-10 col-sm-12"  style="padding: 0;">
        <h5 style="font-weight: 500; font-size: 1.25rem;">Propostas</h5>
        <div class="main-card mb-3 card">
            <div class="card-header">Recebeu {{ count($trabalho->propostas) }} Propostas.</div>
            <ul class="list-group list-group-flush">
                @foreach($propostas as $proposta)
                <li class="list-group-item">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left mr-3">
                                <img width="42" class="avatar-icon usuario-avatar-xs"
                                     src="{{ asset('images/profile/user.jpg') }}" height="42" alt=""
                                     style="object-fit: cover;">
                            </div>
                            <div class="widget-content-left flex2">
                                <div class="widget-heading">{{ $proposta->user->name }}</div>
                                <div class="widget-subheading opacity-10">


                                    <span class="pr-2">Preço: <b class="text-success">{{ number_format($proposta->preco_proposta, 2 ) }} MTs</b></span><br>
                                    <span class="pr-2">Entrega: <b>{{ Carbon::parse($proposta->tempo_exec)->format('d M') }}</b></span>
                                </div>
                            </div>
                            <div class="widget-content-right text-right">
                                <button class="btn-icon btn-icon-only btn btn-link btn-sm" type="button" data-toggle="collapse" href="#propostaDetalhes{{$proposta->id}}Open">
                                    Detalhes
                                    @if(count($proposta->imagems) == 0)
                                        @else
                                        <i class="pe-7s-paperclip btn-icon-wrapper font-size-xlg"> </i>
                                        <span class="badge badge-pill badge-info">{{ count($proposta->imagems) }}</span>
                                    @endif

                                </button>
                                <br>
                                @if ($nrPropostas > 0)

                                    @if ($proposta->status == 'Aceite')
                                        <button class="btn btn-success btn-sm disabled mb-2 mr-2">APROVADA </button>
                                    @else
                                        <button class="btn btn-danger btn-sm disabled mb-2 mr-2">REJEITADA</button>
                                    @endif

                                @else
                                    <form method="post" action="{{ route('cliente.propostas.aceitar', ['proposta' => $proposta->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-smmb-2 mr-2">
                                            Aprovar
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>
                        <div id="detalhesProposta{{$proposta->id}}" data-children=".item">
                            <div class="item">
                                <div data-parent="#detalhesProposta{{$proposta->id}}" id="propostaDetalhes{{$proposta->id}}Open" class="collapse hide">
                                    <hr>
                                    <h6 class="mb-3"><b style="font-weight: 500">Carta de Apresentacao</b></h6>
                                    <hr>
                                    <?php echo $proposta->carta;?>
                                    <div class="mb-4"></div>
                                    @if(count($proposta->imagems) == 0)
                                    @else
                                        <h6><b style="font-weight: 500">Anexos</b></h6>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th style="width: 70%">Nome</th>
                                                    <th style="width: 25%">Tamanho</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @foreach($proposta->imagems as $imagem)
                                                        <th scope="row">1</th>
                                                        <td>{{ $imagem->nome_imagem }}</td>
                                                        <td>{{ tamanhoParaHumanos(filesize(public_path($imagem->caminho))) }} <a href="{{ $imagem->caminho }}"><i class="lnr-download btn-icon-wrapper"></i></a>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection