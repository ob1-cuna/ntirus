@extends('layouts.appv3')
@section('title', 'Freelancers')
@section('content')
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-main-section wt-haslayout">
            <!-- User Listing Start-->
            <div class="wt-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                                <div class="wt-usersidebaricon">
											<span class="fa fa-cog wt-usersidebardown">
												<i></i>
											</span>
                                </div>
                                <aside id="wt-sidebar" class="wt-sidebar wt-usersidebar">
                                    <div class="wt-widget wt-effectiveholder">
                                        <div class="wt-widgettitle">
                                            <h2>Categories</h2>
                                        </div>
                                        <div class="wt-widgetcontent">
                                            <form class="wt-formtheme wt-formsearch">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input type="text" name="Search" class="form-control" placeholder="Search Category">
                                                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="wt-checkboxholder wt-verticalscrollbar mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 150px;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
																<span class="wt-checkbox">
																	<input id="wordpress" type="checkbox" name="description" value="company" checked="">
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
                                                            </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 103px; max-height: 140px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                                <div class="wt-userlistingholder wt-userlisting wt-haslayout">
                                    <div class="wt-userlistingtitle">
                                        <span>01 - 48 of 57143 results for <em>"Logo Design"</em></span>
                                    </div>
                                    <div class="wt-filterholder">
                                        <ul class="wt-filtertag">
                                            <li class="wt-filtertagclear">
                                                <a href="javascrip:void(0)"><i class="fa fa-times"></i> <span>Clear All Filter</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close" data-dismiss="alert" aria-label="close"></i> <span>Graphic Design</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close" data-dismiss="alert" aria-label="close"></i> <span>Any Hourly Rate</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    @foreach ($users as $user)
                                    <div class="wt-userlistinghold">
                                        <figure class="wt-userlistingimg">
                                            <img src="{{ asset ('images/user/userlisting/img-06.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="wt-userlistingcontent">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <a href="{{ route ('freelancers.show', ['user' => $user->username ?? $user->id]) }}"><i class="fa fa-check-circle"></i> {{ $user->name }}</a>
                                                    <h2>{{ $user->perfil->slogan }}</h2>
                                                </div>
                                                <ul class="wt-userlisting-breadcrumb">
                                                    <li><span><i class="far fa-money-bill-alt"></i> {{ $user->perfil->preco_habitual }}</span></li>
                                                    <li><span><img src="{{ asset ('images/flag/img-03.png')}}" alt="img description">  {{ $user->perfil->provincia }}</span></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i> Salvar</a></li>
                                                </ul>
                                            </div>
                                            <div class="wt-rightarea">
														<span class="wt-starsvtwo">
															<i class="fa fa-star fill"></i>
															<i class="fa fa-star fill"></i>
															<i class="fa fa-star fill"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</span>
                                                <span class="wt-starcontent">4.5/<sub>5</sub> <em>(860 Feedback)</em></span>
                                            </div>
                                        </div>
                                        <div class="wt-description">
                                            <p>{{ Illuminate\Support\Str::limit(strip_tags($user->perfil->descricao), 140) }}

                                        </div>
                                        <div class="wt-tag wt-widgettag">
                                            @foreach($user->habilidades as $habilidade)
                                                <a href="{{ route('freelancers', ['slug' => $habilidade->slug]) }}"> {{ $habilidade->nome }} </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Listing End-->
        </div>
    </main>
@endsection

