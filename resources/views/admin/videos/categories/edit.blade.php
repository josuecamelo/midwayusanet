@extends('admin.main')

@section('main')

	@include('admin.videos.categories._nav')

	{!! Form::model($category,['route'=> ['videos.categorias.atualizar', $category->id]]) !!}

	@include('admin.videos.categories._form')

	{!! Form::close() !!}

@endsection