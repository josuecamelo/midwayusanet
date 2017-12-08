@extends('admin.main')

@section('main')

	@include('admin.products.lines._nav')

	{!! Form::model($line,['route'=> ['linhas.atualizar',$line->id], 'files'=>true]) !!}
	<div class="container-fluid">
		<div class="row">

			@include("admin.products.lines._form")

		</div>
	</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$(function () {
			uploadImg();
		});
	</script>
@endsection