@extends('cliente.layouts.app')
@section('title', 'Pagamento' )
@section('descricao', 'Pagamento de ' )
@section('meu_css')
@endsection()
@section('content')

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
                        <form id="metodoForm-01" class="col-md-10 mx-auto" method="post"
                              action="{{ route('cliente.invoices.pay.store', ['transacao' => $transacao->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="metodo">Método de Pagamento</label>
                                <div>
                                    <select id="metodo" class="form-control" name="metodo_id" required>
                                        @foreach($metodos as $metodo)
                                            <option value="{{$metodo->id}}">{{ $metodo->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <i class="pe pe-7s-info mt-3 mr-2 ml-2"></i>Para pagameto com <b style="font-weight: 500;">M-pesa</b>: 84<br>
                                <i class="pe pe-7s-info mr-2 ml-2"></i>Para pagameto com <b style="font-weight: 500;">Mkesh</b>: 82<br>
                                <i class="pe pe-7s-info mr-2 ml-2"></i>Para pagameto com <b style="font-weight: 500;">Millennium BIM</b>: 000000<br>
                                <i class="pe pe-7s-info mr-2 ml-2"></i>Para pagameto com <b style="font-weight: 500;">Ponto 24</b>: 82<br>
                                <i class="pe pe-7s-info mr-2 ml-2"></i>Para pagameto com <b style="font-weight: 500;">E-mola</b>: 86<br>
                            </div>
                            <div class="form-group">
                                <label for="titular">Titular</label>
                                <div>
                                    <input name="titular" id="titular" placeholder="" type="text" class="form-control">
                                    <input name="transacao_id" id="transacao_id" placeholder="" type="hidden" value="{{ $transacao->id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="codigo_confirmacao">Codigo de Confirmação</label>
                                <div>
                                    <input name="codigo_confirmacao" id="codigo_confirmacao" placeholder="" type="text" class="form-control">
                                </div>
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
            <div class="divider"></div>
            <div class="clearfix">
                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reiniciar
                </button>
                <a href="{{ route('cliente.invoices.pay.store', ['transacao' => $transacao->id]) }}" onclick="event.preventDefault();
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