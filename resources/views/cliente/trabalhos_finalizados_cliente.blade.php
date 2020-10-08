@extends('cliente.layouts.app')
@section('title', 'Trabalhos Finalizados' )
@section('descricao', 'Lista dos seus trabalhos finalizados!' )
@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
            @foreach($trabalhos as $trabalho)
            <div class="main-card card">
                <div class="card-body"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}"><h5 class="card-title">{{ $trabalho->nome_trabalho }}</h5></a>
                    <h6 class="card-subtitle">
                        Freelancer: <a href="/f/{{$trabalho->freelancer['username'] ?? $trabalho->freelancer['id']}}">{{ $trabalho->freelancer['name']}}</a>
                    </h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <p>Entrega: <b>{{ Carbon::parse($trabalho->data_entregue)->format('d/M/Y') }}</b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Preço: <b>{{ number_format($trabalho->preco_final, 2 ) }} MTs</b> </p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Tipo: <b>{{ $trabalho->tipo }}</b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Estado:
                                @switch($trabalho->status)
                                    @case('Finalizado')
                                    <a href="#" class="badge badge-success badge-pill" style="font-weight: 500;" >
                                        Finalizado
                                    </a>
                                    @break
                                    @case('Pagamento Pendente')
                                    <a href="#" class="badge badge-warning badge-pill" style="font-weight: 500;" >
                                        Por Pagar
                                    </a>
                                    @break
                                    @default
                                    <a href="#" class="badge badge-warning" style="font-weight: 500;">
                                        Erro de Digitacao
                                    </a>
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-info">
                        Ver Comentário
                    </a>
                </div>

                    @switch($trabalho->status)
                        @case('Finalizado')
                        @if (count($trabalho->review_trabs->where('avaliador_id', Auth::user()->id)) == 0 )
                        <div class="d-block text-right card-footer">
                            <button class="btn btn-outline-secondary" data-toggle="collapse" href="#tabFreelancer{{$trabalho->id}}">Avaliar Freelancer</button>
                            <div class="collapse text-left" id="tabFreelancer{{$trabalho->id}}">
                            <form action="{{ route('cliente.trabalhos.finalizados.avaliacao.store', ['trabalho' => $trabalho->id]) }}" method="POST">
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
                                <input type="number" value="{{ $trabalho->freelancer_id }}" name="id_freelancer" id="id_freelancer" style="display: none;">
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>
                            </div>
                        </div>
                        @endif
                        @break

                    @case('Pagamento Pendente')

                    <div class="d-block text-right card-footer">
                        <button class="btn btn-outline-secondary" href="#">Efectuar Pagamento</button>
                    </div>

                    @break
                        @default
                        <button class="btn btn-danger">M * I * S * T * A * K * E</button>
                    @endswitch

            </div>
                <br>
            @endforeach
            <div class="" style="margin-top: 25px">
                {{ $trabalhos->links() }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            @include('cliente.layouts.includes.estatisticas_trabalhos')
        </div>
    </div>

@endsection