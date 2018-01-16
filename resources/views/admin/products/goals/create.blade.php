@extends('admin.main')

@section('main')

	@include('admin.products.goals._nav')

	{!! Form::open(['route'=>'objetivos.gravar','files'=>true]) !!}
	<div class="container-fluid">

		<div class="row">

			@include("admin.products.goals._form")

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