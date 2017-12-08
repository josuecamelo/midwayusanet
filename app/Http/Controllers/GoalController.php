<?php

namespace App\Http\Controllers;

use App\Goal;
use App\ProductGoal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
	private $goalModel;
	private $productGoalModel;
	
	public function __construct(Goal $goalModel, ProductGoal $productGoal)
	{
		$this->goalModel = $goalModel;
		$this->productGoalModel = $productGoal;
	}
	
	private function tudo()
	{
		return $this->goalModel->tudo();
	}
	
	public function index()
	{
		$goals = $this->tudo();

		return view('site.goals', compact('goals'));
	}
	
	public function goal($slug = "")
	{
		$goals = $this->tudo();
		$goal = $this->goalModel->where('slug', $slug)->first();
		$products = $goal->products()->get();
		
		return view('site.goal', compact('goals', 'goal', 'products'));
	}
}