@extends('admin.layouts.app')
@section('title', 'Painel do Admin' )
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
                    <span>3M</span>
                </div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                    Cash Deposits
                </div>
                <div class="widget-description opacity-8">
                                            <span class="text-danger pr-1">
                                                <i class="fa fa-angle-down"></i>
                                                <span class="pl-1">54.1%</span>
                                            </span>
                    down last 30 days
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
                <div class="widget-numbers"><span>1M</span></div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-danger font-weight-bold">
                    Invested Dividents
                </div>
                <div class="widget-description opacity-8">
                    Compared to YoY:
                    <span class="text-info pl-1">
                                                <i class="fa fa-angle-down"></i>
                                                <span class="pl-1">14.1%</span>
                                            </span>
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
                <div class="widget-numbers text-danger"><span>$294</span></div>
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-info font-weight-bold">
                    Withdrawals
                </div>
                <div class="widget-description opacity-8">
                    Down by
                    <span class="text-success pl-1">
                                            <i class="fa fa-angle-down"></i>
                                                <span class="pl-1">21.8%</span>
                                            </span>
                </div>
            </div>
            <div class="widget-chart-wrapper">
                <div id="dashboard-sparklines-simple-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mbg-3">
    <button class="btn-wide btn-pill btn-shadow fsize-1 btn btn-focus btn-lg">
                                                <span class="mr-2 opacity-7">
                                                    <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                                </span>
        Ver Todos Trabalhos
    </button>
</div>
<div class="card no-shadow bg-transparent no-border rm-borders mb-3">
    <div class="card">
        <div class="no-gutters row">
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total
                                                Orders
                                            </div>
                                            <div class="widget-subheading">Last year
                                                expenses
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary">
                                                1896
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-primary"
                                                 role="progressbar"
                                                 aria-valuenow="43"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: 43%;"></div>
                                        </div>
                                        <div class="progress-sub-label">
                                            <div class="sub-label-left">YoY Growth
                                            </div>
                                            <div class="sub-label-right">100%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Followers
                                            </div>
                                            <div class="widget-subheading">People
                                                interested
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success">
                                                45,5%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-success"
                                                 role="progressbar"
                                                 aria-valuenow="43"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: 43%;"></div>
                                        </div>
                                        <div class="progress-sub-label">
                                            <div class="sub-label-left">YoY Growth
                                            </div>
                                            <div class="sub-label-right">100%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Clients
                                            </div>
                                            <div class="widget-subheading">Total
                                                Profit
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger">
                                                <small>$</small>
                                                527
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-danger"
                                                 role="progressbar"
                                                 aria-valuenow="43"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: 43%;"></div>
                                        </div>
                                        <div class="progress-sub-label">
                                            <div class="sub-label-left">YoY Growth
                                            </div>
                                            <div class="sub-label-right">100%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <div class="pt-0 pb-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Products
                                                Sold
                                            </div>
                                            <div class="widget-subheading">Total
                                                revenue streams
                                            </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-focus">
                                                682
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-focus"
                                                 role="progressbar"
                                                 aria-valuenow="43"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: 43%;"></div>
                                        </div>
                                        <div class="progress-sub-label">
                                            <div class="sub-label-left">YoY Growth
                                            </div>
                                            <div class="sub-label-right">100%</div>
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
</div>

@endsection