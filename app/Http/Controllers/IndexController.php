<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Product;
use App\Video;

class IndexController extends Controller
{
	private $productModel;
	private $videoModel;
	
	public function __construct(Product $product, Video $video)
	{
		$this->productModel = $product;
		$this->videoModel = $video;
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
		$militaryTrailProducts = $this->productModel->where('line_id', 1)->orderBy('name')->get();
		$glamourNutritionProducts = $this->productModel->where('line_id', 2)->orderBy('name')->get();
		
		$posts = BlogPost::last(4,1,null);
		$destak = $posts->take(1)->first();
		$posts = $posts->slice(1,4);
		
		$videos = $this->videoModel->orderBy('created_at', 'DESC')->get();
		
		return view('site.index', compact('militaryTrailProducts','glamourNutritionProducts', 'destak','posts', 'videos'));
	}
}
