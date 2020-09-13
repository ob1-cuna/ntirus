<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 card mb-3" >
    <div class="no-gutters row">
        <div class="col-md-12 col-lg-6 col-xl-4" >
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
                                            {{number_format($tako_feito - $tako_retirado, 2)}} MTs
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper">
                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                        <div class="progress-bar bg-primary"
                                             role="progressbar"
                                             aria-valuenow="{{number_format(getPercentagem($tako_feito, ($tako_feito - $tako_retirado)))}}"
                                             aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: {{number_format(getPercentagem($tako_feito, ($tako_feito - $tako_retirado)))}}%;"></div>
                                    </div>

                                    <div class="progress-sub-label">
                                        <div class="sub-label-left">Percentagem
                                        </div>
                                        <div class="sub-label-right">{{number_format(getPercentagem($tako_feito, ($tako_feito - $tako_retirado)), 2)}}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Retirado
                                        </div>
                                        <div class="widget-subheading">Total
                                        </div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-danger">
                                            {{number_format($tako_retirado, 2)}} MTs
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper">
                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                        <div class="progress-bar bg-danger"
                                             role="progressbar"
                                             aria-valuenow="{{number_format(getPercentagem($tako_feito, $tako_retirado))}}"
                                             aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: {{number_format(getPercentagem($tako_feito, $tako_retirado))}}%;"></div>
                                    </div>
                                    <div class="progress-sub-label">
                                        <div class="sub-label-left">Percentagem
                                        </div>
                                        <div class="sub-label-right">{{number_format(getPercentagem($tako_feito, $tako_retirado), 2)}}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-4">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Feito
                                        </div>
                                        <div class="widget-subheading">desde 2015
                                        </div>

                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-focus">
                                            {{number_format($tako_feito, 2)}} Mts
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper">
                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                        <div class="progress-bar bg-focus"
                                             role="progressbar"
                                             aria-valuenow="100"
                                             aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: 100%;"></div>
                                    </div>
                                    <div class="progress-sub-label">
                                        <div class="sub-label-left">Percentagem
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
