@extends('admin.main')

@section('main')

	@include('admin.products.flavors._nav')

	{!! Form::open(['route'=>'sabores.gravar']) !!}

	@include('admin.products.flavors._form')

	{!! Form::close() !!}

@endsection