@extends('admin.main')

@section('main')

	@include('admin.videos.categories._nav')

	{!! Form::open(['route'=>'videos.categorias.gravar']) !!}

	@include('admin.videos.categories._form')

	{!! Form::close() !!}

@endsection