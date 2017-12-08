@extends('admin.main')

@section('main')

	@include('admin.products.types._nav')

	{!! Form::model($type,['route'=> ['tipos.atualizar',$type->id]]) !!}

	@include('admin.products.types._form')

	{!! Form::close() !!}

@endsection