@extends('admin.main')
@section('css')
    <style>
        #visivel
        {
            position: absolute;
            top: 62px;
            right: 15px;
        }

        #visivel label
        {
            margin-top: 3px;
        }

        #visivel span
        {
            margin-right: 5px;
        }

        .i-switch
        {
            margin: -4px 0;
        }

    </style>
@endsection
@section('main')
    @if($post->category->type == 1)
        @include('admin.blog.posts._nav_news')
    @else
        @include('admin.blog.posts._nav_science')
    @endif

    {!! Form::model($post,['route'=> ['posts.update', $post->id],'method'=> 'post','enctype' => 'multipart/form-data']) !!}
    {{ method_field('PUT') }}
    <div id="visivel">
        <span>Visibility</span>
        <label class="i-switch m-t-xs m-r">
            @if(isset($post) && $post->visibility == 1)
                {!! Form::checkbox('visibility', null , true) !!}
            @else
                {!! Form::checkbox('visibility', null , false) !!}
            @endif
            <i></i>
        </label>
    </div>
    <div class="container-fluid">
        @include('admin.blog.posts._form')
    </div>
    {!! Form::close() !!}
@endsection
@section('js')
    @include('admin.blog.posts._tinymce')
@endsection
