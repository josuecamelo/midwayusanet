@extends('admin.main')

@include('admin.trainings._css')

@section('main')

    @include('admin.trainings._nav')

    {!! Form::open(['route'=>'treinos.gravar']) !!}

    <div id="visivel">
        <span>Visibilidade</span>
        <label class="i-switch m-t-xs m-r">
            {!! Form::checkbox('visibility', null, true, ['class'=>'form-control']) !!}
            <i></i>
        </label>
    </div>

    @include('admin.trainings._form')

    {!! Form::close() !!}

@endsection