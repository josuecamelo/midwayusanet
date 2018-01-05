@extends('admin.main')

@section('main')
    @include('admin.blog.categories._nav')

	{!! Form::open(['route'=>'categories.store']) !!}

	@include('admin.blog.categories._form')

	{!! Form::close() !!}

@endsection