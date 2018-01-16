@extends('admin.main')

@section('main')

	@include('admin.blog.categories._nav')

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th width="10">#</th>
				<th>Name</th>
				<th>Type</th>
				<th>User</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id  }}</td>
					<td>{{ $category->name  }}</td>
					<td>{{ $types[$category->type]  }}</td>
					<td>{{ $category->user->name  }}</td>
					<td><a href="{{ route('categories.edit', ['id'=> $category->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
					<td><a href="{{ route('categories.destroy', ['id'=> $category->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! $categories->render() !!}
	</div>

@endsection