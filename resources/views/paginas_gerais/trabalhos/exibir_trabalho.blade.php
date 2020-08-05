@extends('layouts.app_paginas_gerais')
@section('title', "$trabalho->nome_trabalho")
@section('content')
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <!-- User Listing Start-->
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left">
                            <div class="wt-proposalholder">
                                <div class="wt-proposalhead">
                                    <h2>{{ $trabalho->nome_trabalho }}</h2>
                                    <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                        <li><span><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i> {{ $trabalho->nivel }}</span></li>
                                        <li><span><img src="{{ asset('images/flag/img-02.png')}}" alt="img description">  {{ $trabalho->provincia }}</span></li>
                                        <li><span><i class="far fa-folder"></i> Tipo: {{ $trabalho->tipo }}</span></li>
                                        <li><span><i class="far fa-clock"></i> Entrega: {{ Carbon::parse($trabalho->data_prev)->format('d M') }}</span></li>
                                    </ul>
                                </div>
                                <div class="wt-btnarea"><a href="{{ route ('trabalho.concorrer', ['trabalho' => $trabalho->slug ]) }}" class="wt-btn">Enviar Proposta</a></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-projectdetail-holder">
                                <div class="wt-projectdetail">
                                    <div class="wt-title">
                                        <h3>Detalhes</h3>
                                    </div>
                                    <div class="wt-description">
                                     {{ $trabalho->descricao }}

                                    </div>
                                </div>
                                <div class="wt-skillsrequired">
                                    <div class="wt-title">
                                        <h3>Habilidades</h3>
                                    </div>
                                    <div class="wt-tag wt-widgettag">
                                        @foreach($trabalho->habilidades as $habilidade)
                                            <a href="#"> {{ $habilidade->nome }} </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="wt-attachments">
                                    <div class="wt-title">
                                        <h3>Anexos</h3>
                                    </div>
                                    <ul class="wt-attachfile">
                                        @foreach($imagems as $imagem)
                                        <li>
                                            <span>{{ $imagem->nome_imagem }}</span>
                                            <em>File size: 512 kb<a href={{ $imagem->caminho }}><i class="lnr lnr-download"></i></a></em>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                            <aside id="wt-sidebar" class="wt-sidebar">
                                <div class="wt-proposalsr">
                                    <div class="wt-proposalsrcontent">
                                        <span class="wt-proposalsicon"><i class="fa fa-angle-double-down"></i><i class="fa fa-newspaper"></i></span>
                                        <div class="wt-title">
                                            <h3>{{ $numeroDePropostas }}</h3>
                                            <span>
                                                @if ($numeroDePropostas==0) Sem Propostas
                                                    @else
                                                 @if($numeroDePropostas >= 2)Recebidas até @else Recebida à@endif <em>{{ Carbon::parse($ultimaProposta->created_at)->format('d M') }}
                                                 @endif</em>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="wt-clicksavearea">
                                        <span>Codigo: {{ $trabalho->slug }}</span>
                                        <a href="javascrip:void(0);" class="wt-clicksavebtn"><i class="far fa-heart"></i>Salvar</a>
                                    </div>
                                </div>
                                <div class="wt-widget wt-companysinfo-jobsingle">
                                    <div class="wt-companysdetails">
                                        <figure class="wt-companysimg">
                                            <img src="{{ asset('images/company/img-01.jpg')}}" alt="img description">
                                        </figure>
                                        <div class="wt-companysinfo">
                                            <figure><img src="{{ asset('images/company/img-01.png')}}" alt="img description"></figure>
                                            <div class="wt-title">
                                                <a href="#"><h2>{{ $trabalho->user->name }}</h2></a>
                                            </div>
                                            <ul class="wt-postarticlemeta">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span>Ver Perfil</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="wt-widget wt-reportjob">
                                    <div class="wt-widgettitle">
                                        <h2>Reportar</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <form class="wt-formtheme wt-formreport">
                                            <fieldset>
                                                <div class="form-group">
															<span class="wt-select">
																<select>
																	<option value="Reason">Escolha o Motivo</option>
																	<option value="Reason1">1</option>
																	<option value="Reason2">2</option>
																</select>
															</span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Description"></textarea>
                                                </div>
                                                <div class="form-group wt-btnarea">
                                                    <a href="#" class="wt-btn">Submit</a>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Listing End-->
        </div>
    </main>

@endsection


