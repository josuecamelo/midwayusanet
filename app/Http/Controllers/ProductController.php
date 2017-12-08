<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductCategory;
use App\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	private $productModel;
	private $categoryModel;
	private $productCategoryModel;
	private $typeModel;
	
	public function __construct(Product $productModel, Category $category, ProductCategory $productCategory, Type $type)
	{
		$this->productModel = $productModel;
		$this->categoryModel = $category;
		$this->productCategoryModel = $productCategory;
		$this->typeModel = $type;
	}
	
	public function product($slug, $flavor = '')
	{
		$slugs = explode('&', $slug);
		
		$product = $this->productModel
			->select('products.*')
			->leftJoin('flavors', 'flavors.id', '=', 'products.flavor_id')
			->where(function ($query) use ($slugs, $flavor)
			{
				$query->where('products.slug', $slugs[0]);

				if(isset($slugs[1])){//correção 30/10/2017 - josue ex: http://militarytrail.com.br/produtos/somarizanol
				    $query->where('last_name_slug', $slugs[1]);
                }

				if ($flavor != '')
					$query->where('flavors.slug', $flavor);
				//->orWhere('', '=', ');
			})
			->first();
		
		$topics = $product->productTopics()->get();
		
		$flavors = $product::ofProduct($product->slug, $product->last_name_slug);
		
		
		return view('site.supplement', compact(
			'product',
			'topics',
			'flavors'
		));
	}
	
	public function obterPorTipoCategoria($type, $category)
	{
		$slug = $category;
		$categories = $this->categoryModel->orderBy('name')->get();
		$products = $this->productModel->getByTypeCategory($type, $category);

		return view('site.product-category', compact('categories', 'slug', 'products'));
	}
}
