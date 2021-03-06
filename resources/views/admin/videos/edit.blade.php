@extends('admin.main')

@include('admin.videos._css')

@section('main')

	@include('admin.videos._nav')

	{!! Form::model($training,['route'=> ['videos.atualizar',$training->id]]) !!}

	<div id="visivel">
		<span>Visibility</span>
		<label class="i-switch m-t-xs m-r">
			{!! Form::checkbox('visibility', null, ['class'=>'form-control', $checked]) !!}
			<i></i>
		</label>
	</div>

	@include('admin.videos._form')

	{!! Form::close() !!}

@endsection