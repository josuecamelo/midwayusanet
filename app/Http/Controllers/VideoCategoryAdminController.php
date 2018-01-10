<?php

namespace App\Http\Controllers;

use App\VideoCategory;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class VideoCategoryAdminController extends Controller
{
	private $videoCategoryModel;


//	CONSTRUCT
	
	public function __construct(VideoCategory $videoCategoryModel)
	{
		$this->videoCategoryModel = $videoCategoryModel;
	}


//	INDEX
	
	public function index()
	{
		$categories = $this->videoCategoryModel->orderBy('name', 'ASC')->paginate(15);
		
		return view('admin.videos.categories.index', compact('categories'));
	}


//	CREATE
	
	public function create()
	{
		return view('admin.videos.categories.create');
	}


//	STORE
	
	public function store(Request $request)
	{
		$inputs = $request->all();
		
		$category = $this->videoCategoryModel->create($inputs);
		
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
		$category = $this->videoCategoryModel->find($id);
		
		return view('admin.videos.categories.edit', compact('category'));
	}


//	UPDATE
	
	public function update(Request $request, $id)
	{
		$inputs = $request->all();
		
		$category = $this->videoCategoryModel->find($id)->update($inputs);
		
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
		$category = $this->videoCategoryModel->find($id);
		
		if ($category->id != null)
		{
			$category->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
