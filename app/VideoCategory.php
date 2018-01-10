<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoCategory extends Model
{
	use SoftDeletes;
	
	protected $table = 'video_categories';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'parent_category_id',
		'name'
	];
	
	public function videos()
	{
		return $this->hasMany(Video::class, 'category_id')->orderBy('created_at', 'desc');
	}

	public function childCategories(){
	    return $this->hasMany(VideoCategory::class, 'parent_category_id', 'id');
    }
	
	public function listarTodos()
	{
		return ['' => ''] + $this->orderBy('name', 'ASC')->pluck('name', 'id')->all();
	}
}
