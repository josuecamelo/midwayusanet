<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Product;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
		$militaryTrailProducts = $this->productModel->where('line_id', 1)->where('visibility', 1)->orderBy('name')->get();
		$glamourNutritionProducts = $this->productModel->where('line_id', 2)->where('visibility', 1)->orderBy('name')->get();
		
		$posts = BlogPost::last(4,1,null);
		$destak = $posts->take(1)->first();
		$posts = $posts->slice(1,4);
		
		$videos = $this->videoModel->orderBy('created_at', 'DESC')->get();
		
		return view('site.index', compact('militaryTrailProducts','glamourNutritionProducts', 'destak','posts', 'videos'));
	}

	public function finder(Request $request, Product $productModel){
	    $p = $request->all();

	    $res = $productModel
            ->distinct()
            ->select('products.*')
            ->leftJoin('flavors', 'flavors.id', '=', 'products.flavor_id')
            ->leftJoin('product_topics', 'product_topics.product_id', '=', 'products.flavor_id')
            ->where('products.visibility', 1)
            ->where(function ($query) use ($p) {
                $part = explode(" ", $p['q']);
               if(count($part) == 1){
                    /*$query
                        ->orWhere( DB::raw("concat(products.name, ' ', IFNULL(products.last_name,''), ' ' , products.presentation, ' ', IFNULL(flavors.name, ''))"), 'like', '%' . $p['q'] . '%')
                        ->orWhere( DB::raw("concat(product_topics.topic_description, ' ', product_topics.description)"), 'like', '%' . $p['q'] . '%');*/
                   $fields = [
                       'products.name',
                       'products.last_name',
                       'products.presentation',
                       'products.description',
                       'flavors.name',
                       'product_topics.topic_description',
                       'product_topics.description'
                   ];

                   $sql ="";

                   foreach($part as $key=> $item){
                       foreach($fields as $f){
                           $sql.= DB::raw("lower(trim($f)) LIKE '%" .strtolower(trim($item)). "%' OR ");
                       }
                   }

                   $query->whereRaw(DB::raw(substr($sql, 0, -3)));
               }elseif(count($part) > 1){
                   $fields = [
                       'products.name',
                       'products.last_name',
                       'products.presentation',
                       'products.description',
                       'flavors.name',
                       'product_topics.topic_description',
                       'product_topics.description'
                   ];

                   $sql ="";

                   foreach($part as $key=> $item){
                       foreach($fields as $f){
                           $sql.= DB::raw("lower(trim($f)) LIKE '%" .strtolower(trim($item)). "%' OR ");
                       }
                   }

                   $query->whereRaw(DB::raw(substr($sql, 0, -3)));
               }
            })
            ->get();

	   dd($res);
    }
}
