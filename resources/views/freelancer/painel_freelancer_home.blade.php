@extends('freelancer.layouts.app')
@section('title', 'Painel do Freelancer' )
@section('descricao', 'Página de operações relativas â conta do usuário da Ntirus.' )
@section('content')

<div class="row">
    <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="card mb-3 widget-chart">
            <div class="widget-chart-content">
                <div class="icon-wrapper rounded">
                    <div class="icon-wrapper-bg bg-warning"></div>
                    <i class="lnr-laptop-phone text-warning"></i></div>
                <div class="widget-numbers">
                    <span>
                        {{
                            getEstatisticaPropostas(Auth::user()->id, 'Pendente') +
                            getEstatisticaPropostas(Auth::user()->id, 'Recusado') +
                            getEstatisticaPropostas(Auth::user()->id, 'Aceite')
                        }}
                    </span>
                </div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                   Trabalhos Concorridos
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-1"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="card mb-3 widget-chart">
            <div class="widget-chart-content">
                <div class="icon-wrapper rounded">
                    <div class="icon-wrapper-bg bg-danger"></div>
                    <i class="lnr-graduation-hat text-danger"></i>
                </div>
                <div class="widget-numbers">
                    <span>
                        {{
                            getEstatisticaFreelancer(Auth::user()->id, 'Em Andamento') +
                            getEstatisticaFreelancer(Auth::user()->id, 'AguardandoAC') +
                            getEstatisticaFreelancer(Auth::user()->id, 'Aprovado') +
                            getEstatisticaFreelancer(Auth::user()->id, 'Recusado')
                        }}
                    </span>
                </div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-danger font-weight-bold">
                    Trabalhos Em Andamento
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-2"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-xl-4">
        <div class="card mb-3 widget-chart">
            <div class="widget-chart-content">
                <div class="icon-wrapper rounded">
                    <div class="icon-wrapper-bg bg-info"></div>
                    <i class="lnr-diamond text-info"></i></div>
                <div class="widget-numbers text-danger"><span>{{ getEstatisticaFreelancer(Auth::user()->id, 'finalizado') }}</span></div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-info font-weight-bold">
                    Trabalhos Finalizados
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mbg-3">
    <a href="{{ route('dashboard.trabalhos.em_andamento') }}" class="btn-wide btn-pill btn-shadow fsize-1 btn btn-focus btn-lg">
        <span class="mr-2 opacity-7">
            <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
        </span>
        Ver Trabalhos Em Andamento
    </a>
</div>

@include('freelancer.layouts.includes.estatisticas_valores')

@endsection