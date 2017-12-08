@extends('admin.main')

@include('admin.trainings._css')

@section('main')

	@include('admin.trainings._nav')

	{!! Form::model($training,['route'=> ['treinos.atualizar',$training->id]]) !!}

	<div id="visivel">
		<span>Visibilidade</span>
		<label class="i-switch m-t-xs m-r">
			{!! Form::checkbox('visibility', null, ['class'=>'form-control', $checked]) !!}
			<i></i>
		</label>
	</div>

	@include('admin.trainings._form')

	{!! Form::close() !!}

@endsection