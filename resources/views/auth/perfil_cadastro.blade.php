@extends('layouts.app_paginas_gerais')
@section('meu_css')
	<style>
		.ck-editor__editable {
			min-height: 100px;
		}
	</style>
@endsection
@section('content')
	<div class="conteudo">
		<div class="col-xl-4 col-lg-4 col-sm-5 col-md-5 centro-horizontal mb-2">
			<div class="titulo_pagina">Localização & Habilidades</div>
			<ul class="forms-wizard nav nav-tabs">
				<li class="nav-item done">
					<a href="#" class="nav-link">
						<em>1</em>
					</a>
				</li>
				<li class="nav-item done">
					<a href="#" class="nav-link">
						<em>2</em>
					</a>
				</li>
				<li class="nav- active">
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

			<form method="POST" action="{{ route('registro.perfil.post') }}">
				@csrf
				<div class="mt-3"></div>
				<div class="form-row mb-2">
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="provincia" class="">Província <span class="text-danger">*</span></label>
							<select name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" value="{{ old('provincia') ?? Auth::user()->perfil->provincia }}" required autocomplete="provincia">
								@switch(Auth::user()->perfil->status)
									@case (0)
										<option disabled selected hidden value="">Selecione a Provincia</option>
									@break

									@case (2)
										<option disabled selected hidden value="{{ Auth::user()->perfil->provincia }}">{{ Auth::user()->perfil->provincia }}</option>
									@break

									@default
										<h2 class="centro-horizontal mt-5">MISTAKE</h2>
								@endswitch
								@include('layouts.includes.select_provincias')
							</select>
							@error('provincia')
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="cidade" class="">Cidade / Distrito <span class="text-danger">*</span></label>
							<input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') ?? Auth::user()->perfil->cidade }}" required autocomplete="cidade" placeholder="Beira">
							@error('cidade')
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
							@enderror
						</div>
					</div>
				</div>
				<div class="form-row mb-2">
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="select-habilidades" class="">Habilidades <span class="text-danger">*</span></label>
							<select multiple="multiple" id="select-habilidades" name="habilidade_id[]"  class="multiselect-dropdown form-control @error('select-habilidades') is-invalid @enderror" required>
								@foreach($habilidades as $habilidade)
									<option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
								@endforeach
							</select>
							@error('select-habilidades')
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="position-relative form-group">
							<label for="username" class="">Username <span class="text-danger">*</span></label>
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text">@</span></div>
								<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? Auth::user()->username }}" required placeholder="fulanotal">
							</div>
							@error('username')
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
							@enderror
						</div>
					</div>
				</div>
				<div class="position-relative form-group">
					<label for="descricao" class="">Sobre mim <span class="text-danger">*</span></label>
					<textarea name="descricao" id="descricao" class="form-control ck-editor__editable @error('descricao') is-invalid @enderror">{{ Auth::user()->perfil->descricao }}</textarea>
					@error('descricao')
					<span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
					@enderror
				</div>
				<div class="ml-auto float-right mt-4 mb-5">
					<button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type="submit">Concluir Cadastro</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('meu_script')
	<script src="{{ asset('js/ckeditor5/11.2.0/classic/ckeditor.js') }}"></script>
	<script>
		var editor = null;
		ClassicEditor.create(document.querySelector("#descricao"), {
			toolbar: [
				"bold",
				"italic",
				"link",
				"bulletedList",
				"numberedList",
				"blockQuote",
				"undo",
				"redo"
			]
		})
				.then(editor => {
					//debugger;
					window.editor = editor;
				})
				.catch(error => {
					console.error(error);
				});

	</script>
@endsection