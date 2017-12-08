@extends('admin.main')

@section('main')

	@include('admin.products.flavors._nav')

	{!! Form::model($flavor,['route'=> ['sabores.atualizar', $flavor->id]]) !!}

	@include('admin.products.flavors._form')

	{!! Form::close() !!}

@endsection