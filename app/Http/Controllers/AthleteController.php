<?php

namespace App\Http\Controllers;

use App\Athlete;
use App\AthleteImage;
use App\AthleteProduct;
use App\AthleteVideo;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
	private $athleteModel;
	
	public function __construct(Athlete $athlete)
	{
		$this->athleteModel = $athlete;
	}
	
	public function index()
	{
		$athletes = $this
            ->athleteModel
            ->orderBy('name', 'ASC')
            ->get();//paginate(15);

        $athletesGroups = $this->showItemsByRow($athletes, 4);

		return view('site.athletes', compact('athletesGroups'));
	}
	
	public function athlete($slug)
	{
		$athlete = $this->athleteModel->where('slug', '=', $slug)->orderby('name')->first();
		$images = $athlete->athleteImage()->orderBy('order', 'asc')->get();
		$videos = $athlete->athleteVideo()->orderBy('order', 'asc')->get();
		$products = $athlete->athleteProduct()->get();
		
		return view('site.athlete', compact('athlete', 'images', 'videos', 'products'));
	}
}