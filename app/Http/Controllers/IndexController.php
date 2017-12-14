<?php

namespace App\Http\Controllers;

use App\Training;
use App\Goal;
use App\Type;

class IndexController extends Controller
{
	private $trainingModel;
	private $goalModel;
	private $typeModel;
	
	public function __construct(Training $training, Goal $goal, Type $typeModel)
	{
		$this->trainingModel = $training;
		$this->goalModel = $goal;
		$this->typeModel = $typeModel;
	}
	
	public function index()
	{
//		$treinoDoDia = $this->trainingModel->treinoDoDia();
//		$outrosTreinos = $this->trainingModel->skip(1)->take(3)->get();
//		$goals = $this->goalModel->tudo();

		return view('site.index');
	}
}
