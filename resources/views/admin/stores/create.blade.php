@extends('admin.main')

@section('main')

	@include('admin.stores._nav')

	{!! Form::open(['route'=>'lojas.gravar']) !!}

	@include('admin.stores._form')

	{!! Form::close() !!}

@endsection

@section('js')
    @include('.admin.stores._js')
@endsection