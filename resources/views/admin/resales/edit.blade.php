@extends('admin.main')

@section('css')
    <style>
        #jMap{
            display: block;
            width: 100%;
            height: 500px;
            margin-top: 20px;
        }
    </style>
@endsection

@section('main')

	@include('admin.stores._nav')

	{!! Form::model($store, ['route'=> ['lojas.atualizar', $store->id]]) !!}

	@include('admin.stores._form')

	{!! Form::close() !!}

@endsection

@section('js')
    @include('.admin.stores._js')
@endsection