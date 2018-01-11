@extends('admin.main')

@section('css')
	<style>
		#content {
			height: 500px;
		}
	</style>
@endsection

@section('js')
	@include('admin.blog.posts._tinymce')
@endsection

@section('main')

	@if($t == 1)
		@include('admin.blog.posts._nav_news')
	@else
		@include('admin.blog.posts._nav_science')
	@endif

	{!! Form::open(['route'=>'posts.store','method'=> 'post','enctype' => 'multipart/form-data']) !!}
	@include('admin.blog.posts._form')
	{!! Form::close() !!}

@endsection