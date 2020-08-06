@extends('layouts.app_paginas_gerais')
@section('title', "" )
@section('content')
    <div class="clearfix"></div>
    <div class="conteudo" style="padding: auto">
        <div class="mb-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left mb-4">
                <div class="main-card card">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-auto px-3 py-3">
                                <div class="align-content-center text-center">
                                    <img src="{{ asset('images/profile/user.jpg') }}" class="img-thumbnail usuario-avatar mb-2" alt="">
                                    <span> <a href="#"><h5 class="text-center">{{ $user->name }}</h5></a></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-block py-4">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <ul class="list-inline">
                                                <li class="list-inline-item py-1">
                                                    <object type="image/svg+xml" data="{{ asset('images/flag/mz-flag.svg') }}" style="width: 18px; height: 13px" class="mr-2">
                                                    </object>{{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div style="padding-right: 20px"><?php echo $user->perfil->descricao;?></div>
                                    <div class="row col">
                                        <div class="list-inline">
                                            <div class="list-inline-item">
                                                <i class="fab fa-lg fa-instagram"></i>
                                            </div>
                                            <div class="list-inline-item">
                                                <i class="fab fa-lg fa-facebook"></i>
                                            </div>
                                            <div class="list-inline-item">
                                                <i class="fab fa-lg fa-twitter"></i>
                                            </div>
                                            <div class="list-inline-item">
                                                <i class="fab fa-lg fa-whatsapp"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto py-3" style="padding-right: 20px; min-width: 250px">
                                <div class="row">
                                    <div class="col text-center limite-direita">
                                        <h2>{{$trabalhos_cancelados}}</h2>
                                        <p>Trabalhos <br>Cancelados</p>
                                    </div>
                                    <div class="col text-center">
                                        <h2>{{$trabalhos_abertos_total}}</h2>
                                        <p>Trabalhos <br>Abertos</p>
                                    </div>
                                </div>
                                <div class="row limite-acima">
                                    <div class="col text-center mt-2">
                                        <h2>{{$trabalhos_pagos}}</h2>
                                        <p>Trabalhos <br>Pagos</p>
                                    </div>
                                    <div class="limite-direita"></div>
                                    <div class="col text-center mt-2">
                                        <h2>{{$trabalhos_publicados}}</h2>
                                        <p>Trabalhos <br>Publicados</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="mb-4">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left mb-4">
                <h5>Trabalhos Abertos</h5>
                <div class="main-card card px-3 mb-2">
                    <div class="card-body">
                        @forelse($trabalhos_abertos as $trabalho)
                            <div class="row no-gutters">
                                <div class="col mr-2">
                                    <div class="card-block py-3">
                                        <h6 class="bold-medio"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}">{{ $trabalho->nome_trabalho }}</a></h6>
                                        <p>
                                            {{ Illuminate\Support\Str::limit(strip_tags($trabalho->descricao), 300) }}
                                        </p>
                                        <ul class="list-inline">
                                            @foreach($trabalho->habilidades->slice(0,4) as $habilidade)
                                                <li class="list-inline-item">
                                                    <a href="" class="btn btn-primary">
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
                                <div class="col-auto" style="padding-top: 30px">
                                    <div class="list-inline-item">
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
                            @if($loop->last)
                                <div class="mb-0"></div>
                            @else
                                <div class="limite-acima mb-3 mt-3"></div>
                            @endif
                        @empty
                            <h5>SEM TRABALHOS DISPONIVEIS</h5>
                        @endforelse
                    </div>
                </div>
                <br>
                <h5>Avaliações</h5>
                <div class="main-card card px-3">
                    <div class="card-body">
                        @foreach($trabalhos as $trabalho)
                            <div class="container">
                                <div class="row mt-2">
                                    <h6 class="bold-medio">{{ $trabalho->nome_trabalho }}</h6>
                                </div>
                                @foreach($trabalho->review_trabs as $review)
                                    @if($review->avaliado_id == $user->id)
                                        <div class="row mb-2">
                                            <div class="mr-3">
                                                @if ($review->avaliado_id == $user->id)
                                                    <span class="mr-3"><b>{{ $minha_nota3 = $review->nota }}.0/5.0</b></span>
                                                    @include('layouts.includes.estrelas_view')
                                                @endif
                                            </div>
                                            <div class="limite-direita mr-3"></div>
                                            <div class="">
                                                <i class="fa fa-calendar-alt mr-2"></i>{{ Carbon::parse($trabalho->data_aceite)->format('d M Y') }} - {{ Carbon::parse($trabalho->data_entrega)->format('d M Y') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p class=""><i>"{{ $review->comentario }}"</i></p>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="row">
                                    <div class="list-inline">
                                        <div class="list-inline-item align-middle">
                                            <img src="{{ asset('images/profile/user.jpg') }}" class="avatar-icon usuario-avatar-xs" alt="">
                                        </div>
                                        <div class="list-inline-item bold-medio" style="font-size: medium">{{$trabalho->freelancer->name}}</div>
                                    </div>
                                </div>
                            </div>
                            @if($loop->last)
                                <div class="mb-3"></div>
                            @else
                                <div class="limite-acima mb-3 mt-3"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="mb-4">
            <div class=" col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                <h5>Reportar Usuário</h5>
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
                <br>
            </div>
        </div>
    </div>
@endsection
