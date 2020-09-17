@extends('cliente.layouts.app')
@section('title', 'Trabalhos Cancelados' )
@section('descricao', 'Seus trabalhos cancelados.' )

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
            @foreach($trabalhos as $trabalho)
            <div class="main-card card">
                <div class="card-body"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}"><h5 class="card-title">{{ $trabalho->nome_trabalho }}</h5></a>
                    <h6 class="card-subtitle">
                        Freelancer: <a href="/f/{{$trabalho->freelancer['id']}}">{{ $trabalho->freelancer['name']}}</a>
                    </h6>
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <p>Preço: <b>{{ number_format($trabalho->preco_final, 2 ) }} MTs</b> </p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Tipo: <b>{{ $trabalho->tipo }}</b></p>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <p>Estado:
                                @switch($trabalho->status)
                                    @case('Cancelado-C')
                                    <a href="#" class="badge badge-light" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Cancelaste este trabalho">
                                        Cancelado C
                                    </a>
                                    @break

                                    @case('Cancelado-F')
                                    <a href="#" class="badge badge-info" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="O Freelancer cancelou este trabalho">
                                        Cancelado F
                                    </a>
                                    @break

                                    @default
                                    Ups falhaste em algum lugar...
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-warning">
                        Ver Detalhes
                    </a>
                </div>
                    @switch($trabalho->status)
                        @case('Cancelado-F')
                        <div class="d-block text-right card-footer">
                            <button class="btn btn-outline-danger">Avaliar</button>
                            <button class="btn btn-outline-secondary">Pedir reembolso</button>
                        </div>
                        @break

                        @case('Cancelado-C')
                        @break

                        @default
                        <div class="d-block text-right card-footer">
                            <button class="btn btn-danger">M * I * S * T * A * K * E</button>
                        </div>
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