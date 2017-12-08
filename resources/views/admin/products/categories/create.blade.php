@extends('admin.main')

@section('main')

	@include('admin.products.categories._nav')

	{!! Form::open(['route'=>'categorias.gravar']) !!}

	@include('admin.products.categories._form')

	{!! Form::close() !!}

@endsection