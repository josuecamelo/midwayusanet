<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<label for="title">Title *</label>
						{!! Form::text('title', null, ['id'=>'title', 'class'=>'form-control', 'autofocus', 'required']) !!}
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="title">Date *</label>
						{!! Form::text('date', isset($post->date)?null:date('d-m-Y'), ['class'=>'form-control datapick', 'autofocus', 'required']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						{!! Form::textarea('content', null, ['id'=>'content', 'class'=>'form-control']) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="blog_category_id">Category *</label>
						{!! Form::select('blog_category_id', $categories,null, ['id'=>'blog_category_id', 'class'=>'form-control','required']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="description">Description</label>
						{!! Form::text('description', null, ['id'=>'description', 'class'=>'form-control']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="tags">Tags *</label>
						{!! Form::text('tags', null, ['id'=>'tags', 'class'=>'form-control', 'required']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="image">Image *</label>
						@if(isset($post->image))
							<input type="file" id="image23" class="upload-img" data-url="{{ asset($post->show_image) }}" data-responsive="true" name="file" accept="image/jpg,image/jpeg,image/png" onchange="readURL(this)" data-browse-class='btn btn-default'>
						@else
							<input type="file" id="image" class="upload-img" data-responsive="true" name="file" accept="image/jpg,image/jpeg,image/png" onchange="readURL(this)" data-browse-class='btn btn-default'>
						@endif
					</div>
				</div>
			</div>
			<br>
			<p class="text-center">
				<small>* Required field.</small>
			</p>
			<br>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
</div>