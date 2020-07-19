@extends('layouts.appv3')
@section('title', "$user->name" )
@section('content')
    <div class="wt-haslayout wt-innerbannerholder wt-innerbannerholdervtwo">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                </div>
            </div>
        </div>
    </div>
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <!-- User Profile Start-->
        <div class="wt-main-section wt-paddingtopnull wt-haslayout">

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                        <div class="wt-userprofileholder">
                            <span class="wt-featuredtag"><img src="{{ asset('images/featured.png')}}" alt="img description" data-tipso="Plus Member" class="template-content tipso_style"></span>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 float-left">
                                <div class="row">
                                    <div class="wt-userprofile">
                                        <figure>
                                            <img src="{{ asset('images/profile/img-01.jpg')}}" alt="img description">
                                            <div class="wt-userdropdown wt-online">
                                            </div>
                                        </figure>
                                        <div class="wt-title">
                                            <h3><i class="fa fa-check-circle"></i> {{ $user->name }} </h3>
                                            <span>
                                                <a href="#">@<?php echo $user->username;?></a>
                                                <br>5.0/5 <a class="#">(860 Feedback)</a>
                                                <br> Membro desde {{ Carbon::parse($user->created_at)->format('d M, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9 float-left">
                                <div class="row">
                                    <div class="wt-proposalhead wt-userdetails">
                                        <h2>{{ $user->perfil->slogan }}</h2>
                                        <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                            <li><span><i class="far fa-money-bill-alt"></i> <strong>{{ $user->perfil->preco_habitual }},00</strong> MZN/h</span></li>
                                            <li><span><img src="{{ asset('images/flag/img-02.png')}}" alt="img description">  {{ $user->perfil->provincia }}</span></li>

                                        </ul>
                                        <div class="wt-description" data-readmore="" aria-expanded="false" id="rmjs-1" style="max-height: none; height: 230px;">
                                            <!--<?php echo $user->perfil->descricao;?>-->

                                            Minha AVG: {{$nota}}

                                        </div>
                                    </div>
                                    <div id="wt-statistics" class="wt-statistics wt-profilecounter">
                                        <div class="wt-statisticcontent wt-countercolor1">
                                            <h3 data-from="0" data-to="{{$trabalhos_em_execucao}}" data-speed="800" data-refresh-interval="03">{{$trabalhos_em_execucao}}</h3>
                                            <h4>Ongoing <br>Projects</h4>
                                        </div>
                                        <div class="wt-statisticcontent wt-countercolor2">
                                            <h3 data-from="0" data-to="{{$trabalhos_feitos}}" data-speed="8000" data-refresh-interval="100">{{$trabalhos_feitos}}</h3>
                                            <h4>Completed <br>Projects</h4>
                                        </div>
                                        <div class="wt-statisticcontent wt-countercolor4">
                                            <h3 data-from="0" data-to="{{$trabalhos_cancelados}}" data-speed="800" data-refresh-interval="02">{{$trabalhos_cancelados}}</h3>
                                            <h4>Cancelled <br>Projects</h4>
                                        </div>
                                        <div class="wt-statisticcontent wt-countercolor3">
                                            <h3 data-from="0" data-to="25" data-speed="8000" data-refresh-interval="100">25</h3>
                                            <em>k</em>
                                            <h4>Served <br>Hours</h4>
                                        </div>
                                        <div class="wt-description">
                                            <p>* Adpsicing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                            <a href="javascript:void(0);" class="wt-btn" data-toggle="modal" data-target="#reviewermodal">Send Offer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile End-->
            <!-- User Listing Start-->
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-usersingle">
                                <div class="wt-clientfeedback">
                                    <div class="wt-usertitle wt-titlewithselect">
                                        <h2>Avaliações</h2>
                                    </div>
                                    @foreach($trabalhos as $trabalho)

                                            <div class="wt-userlistinghold wt-userlistingsingle">
                                                <figure class="wt-userlistingimg">
                                                    <img src="{{ asset('images/client/img-02.jpg')}}" alt="image description">
                                                </figure>
                                                <div class="wt-userlistingcontent">
                                                    <div class="wt-contenthead">
                                                        <div class="wt-title">
                                                            <a href="javascript:void(0);"><i class="fa fa-check-circle"></i> {{$trabalho->user->name}}</a>
                                                            <h3>{{ $trabalho->nome_trabalho }}</h3>
                                                        </div>
                                                        <ul class="wt-userlisting-breadcrumb">
                                                            <li><span><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i> {{$trabalho->nivel}}</span></li>
                                                            <li><span><img src="{{ asset('images/flag/img-03.png')}}" alt="img description">  {{$trabalho->provincia}}</span></li>
                                                            <li><span><i class="far fa-calendar"></i> {{ Carbon::parse($trabalho->data_aceite)->format('M Y') }} - {{ Carbon::parse($trabalho->data_entrega)->format('M Y') }}</span></li>
                                                            <li><span>@foreach($trabalho->review_trabs as $review)
                                                                        @if ($review->avaliado_id == $user->id)
                                                                            {{$review->nota}}:
                                                                        </span><span class="wt-stars"></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="wt-description">
                                                    <p>“ {{ $review->comentario }} ”</p>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        <!-- {{round($trabalho->review_trabs->avg('nota')*2)/2}}Nota:-->




                                    @endforeach

                                </div>

                                <div class="wt-experience">
                                    <div class="wt-usertitle">
                                        <h2>Experiencias Profissionais</h2>
                                    </div>
                                    <div class="wt-experiencelisting-hold">
                                        @foreach($exper_profs as $exper_prof)
                                        <div class="wt-experiencelisting wt-bgcolor">
                                            <div class="wt-title">
                                                <h3>{{ $exper_prof->nome}}</h3>
                                            </div>
                                            <div class="wt-experiencecontent">
                                                <ul class="wt-userlisting-breadcrumb">
                                                    <li><span><i class="far fa-building"></i> {{ $exper_prof->instituicao }}</span></li>
                                                    <li><span><i class="far fa-calendar"></i> {{ $exper_prof->data_inicio }} - @if($exper_prof->data_terminio == 'Nov -0001')  Até Hoje @else {{ ($exper_prof->data_terminio)}}@endif</span></li>
                                                </ul>
                                                <div class="wt-description">
                                                    <p>“{{ $exper_prof->descricao }}”</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="divheight"></div>
                                    </div>
                                </div>
                                <div class="wt-experience wt-education">
                                    <div class="wt-usertitle">
                                        <h2>Educação</h2>
                                    </div>
                                    <div class="wt-experiencelisting-hold">
                                        @foreach($educas as $educa)
                                        <div class="wt-experiencelisting wt-bgcolor">
                                            <div class="wt-title">
                                                <h3>{{ $educa->nome }}</h3>
                                            </div>
                                            <div class="wt-experiencecontent">
                                                <ul class="wt-userlisting-breadcrumb">
                                                    <li><span><i class="far fa-building"></i> {{ $educa->instituicao }}</span></li>
                                                    <li><span><i class="far fa-calendar"></i> {{ $educa->data_inicio }} - @if($educa->data_terminio == 'Nov -0001')  Até Hoje @else {{ ($educa->data_terminio) }}@endif</span></li>
                                                </ul>
                                                <div class="wt-description">
                                                    <p>“{{ $educa->descricao }}”</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="divheight"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                            <aside id="wt-sidebar" class="wt-sidebar">
                                <div id="wt-ourskill" class="wt-widget">
                                    <div class="wt-widgettitle">
                                        <h2>Habilidades</h2>
                                    </div>
                                    <div class="wt-widgetcontent wt-skillscontent">
                                        @foreach($user->habilidades as $habilidade)
                                          <div class="wt-skillholder" data-percent="{{ $habilidade->pivot->classificacao }}%">
                                            <span>{{ $habilidade->nome }} <em>{{ $habilidade->pivot->classificacao }}%</em></span>
                                            <div class="wt-skillbarholder"><div class="wt-skillbar" style="width: {{ $habilidade->pivot->classificacao }}%;"></div></div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--<div class="wt-widget wt-widgetarticlesholder wt-articlesuser">
                                    <div class="wt-widgettitle">
                                        <h2>Awards &amp; Certifications</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <div class="wt-particlehold">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-07.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="wt-particlecontent">
                                                <h3><a href="javascript:void(0);">Top PHP Excel Skills</a></h3>
                                                <span><i class="lnr lnr-calendar"></i> Jun 27, 2018</span>
                                            </div>
                                        </div>
                                        <div class="wt-particlehold">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-08.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="wt-particlecontent">
                                                <h3><a href="javascript:void(0);">Monster Developer Award</a></h3>
                                                <span><i class="lnr lnr-calendar"></i> Apr 27, 2018</span>
                                            </div>
                                        </div>
                                        <div class="wt-particlehold">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-09.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="wt-particlecontent">
                                                <h3><a href="javascript:void(0);">Best Communication 2015</a></h3>
                                                <span><i class="lnr lnr-calendar"></i> May 27, 2018</span>
                                            </div>
                                        </div>
                                        <div class="wt-particlehold">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-10.jpg')}}" alt="image description">
                                            </figure>
                                            <div class="wt-particlecontent">
                                                <h3><a href="javascript:void(0);">Best Logo Design Winner</a></h3>
                                                <span><i class="lnr lnr-calendar"></i> Aug 27, 2018</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <!--<div class="wt-proposalsr">
                                    <div class="tg-authorcodescan tg-authorcodescanvtwo">
                                        <figure class="tg-qrcodeimg">
                                            <img src="{{ asset('images/qrcode.png')}}" alt="img description">
                                        </figure>
                                        <div class="tg-qrcodedetail">
                                            <span class="lnr lnr-laptop-phone"></span>
                                            <div class="tg-qrcodefeat">
                                                <h3>Scan with your <span>Smart Phone </span> To Get It Handy.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="wt-widget">
                                    <div class="wt-widgettitle">
                                        <h2>Freelancers Similares</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <div class="wt-widgettag wt-widgettagvtwo">
                                            @foreach($user->habilidades as $habilidade)
                                                <a href="#"> {{ $habilidade->nome }} </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="wt-widget wt-sharejob">
                                    <div class="wt-widgettitle">
                                        <h2>Redes Sociais</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <ul class="wt-socialiconssimple"> <?php $twt_link = $user->perfil->twt_link; $fb_link = $user->perfil->twt_link?>
                                            <li class="wt-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i>@<?php echo $twt_link;?></a></li>
                                            <li class="wt-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i>@<?php echo $fb_link;?></a></li>
                                            <!--<li class="wt-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i>Share on Linkedin</a></li>
                                            <li class="wt-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i>Share on Google Plus</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <!--<div class="wt-widget wt-reportjob">
                                    <div class="wt-widgettitle">
                                        <h2>Report This User</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <form class="wt-formtheme wt-formreport">
                                            <fieldset>
                                                <div class="form-group">
															<span class="wt-select">
																<select>
																	<option value="reason">Select Reason</option>
																	<option value="reason1">Reason1</option>
																	<option value="reason2">Reason2</option>
																	<option value="reason3">Reason3</option>
																	<option value="reason4">Reason4</option>
																</select>
															</span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Description"></textarea>
                                                </div>
                                                <div class="form-group wt-btnarea">
                                                    <a href="javascrip:void(0);" class="wt-btn">Submit</a>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>-->
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
