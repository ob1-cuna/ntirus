@extends('layouts.app_paginas_gerais')
@section('meu_css')
	<style>

	</style>
@endsection
@section('content')
	<div class="conteudo">
		<div class="col-xl-4 col-lg-4 col-sm-5 col-md-5 centro-horizontal mb-2">
			<div class="titulo_pagina">Dados da Conta</div>
			<ul class="forms-wizard nav nav-tabs">
				<li class="nav-item active">
					<a href="#" class="nav-link">
						<em>1</em>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<em>2</em>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<em>3</em>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<em>4</em>
					</a>
				</li>
			</ul>
		</div>
		<div class="col-xl-8 col-lg-8 col-sm-12 col-md-10 centro-horizontal mb-2">

			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="mt-3"></div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="name" class="">Nome Completo <span class="text-danger">*</span></label>
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="João Júnior">
							@error('name')
							<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="email" class="">Email <span class="text-danger">*</span></label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="exemplo@ntirus.com">
							@error('email')
							<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
							@enderror
						</div>
					</div>
				</div>
				<div class="position-relative form-group">
					<label for="password" class="">Senha <span class="text-danger">*</span></label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
					@error('password')
					<span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
					@enderror
				</div>
				<div class="position-relative form-group mt-3">
					<label for="password-confirm" class="">Confirmar senha <span class="text-danger">*</span></label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="•••••••">
				</div>
				<div class="form-row mt-3">
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="d_nascimento" class="">Data de Nascimento <span class="text-danger">*</span></label>
							<input id="d_nascimento" type="date" class="form-control @error('d_nascimento') is-invalid @enderror" name="d_nascimento" value="{{ old('d_nascimento') }}" required autocomplete="d_nascimento" placeholder="mm/dd/aaaa">

							@error('d_nascimento')
							<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="is_permission" class="">Cadastrar como <span class="text-danger">*</span></label>
							<select id="is_permission" class="form-control @error('is_permission') is-invalid @enderror" name="is_permission" value="{{ old('is_permission') }}" required autocomplete="is_permission">
								<option value="0">FREELANCER</option>
								<option value="1">CLIENTE</option>
							</select>
							@error('is_permission')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="mt-3 mb-2 position-relative form-check">
					<input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
					<label for="exampleCheck" class="form-check-label">
						Concordo com os <a href="" class="text-primary">Termos e Condições</a>.
					</label>
				</div>
				<h6 class="mb-0">Já tem uma conta? <a href="{{ route('login') }}" class="text-primary">Faça Login</a> | <a href="{{ route('password.request') }}" class="text-primary">Recupere a Senha</a></h6>



				<div class="ml-auto float-right mt-4 mb-5">
					<button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type="submit">Prosseguir</button>
				</div>
			</form>
		</div>
	</div>
@endsection
