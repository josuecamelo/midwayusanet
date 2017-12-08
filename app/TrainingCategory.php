<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingCategory extends Model
{
	use SoftDeletes;
	
	protected $table = 'training_categories';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'name'
	];
	
	public function trainings()
	{
		return $this->hasMany(Training::class, 'category_id')->orderBy('created_at', 'desc');
	}
	
	public function listarTodos()
	{
		return ['' => ''] + $this->orderBy('name', 'ASC')->pluck('name', 'id')->all();
	}
}