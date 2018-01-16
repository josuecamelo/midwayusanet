@extends('admin.main')

@section('main')

	@include('admin.products.lines._nav')

	{!! Form::open(['route'=>'linhas.gravar','files'=>true]) !!}
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