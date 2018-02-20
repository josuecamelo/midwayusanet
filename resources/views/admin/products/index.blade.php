@extends('admin.main')

@section('css')
	<style>
		.color
		{
			border-radius: 3px;
			color: #fff;
			padding: 1px 3px;
		}
	</style>
@endsection

@section('main')

	@include('admin.products._nav')

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th>Name</th>
				{{--<th>Objetivo</th>--}}
				{{--<th>Categoria</th>--}}
				<th>Modification Date</th>
				<th>View</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
			@foreach($products as $product)
				<tr>
					<td>{{ $product->name . ' ' . $product->presentation }} @if(!empty($product->flavor)) <span class="color" style="background-color: {{ $product->flavor->color }}">{{ $product->flavor->name }}</span>@endif</td>
					{{--<td>Goal</td>--}}
					{{--<td>Line</td>--}}
					<td>{{ $product->update_date  }}</td>
					<td>
						<a href="{{ $product->url_visualizacao  }}" class="btn btn-xs btn-info" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
					</td>
					<td><a href="{{ route('produtos.editar', $product->id)  }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
					<td><a href="{{ route('produtos.remover', ['id'=> $product->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>

		{!! $products->render() !!}
	</div>
@endsection