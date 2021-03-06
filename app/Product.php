<?php

namespace App;

use App\Scopes\ProductGlobalScope;
use App\Scopes\ProductScope;
use App\Utils\UploadImagem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
	use SoftDeletes, ProductGlobalScope;
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	protected $fillable = [
		'name',
		'last_name',
		'presentation',
		'description',
		'benefits',
		'link_purchase',
		'shopify',
		'excerpt',
		'video',
		'tags',
		'image',
		'line_id',
		'flavor_id',
		'type_id',
		'highlights_portion',
		'visibility',
		'offer',
		'slug',
		'last_name_slug',
		'serving_size',
		'complement',
		'nutrients',
		'nutrient_qty',
		'nutrient_vd',
		'out_of_stock',
		'coming_soon'
	];


	/*protected static function boot(){
	    parent::boot();
	    static::addGlobalScope(new ProductScope());
    }*/

	public function updateImageName($product, $imageName)
	{
		$product->image = $imageName;
		$product->save();
	}
	
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		$this->attributes['slug'] = strtolower(str_slug($value));
	}
	
	public function setLastNameAttribute($value)
	{
		$this->attributes['last_name'] = $value;
		$this->attributes['last_name_slug'] = strtolower(str_slug($value));
	}
	
	public function setImageAttribute($value)
	{
		$this->attributes['image'] = $value;
		$this->attributes['image_ext'] = UploadImagem::getFileExtension($value);
	}
	
	public function listarTodos($excluir = [])
	{
		return $this
			->select(
				'products.id',
				DB::raw("concat(products.name, ' ', IFNULL(products.last_name,''), ' ' , products.presentation, ' ', IFNULL(flavors.name, '')) as name2")
			)
			->leftJoin('flavors', 'flavors.id', '=', 'products.flavor_id')
			//->join('flavors', 'flavors.id', '=', 'products.flavor_id')
			->whereNotIn('products.id', $excluir)
			->orderBy('name2', 'ASC')
			->pluck('name2', 'products.id')->all();
	}
	
	public function products()
	{
		//return $this->belongsToMany(Product::class, 'product_related', 'parent_id', 'id');
		return $this->hasMany(ProductRelated::class, 'parent_id', 'id'); //funcional
	}
	
	public function productRelateds()
	{
		//return $this->belongsToMany(Product::class, 'product_related', 'parent_id', 'id');
		return $this->belongsToMany(Product::class, 'product_related', 'parent_id');
	}
	
	public function productTopics()
	{
		return $this->hasMany(ProductTopic::class);
	}
	
	public function categories()
	{
		return $this->hasMany(ProductCategory::class, 'product_id', 'id');
	}
	
	public function productCategories()
	{
		return $this->belongsToMany(Category::class, 'product_category', 'product_id');
	}
	
	public function goals()
	{
		return $this->hasMany(ProductGoal::class, 'product_id', 'id');
	}
	
	public function flavors()
	{
		return $this->hasMany(ProductFlavor::class, 'product_id', 'id');
	}
	
	public function productFlavors()
	{
		return $this->belongsToMany(Flavor::class, 'product_flavor', 'product_id');
	}
	
	public function productGoals()
	{
		return $this->belongsToMany(Goal::class, 'product_goal', 'product_id');
	}
	
	public function nutrients()
	{
		return $this->hasMany(ProductNutrient::class);
	}
	
	public function portions()
	{
		return $this->hasMany(ProductPortion::class);
	}
	
	public function getUpdateDateAttribute()
	{
		return Carbon::parse($this->attributes['updated_at'])->format('d/m/Y H:i:s');
	}
	
	public function flavor()
	{
		return $this->belongsTo(Flavor::class, 'flavor_id', 'id');
	}
	
	public function line()
	{
		return $this->belongsTo(Line::class, 'line_id', 'id');
	}
	
	public function type()
	{
		return $this->belongsTo(Type::class, 'type_id', 'id');
	}
	
	public function related($slug, $lSlug)
	{
		return $this
			->where('last_name_slug', $lSlug)
			->where('slug', $slug)
            ->where('visibility', 1)
			->whereRaw("products.flavor_id is not null")
            ->get();
	}
	
	
	public function getUrlVisualizacaoAttribute()
	{
		$slug = $this->slug;//$this->last_name_slug ? $this->slug . '&' . $this->last_name_slug : $this->slug;
		$product_flavor = isset($this->flavor->id) ? $this->flavor->slug : null;
		
		$url = route('produto_exibicao', [$slug, $product_flavor]);
		return $url;
	}
	
	public function getByTypeCategory($type_slug, $category_slug)
	{
		return $this->select('products.*')
			->join('types', 'types.id', 'products.type_id')
			->join('product_category', 'product_category.product_id', 'products.id')
			->join('categories', 'categories.id', 'product_category.category_id')
			->where('types.slug', $type_slug)
			->where('categories.slug', $category_slug)
			->orderBy('products.name', 'asc')
			->get();
	}
	
	public function listar($ids = [], $orderBy = [])
	{
		if (empty($ids))
		{
			return $this
				->select(
					'products.id',
					DB::raw("concat(products.name, ' ', IFNULL(products.last_name,''), ' ' , products.presentation, ' ', IFNULL(flavors.name, '')) as name2")
				)
				->leftJoin('flavors', 'flavors.id', '=', 'products.flavor_id')
				->orderBy('name2', 'ASC')
				->pluck('name2', 'products.id')->all();
		}
		else
		{
			return $this
				->select(
					'products.id',
					DB::raw("concat(products.name, ' ', IFNULL(products.last_name,''), ' ' , products.presentation, ' ', IFNULL(flavors.name, '')) as name2")
				)
				->leftJoin('flavors', 'flavors.id', '=', 'products.flavor_id')
				->whereIn('products.id', $ids)
				//->orderBy('name2', 'ASC')
				->pluck('name2', 'products.id')->all();
		}
	}
	
	public function getCompleteNameAttribute()
	{
		return $this->name;
//		if (isset($this->flavor_id))
//		{
//			return $this->name . ' ' . $this->presentation . ' ' . $this->flavor()->first()->name;
//		}
//		else
//		{
//			return $this->name . ' ' . $this->presentation;
//		}
	}
}
