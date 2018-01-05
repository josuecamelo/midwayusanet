@extends('admin.main')

@section('main')
    @if($post->category->type == 1)
        @include('admin.blog.posts._nav_news')
    @else
        @include('admin.blog.posts._nav_science')
    @endif

    {!! Form::model($post,['route'=> ['posts.update', $post->id]]) !!}
    {{ method_field('PUT') }}
    @include('admin.blog.posts._form')

    {!! Form::close() !!}

@endsection
