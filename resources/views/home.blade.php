@extends('layouts.app_paginas_gerais')

@section('content')
			<div class="wt-haslayout wt-innerbannerholder">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
							<div class="wt-innerbannercontent">
							@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
							@endif
							@if (session('error'))
							<div class="alert alert-danger" role="alert">
								{{ session('error') }}
							</div>
							@endif

						@auth
							@if(checkPermission(['freelancer']))
								<div class="wt-title"><h2>Freelancer</h2></div>
							@endif

							@if(checkPermission(['admin']))
								<div class="wt-title"><h2>Admin</h2></div>
							@endif

							@if(checkPermission(['cliente']))
								<div class="wt-title"><h2>Cliente</h2></div>
							@endif
						@endauth

						@guest
							<div class="wt-title"><h2>Usuario Sem Cadastro</h2></div>
						@endguest
							{{ tamanhoParaHumanos (1569626690) }}

							<a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Admin</a>
							<a href="{{ route('dashboard') }}" class="btn btn-primary">Freelancer</a>
							<a href="{{ route('cliente.dashboard') }}" class="btn btn-primary">Cliente</a>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();" class="btn btn-primary">

									Logout
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
						</div>
						</div>
					</div>
				</div>
			</div>
@endsection

