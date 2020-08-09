<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template">
    <meta name="msapplication-tap-highlight" content="no">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ajustes.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse-login mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                            </h4>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}" class="" id="formulario-de-login">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="email" style="display: none">Email</label>
														<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
															@error('email')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													</div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="password" style="display: none;">Password</label>
														<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
															@error('password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													</div>
                                                </div>
                                            </div>
                                            <div class="position-relative form-check">
												<input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
													<label for="remember" class="form-check-label">
														{{ __('Manter-me logado') }}
													</label>
											</div>
                                        </form>
                                        <div class="divider"></div>
                                        <h6 class="mb-0">Não tem uma conta? <a href="#" class="text-primary">Cadastre-se</a></h6>
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-left"><a href="{{ route('password.request') }}" class="btn-lg btn btn-link">Recuperar senha</a></div>
                                        <div class="float-right">

                                            <a href="{{ route('login') }}" onclick="event.preventDefault();
                                                document.getElementById('formulario-de-login').submit();" class="btn btn-primary btn-lg">
                                                <span>{{ __('Entrar') }}</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Mensagem</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
