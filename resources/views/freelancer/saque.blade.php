@extends('freelancer.layouts.app')
@section('title', 'Saque' )
@section('descricao', 'Saque' )
@section('meu_css')
@endsection()
@section('content')
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 card mb-3" >
        <div class="no-gutters row">
            <div class="col-md-12 col-lg-12 col-xl-12" >
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Disponivel
                                            </div>
                                            <div class="widget-subheading">Saldo
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary">
                                                {{number_format(getSaldo(Auth::user()->id), 2)}} MTs
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-primary"
                                                 role="progressbar"
                                                 aria-valuenow="{{number_format(getPercentagem(getTotalFeito(Auth::user()->id), (getSaldo(Auth::user()->id))))}}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: {{number_format(getPercentagem(getTotalFeito(Auth::user()->id), (getSaldo(Auth::user()->id))))}}%;"></div>
                                        </div>

                                        <div class="progress-sub-label">
                                            <div class="sub-label-left">Percentagem
                                            </div>
                                            <div class="sub-label-right">{{number_format(getPercentagem(getTotalFeito(Auth::user()->id), getSaldo (Auth::user()->id)), 2)}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">

            <div id="smartwizard" class="sw-main sw-theme-default">
                <ul class="forms-wizard nav nav-tabs step-anchor">
                    <li class="nav-item">
                        <a href="#step-1" class="nav-link">
                            <em>1</em><span>Método</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#step-2" class="nav-link">
                            <em>2</em><span>Confirmação</span>
                        </a>
                    </li>
                </ul>

                <div class="form-wizard-content sw-container tab-content" style="min-height: 356px;">
                    <div id="step-1" class="tab-pane step-content">
                        <form id="" class="col-md-10 mx-auto" method="post"
                              action="{{ route('dashboard.invoices.saque.store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="montante">Montante</label>
                                    <div>
                                        <input name="montante" id="montante" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="metodo">Método de Pagamento</label>
                                    <select id="metodo" class="form-control" name="metodo_id" required>
                                        @foreach($metodos as $metodo)
                                            <option value="{{$metodo->id}}">{{ $metodo->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="destino">Destino</label>
                                <div>
                                    <input name="destino" id="destino" placeholder="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="titular">Titular</label>
                                <div>
                                    <input name="titular" id="titular" placeholder="" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                            </div>
                            <div class="form-group" style="display: none">
                                <button type="submit" class="btn btn-primary" name="signup" id="meu_smt"
                                        value="Sign up">Continuar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="step-2" class="tab-pane step-content">
                        <div class="no-results">
                            <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                <span class="swal2-success-line-tip"></span>
                                <span class="swal2-success-line-long"></span>
                                <div class="swal2-success-ring"></div>
                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                            </div>
                            <div class="results-subtitle mt-4">Terminado!</div>
                            <div class="results-title">Aguarde a confirmação!
                            </div>
                            <div class="mt-3 mb-3"></div>
                            <div class="text-center">
                                <button class="btn-shadow btn-wide btn btn-success btn-lg">
                                    Voltar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="divider"></div>
            <div class="clearfix">
                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reiniciar
                </button>
                <a href="{{ route('dashboard.invoices.saque.store')}}" onclick="event.preventDefault();
                    document.getElementById('meu_smt').click();" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary" type="button">
                    Avançar
                </a>
                <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">
                    Recuar
                </button>
            </div>
        </div>
    </div>

@endsection
