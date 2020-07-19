@extends('layouts.appv3')

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
							
							<form method="POST" action="{{ route('register') }}" class="wt-formtheme wt-formregister">
								@csrf
								<fieldset class="wt-registerformgroup">
									<div class="form-group form-group-half">
											<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nome">

											@error('name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
									</div>
									<div class="form-group form-group-half">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
									</div>
									<div class="form-group">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
									</div>
									<div class="form-group">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Password">
									</div>
									
									
									<div class="form-group form-group-half">
										<input id="d_nascimento" type="date" class="form-control @error('d_nascimento') is-invalid @enderror" name="d_nascimento" value="{{ old('d_nascimento') }}" required autocomplete="d_nascimento" placeholder="mm/dd/aaaa">

										@error('d_nascimento')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="form-group form-group-half">
										<span class="wt-select">
											<select id="is_permission" class="wt-form-group-dropdown wt-select" class="form-control @error('is_permission') is-invalid @enderror" name="is_permission" value="{{ old('is_permission') }}" required autocomplete="is_permission">
												<option value="0">FREELANCER</option>
												<option value="1">CLIENTE</option>
											</select>
										</span>
										@error('is_permission')
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
		
