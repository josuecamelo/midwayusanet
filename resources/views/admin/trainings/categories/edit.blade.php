@extends('admin.main')

@section('main')

	@include('admin.trainings.categories._nav')

	{!! Form::model($category,['route'=> ['treinos.categorias.atualizar', $category->id]]) !!}

	@include('admin.trainings.categories._form')

	{!! Form::close() !!}

@endsection