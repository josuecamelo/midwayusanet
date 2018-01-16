<?php

namespace App\Http\Controllers;

use App\TrainingCategory;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class TrainingCategoryAdminController extends Controller
{
	private $trainingCategoryModel;


//	CONSTRUCT
	
	public function __construct(TrainingCategory $trainingCategoryModel)
	{
		$this->trainingCategoryModel = $trainingCategoryModel;
	}


//	INDEX
	
	public function index()
	{
		$categories = $this->trainingCategoryModel->orderBy('name', 'ASC')->paginate(15);
		
		return view('admin.trainings.categories.index', compact('categories'));
	}


//	CREATE
	
	public function create()
	{
		return view('admin.trainings.categories.create');
	}


//	STORE
	
	public function store(Request $request)
	{
		$inputs = $request->all();
		
		$category = $this->trainingCategoryModel->create($inputs);
		
		if ($category->id != null)
		{
			Flash::success('Item adicionado com sucesso.');
		}
		else
		{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('treinos.categorias.listar');
	}


//	EDIT
	
	public function edit($id)
	{
		$category = $this->trainingCategoryModel->find($id);
		
		return view('admin.trainings.categories.edit', compact('category'));
	}


//	UPDATE
	
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		
		$category = $this->trainingCategoryModel->find($id)->update($inputs);
		
		if ($category)
		{
			Flash::success('Item alterado com sucesso.');
		}
		else
		{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}
		
		return redirect()->route('treinos.categorias.listar');
	}


//	DESTROY
	
	public function destroy($id)
	{
		$category = $this->trainingCategoryModel->find($id);
		
		if ($category->id != null)
		{
			$category->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
