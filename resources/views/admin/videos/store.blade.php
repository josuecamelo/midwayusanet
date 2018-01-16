@extends('admin.main')

@section('main')

	<div class="bg-light lter b-b wrapper-md hidden-print">
		<h1 class="m-n font-thin h3"><i class="fa fa-cogs" aria-hidden="true"></i> Todos os videos</h1>
	</div>

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th>Título</th>
				<th>Descrição</th>
				<th>Categoria</th>
				<th>Visualizar</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="titulo">Título</td>
				<td>Descrição</td>
				<td>Categoria</td>
				<td><a href="#" class="btn btn-xs btn-info bt-visualizar" data-video="https://youtu.be/8l7UvzPN3AA" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</a></td>
				<td><a href="#" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
				<td><a href="#" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
			</tr>
			<tr>
				<td class="titulo">Título</td>
				<td>Descrição</td>
				<td>Categoria</td>
				<td><a href="#" class="btn btn-xs btn-info bt-visualizar" data-video="https://youtu.be/aqe0ZRNAUp8" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</a></td>
				<td><a href="#" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
				<td><a href="#" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
			</tr>
			<tr>
				<td class="titulo">Título</td>
				<td>Descrição</td>
				<td>Categoria</td>
				<td><a href="#" class="btn btn-xs btn-info bt-visualizar" data-video="https://youtu.be/2GbkboyNDzE" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</a></td>
				<td><a href="#" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
				<td><a href="#" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
			</tr>
			</tbody>
		</table>
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
						<iframe width="854" height="480" src="" frameborder="0" id="video" allowfullscreen></iframe>
					</p>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
	<script>
		$(function () {

			$('.bt-visualizar').on('click', function () {

				let titulo = $(this).parent().siblings('.titulo').text();
				let url = $(this).data('video');
				let video = 'https://www.youtube.com/embed/' + url.replace('https://youtu.be/', '') + '?autoplay=1';

				$('#titulo').html(titulo);
				$('#video').attr('src', video);
			});

			$('#modal-video').on('hide.bs.modal', function (event) {
				$('#video').attr('src', '');
			});
		});
	</script>
@endsection