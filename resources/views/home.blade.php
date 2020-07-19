@extends('layouts.appv3')

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
							
							<a href="{{ route('admin.dashboard') }}" class="wt-btn">Admin</a>
							<a href="{{ route('dashboard') }}" class="wt-btn">Freelancer</a>
							<a href="{{ route('cliente.dashboard') }}" class="wt-btn">Cliente</a>
							
						</div>
						</div>
					</div>
				</div>
			</div>
@endsection
		
