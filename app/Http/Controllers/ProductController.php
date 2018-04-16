<?php

namespace App\Http\Controllers;

use App\Flavor;
use App\Product;
use App\Line;
use App\Type;
use App\Category;
use App\Goal;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
	private $productModel;
	private $lineModel;
	private $typeModel;
	private $categoryModel;
	private $goalModel;
	private $flavorModel;
	private $productCategoryModel;
	
	public function __construct(Product $productModel, Line $line, Type $type, Category $category, Goal $goal, ProductCategory $productCategory, Flavor $flavor)
	{
		$this->productModel = $productModel;
		$this->lineModel = $line;
		$this->typeModel = $type;
		$this->categoryModel = $category;
		$this->goalModel = $goal;
		$this->flavorModel = $flavor;
		$this->productCategoryModel = $productCategory;
	}
	
	function index(Request $request,
                   $line_ids = null,
                   $types_ids = null,
                   $goals_ids = null,
                   $categories_ids = null,
                   $flavors_ids = null
    ){
//	    if($request->getRequestUri() != '/products/offers'){
//            $products = $this->productModel
//                ->orderBy('name')
//                ->get();
//        }else{
//            $products = $this->productModel
//                ->where('offer', 1)
//                ->orderBy('name')
//                ->get();
//        }
		
		$products = $this->productModel
			->orderBy('name')
			->get();
		
		$lines = $this->lineModel->orderby('name')->get();
		$types = $this->typeModel->orderby('name')->get();
		$categories = $this->categoryModel->orderby('name')->get();
		$goals = $this->goalModel->orderby('name')->get();
		$flavors = $this
            ->flavorModel
            ->orderby('name')
            ->get();

		return view('site.products', compact('products', 'lines', 'types', 'categories', 'goals', 'flavors', 'name', 'item', 'id'));
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
				
				if (isset($slugs[1]))
				{//correção 30/10/2017 - josue ex: http://militarytrail.com.br/produtos/somarizanol
					$query->where('last_name_slug', $slugs[1]);
				}
				
				if ($flavor != '')
					$query->where('flavors.slug', $flavor);
				//->orWhere('', '=', ');
			})
			->first();

		if( isset($product) ) {
		    $topics = $product->productTopics()->get();
        }

		//$flavors = $this->productModel->related($product->slug, $product->last_name_slug);
        //dd($this->productModel->ofProduct($product->slug, $product->last_name_slug));
        $flavors = new collection();

		dd($flavors);

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
