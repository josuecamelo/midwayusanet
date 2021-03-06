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
		$categories = $this
            ->videoCategoryModel
            ->whereNull('parent_category_id')
            ->orderBy('name', 'ASC')->paginate(15);

		return view('admin.videos.categories.index', compact('categories'));
	}


//	CREATE
	
	public function create()
	{
		//$categories = $this->videoCategoryModel->listarTodos();
        $categories = $this->videoCategoryModel->listarTodos([],$mod='obj');

		return view('admin.videos.categories.create', compact('categories'));
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
		return redirect()->route('videos.categorias.listar');
	}


//	EDIT
	
	public function edit($id)
	{
		$category = $this->videoCategoryModel->find($id);
		$exclude = $category->childCategoriesMod2()->get();
        $exclude = array_merge($exclude->keyBy('id')->keys()->toArray(), [(int)$id] );
		$categories = $this->videoCategoryModel->listarTodos($exclude, $mod='obj');

		return view('admin.videos.categories.edit', compact('category', 'categories'));
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
		
		return redirect()->route('videos.categorias.listar');
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
