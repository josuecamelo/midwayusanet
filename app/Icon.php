<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Icon extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['name', 'url'];
	
	public function listarTodos()
	{
		return $this->orderBy('name', 'ASC')->get();
	}
}
