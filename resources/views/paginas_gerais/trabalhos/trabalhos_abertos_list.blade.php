@extends('layouts.app_paginas_gerais')
@section('title', 'Trabalhos')
@section('meu_css')
    <style>
        .pagination {
            justify-content: center;
        }
        .pagination li a, .pagination li span {
            border-radius: 50px !important;
            margin: 0 .3rem
        }
    </style>
@endsection
@section('content')
    <div class="clearfix"></div>
    <div class="conteudo">
        <div class="mb-4">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-3 float-left mb-4">
                <form method="GET" action="{{ route('trabalhos.filter') }}" class="mb-4">
                    <div class="caixa-de-pesquisa-alt mb-4">
                        <input type="search" name="p-trabalhos" id="p-trabalhos" value="{{request()->input('p-trabalhos')}}" placeholder="Pesquise..." class="form-control" autocomplete="off">
                        <i class="caixa-de-pesquisa-icon-wrapper-alt fa fa-search"></i>
                    </div>

                <div class="main-card card">
                    <div class="card-header float-left"><h6>Habilidades</h6></div>
                    <div class="card-body">
                        <div class="scroll-area-sm" style="max-height: 150px;">
                            <div class="scrollbar-container ps--active-y ps">
                                <div class="position-relative form-group">
                                    <div>

                                            @foreach($todas_habilidades->sortBy('nome') as $habilidade)
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="{{ $habilidade->slug }}" name="cat[]" value="{{ $habilidade->slug }}" class="custom-control-input">
                                                    <label class="custom-control-label" for="{{ $habilidade->slug }}">{{ $habilidade->nome }}</label>
                                                </div>
                                            @endforeach

                                    </div>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                    </div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="main-card card">
                    <div class="card-header float-left"><h6>Provincia</h6></div>
                    <div class="card-body">
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container ps--active-y ps">
                                <div class="position-relative form-group">
                                    <div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Maputo" name="prov[]" value="Maputo" class="custom-control-input">
                                            <label class="custom-control-label" for="Maputo">Maputo</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Gaza" name="prov[]" value="Gaza" class="custom-control-input">
                                            <label class="custom-control-label" for="Gaza">Gaza</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Inhambane" name="prov[]" value="Inhambane" class="custom-control-input">
                                            <label class="custom-control-label" for="Inhambane">Inhambane</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Sofala" name="prov[]" value="Sofala" class="custom-control-input">
                                            <label class="custom-control-label" for="Sofala">Sofala</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Manica" name="prov[]" value="Manica" class="custom-control-input">
                                            <label class="custom-control-label" for="Manica">Manica</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Tete" name="prov[]" value="Tete" class="custom-control-input">
                                            <label class="custom-control-label" for="Tete">Tete</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Zambezia" name="prov[]" value="Zambezia" class="custom-control-input">
                                            <label class="custom-control-label" for="Zambezia">Zambezia</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Nampula" name="prov[]" value="Nampula" class="custom-control-input">
                                            <label class="custom-control-label" for="Nampula">Nampula</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Cabo Delgado" name="prov[]" value="Cabo Delgado" class="custom-control-input">
                                            <label class="custom-control-label" for="Cabo Delgado">Cabo Delgado</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Niassa" name="prov[]" value="Niassa" class="custom-control-input">
                                            <label class="custom-control-label" for="Niassa">Niassa</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                    </div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block">
                    Aplicar Filtros
                </button>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 float-left mb-4">
                @if(request()->input('p-trabalhos') != null)
                    <h5>@if($trabalhos->count() == 1) 1 resultado @elseif( $trabalhos->count() == 0) Sem resultados @else {{ $trabalhos_count }} resultados @endif para "<b class="bold-medio">{{request()->input('p-trabalhos')}}</b>"</h5>
                    <div class="divider"></div>
                @endif
                @forelse ($trabalhos as $trabalho)
                <div class="mb-4">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col px-4 py-2">
                                <div class="card-block py-3">
                                    <ul class="list-inline">
                                        <li class="list-inline-item align-middle">
                                            <img src="{{ asset ($trabalho->user->perfil->foto_perfil) }}" class="avatar-icon usuario-avatar-xs" alt="">
                                        </li>
                                        <li class="list-inline-item" style="font-size: medium">{{ $trabalho->user->name }}</li>
                                    </ul>
                                    <h5 class="bold-medio"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}">{{ $trabalho->nome_trabalho }}</a></h5>
                                    <p>
                                        {{ Illuminate\Support\Str::limit(strip_tags($trabalho->descricao), 300) }}
                                    </p>
                                    <ul class="list-inline">
                                        @foreach($trabalho->habilidades->slice(0,4) as $habilidade)
                                            <li class="list-inline-item">
                                                <a href="{{ route ('trabalhos.list', ['cat' => $habilidade['slug']]) }}" class="btn btn-primary">
                                                    {{ $habilidade->nome }}
                                                </a>
                                            </li>
                                        @endforeach
                                        @if (count($trabalho->habilidades) >= 5)
                                            <li class="list-inline-item"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}" class="btn btn-primary">+{{ count($trabalho->habilidades)-5 }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto" style="padding-top: 60px; padding-right: 20px;">
                                    <div class="list-inline-item py-1">
                                        <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 13px" class="mr-3">
                                        </object><b class="bold-medio">Provincia</b>: {{ $trabalho->provincia }}
                                    </div>
                                    <div>
                                        <i class="fa fa-lg fa-folder mr-2 mb-2"></i>
                                        <b class="bold-medio">Tipo: </b>{{ $trabalho->tipo }}
                                    </div>
                                    <div>
                                        <i class="fa fa-lg fa-clock mr-2 mb-2"></i>
                                        <b class="bold-medio">Nivel: </b>{{ $trabalho->nivel }}
                                    </div>
                                    <div>
                                        <i class="fa fa-lg fa-calendar mr-2 mb-4"></i>
                                        <b class="bold-medio">Entrega: </b>{{ Carbon::parse($trabalho->data_prev)->format('d M') }}
                                    </div>
                                    <div>
                                        <a class="mr-2 btn btn-primary btn-lg btn-block" href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}">
                                            Ver Trabalho
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h5>SEM TRABALHOS DISPONIVEIS</h5>
                @endforelse
                    {{ $trabalhos->links() }}
            </div>
        </div>
    </div>

@endsection
