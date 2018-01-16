<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class TypeAdminController extends Controller
{
	private $typeModel;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct(Type $typeModel){
		$this->typeModel = $typeModel;
	}

	public function index()
	{
		$types = $this->typeModel
			->orderBy('name', 'ASC')
			->paginate(15);

		return view('admin.products.types.index', compact(
			'types'
		));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.products.types.create');
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

		$type = $this->typeModel->create($inputs);

		if($type->id != null) {
			Flash::success('Item adicionado com sucesso.');
		}else{
			Flash::error('O item não pode ser inserido. Tente novamente.');
		}
		return redirect()->route('tipos.listar');
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
		$type = $this->typeModel->find($id);

		return view('admin.products.types.edit', compact('type'));
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

		$type = $this->typeModel->find($id)
			->update($inputs);

		if($type){
			Flash::success('Item alterado com sucesso.');
		}else{
			Flash::error('Não foi possível alterar este item. Tente novamente.');
		}

		return redirect()->route('tipos.listar');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$type = $this->typeModel->find($id);

		if($type->id != null){
			$type->delete();
			Flash::success('Item removido com sucesso.');
			return Redirect::back();
		}
	}
}
