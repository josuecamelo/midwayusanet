@extends('admin.main')

@section('main')

	@include('admin.icons._nav')

	{!! Form::open(['route'=>'icons.gravar', 'files'=>true]) !!}

	@include('admin.icons._form')

	{!! Form::close() !!}

@endsection

@section('js')
	@include('.admin.icons._js')
@endsection