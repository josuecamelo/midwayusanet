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

	//
	public function childCategories(){
	    return $this->hasMany(VideoCategory::class, 'parent_category_id', 'id')->where('id', '<>', $this->id);
    }
	
	public function listarTodos($notIn = [], $mod = 'chave_valor')
	{
	    $res = [];

	    if($mod=='chave_valor'){
            if(empty($notIn)){
                $res = ['' => ''] + $this
                        ->orderBy('name', 'ASC')
                        ->pluck('name', 'id')->all();
            }else{
                $res = ['' => ''] + $this
                        ->whereNotIn('id', $notIn)
                        ->orderBy('name', 'ASC')
                        ->pluck('name', 'id')->all();
            }
        }else{
            if(empty($notIn)){
                $res = $this
                        ->whereNull('parent_category_id')
                        ->orderBy('name', 'ASC')
                        ->get();
            }else{
                $res = $this
                        ->whereNull('parent_category_id')
                        ->whereNotIn('id', $notIn)
                        ->orderBy('name', 'ASC')
                        ->get();
            }
        }

        return $res;
	}

    public function childCategoriesMod2(){
        return $this->hasMany(VideoCategory::class, 'parent_category_id', 'id')->select('id');
    }
}
