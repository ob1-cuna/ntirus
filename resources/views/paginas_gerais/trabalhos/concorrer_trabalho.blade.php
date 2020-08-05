@extends('layouts.app_paginas_gerais')
@section('title', "Enviar Propostar para $trabalho->nome_trabalho")
@section('content')
<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
    <div class="wt-haslayout wt-main-section">
        <!-- User Listing Start-->
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
                    <div class="wt-jobalertsholder">
                        <ul class="wt-jobalerts">



                        </ul>
                    </div>
                    <div class="wt-proposalholder">
                        <span class="wt-featuredtag"><img src="{{ asset('images/featured.png') }}" alt="img description" data-tipso="Plus Member" class="template-content tipso_style"></span>
                        <div class="wt-proposalhead">
                            <h2>{{ $trabalho->nome_trabalho }}</h2>
                            <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                <li><span><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i> {{ $trabalho->nivel }}</span></li>
                                <li><span><img src="{{ asset('images/flag/img-02.png') }}" alt="img description">  {{ $trabalho->provincia }}</span></li>
                                <li><span><i class="far fa-folder"></i> Tipo: {{ $trabalho->tipo }}</span></li>
                                <li><span><i class="far fa-clock"></i> Entrega: {{ Carbon::parse($trabalho->data_prev)->format('d M') }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wt-proposalamount-holder">
                        <div class="wt-title">
                            <h2>Proposal Amount</h2>
                        </div>
                        <form action="{{ route('trabalho.concorrer.store', ['trabalho' => $trabalho->slug]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="wt-proposalamount accordion">

                            <div class="form-group">
                                <span>( <i class="fa fa-dollar-sign"></i> )</span>
                                <input type="number" name="preco_proposta" class="form-control" placeholder="Enter Your Proposal Amount" onkeyup="calculateTotal()">
                                <input type="hidden" name="trabalho_id" class="form-control" placeholder="Enter Your Proposal Amount" value="{{ $trabalho->id }}">
                                <a href="" class="collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="lnr lnr-chevron-up"></i></a>
                                <em>Total amount the client will see on your proposal</em>
                            </div>
                            <ul class="wt-totalamount collapse" id="collapseOne" aria-labelledby="headingOne" style="">
                                <li>
                                    <h3>( <i class="fa fa-dollar-sign"></i> ) - <em id="taxa_ntiru"> 00.00</em></h3>

                                    <span>Taxa pelos serviços <strong>“ Ntiru ”</strong><i class="fa fa-exclamation-circle template-content tipso_style" data-tipso="Plus Member"></i></span>
                                </li>
                                <li>
                                    <h3>( <i class="fa fa-dollar-sign"></i> ) <em id="valor_freelancer"> 00.00</em></h3>
                                    <span>Valor que irás receber apôs as taxas <strong>“ Ntirus ”</strong><i class="fa fa-exclamation-circle template-content tipso_style" data-tipso="Plus Member"></i></span>
                                </li>
                            </ul>
                        </div>
                        <div class="wt-formtheme wt-formproposal">

                            <fieldset>
                                <div class="form-group">
                                    <input type="date" name="tempo_exec">
                                </div>
                                <div class="form-group">
                                    <label for="descricao" class="">Detalhes</label>
                                    <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror"></textarea>
                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="wt-attachments wt-attachmentsvtwo">
                                    <div class="wt-title">
                                        <h3>Upload File (Optional)</h3>
                                        <label for="afile">
                                            <span><i class="lnr lnr-link"></i> Attach File(s)</span>
                                            <input type="file" name="file" id="file">
                                        </label>
                                    </div>
                                    <div class="wt-btnarea">
                                        <button class="wt-btn" type="submit">Send Now</button>
                                    </div>

                                </div>
                            </fieldset>





                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!-- User Listing End-->
    </div>
</main>
<script type="text/javascript">

    function calculateTotal() {

        taxa_ntiru = eval(0.1 * document.addem.preco_proposta.value);
        valor_freelancer = eval(document.addem.preco_proposta.value * 0.9);

        document.getElementById('taxa_ntiru').innerHTML = taxa_ntiru;
        document.getElementById('valor_freelancer').innerHTML = valor_freelancer;

    }

</script>
@endsection