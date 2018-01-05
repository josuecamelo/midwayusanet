@extends('admin.main')

@section('main')
    @include('admin.blog.categories._nav')
    {!! Form::model($category,['route'=> ['categories.update', $category->id]]) !!}
    {{ method_field('PUT') }}
    @include('admin.blog.categories._form')

    {!! Form::close() !!}

@endsection
