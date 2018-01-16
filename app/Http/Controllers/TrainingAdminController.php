<?php

namespace App\Http\Controllers;

use App\Utils\Utils;
use App\Training;
use App\TrainingCategory;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class TrainingAdminController extends Controller
{
	private $trainingModel;
	private $trainingCategoryModel;


//	CONSTRUCT
	
	public function __construct(Training $trainingModel, TrainingCategory $trainingCategoryModel)
	{
		$this->trainingModel = $trainingModel;
		$this->trainingCategoryModel = $trainingCategoryModel;
	}


//	INDEX
	
	public function index()
	{
		$trainings = $this->trainingModel->orderBy('title', 'ASC')->paginate(15);
		
		return view('admin.trainings.index', compact('trainings'));
	}


//	CREATE
	
	public function create()
	{
		$categories = $this->trainingCategoryModel->listarTodos();
		
		return view('admin.trainings.create', compact('categories'));
	}


//	STORE
	
	public function store(Request $request)
	{
		$inputs = $request->all();
		$inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		$inputs['video'] = Utils::gerarUrlVideo($inputs['video']);
		
		$training = $this->trainingModel->create($inputs);
		
		if ($training->id != null)
		{
			Flash::success('Item adicionado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('treinos.listar');
	}
	

//	EDIT

	public function edit($id)
	{
		$training = $this->trainingModel->find($id);
		$categories = $this->trainingCategoryModel->listarTodos();
		$checked = $training->visibility ? '' : 'checked';
		
		return view('admin.trainings.edit', compact('training', 'categories', 'checked'));
	}

	
//	UPDATE

	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		$inputs['visibility'] = (!isset($inputs['visibility']) ? 0 : 1);
		$inputs['video'] = Utils::gerarUrlVideo($inputs['video']);
		
		$training = $this->trainingModel->find($id)->update($inputs);
		
		if ($training)
		{
			Flash::success('Item alterado com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}
		
		return redirect()->route('treinos.listar');
	}

	
//	DESTROY
	
	public function destroy($id)
	{
		$training = $this->trainingModel->find($id);
		
		if ($training->id != null)
		{
			$training->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}