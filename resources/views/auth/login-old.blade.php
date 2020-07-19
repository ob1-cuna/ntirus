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
								<p>Faça o login</p>
							</div>
						</div>
						<div class="wt-joinforms">
							<form method="POST" action="{{ route('login') }}" class="wt-formtheme wt-loginform do-login-form">
								@csrf
								<fieldset class="wt-registerformgroup">
									<div class="form-group">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
									<div class="form-group">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
									</div>
									
										<div class="wt-logininfo">
											<button type="submit" class="wt-btn">
													{{ __('Entrar') }}
											</button>
											<span class="wt-checkbox">
												<input id="wt-login" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
												<label for="wt-login">Lembrar</label>
											</span>
										</div>							
									
								</fieldset>
							</form>
						</div>
					</div>
					<div class="wt-registerformfooter">
						<span>Não tens uma conta? <a href="{{ route('register') }}">{{ __('Cadastre-se') }} </a> | Esquece-se da senha? <a href="{{ route('password.request') }}">{{ __('Recupere') }}</a></a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
		
