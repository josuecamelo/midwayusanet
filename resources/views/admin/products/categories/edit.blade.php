@extends('admin.main')

@section('main')

	@include('admin.products.categories._nav')

	{!! Form::model($category,['route'=> ['categorias.atualizar', $category->id]]) !!}

	@include('admin.products.categories._form')

	{!! Form::close() !!}

@endsection