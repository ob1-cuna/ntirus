@extends('layouts.app_paginas_gerais')

@section('content')
<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2">
				<div class="wt-registerformhold">
					<div class="wt-registerformmain">
						<div class="wt-registerhead">
							<div class="wt-title">
								<h3>Use-me</h3>
							</div>
							<div class="wt-description">
								<p>Cadstre-se</p>
							</div>
						</div>
						<div class="wt-joinforms">
							<ul class="wt-joinsteps">
								<li class="wt-done-next"><a href="javascrip:void(0);">01</a></li>
								<li :after class="wt-active"><a href="javascrip:void(0);">02</a></li>
								<li><a href="javascrip:void(0);">03</a></li>
								<li><a href="javascrip:void(0);">04</a></li>
							</ul>
							
							<form method="POST" action="/registro/perfil/post" class="wt-formtheme wt-formregister">

								@csrf
								<fieldset class="wt-registerformgroup">
									<div class="form-group form-group-half">
											<input id="preco_habitual" type="number" step="any" class="form-control @error('preco_habitual') is-invalid @enderror" name="preco_habitual" value="{{ old('preco_habitual') }}" required autocomplete="preco_habitual" placeholder="Preço Habitual">

											@error('preco_habitual')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
									</div>
									<div class="form-group form-group-half">
											<input id="slogan" type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan') }}" required autocomplete="slogan" placeholder="Slogan">

											@error('slogan')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
									</div>
									<div class="form-group">
                                        <input id="descricao" type="text" step="any" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao') }}" required autocomplete="descricao" placeholder="Desc">
											@error('descricao')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
                                            @enderror
                                            

									</div>
                                    
                                    <div class="form-group form-group-half">
                                        <span class="wt-select">

                                        <select name="provincia" id="provincia" class="wt-form-group-dropdown wt-select" class="form-control @error('provincia') is-invalid @enderror" value="{{ old('provincia') }}" required autocomplete="provincia">
                                            <option disabled selected hidden value="">Selecione a Provincia</option>
                                            @include('layouts.includes.select_provincias')
                                        </select>
                                    </span>
                                        @error('provincia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-group-half">
                                        <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" required autocomplete="cidade" placeholder="Cidade">

                                        @error('cidade')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-half">
                                        <input id="fb_link" type="text" step="any" class="form-control @error('fb_link') is-invalid @enderror" name="fb_link" value="{{ old('fb_link') }}" required autocomplete="fb_link" placeholder="Perfil Facebook">

                                        @error('fb_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-group-half">
                                        <input id="twt_link" type="text" class="form-control @error('twt_link') is-invalid @enderror" name="twt_link" value="{{ old('twt_link') }}" required autocomplete="twt_link" placeholder="Twitter (ex: @vnvcleto)">

                                        @error('twt_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

										<div class="form-group form-group-half-half">
											<select class="wt-form-group-dropdown wt-select" id="habilidade_id" class="form-control @error('habilidade_id') is-invalid @enderror" name="habilidade_id" value="{{ old('habilidade_id') }}" required autocomplete="habilidade_id">
												@foreach ($habilidades as $habilidade)
													<option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
												@endforeach
											</select>
											@error('habilidade_id')
											<span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
											@enderror
										</div>
										<div class="form-group form-group-half-half">
											<input id="classificacao" type="number" step="any" class="form-control @error('classificacao') is-invalid @enderror" name="classificacao" min="1" max="100" placeholder="(0 - 100)" value="{{ old('classificacao') }}" required autocomplete="classificacao" placeholder="Preço Habitual">
											@error('classificacao')
											<span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
											@enderror
											<input id="user_id" type="hidden" step="any" class="form-control @error('classificacao') is-invalid @enderror" name="user_id" min="1" max="100" placeholder="(0 - 100)" value="{{Auth::user()->id}}" required autocomplete="user_id" placeholder="Preço Habitual">
											@error('user_id')
											<span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
											@enderror
										</div>


									<div class="form-group">
											<button type="submit" class="wt-btn">
													{{ __('Cadastrar') }}
											</button>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					<div class="wt-registerformfooter">
						<span>Already Have an Account? <a href="javascript:void(0);">Login Now</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
		
