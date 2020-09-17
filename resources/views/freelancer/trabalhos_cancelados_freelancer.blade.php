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
                            @case('Cancelado-C')
                            <a href="#" class="badge badge-light" style="font-weight: 500; color: rgba(73,25,15,0.55);" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="O cliente cancelou este trabalho">
                                Cancelado C
                            </a>
                                @break
                            @case('Cancelado-F')
                            <a href="#" class="badge badge-info" style="font-weight: 500;" data-toggle="tooltip-light" data-placement="right" title="" data-original-title="Cancelaste este trabalho">
                                Cancelado F
                            </a>
                                @break
                            @default
                            <a href="#" class="badge badge-warning" style="font-weight: 500;">
                                M * I * S * T * A * K * E
                            </a>
                        @endswitch
                    </h6>

                        <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <span><i class="fa fa-user mb-4"></i><b style="font-weight: 500">  {{ $trabalho->user->name }}</b></span>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <span><i class="fa fa-money-bill mb-4 text-success"></i> <b style="font-weight: 500" >  {{ number_format($trabalho->preco_final, 2 ) }} MTs</b></span>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                            <b style="font-weight: 500">{{ $trabalho->distrito }}, {{ $trabalho->provincia }}</b>
                        </div>
                        </div>
                    </div>
                    @switch($trabalho->status)
                        @case('Cancelado-C')
                            <div class="d-block text-right card-footer">
                                <button class="btn btn-outline-secondary">Reclamar</button>
                            </div>
                            @break

                            @case('Cancelado-F')
                            @break

                            @default
                        <div class="d-block text-right card-footer">
                            <button class="btn btn-danger">M * I * S * T * A * K * E</button>
                        </div>
                    @endswitch
                </div>
                </div>
            @endforeach
                <div class="" style="margin-top: 25px">
                    {{ $trabalhos->links() }}
                </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            @include('freelancer.layouts.includes.estatisticas_trabalhos_freelancer')
        </div>
    </div>

@endsection