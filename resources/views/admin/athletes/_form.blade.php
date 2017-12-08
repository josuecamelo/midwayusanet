<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nome *</label>
						{!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'autofocus', 'required']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last_name">Sobrenome *</label>
						{!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name', 'required']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="profession">Profissão</label>
						{!! Form::text('profession', null, ['class'=>'form-control', 'id'=>'profession']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="about">Sobre</label>
						{!! Form::textarea('about', null, ['class'=>'form-control textarea', 'id'=>'about']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="bio">Bio</label>
						{!! Form::textarea('bio', null, ['class'=>'form-control textarea', 'id'=>'bio']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="age">Idade</label>
						{!! Form::text('age', null, ['class'=>'form-control', 'id'=>'age']) !!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="weight">Peso</label>
						{!! Form::text('weight', null, ['class'=>'form-control', 'id'=>'weight']) !!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="height">Altura</label>
						{!! Form::text('height', null, ['class'=>'form-control', 'id'=>'height']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label>Galeria de Imagens</label>
					<input type="file" name="images[]" class="form-control upload-img-gallery" multiple>
					<input type="hidden" name="images_for_delete" id="images_for_delete">
					<input type="hidden" name="images_order" id="images_order">
					@if(isset($images))
						<div id="galeria-imagens">
							@foreach($images as $image)
								<figure data-id="{{ $image->id }}" class="figura">
									<button type="button" class="btn btn-danger btn-xs bt-delete-img-galeria" data-id="{{ $image->id }}"><i class="fa fa-times"></i></button>
									<img src="{{ asset('/uploads/athletes') . '/' . $athlete->id . '/' . $image->url }}" alt="">
								</figure>
							@endforeach
						</div>
					@endif
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<label>Galeria de vídeos</label>
					<div class="row">
						<div class="col-md-6">
							<label>Título</label>
						</div>
						<div class="col-md-3">
							<label>Vídeo</label>
						</div>
					</div>
					<input type="hidden" name="videos_for_delete" id="videos_for_delete">
					<div id="videos">
						@if(isset($videos))
							@foreach($videos as $video)
								<div class="v">
									<div class="row">
										<div class="col-md-6">
											<input type="text" name="video_title[{{ $video->id }}]" class="form-control titulo" value="{{ $video->title }}">
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-youtube"></i></span>
												<input type="text" name="video_url[{{ $video->id }}]" class="form-control video" value="{{ $video->url }}">
											</div>
										</div>
										<div class="col-md-2">
											<button type="button" class="btn btn-info btn-block bt-modal-video disabled" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button>
										</div>
										<button type="button" class="btn btn-danger btn-xs bt-delete-video-galeria" data-id="{{ $video->id }}"><i class="fa fa-times"></i></button>
									</div>
								</div>
							@endforeach
						@else
							<div class="v">
								<div class="row">
									<div class="col-md-6">
										<input type="text" name="video_title[-1]" class="form-control titulo">
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-youtube"></i></span>
											<input type="text" name="video_url[-1]" class="form-control video">
										</div>
									</div>
									<div class="col-md-2">
										<button type="button" class="btn btn-info btn-block bt-modal-video disabled" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button>
									</div>
									<button type="button" class="btn btn-danger btn-xs bt-delete-video-galeria"><i class="fa fa-times"></i></button>
								</div>
							</div>
						@endif
					</div>
					<button type="button" class="btn btn-primary btn-xs pull-right" id="bt-add-video"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar vídeo</button>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>&nbsp;</label>
						<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="photo">Foto</label>
						<input type="file" name="_photo" id="photo" class="form-control upload-img" data-responsive="true" data-url="{{ empty($athlete->photo) ? '' : asset('/uploads/athletes') . '/' . $athlete->id . '/' . $athlete->photo }}">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="banner">Banner</label>
						<input type="file" name="_banner" id="banner" class="form-control upload-img" data-responsive="true" data-url="{{ empty($athlete->banner) ? '' : asset('/uploads/athletes') . '/' . $athlete->id . '/' . $athlete->banner }}">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="thumbnail">Miniatura</label>
						<input type="file" name="_thumbnail" id="thumbnail" class="form-control upload-img" data-responsive="true" data-url="{{ empty($athlete->thumbnail) ? '' : asset('/uploads/athletes') . '/' . $athlete->id . '/' . $athlete->thumbnail }}">
					</div>
				</div>
			</div>
			<div class="row redes-sociais">
				<div class="col-md-12">
					<label>Redes sociais</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
						{!! Form::text('facebook', null, ['class'=>'form-control', 'placeholder'=>'Facebook']) !!}
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
						{!! Form::text('twitter', null, ['class'=>'form-control', 'placeholder'=>'Twitter']) !!}
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-instagram" aria-hidden="true"></i></span>
						{!! Form::text('instagram', null, ['class'=>'form-control', 'placeholder'=>'Instagram']) !!}
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-youtube" aria-hidden="true"></i></span>
						{!! Form::text('youtube', null, ['class'=>'form-control', 'placeholder'=>'Youtube']) !!}
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-snapchat" aria-hidden="true"></i></span>
						{!! Form::text('snapchat', null, ['class'=>'form-control', 'placeholder'=>'Snapchat']) !!}
					</div>
				</div>
			</div>
			<div id="produtos-usados">
				<label>Produtos consumidos pelo atleta</label>
				{!! Form::select('products[]', $produtos, empty($products) ? null : $products, ['class'=>'form-control produtos-usados', 'multiple']) !!}
			</div>
		</div>
	</div>
</div>