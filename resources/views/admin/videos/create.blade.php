@extends('admin.main')

@include('admin.videos._css')

@section('main')

    @include('admin.videos._nav')

    {!! Form::open(['route'=>'videos.gravar']) !!}

    <div id="visivel">
        <span>Visibilidade</span>
        <label class="i-switch m-t-xs m-r">
            {!! Form::checkbox('visibility', null, true, ['class'=>'form-control']) !!}
            <i></i>
        </label>
    </div>

    @include('admin.videos._form')

    {!! Form::close() !!}

@endsection