<?php

namespace App\Http\Controllers;

use App\Training;
use App\TrainingCategory;

class TrainingController extends Controller
{
	private $trainingModel;
	private $trainingCategoryModel;
	
	public function __construct(Training $trainingModel, TrainingCategory $trainingCategoryModel)
	{
		$this->trainingModel = $trainingModel;
		$this->trainingCategoryModel = $trainingCategoryModel;
	}
	
	public function index()
	{
		$treinoDoDia = $this->trainingModel->treinoDoDia();
		$categorias = $this->trainingCategoryModel->with('trainings')->orderBy('name')->get();

		return view('site.trainings', compact('treinoDoDia', 'categorias'));
	}
}