<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Name *</label>
					{!! Form::text('name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="last_name">Last Name</label>
					{!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="presentation">Presentation</label>
					{!! Form::text('presentation', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="description">Description *</label>
					{!! Form::textarea('description', null, ['class'=>'form-control textarea','required']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="benefits">Benefits</label>
					{!! Form::textarea('benefits', null, ['class'=>'form-control textarea']) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Topics</b></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4"><label>Title</label></div>
							<div class="col-md-5"><label>Text</label></div>
							<div class="col-md-2"><label>Icon</label></div>
							<div class="col-md-1"></div>
						</div>
						<div class="topicos">
							@if(!isset($product))
								<div class="topico">
									<div class="row">
										<div class="col-md-4">
											<input type="text" data-ref="-1" name="topico_titulo[-1]" class="form-control">
										</div>
										<div class="col-md-5">
											<input type="text" data-ref="-1" name="topico_texto[-1]" class="form-control">
										</div>
										<div class="col-md-3">
											<input type="file" data-ref="-1" name="img_topico[-1]" class="upload-img" data-responsive="true">
										</div>
										<button type="button" class="btn btn-danger btn-xs bt-delete-item"><i class="fa fa-times"></i></button>
									</div>
								</div>
							@else
								@if(count($topics) > 0)
									@foreach($topics as $x => $tp)
										<div class="topico">
											<div class="row" data-id_tp="{{ $tp->id }}">
												<div class="col-md-4">
													<input type="text" value="{{ $tp->topic_description }}" name="topico_titulo[{{ $tp->id  }}]" class="form-control">
												</div>
												<div class="col-md-5">
													<input type="text" value="{{ $tp->description }}" name="topico_texto[{{ $tp->id  }}]" class="form-control">
												</div>
												<div class="col-md-3">
													@if(isset($tp->image))
														<input type="file" data-url="{{ asset("/uploads/products/$product->id/topics/$tp->image")  }}" name="img_topico[{{ $tp->id  }}]" class="upload-img" data-responsive="true">
													@else
														<input type="file" name="img_topico[{{ $tp->id  }}]" class="upload-img" data-responsive="true">
													@endif
												</div>
												<button type="button" class="btn btn-danger btn-xs bt-delete-item"><i class="fa fa-times"></i></button>
											</div>
										</div>
									@endforeach
								@else
									<div class="topico">
										<div class="row">
											<div class="col-md-4">
												<input type="text" data-ref="-1" name="topico_titulo[-1]" class="form-control">
											</div>
											<div class="col-md-5">
												<input type="text" data-ref="-1" name="topico_texto[-1]" class="form-control">
											</div>
											<div class="col-md-3">
												<input type="file" data-ref="-1" name="img_topico[-1]" class="upload-img" data-responsive="true">
											</div>
											<button type="button" class="btn btn-danger btn-xs bt-delete-item"><i class="fa fa-times"></i></button>
										</div>
									</div>
								@endif
							@endif
						</div>
						<button type="button" class="btn btn-primary btn-xs bt-add-topic"><i class="fa fa-plus"></i> Add New Topic</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="link-compra-online">Link to online purchase</label>
					{!! Form::text('link_purchase', null, ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="shopify">Shopify</label>
					{!! Form::textarea('shopify', null, ['class'=>'form-control textarea']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="excerpt">Excerpt</label>
					{!! Form::textarea('excerpt', null, ['class'=>'form-control textarea']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10">
				<div class="form-group">
					<label for="video">Video</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
						{!! Form::text('video', null, ['id'=>'video','class'=>'form-control', 'placeholder'=>'URL vídeo Youtube']) !!}
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<label>&nbsp;</label>
				<a href="#" class="btn btn-block btn-info bt-visualizar" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
			</div>
		</div>
		<div class="row" id="sabor">
			<div class="col-md-6">
				<div class="form-group">
					<label for="flavor_id">Flavor</label>
					{!! Form::select('flavor_id', $flavors, isset($product) ? $product->flavor_id : null ,['class'=>'form-control']) !!}
				</div>
			</div>
			{{--<div class="col-md-4">--}}
				{{--<div class="form-group">--}}
					{{--<label for="related_flavors">Sabores Relacionados</label>--}}
					{{--{!! Form::select('related_flavors[]', $flavorsList, empty($relatedFlavorsList) ? null : $relatedFlavorsList,['class'=>'form-control sabores-relacionados', 'multiple']) !!}--}}
				{{--</div>--}}
			{{--</div>--}}
			<div class="col-md-6">
				<div class="form-group">
					<label for="related_flavors">Related Products</label>
					{!! Form::select('related_products[]', $products, empty($relatedProductsList) ? null : $relatedProductsList,['class'=>'form-control sabores-relacionados', 'multiple']) !!}
				</div>
			</div>
		</div>
		<div class="row" id="informacao-nutricional">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Nutritional information</b></div>
					<div class="panel-body">
						<div class="form-group">
							<label for="portion">Serving Size</label>
							{!! Form::text('serving_size', null, ['class'=>'form-control']) !!}
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Nutrient</label>
							</div>
							<div class="col-md-3">
								<label>Amount</label>
							</div>
							<div class="col-md-3">
								<label>%DV</label>
							</div>
						</div>
						<div class="nutrientes">
							<div class="row">
								<div class="col-md-6">{!! Form::textarea('nutrients', null, ['class'=>'form-control tarea']) !!}</div>
								<div class="col-md-3">{!! Form::textarea('nutrient_qty', null, ['class'=>'form-control tarea']) !!}</div>
								<div class="col-md-3">{!! Form::textarea('nutrient_vd', null, ['class'=>'form-control tarea']) !!}</div>
							</div>
						</div>

						<div class="form-group">
							<label for="complement">Complement</label>
							{!! Form::textarea('complement', null, ['class'=>'form-control textarea']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="tags">Tags</label>
					{!! Form::text('tags', null, ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="image">Image *</label>
					@if(isset($product->image))
						<input type="file" data-url="{{ asset("/uploads/products/$product->id/$product->image")  }}" name="image" class="upload-img" data-responsive="true">
					@else
						<input type="file" name="image" class="upload-img" data-responsive="true">
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Line</b></div>
					<div class="panel-body">
						@foreach($lines as $l => $line)
							<div class="radio">
								<label class="i-checks">
									@if(isset($product) && $product->line_id == $line->id)
									<input type="radio" name="line_id[]" checked value="{{ $line->id }}">
									@else
									<input type="radio" name="line_id[]" value="{{ $line->id }}">
									@endif
									<i></i>
									{{ $line->name }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Type</b></div>
					<div class="panel-body">
						@foreach($types as $type)
							<div class="radio">
								<label class="i-checks">
									@if(isset($product) && $product->type_id == $type->id)
										<input type="radio" name="type_id[]" checked value="{{ $type->id }}">
									@else
										<input type="radio" name="type_id[]" value="{{ $type->id }}">
									@endif
									<i></i>
									{{ $type->name  }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="categorias">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Categories</b></div>
					<div class="panel-body">
						<div class="categoria">
							@foreach($categories as $cat => $category)
								<div class="checkbox">
									<label class="i-checks">
										@if(isset($relatedCategoriesProductsList) && in_array($category->id, $relatedCategoriesProductsList))
											<input type="checkbox" class="form-control" checked value="{{ $category->id }}" name="categories_ids[]">
										@else
											<input type="checkbox" value="{{ $category->id }}" name="categories_ids[]">
										@endif
										<i></i>
										{{ $category->name  }}
									</label>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="objetivos">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Goals</b></div>
					<div class="panel-body">
						@foreach($goals as $goalIdx => $goal)
							<div class="checkbox">
								<label class="i-checks">
									@if(isset($relatedGoalsProductsList) &&in_array($goal->id, $relatedGoalsProductsList))
										<input checked type="checkbox" name="goals_ids[]" value="{{ $goal->id }}">
									@else
										<input type="checkbox" name="goals_ids[]" value="{{ $goal->id }}">
									@endif
									<i></i>
									{{ $goal->name }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row" id="destaque-porcao">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Highlights per portion</b></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">Value</div>
							<div class="col-md-7">Nutrient</div>
						</div>
						<div class="qtds-porcao">
							@if( !empty($product->portions) )
								@foreach($product->portions as $ip => $p)
									<div class="qtd-porcao">
										<div class="row" data-id="{{ $p->id }}">
											<div class="col-md-5">
												<input type="text" name="portions[{{$p->id}}][value]" value="{{ $p->value }}" class="form-control input-portions-value">
											</div>
											<div class="col-md-7">
												<input type="text" name="portions[{{$p->id}}][nutrient]" value="{{ $p->nutrient }}" class="form-control input-portions-nutrient">
											</div>
											<button type="button" class="btn btn-danger btn-xs bt-delete-qtd-porcao"><i class="fa fa-times"></i></button>
										</div>
									</div>
								@endforeach
							@else
								<div class="qtd-porcao">
									<div class="row">
										<div class="col-md-5">
											<input type="text" name="portions[-1][value]" class="form-control input-portions-value">
										</div>
										<div class="col-md-7">
											<input type="text" name="portions[-1][nutrient]" class="form-control input-portions-nutrient">
										</div>
										<button type="button" class="btn btn-danger btn-xs bt-delete-qtd-porcao"><i class="fa fa-times"></i></button>
									</div>
								</div>
							@endif
						</div>
						<button type="button" class="btn btn-primary btn-xs pull-right" id="bt-add-qtd-porcao"><i class="fa fa-plus" aria-hidden="true"></i>Add New Item</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>