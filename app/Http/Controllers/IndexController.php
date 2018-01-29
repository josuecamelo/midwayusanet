<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Product;
use App\Training;
use App\Goal;
use App\Type;

class IndexController extends Controller
{
	private $trainingModel;
	private $goalModel;
	private $typeModel;
	
	public function __construct(Product $product)
	{
		$this->productModel = $product;
	}
	
//	public function index()
//	{
////		$treinoDoDia = $this->trainingModel->treinoDoDia();
////		$outrosTreinos = $this->trainingModel->skip(1)->take(3)->get();
//		$goals = $this->goalModel->tudo();
//
//		return view('site.index', compact('goals'));
//	}
	
	public function index()
	{
		return view('maintenance');
	}
	
	public function home()
	{
		// All Products:
		
		$militaryTrailProducts = $this->productModel->where('line_id', 1)->orderBy('name')->get();
		$glamourNutritionProducts = $this->productModel->where('line_id', 2)->orderBy('name')->get();
		$posts = BlogPost::last(4,1,null);
		$destak = $posts->take(1)->first();
		$posts = $posts->slice(1,4);
		
		return view('site.index', compact('militaryTrailProducts', 'glamourNutritionProducts',
            'destak','posts'));
	}
}
