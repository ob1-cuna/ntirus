@extends('layouts.appv3')
@section('title', 'Trabalhos')
@section('content')

			<!-- BANNER -->
			<div class="wt-haslayout wt-innerbannerholder">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                                <div class="wt-innerbannercontent">
                                <div class="wt-title"><h2>Pesquise trabalhos</h2></div>
                                <ol class="wt-breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="wt-active">Trabalhos</li>
                                </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM DO BANNER -->

            <!--  INICIO DA LISTAGEM DOS TABALHOS PUBLICADOS  -->

            			
			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
                    <div class="wt-haslayout wt-main-section">
                       
                        <div class="wt-haslayout">
                            <div class="container">
                                <div class="row">
                                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                                            <aside id="wt-sidebar" class="wt-sidebar">
                                                <div class="wt-widget wt-effectiveholder">
                                                    <div class="wt-widgettitle">
                                                        <h2>Categories</h2>
                                                    </div>
                                                    <div class="wt-widgetcontent">
                                                        <form class="wt-formtheme wt-formsearch">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <input type="text" name="Search" class="form-control" placeholder="Search Category">
                                                                    <a href="#" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="wt-checkboxholder wt-verticalscrollbar">
                                                                    <span class="wt-checkbox">
                                                                        <input id="wordpress" type="checkbox" name="description" value="company" checked>
                                                                        <label for="wordpress"> WordPress</label>
                                                                    </span>
                                                                    <span class="wt-checkbox">
                                                                        <input id="graphic" type="checkbox" name="description" value="company">
                                                                        <label for="graphic"> Graphic Design</label>
                                                                    </span>
                                                                    <span class="wt-checkbox">
                                                                        <input id="website" type="checkbox" name="description" value="company">
                                                                        <label for="website"> Website Design</label>
                                                                    </span>
                                                                    <span class="wt-checkbox">
                                                                        <input id="article" type="checkbox" name="description" value="company">
                                                                        <label for="article"> Article Writing</label>
                                                                    </span>
                                                                    <span class="wt-checkbox">
                                                                        <input id="software" type="checkbox" name="description" value="company">
                                                                        <label for="software"> Software Architecture</label>
                                                                    </span>
                                                                    <span class="wt-checkbox">
                                                                        <input id="wordpress1" type="checkbox" name="description" value="company">
                                                                        <label for="wordpress1"> WordPress</label>
                                                                    </span>
                                                                    <span class="wt-checkbox">
                                                                        <input id="graphic1" type="checkbox" name="description" value="company">
                                                                        <label for="graphic1"> Graphic Design</label>
                                                                    </span>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                                            <div class="wt-userlistingholder wt-haslayout">
                                                <div class="wt-userlistingtitle">
                                                    <span>01 - 48 of 57143 results for <em>"PHP Developer"</em></span>
                                                </div>
                                                <div class="wt-filterholder">
                                                    <ul class="wt-filtertag">
                                                        <li class="wt-filtertagclear">
                                                            <a href="javascrip:void(0)"><i class="fa fa-times"></i> <span>Clear All Filter</span></a>
                                                        </li>
                                                         <li class="alert alert-dismissable fade in">
                                                            <a href="javascrip:void(0)"><i class="fa fa-times close" data-dismiss="alert" aria-label="close"></i> <span>Graphic Design</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @forelse ($trabalhos as $trabalho)
                                                <div class="wt-userlistinghold wt-userlistingholdvtwo">
                                                    <div class="wt-userlistingcontent">
                                                        <div class="wt-contenthead">
                                                            <div class="wt-title">
                                                            <a href="#">{{ $trabalho->user->name }}</a>
                                                                <h2>{{ $trabalho->nome_trabalho }}</h2>
                                                            </div>
                                                            <div class="wt-description">
                                                            <p>MAX:120 Char {{ Illuminate\Support\Str::limit(strip_tags($trabalho->descricao), 120) }}</p>
                                                            </div>
                                                            <div class="wt-tag wt-widgettag">
                                                                @foreach($trabalho->habilidades as $habilidade)
                                                                    <a href="{{ route('freelancers', ['slug' => $habilidade->slug]) }}"> {{ $habilidade->nome }} </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="wt-viewjobholder">
                                                            <ul>
                                                                <li><span><i class="fa fa-dollar-sign wt-viewjobdollar"></i>NIVEL: {{ $trabalho->nivel }}</span></li>
                                                                <li><span><em><img src="images/flag/img-01.png" alt="img description"></em>Provincia: {{ $trabalho->provincia }}</span></li>
                                                                <li><span><i class="far fa-folder wt-viewjobfolder"></i>Tipo: {{ $trabalho->tipo }}</span></li>
                                                                <li><span><i class="far fa-clock wt-viewjobclock"></i>Entrega: {{ Carbon::parse($trabalho->data_prev)->format('d M') }}</span></li>
                                                                <li><span><i class="fa fa-tag wt-viewjobtag"></i>ID: {{ $trabalho->id }}</span></li>

                                                                <li class="wt-btnarea"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}" class="wt-btn">Ver Job</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <p>SEM TRABALHOS.</p> 
                                                @endforelse
                                                <nav class="wt-pagination">
                                                    <ul>
                                                        <li class="wt-prevpage"><a href="#"><i class="lnr lnr-chevron-left"></i></a></li>
                                                        <li><a href="#">1</a></li>
                                                        <li class="wt-nextpage"><a href="#"><i class="lnr lnr-chevron-right"></i></a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  FIM DA LISTAGEM DOS TABALHOS PUBLICADOS  -->
                    </div>
                </main>
                <!--Main End-->

            


@endsection