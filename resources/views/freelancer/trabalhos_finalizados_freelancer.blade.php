@extends('freelancer.layouts.app')
@section('title', 'Trabalhos Em Andamento' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">

            @foreach ($trabalhos as $trabalho)
                <div class="mb-4">
                <div class="main-card card">
                    <div class="card-body"><h5 class="card-title"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}" style="color: rgba(73,25,15,0.55);">{{ $trabalho->nome_trabalho }}</a></h5>
                    <h6 class="card-subtitle">
                        @switch($trabalho->status)
                            @case('Finalizado')
                            <a href="#" class="badge badge-success badge-pill" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="">
                                Finalizado
                            </a>
                            @break
                            @case('Pagamento Pendente')
                            <a href="#" class="badge badge-warning badge-pill" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="">
                                Por Pagar
                            </a>
                            @break
                            @default
                            <a href="#" class="badge badge-danger" style="font-weight: 500;">
                                Erro de Digitacao
                            </a>
                        @endswitch
                    </h6>

                        <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <span>Data de Entrega: <b style="font-weight: 500">{{ Carbon::parse($trabalho->data_entrega)->format('d M Y') }}</b></span>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <span>Preço: <b style="font-weight: 500" class="text-success">{{ number_format($trabalho->preco_final, 2 ) }} MTs</b></span>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <p>Avaliação: <b style="font-weight: 500">xxxxx</b></p>
                        </div>
                        </div>
                        <a class="btn btn-warning" data-toggle="collapse" href="#">Ver Detalhes</a>

                    </div>

                        @switch($trabalho->status)

                            @case('Finalizado')
                            @if (count($avaliacoes) == 0 )
                            <div class="d-block text-right card-footer">
                                <button class="btn btn-outline-secondary" data-toggle="collapse" href="#tabCliente{{$trabalho->id}}">Avaliar Cliente</button>
                                <div class="collapse text-left" id="tabCliente{{$trabalho->id}}">
                                    <p></p>
                                    <form action="{{ route('dashboard.trabalhos.finalizados.avaliacao.store', ['trabalho' => $trabalho->id]) }}" method="POST">
                                        @csrf
                                        <div class="position-relative form-group">
                                            <label for="descricao" class="">Comentário</label>
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
                                        <p></p>
                                        <input type="submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                            @endif
                            @break

                        @case('Finalizado')

                            <div class="d-block text-right card-footer">
                                <button class="btn btn-outline-secondary" href="#tabCliente{{$trabalho->id}}">Avaliar Cliente</button>
                            </div>

                        @break

                            @default
                                <button class="btn btn-danger">M * I * S * T * A * K * E</button>

                        @endswitch

                </div>
                </div>
            @endforeach
        </div>


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
            <div class="main-card card">
                <div class="card-body"><h5 class="card-title">NOVA</h5>
                    <h6 class="card-subtitle">
                    </h6>
                    <p></p>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection

@section('meus_modals')

@endsection