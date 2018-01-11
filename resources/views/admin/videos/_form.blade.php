<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="titulo">Title *</label>
				{!! Form::text('title', null, ['class'=>'form-control', 'id'=>'titulo', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="categoria">Category</label>
				{{--{!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'id'=>'categoria']) !!}--}}
				<select name="category_id" id="categoria" class="form-control">
					@if(isset($video))
						@foreach($categories as $category0)
							@if($category0->childCategories()->count() > 0)
								<option {{ ($video->category_id == $category0->id) ? 'selected' : null }} value = "{{  $category0->id }}">{{$category0->name}}</option>
								@foreach($category0->childCategories()->get() as $childCategory)
									@if($childCategory->id != $category->id)
										<option {{ ($video->category_id == $childCategory->id) ? 'selected' : null }} value = "{{ $childCategory->id }}">-{{$childCategory->name}}</option>
									@endif
								@endforeach
							@else
								<option {{ ($video->category_id == $category0->id) ? 'selected' : null }} value = "{{  $category0->id }}">{{$category0->name}}</option>
							@endif
						@endforeach
					@else
						@foreach($categories as $category0)
							@if($category0->childCategories()->count() > 0)
								<option value = "{{  $category0->id }}">{{$category0->name}}</option>
								@foreach($category0->childCategories()->get() as $childCategory)
									<option value = "{{ $childCategory->id }}">-{{$childCategory->name}}</option>
								@endforeach
							@else
								<option value = "{{  $category0->id }}">{{$category0->name}}</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="video">Video *
					<small>(Youtube video link)</small>
				</label>
				{!! Form::text('video', null, ['class'=>'form-control', 'id'=>'video', 'required']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label>
				<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="descricao">Description</label>
				{!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'descricao']) !!}
			</div>
		</div>
	</div>
</div>
<p class="text-center">
	<small>* Required field.</small>
</p>