@extends('admin.main')

@section('main')

	@include('admin.videos.categories._nav')

	@if(count($categories))
		<div class="container-fluid">
			<table class="table table-striped table-responsive table-hover">
				<thead>
				<tr>
					<th>Category</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->name }}</td>
						<td><a href="{{ route('videos.categorias.editar', ['id'=> $category->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
						<td><a href="{{ route('videos.categorias.remover', ['id'=> $category->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{!! $categories->render() !!}
		</div>
	@else
		<p class="text-center">No items added.</p>
	@endif

@endsection