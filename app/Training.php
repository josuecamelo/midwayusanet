<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'title',
		'category_id',
		'description',
		'video',
		'visibility'
	];

	public function category()
	{
		return $this->belongsTo(TrainingCategory::class);
	}
	
	public function treinoDoDia()
	{
		return $this->orderBy('created_at', 'desc')->first();
	}
}