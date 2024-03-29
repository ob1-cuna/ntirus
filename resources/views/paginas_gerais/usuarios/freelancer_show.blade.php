@extends('layouts.app_paginas_gerais')
@section('title', "$user->name" )
@section('content')
    <div class="clearfix"></div>
    <div class="conteudo" style="padding: auto">
        <div class="mb-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                <div class="main-card card">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-auto px-3 py-3">
                                <div class="align-content-center text-center">
                                <img src="{{ asset ($user->perfil->foto_perfil) }}" class="img-thumbnail usuario-avatar mb-2" alt="">
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
                                                <a href="tel:+25882******6" onclick="return false;"> <i class="fa fa-phone fa-lg"></i></a>
                                            </div>
                                            <div class="list-inline-item">
                                                <a href="https://twitter.com/"> <i class="fab fa-twitter fa-lg"></i></a>
                                            </div>
                                            <div class="list-inline-item">
                                                <a href="https://facebook.com/"> <i class="fab fa-facebook fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto py-3" style="padding-right: 20px; min-width: 250px">
                                <div class="row">
                                    <div class="col text-center limite-direita">
                                        <h2>{{$trabalhos_feitos}}</h2>
                                        <p>Trabalhos <br>Elaborados</p>
                                    </div>
                                    <div class="col text-center">
                                        <h2>{{$trabalhos_cancelados}}</h2>
                                        <p>Trabalhos <br>Cancelados</p>
                                    </div>
                                </div>
                                <div class="row limite-acima">
                                    <div class="col text-center mt-2">
                                        <h2>{{$trabalhos_em_execucao}}</h2>
                                        <p>Trabalhos <br>Em Execução</p>
                                    </div>
                                    <div class="limite-direita"></div>
                                    <div class="col text-center mt-2">
                                        <h2>{{$minha_nota3 = $nota}}<small style="font-size: small">/5.0</small></h2>
                                        @include('layouts.includes.estrelas_view')
                                        <p>({{ $total_avaliacoes }} Avaliações)</p>
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
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
            @if($total_avaliacoes >= 1)
            <h5>Avaliações</h5>
            <div class="main-card card px-3">
                <div class="card-body">
                    @foreach($trabalhos as $trabalho)
                    <div class="container">
                    <div class="row mt-2">
                        <h6 class="bold-medio">{{ $trabalho->nome_trabalho }}</h6>
                    </div>
                    @foreach($trabalho->review_trabs as $review)
                         @if ($review->avaliado_id == $user->id)
                            <div class="row mb-2">
                                <div class="mr-2">
                                    @if ($review->avaliado_id == $user->id)
                                        <span class="mr-3"><b>{{ $minha_nota3 = $review->nota }}.0/5.0</b></span>
                                            @include('layouts.includes.estrelas_view')
                                    @endif
                                </div>
                                <div class="limite-direita"></div>
                                <div class="ml-3">
                                    <i class="fa fa-calendar-alt mr-2"></i>{{ Carbon::parse($trabalho->created_at)->format('d M Y') }} - {{ Carbon::parse($trabalho->data_entrega)->format('d M Y') }}
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
                                        <img src="{{ asset($trabalho->user->perfil->foto_perfil) }}" class="avatar-icon usuario-avatar-xs" alt="">
                                    </div>
                                <div class="list-inline-item bold-medio" style="font-size: medium">{{$trabalho->user->name}}</div>
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
            @endif
            <h5>Experiência Profissional</h5>
            <div class="main-card card px-3">
                <div class="card-body">
                    @foreach($exper_profs as $exper_prof)
                    <div class="container">
                        <div class="row @if($loop->first) mt-2 @else @endif">
                            <h6 class="bold-medio">{{ $exper_prof->nome}}</h6>
                        </div>
                        <div class="row mb-2">
                            <div class="mr-2">
                                <i class="fa fa-building"></i>
                                <span class="">{{ $exper_prof->instituicao }}</span>
                            </div>
                            <div class="limite-direita ml-3 mr-2 py-1"></div>
                            <div class="">
                                <i class="fa fa-calendar-alt mr-2"></i>{{ $exper_prof->data_inicio }} - @if($exper_prof->data_terminio == 'Jan 1900')  Até hoje @else {{ ($exper_prof->data_terminio)}}@endif
                            </div>
                        </div>
                        <div class="row">
                                <i> <?php echo $exper_prof->descricao; ?> </i>
                        </div>
                    </div>
                        @if($loop->last)
                            <div class="mb-3">
                            </div>
                        @else
                            <div class="limite-acima mb-4 mt-2">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <br>
            <h5>Educação</h5>
            <div class="main-card card px-3">
                <div class="card-body">
                    @foreach($educas as $educa)
                    <div class="container">
                        <div class="row @if($loop->first) mt-2 @else @endif">
                            <h6 class="bold-medio">{{ $educa->nome }}</h6>
                        </div>
                        <div class="row mb-2">
                            <div class="mr-2">
                                <i class="fa fa-building mr-2"></i>
                                <span class="">{{ $educa->instituicao }}</span>
                            </div>
                            <div class="limite-direita"></div>
                            <div class="ml-3">
                                <i class="fa fa-calendar-alt mr-2"></i> {{ $educa->data_inicio }} - @if($educa->data_terminio == 'Jan 1900')  Até Hoje @else {{ ($educa->data_terminio) }}@endif
                            </div>
                        </div>
                        <div class="row">
                            <i><?php echo $educa->descricao; ?></i>
                        </div>
                    </div>
                        @if($loop->last)
                            <div class="mb-3">
                            </div>
                        @else
                            <div class="limite-acima mb-4 mt-2">
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
            <br>
        </div>
        </div>
        <div class="mb-4">
        <div class=" col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
            <h5>Habilidades</h5>
            <div class="main-card card">
                <div class="card-body">
                    @foreach($user->habilidades as $habilidade)
                    <div>
                    <div class="d-inline-block">
                        <div class="text-left mb-1">{{ $habilidade->nome }}</div>
                    </div>
                    <div class="mb-3 progress progress-bar-sm">
                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="{{ $habilidade->pivot->classificacao }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $habilidade->pivot->classificacao }}%;"></div>
                    </div>
                    </div>
                    @endforeach
                    <div class="divider"></div>
                </div>
            </div>
            <br>
            <h5>Denunciar Usuário</h5>
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
                        <div class="position-relative form-group"><label for="exampleText" class="">Descrição</label>
                            <textarea name="text" id="exampleText" class="form-control"></textarea>
                        </div>
                        <div class="position-relative form-group"><label for="exampleFile" class="">File</label><input name="file" id="exampleFile" type="file" class="form-control-file">
                            <small class="form-text text-muted">Podes anexar um ficheiro com possíveis provas de violação dos termos de uso.
                            </small>
                        </div>
                        <button class="mt-1 btn btn-primary">Enviar denúncia</button>
                    </form>
                </div>
            </div>
            <br>
        </div>
        </div>
    </div>
@endsection
