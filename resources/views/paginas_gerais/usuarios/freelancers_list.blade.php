@extends('layouts.app_paginas_gerais')
@section('title', 'Freelancers')
@section('content')
    <div class="clearfix"></div>
    <div class="conteudo">
        <div class="mb-4">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-3 float-left">
                <div class="main-card card">
                    <div class="card-header float-left"><h6>Habilidades</h6></div>
                    <div class="card-body">
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container ps--active-y ps">
                                <div class="position-relative form-group">
                                    <div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox"></label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox2"></label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox"></label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox2"></label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox"></label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox2"></label>
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
                <div class="main-card card">
                    <div class="card-header float-left"><h6>Provincia</h6></div>
                    <div class="card-body">
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container ps--active-y ps">
                                <div class="position-relative form-group">
                                    <div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Maputo" class="custom-control-input">
                                            <label class="custom-control-label" for="Maputo">Maputo</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Gaza" class="custom-control-input">
                                            <label class="custom-control-label" for="Gaza">Gaza</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Inhambane" class="custom-control-input">
                                            <label class="custom-control-label" for="Inhambane">Inhambane</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Sofala" class="custom-control-input">
                                            <label class="custom-control-label" for="Sofala">Sofala</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Manica" class="custom-control-input">
                                            <label class="custom-control-label" for="Manica">Manica</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Tete" class="custom-control-input">
                                            <label class="custom-control-label" for="Tete">Tete</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Zambezia" class="custom-control-input">
                                            <label class="custom-control-label" for="Zambezia">Zambezia</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Nampula" class="custom-control-input">
                                            <label class="custom-control-label" for="Nampula">Nampula</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Cabo Delgado" class="custom-control-input">
                                            <label class="custom-control-label" for="Cabo Delgado">Cabo Delgado</label>
                                        </div>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="Niassa" class="custom-control-input">
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
                <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">
                    Aplicar Filtros
                </button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-7 col-xl-9 float-left">
                <form class="form-inline mb-4">
                    <div class="position-relative form-group">
                        <input name="pesquisa1" id="pesquisa1" placeholder="" type="text" class="mr-2 form-control">
                    </div>
                    <button class="btn-icon btn-icon-only btn btn-primary">
                        <i class="ion-ios-search btn-icon-wrapper"> </i></button>
                </form>

                @foreach ($users as $user)
                <div class="mb-4">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-auto px-3 py-4">
                            <img src="{{ asset('images/profile/user.jpg') }}" class="img-thumbnail usuario-avatar" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block py-4">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4"><a href="{{ route ('freelancers.show', ['user' => $user->username ?? $user->id]) }}"><h5>{{ $user->name }}</h5></a></dt>
                                    <dd class="col-sm-6">
                                        <ul class="list-inline">
                                            <li class="list-inline-item py-1">
                                                <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 13px" class="mr-2">
                                                </object>{{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                                <p>{{ Illuminate\Support\Str::limit(strip_tags($user->->perfildescricao), 260) }}</p>
                                <ul class="list-inline">
                                    @foreach($user->habilidades as $habilidade)
                                        <li class="list-inline-item">
                                            <a href="{{ route('freelancers', ['slug' => $habilidade->slug]) }}" class="btn btn-primary">{{ $habilidade->nome }}</a>
                                        </li>
                                    @endforeach
                                    <li class="list-inline-item"><a href="#" class="btn btn-primary disabled">+2</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto py-3" style="padding-right: 10px">
                            <div class="text-center">
                                <h2>29</h2>
                                <p>Trabalhos Feitos</p>
                            </div>
                            <div class="text-center">
                                <p style="display: none">{{ $minha_nota = ($user->review_trabs->avg('nota')) }}</p>
                                <p style="display: none">{{ $minha_nota2 = round($minha_nota * 2) /2 }}</p>
                                <h2>{{ $minha_nota3 = round($minha_nota2, 2) }}<small style="font-size: small">/5.0</small></h2>
                                @switch(round($minha_nota))
                                    @case (1)
                                    <i class="fa fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @break
                                    @case (2)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @break
                                    @case (3)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @break
                                    @case (4)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @break
                                    @case (5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    @break
                                    @default
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                @endswitch
                                <p>({{ count ($user->review_trabs) }} Avaliações)</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach

                    <nav class="pagination-rounded" aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a href="" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">«</span><span class="sr-only">Previous</span></a>
                            </li>
                            <li class="page-item active"><a href="" class="page-link">1</a></li>
                            <li class="page-item"><a href="" class="page-link">2</a></li>
                            <li class="page-item"><a href="" class="page-link">3</a></li>
                            <li class="page-item"><a href="" class="page-link">4</a></li>
                            <li class="page-item"><a href="" class="page-link">5</a></li>
                            <li class="page-item"><a href="" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">»</span><span class="sr-only">Next</span></a>
                            </li>
                        </ul>
                    </nav>
            </div>
        </div>
    </div>

@endsection
