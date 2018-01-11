<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label for="name">Name *</label>
				{!! Form::text('name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="parent_category_id">Parent Category</label>
				{{--{!! Form::select('parent_category_id', $categories, empty($category) ? null : $category->parent_category_id, ['class'=>'form-control']) !!}--}}
				<select name="parent_category_id" class="form-control">
					@if(isset($category))
						@foreach($categories as $category0)
							@if($category0->childCategories()->count() > 0)
								<option {{ ($category->parent_category_id == $category0->id) ? 'selected' : null }} value = "{{  $category0->id }}">{{$category0->name}}</option>
								@foreach($category0->childCategories()->get() as $childCategory)
									@if($childCategory->id != $category->id)
										<option {{ ($category->parent_category_id == $childCategory->id) ? 'selected' : null }} value = "{{ $childCategory->id }}">-{{$childCategory->name}}</option>
									@endif
								@endforeach
							@else
								<option {{ ($category->parent_category_id == $category0->id) ? 'selected' : null }} value = "{{  $category0->id }}">{{$category0->name}}</option>
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
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label>
				<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
			</div>
		</div>
	</div>
</div>
<p class="text-center">
	<small>* Required field.</small>
</p>