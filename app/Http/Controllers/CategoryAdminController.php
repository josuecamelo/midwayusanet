<?php

namespace App\Http\Controllers;

use App\Category;
use App\Type;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class CategoryAdminController extends Controller
{
	private $categoryModel;
	private $typeModel;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct(Category $categoryModel, Type $typeModel){
		$this->categoryModel = $categoryModel;
		$this->typeModel = $typeModel;
	}

	public function index()
	{
		$categories = $this->categoryModel
			->orderBy('name', 'ASC')
			->paginate(15);

		return view('admin.products.categories.index', compact(
			'categories'
		));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
        $types = $this->typeModel->listarTodos();
		return view('admin.products.categories.create', compact('types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$inputs  = $request->all();

		$category = $this->categoryModel->create($inputs);

		if($category->id != null) {
			Flash::success('Item adicionado com sucesso.');
		}else{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('categorias.listar');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$category = $this->categoryModel->find($id);
		$types = $this->typeModel->listarTodos();
		return view('admin.products.categories.edit', compact('category', 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$inputs = $request->all();

		$category = $this->categoryModel->find($id)
			->update($inputs);

		if($category){
			Flash::success('Item alterado com sucesso.');
		}else{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}

		return redirect()->route('categorias.listar');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$category = $this->categoryModel->find($id);

		if($category->id != null){
			$category->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
