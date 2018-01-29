<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
	//use SoftDeletes;
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	//protected $dates = ['deleted_at'];
	
	protected $fillable = [
		'name',
		'featured_product_id'
	];

	
	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	public function featuredProduct(){
	    return $this->belongsTo(Product::class);
    }
	
	public function listar()
	{
		return $this->all();
	}
	
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

    public function relatedCategories()
    {
        return $this->belongsToMany(Category::class, 'menu_categories', 'menu_id');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'menu_products', 'menu_id');
    }

    //public function featuredProductMod2(){
        //return $this->belongsTo(Product::class);
            /*->select(
                'products.*',
                DB::raw("concat(products.name, ' ', IFNULL(products.last_name,''), ' ' , products.presentation, ' ', IFNULL(flavors.name, '')) as name2")
            )
            ->leftJoin('flavors', 'flavors.id', '=', 'products.flavor_id');*/


       // return $this->belongsTo(Product::class);
    //}
}
