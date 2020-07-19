@extends('admin.layouts.app_layout')
@section('content')

					<!--Register Form Start-->

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                                <div class="wt-dashboardbox wt-earningsholder">
                                    <div class="wt-dashboardboxtitle wt-titlewithsearch">
                                        <h2>Tabela de Freelancers</h2>
                                        <form class="wt-formtheme wt-formsearch">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input type="text" name="Search" class="form-control" placeholder="Search Here">
                                                    <a href="#" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="wt-dashboardboxcontent">
                                        <table class="wt-tablecategories">
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Habilidades</th>
                                                <th>Endereço</th>
                                                <th>Status</th>
                                                <th>Operações</th>
                                            </tr>
                                            </thead>
                                            @foreach ($users as $user)
                                            <tbody>
                                            <tr>
                                                <td data-th="Nome"><span class="bt-content">{{ $user->name }}</span></td>
                                                <td data-th="Hablidades">
                                                    <span class="bt-content">
                                                        @foreach($user->habilidades as $habilidade)
                                                            {{ $habilidade->nome }},
                                                        @endforeach
                                                    </span>
                                                </td>
                                                <td data-th="Endereço"><span class="bt-content">{{ $user->perfil->cidade }}, {{ $user->perfil->provincia }}</span></td>
                                                <td data-th="Stattus"><span class="bt-content">
                                                        @switch($user->status)
                                                            @case('0')
                                                                Novo Usario
                                                            </span></td>
                                                            <td data-th="Operações">
                                                                <span class="bt-content">
                                                                    <form method="post" action="{{ route('admin.usuario.aprovar_perfil', ['user' => $user->id]) }}">
                                                                        @csrf
                                                                        <input type="submit" value="Aprovar Perfil">
                                                                    </form>
                                                                </span></td>
                                                             @break

                                                            @case('1')
                                                                Perfil Aprovado
                                                             </span></td>
                                                             <td data-th="Operações">
                                                            <span class="bt-content">
                                                                <form method="post" action="#">
                                                                    @csrf
                                                                        <input type="submit" value="Remover">
                                                                </form>
                                                                <form method="post" action="#">
                                                                    @csrf
                                                                        <input type="submit" value="Suspender">
                                                                </form>
                                                            </span></td>
                                                            @break

                                                            @default
                                                                Erro de digitacao.
                                                        @endswitch
                                            </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                                <div class="wt-dashboardbox wt-earningsholder">
                                    <div class="wt-dashboardboxtitle wt-titlewithsearch">
                                        <h2>Tabela de Trabalhos Abertos</h2>
                                        <form class="wt-formtheme wt-formsearch">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input type="text" name="Search" class="form-control" placeholder="Search Here">
                                                    <a href="#" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="wt-dashboardboxcontent">
                                        <table class="wt-tablecategories">
                                            <thead>
                                            <tr>
                                                <th>Titulo</th>
                                                <th>Proponente</th>
                                                <th>Habilidades</th>
                                                <th>Prazo de Entrega</th>
                                                <th>Operações</th>
                                            </tr>
                                            </thead>
                                            @foreach ($trabalhos as $trabalho)
                                                <tbody>
                                                <tr>
                                                    <td data-th="Titulo"><a href="{{ route ('trabalho.show', ['trabalho' => $trabalho->slug]) }}"><span class="bt-content">{{ $trabalho->nome_trabalho }}</span></a></td>
                                                    <td data-th="Proponente"><span class="bt-content">{{ $trabalho->user->name }}</span></td>
                                                    <td data-th="Hablidades">
                                                    <span class="bt-content">
                                                        @foreach($trabalho->habilidades as $habilidade)
                                                            {{ $habilidade->nome }},
                                                        @endforeach
                                                    </span>
                                                    </td>
                                                    <td data-th="Prazo de Entrega"><span class="bt-content">{{ Carbon::parse($trabalho->data_prev)->format('d/M/Y') }}</span></td>
                                                    <td data-th="Operações"><span class="bt-content"><a href="#">Ver Propostas</a></span></td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                                <aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
                                    <div class="wt-proposalsr">
                                        <div class="wt-proposalsrcontent">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                            </figure>
                                            <div class="wt-title">
                                                <h3>{{ $freelancersTotal }}</h3>
                                                <span>Numero de Freelancers</span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="wt-proposalsr">
                                        <div class="wt-proposalsrcontent wt-componyfolow">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-16.png') }}" alt="image">
                                            </figure>
                                            <div class="wt-title">
                                                <h3>{{ $clientesTotal }}</h3>
                                                <span>Número de Clientes</span>
                                            </div>
                                        </div> 
                                    </div>								
                                    <div class="wt-proposalsr">
                                        <div class="wt-proposalsrcontent  wt-freelancelike">
                                            <figure>
                                                <img src="{{ asset('images/thumbnail/img-15.png') }}" alt="image">
                                            </figure>
                                            <div class="wt-title">
                                                <h3>2075</h3>
                                                <span>Trabalhos Cancelados</span>
                                            </div>
                                        </div> 
                                    </div>								
                                </aside>
                                <div class="wt-companyad">
                                    <figure class="wt-companyadimg"><img src="{{ asset('images/add-img.jpg') }}" alt="img description"></figure>
                                    <span>Publicidade...</span>
                                </div>
                            </div>
                        </div>
@endsection
		
