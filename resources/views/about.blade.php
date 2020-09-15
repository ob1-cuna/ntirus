@extends('layouts.app_paginas_gerais')

@section('content')
			@foreach($valores as $valor)
				{{ $valor->nome }}
			@endforeach
@endsection
		
