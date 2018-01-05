<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="title">titulo *</label>
				{!! Form::text('title', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="blog_category_id">Categoria *</label>
				{!! Form::select('blog_category_id', $categories,null, ['class'=>'form-control','required']) !!}
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="name">Descrição *</label>
				{!! Form::text('description', null, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="name">Tags *</label>
				{!! Form::text('tags', null, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="image">Image *</label>
				<input class="form-control" type="file" name="file" accept="image/jpg,image/jpeg,image/png" onchange="readURL(this)" data-browse-class='btn btn-default'>
			</div>
		</div>
		<div class="col-sm-4">
			@if(isset($post->image))
				<img id="thumb" class="img-fluid" src="{{asset($post->image)}}" />
			@else
				<img id="thumb" class="img-fluid" src="{{asset('img/no-image.jpg')}}" />
			@endif
		</div>
		<div class="col-md-12">
			<div class="form-group">
				{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label>
				<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
			</div>
		</div>
	</div>
</div>