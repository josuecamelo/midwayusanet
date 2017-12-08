@extends('admin.main')

@section('main')

	@include('admin.trainings._nav')

	@if(count($trainings))
		<div class="container-fluid">
			<table class="table table-striped table-responsive table-hover">
				<thead>
				<tr>
					<th>Título</th>
					<th>Categoria</th>
					<th>Visualizar</th>
					<th>Editar</th>
					<th>Deletar</th>
				</tr>
				</thead>
				<tbody>
				@foreach($trainings as $training)
					<tr>
						<td>{{ $training->title }}</td>
						<td>{{ $training->category->name }}</td>
						<td>
							<button class="btn btn-xs btn-info bt-visualizar" data-video="{{ $training->video }}" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button>
						</td>
						<td><a href="{{ route('treinos.editar', ['id'=> $training->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
						<td><a href="{{ route('treinos.remover', ['id'=> $training->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{!! $trainings->render() !!}
		</div>

		<div class="modal fade" id="modal-video" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="titulo">Vídeo</h4>
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
		<p class="text-center">Nenhum item cadastrado.</p>
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