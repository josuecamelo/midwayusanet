@extends('admin.main')

@section('main')
    @if($t == 1)
        @include('admin.blog.posts._nav_news')
    @else
        @include('admin.blog.posts._nav_science')
    @endif

	{!! Form::open(['route'=>'posts.store']) !!}

	@include('admin.blog.posts._form')

	{!! Form::close() !!}

@endsection