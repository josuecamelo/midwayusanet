@extends('admin.main')

@section('main')

	@include('admin.trainings.categories._nav')

	{!! Form::open(['route'=>'treinos.categorias.gravar']) !!}

	@include('admin.trainings.categories._form')

	{!! Form::close() !!}

@endsection