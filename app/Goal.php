<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
	use SoftDeletes;
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	protected $fillable = [
		'name',
		'description',
		'logo',
		'banner',
		'slug'
	];
	
	public function tudo()
	{
		return $this->all();
	}
	
	
	public function products()
	{
		return $this->belongsToMany(Product::class, 'product_goal', 'goal_id', 'product_id');
	}
}
