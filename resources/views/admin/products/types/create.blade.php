@extends('admin.main')

@section('main')

	@include('admin.products.types._nav')

	{!! Form::open(['route'=>'tipos.gravar']) !!}

	@include('admin.products.types._form')

	{!! Form::close() !!}

@endsection