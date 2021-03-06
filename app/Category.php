<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
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
		'type_id'
	];
	
	public function tudo()
	{
		return $this->all();
	}
	
	public function type()
	{
		return $this->belongsTo(Type::class, 'type_id');
	}
	
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = strtolower(str_slug($value));
	}
	
	public function products()
	{
	    //return $this->belongsToMany(Product::class)->withPivot('productCategories');
		return $this->belongsToMany(Product::class, 'product_category', 'category_id');//pela categoria encontra-se o produto
	}

	public function productsOfMenu($category_id){
	    $sql = "select distinct
                p.name, p.last_name, p.slug, p.last_name_slug, 
                concat(p.slug, '&',p.last_name_slug) as url_visualizacao
            from categories c
            join product_category pc on pc.category_id = c.id
            join products p on p.id = pc.product_id
            left join flavors f on f.id = p.flavor_id
            where c.id = $category_id
            order by p.name asc
            ";
	    return DB::select($sql);
    }

    public function listarTodos()
    {
        return $this
            ->select(
                'categories.id',
                'categories.name'
            )
            ->orderBy('name', 'ASC')
            ->pluck('name', 'id')->all();
    }

    public function listar($ids = [])
    {
        if(empty($ids)) {
            return $this
                ->select(
                    'categories.id',
                    'categories.name'
                )
                ->orderBy('name', 'ASC')
                ->pluck('name', 'id')->all();
        }else{
            return $this
                ->select(
                    'categories.id',
                    'categories.name'
                )
                ->whereIn('id', $ids)
                //->orderBy('name', 'ASC')
                ->pluck('name', 'id')->all();
        }
    }
}
