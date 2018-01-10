@extends('admin.main')

@section('main')

	@include('admin.products.types._nav')

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
			@foreach($types as $type)
				<tr>
					<td>{{ $type->name  }}</td>
					<td><a href="{{ route('tipos.editar', ['id'=> $type->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
					<td><a href="{{ route('tipos.remover', ['id'=> $type->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! $types->render() !!}
	</div>

@endsection