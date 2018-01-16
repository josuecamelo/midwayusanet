@extends('admin.main')

@section('css')
	<style>
		.miniatura {
			width: 25px;
			height: 25px;
			border-radius: 100%;
			margin-right: 15px;
			transition: all 0.3s;
		}
		.miniatura:hover {
			transform: scale(2);
		}
	</style>
@endsection

@section('main')

	@include('admin.athletes._nav')

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
			@foreach($athletes as $athlete)
				<tr>
					<td><img src="{{ url('/') }}/uploads/athletes/{{ $athlete->id }}/{{ $athlete->thumbnail }}" alt="" class="miniatura">{{ $athlete->name . ' ' . $athlete->last_name }}</td>
					<td><a href="{{ route('atletas.editar', ['id'=> $athlete->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
					<td><a href="{{ route('atletas.remover', ['id'=> $athlete->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

@endsection