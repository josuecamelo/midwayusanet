<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flavor extends Model
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
		'slug',
		'color'
	];
	
	public function listarTodos($select = true)
	{
		if ($select)
		{
			return ['' => ''] + $this
					->orderBy('name', 'ASC')
					->pluck('name', 'id')->all();
		}
		else
		{
			return $this
				->orderBy('name', 'ASC')
				->pluck('name', 'id')->all();
		}
	}
	
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = strtolower(str_slug($value));
	}

	public function products(){
	    return $this->belongsTo(Product::class);
    }

    public function relatedProducts(){
	    return $this->hasMany(Product::class);
    }
}
