@extends('admin.main')

@section('css')
	<style>
		img {
			transition: all 0.3s ease;
			width: 40px;
			height: 40px;
		}

		tr:hover img {
			transform: scale(3);
		}
	</style>
@endsection

@section('main')

	@include('admin.icons._nav')

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th>Name</th>
				<th>Icon</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
			@foreach($icons as $icon)
				<tr>
					<td>{{ $icon->name }}</td>
					<td>
						<figure>
							<img src="{{ asset('uploads/icons') . '/' . $icon->url }}" alt="">
						</figure>
					</td>
					<td><a href="{{ route('icons.editar', ['id'=> $icon->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
					<td><a href="{{ route('icons.remover', ['id'=> $icon->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{--{!! $icons->render() !!}--}}
	</div>

@endsection