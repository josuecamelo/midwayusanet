@extends('admin.main')

@section('main')

	@include('admin.videos._nav')

	@if(count($videos))
		<div class="container-fluid">
			<table class="table table-striped table-responsive table-hover">
				<thead>
				<tr>
					<th>Title</th>
					<th>Category</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				@foreach($videos as $video)
					<tr>
						<td>{{ $video->title }}</td>
						<td>{{ $video->category->name }}</td>
						<td>
							<button class="btn btn-xs btn-info bt-visualizar" data-video="{{ $video->video }}" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
						</td>
						<td><a href="{{ route('treinos.editar', ['id'=> $video->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
						<td><a href="{{ route('treinos.remover', ['id'=> $video->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{!! $videos->render() !!}
		</div>

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
	@else
		@include('admin.nia')
	@endif

@endsection

@section('js')
	<script>
		$(function () {
			$('.bt-visualizar').on('click', function () {

				let url = $(this).data('video') + '?autoplay=1';

				$('#video-modal').attr('src', url);
			});

			$('#modal-video').on('hide.bs.modal', function (event) {
				$('#video-modal').attr('src', '');
			});

		});
	</script>
@endsection