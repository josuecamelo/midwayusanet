@extends('admin.main')

@section('css')
	@include('admin.products._css')
@endsection

@section('main')

	@include('admin.products._nav')

	{!! Form::model($product,['route'=> ['produtos.atualizar',$product->id], 'files'=>true]) !!}

	<div id="coming-soon">
		<span>Coming Soon</span>
		<label class="i-switch m-t-xs m-r">
			@if(isset($product) && $product->coming_soon == 1)
				{!! Form::checkbox('coming_soon', null , true) !!}
			@else
				{!! Form::checkbox('coming_soon', null , false) !!}
			@endif
			<i></i>
		</label>
	</div>

	<div id="out-of-stock">
		<span>Out Of Stock</span>
		<label class="i-switch m-t-xs m-r">
			@if(isset($product) && $product->out_of_stock == 1)
				{!! Form::checkbox('out_of_stock', null , true) !!}
			@else
				{!! Form::checkbox('out_of_stock', null , false) !!}
			@endif
			<i></i>
		</label>
	</div>

	<div id="visivel">
		<span>Visibility</span>
		<label class="i-switch m-t-xs m-r">
			@if(isset($product) && $product->visibility == 1)
				{!! Form::checkbox('visibility', null , true) !!}
			@else
				{!! Form::checkbox('visibility', null , false) !!}
			@endif
			<i></i>
		</label>
	</div>

	<div class="container-fluid">
		@include("admin.products._form")
	</div>
	{!! Form::close() !!}

	<div class="modal fade" id="modal-video" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="titulo">Video</h4>
				</div>
				<div class="modal-body">
					<p class="text-center">
						<iframe width="854" height="480" src="" frameborder="0" id="video-modal" allowfullscreen></iframe>
					</p>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
	@include('.admin.products._js')
@endsection